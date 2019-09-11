<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Frais;
use App\Entity\Client;
use App\Form\ClientType;
use App\Entity\Transaction;
use App\Form\TransactionType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api/trans")
 */
class TransactionController extends AbstractController
{
    /**
     * @Route("/", name="transaction_index", methods={"GET"})
     */
    public function index(TransactionRepository $transactionRepository): Response
    {
        return $this->render('transaction/index.html.twig', [
            'transactions' => $transactionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/transaction", name="transactionNew", methods={"POST"})
     */
    public function envoi(Request $request, EntityManagerInterface $entityentityManager, SerializerInterface $serializer)
    {
        $user = new User();
        $values = json_decode($request->getContent());
        $client = new Client();
        $formB = $this->createform(ClientType::class, $client);
        $values = $request->request->all();
        $formB->submit($values);
        //var_dump($client);die();
        $transaction = new Transaction();
        $user = $this->getUser();
       // var_dump($user);die();
        $repo = $this->getDoctrine()->getRepository(Frais::class);
        $frais = $repo->findAll();

        $formT = $this->createform(TransactionType::class, $transaction);
        $values = $request->request->all();
        $formT->submit($values);
        $dat = new \DateTime();
        $dat = $dat->format('ym');
        $random =  random_int(100000000, 999999999);
        $transaction->setCodeTransaction($random);
        
        $transaction->setDate(new \DateTime('now'));
        $transaction->setStatusTransaction("En_cours");
        $transaction->setUser($user);
        $transaction->setClients($client);
        $solde = $user->getComptePartenaire()->getSoldeCompte();
        $comptePartenaire = $user->getComptePartenaire();
        for ($i = 0; $i < count($frais); $i++) {
            if (
                $transaction->getMontant() >= $frais[$i]->getMin()
                && $transaction->getMontant() <= $frais[$i]->getMax()
            ) {
                $transaction->setMontant($transaction->getMontant());
              //  $transaction->setFrais($frais[$i]);
                $transaction -> setCommEtat($frais[$i]->getFrais() * 20 / 100);
                 $Commission=$frais[$i]->getFrais() * 10 / 100;
                $transaction->setCommExp($frais[$i]->getFrais() * 10 / 100);
                $transaction -> setCommSys($frais[$i]->getFrais() * 40 / 100);
                $comptePartenaire->setSoldeCompte($solde - $transaction->getMontant() + $Commission);
            }
        }
        if ($transaction->getMontant() -> $solde) {
            $data = [
                'statuss' => 500,
                'messge' => 'Le montant est insuffisant '
            ];
            return new JsonResponse($data, 500);
        }
        
        $entityentityManager->persist($user);
        $entityentityManager->persist($client);
        $entityentityManager->persist($transaction);
        $entityentityManager->flush();
        $data = [
            'statuss1' => 201,
            'message1' => 'Le transaction a ete fait avec succes ' . $user->getNomUser() . ' ' . $user->getPrenomUser()
        ];
        return new JsonResponse($data, 201);
    }

    /**
     * @Route("/retrait", name="retrait")
     */
    public function retrait(Request $request, EntityManagerInterface $entityentityManager, SerializerInterface $serializer)
    {


        $transaction = new Transaction();
        $user = $this->getRecupUser();
        $repo = $this->getDoctrine()->getRepository(Frais::class);
        $frais = $repo->findAll();
        $values = $request->request->all();
        $formTr = $this->createform(TransactionType::class, $transaction);
        $values = $request->request->all();
        $formTr->submit($values);

        //var_dump($transaction->getCodeTransaction());die();
            $repo = $this->getDoctrine()->getRepository(Transaction::class);
            $transaction = $repo->findOneBy(['codeTransaction' =>  $transaction->getCodeTransaction()]);
            if (!$transaction) {
                $exception = [
                    'statu' => 500,
                    'messag' => 'le code n\'est pas valide'
                ];
                return new JsonResponse($exception, 500);
            }

            if ($transaction->getStatusTransaction() == "Retiré") {
                $exception = [
                    'status' => 500,
                    'message' => 'l\'argent a ete retiré'
                ];
                return new JsonResponse($exception, 500);
            }
            $transaction->setStatusTransaction("Retiré");
            $transaction->setDateRetrait(new \DateTime('now'));
            $transaction->setRecupUser($user);
            $transaction->getClients()->setNCIRecepteur($values["nCIRecepteur"]);
            $solde = $user->getComptePartenaire()->getSoldeCompte();
            $comptePartenaire = $user->getComptePartenaire();
            for ($i = 0; $i < count($frais); $i++) {
                if (
                    $transaction->getMontant() >= $frais[$i]->getMin()
                    && $transaction->getMontant() <= $frais[$i]->getMax()
                ) {
                    $Commission=$frais[$i]->getFrais() * (20 / 100);
                
                    }
                }
                $transaction->setCommRecept($Commission);
                $comptePartenaire->setSoldeCompte($solde - $transaction->getMontant() + $Commission);

        $entityentityManager->persist($comptePartenaire);
        $entityentityManager->persist($transaction);
        $entityentityManager->flush();
        $data = [
            'statuss' => 201,
            'messge' => 'Le retrait a ete fait avec succes ' 
        ];
        return new JsonResponse($data, 201);
}
    /**
     * @Route("/{id}", name="transaction_show", methods={"GET"})
     */
    public function show(Transaction $transaction): Response
    {
        return $this->render('transaction/show.html.twig', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="transaction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Transaction $transaction): Response
    {
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transaction_index');
        }

        return $this->render('transaction/edit.html.twig', [
            'transaction' => $transaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="transaction_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Transaction $transaction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transaction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('transaction_index');
    }
}
