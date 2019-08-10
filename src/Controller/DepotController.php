<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\Depot;
use App\Form\DepotType;
use App\Entity\ComptePartenaire;
use App\Repository\DepotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api")
 */
class DepotController extends AbstractController
{
    /**
     * @Route("/", name="depot_index", methods={"GET"})
     */
    public function index(DepotRepository $depotRepository): Response
    {
        return $this->render('depot/index.html.twig', [
            'depots' => $depotRepository->findAll(),
        ]);
    }

    /**
     * @Route("/depot", name="depot_new", methods={"GET","POST"})
     * 
     * @IsGranted("ROLE_CAISSIER")
     */
    public function depot(Request $request,SerializerInterface $serializer, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager): Response
    {
        $user=new User();
        $values = json_decode($request->getContent());
        $depot = new Depot();

        $depot->setMontant($values->montant);
        if(($values->montant)<=74999){
            return new Response('le montant doit etre superieur ou egale à 75000', Response::HTTP_CREATED);
        }else {
            $depot->setDateDepot(new \DateTime());
            $partenaire=$this->getDoctrine()->getRepository(ComptePartenaire::class)->find($values->compte_partenaire_id);
            $partenaire->setSoldeCompte($partenaire->getSoldeCompte() + $values->montant);
            $depot->setComptePartenaire($partenaire);
            $user=$this->getUser();
            var_dump($user);die();
            //$user=$this->getDoctrine()->getRepository(User::class)->find($values->user_id);
            $depot->setUser($user);

                
                $entityManager->persist($depot);
                $entityManager->flush();
                return new Response('Depot effectué', Response::HTTP_CREATED);
        }
        
    }

    /**
     * @Route("/{id}", name="depot_show", methods={"GET"})
     */
    public function show(Depot $depot): Response
    {
        return $this->render('depot/show.html.twig', [
            'depot' => $depot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="depot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Depot $depot): Response
    {
        $form = $this->createForm(DepotType::class, $depot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('depot_index');
        }

        return $this->render('depot/edit.html.twig', [
            'depot' => $depot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="depot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Depot $depot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$depot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($depot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('depot_index');
    }
}
