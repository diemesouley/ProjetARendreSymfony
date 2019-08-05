<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Entity\ComptePartenaire;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/partenaire")
 * 
 */
class PartenaireController extends AbstractController
{
    /**
     * @Route("/", name="partenaire_index", methods={"GET"})
     */
    public function index(PartenaireRepository $partenaireRepository): Response
    {
        return $this->render('partenaire/index.html.twig', [
            'partenaires' => $partenaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="partenaire_new", methods={"GET","POST"})
     */
    public function ajout(Request $request,SerializerInterface $serializer, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager): Response
    {
        $values = json_decode($request->getContent());
        $entityManager = $this->getDoctrine()->getManager();

        $partenaire = new Partenaire();
        $partenaire->setMatricule($values->matricule);
        $partenaire->setNomPartenaire($values->nomPartenaire);
        $partenaire->setNinea($values->ninea);
        $partenaire->setEmailPartenaire($values->emailPartenaire);
        $partenaire->setAdressePartenaire($values->adressePartenaire);
        $partenaire->setTelephonePartenaire($values->telephonePartenaire);
        $partenaire->setStatus($values->status);

        $comptePartenaire = new ComptePartenaire();
        $entrp=$values->telephonePartenaire;
        $ncp=substr($entrp,0,2);
        while (true) {
            if(time() % 1==0){
                $test = rand(100,200);
                break;
            }else{
                slep(1);
            }
        }
        $concat=$ncp+$test;
        $comptePartenaire->setNumCompte($concat);
        $comptePartenaire->setSoldeCompte($values->soldeCompte);
        $comptePartenaire->setDateCreation(new \DateTime($values->dateCreation));
        $comptePartenaire->setPartenaire($partenaire);

        $user = new User();
        $user->setUsername($values->username);
        $user->setPassword($passwordEncoder->encodePassword($user, $values->password));
        $user->setRoles($values->roles);
        $user->setMatriculeUser($values->matriculeUser);
        $user->setNomUser($values->nomUser);
        $user->setPrenomUser($values->prenomUser);
        $user->setEmailUser($values->emailUser);
        $user->setAdresseUser($values->adresseUser);
        $user->setTelephoneUser($values->telephoneUser);
        $user->setStatusUser($values->statusUser);
        $user->setPartenaire($partenaire);
        $user->setComptePartenaire($comptePartenaire);

        $entityManager->persist($partenaire);
        $entityManager->persist($comptePartenaire);
        $entityManager->persist($user);

        $entityManager->flush();
        return new Response('Partenaire ajouter', Response::HTTP_CREATED);

        }

    /**
     * @Route("/{id}", name="partenaire_show", methods={"GET"})
     */
    public function show(Partenaire $partenaire): Response
    {
        return $this->render('partenaire/show.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="partenaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Partenaire $partenaire): Response
    {
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partenaire_index');
        }

        return $this->render('partenaire/edit.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="partenaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Partenaire $partenaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partenaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($partenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('partenaire_index');
    }
}
