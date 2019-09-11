<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Entity\ComptePartenaire;
use App\Form\ComptePartenaireType;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * @Route("/api/part")
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
     * @Route("/ajoutPartenaire", name="partenaire_new", methods={"GET","POST"})
     */
    public function ajoutPartenaire(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager): Response
    { 
        
        $partenaire = new Partenaire();
        $form1=$this->createForm(PartenaireType::class,$partenaire);
        //$form1->handleRequest($request);
        $values=$request->request->all();
        $entityManager=$this->getDoctrine()->getManager();
        $form1->submit($values);
        $comptePartenaire = new ComptePartenaire();
      //  $form=$this->createForm(ComptePartenaireType::class,$comptePartenaire);
         //   $form->handleRequest($request);
          //   $form->submit($values);
        $entrp=978;
        $ncp=substr($entrp,0,2);
        while (true) {
            if(time() % 1==0){
                $test = rand(100,200);
                break;
            }else{
                slep(1);
            }
        }
        $concatTT=$ncp + $test;
        $comptePartenaire->setNumCompte($concatTT);
        $solde=0;
        $comptePartenaire->setSoldeCompte($solde);
        $comptePartenaire->setDateCreation(new \DateTime());
        $comptePartenaire->setPartenaire($partenaire);
        $entityManager=$this->getDoctrine()->getManager();


        $entityManager->persist($partenaire);
        $entityManager->persist($comptePartenaire);

        $user=new User();

            $form1=$this->createForm(UserType::class,$user);
            $form1->handleRequest($request);
            $values=$request->request->all();
            $file=$request->files->all()["imageName"];
          
            $form1->submit($values);
            $user->setPartenaire($partenaire);
            $user->setComptePartenaire($comptePartenaire);
            
            $user->setRoles(["ROLE_ADMIN"]);
                $hash = $passwordEncoder->encodePassword($user, $user->getPassword());
                $user->setPassword($hash);
    
            $user->setImageFile($file);

            $entityManager=$this->getDoctrine()->getManager();

        
        $entityManager->persist($user);

        $entityManager->flush();
        return new Response('Partenaire ajouter', Response::HTTP_CREATED);
        }
     /**
     * @Route("/ajoutUserPart/{id}", name="usernewPart", methods={"POST"})
     * 
     */
    public function ajoutUserPart(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, $id): Response
    {
        
        //$values = json_decode($request->getContent(),true);
        $user=new User();
        $partenaire=$this->getDoctrine()->getRepository(Partenaire::class)->findOneBy(['id'=>$id]);
            $form=$this->createForm(UserType::class,$user);
            $form->handleRequest($request);
            $values=$request->request->all();
            $file=$request->files->all()[
                "imageName"
            ];
            $user->setRoles(["ROLE_USER_SIMPLE"]);
          
            $form->submit($values);
            if ($form->isSubmitted() ) {
                $hash = $passwordEncoder->encodePassword($user, $user->getPassword());
                $user->setPassword($hash);
                $user->setImageFile($file);
                $user->setPartenaire($partenaire);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                return new Response('User Créé avec succé', Response::HTTP_CREATED);
            }
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
     * @Route("/partenaires/{id}", name="partenairesLister", methods={"GET","POST"})
     */
    public function lister(Partenaire $partenaire,SerializerInterface $serializer, PartenaireRepository $partenaireRepository)
    {
        $partenaire = $partenaireRepository->findAll();
       //var_dump($partenaire);die();
        $data = $serializer->serialize($partenaire, 'json', [
            'groups' => ['show']
        ]);
        return new Response($data, 200, [
            'Content-Types' => 'applications/json'
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
