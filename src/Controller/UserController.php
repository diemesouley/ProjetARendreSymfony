<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Partenaire;
use App\Entity\ComptePartenaire;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api/uti")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ajoutUser", name="usernew", methods={"GET","POST"})
     */
    public function ajoutUser(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager): Response
    {
        
        //$values = json_decode($request->getContent(),true);
        $user=new User();

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

                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                return new Response('User Créé avec succé', Response::HTTP_CREATED);
            }
        
    }

    /**
     * @Route("/listerUser/{id}", name="listerUsers", methods={"GET","POST"})
     * 
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function listerUser(User $user,SerializerInterface $serializer, UserRepository $userRepository)
    {
        $user = $userRepository->findAll();
        
        $data = $serializer->serialize($user, 'json', [
            'groups' => ['show']
        ]);
        var_dump($user);die();
        return new Response($data, 200, [
            'Content-Types' => 'applications/json'
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/userLister/{id}", name="userLister", methods={"GET","POST"}) 
     * 
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function userListe(User $user,SerializerInterface $serializer, UserRepository $userRepository)
    {
        $user = $userRepository->findAll();
        //var_dump($user);die();
        $data = $serializer->serialize($user, 'json', [
            'groups' => ['show']
        ]);
        return new Response($data, 200, [
            'Content-Types' => 'applications/json'
        ]);
    }
    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
