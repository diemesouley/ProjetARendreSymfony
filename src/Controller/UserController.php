<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
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
     * @Route("/ajoutUser", name="user_new", methods={"GET","POST"})
     * 
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function ajoutUser(Request $request,SerializerInterface $serializer, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager): Response
    {

//denyAccessUnlessGranted accepte un tableau de noms de rôle, 

//$this->denyAccessUnlessGranted(["ROLE_SUPER_ADMIN", "ROLE_ADMIN"], $item, 'Vous n\'avez pas accés a cette fonctionnalité.');
        $values = json_decode($request->getContent());
        $entityManager = $this->getDoctrine()->getManager();

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
        $entityManager->persist($user);
        $entityManager->flush();
        return new Response('Caissier ajouter', Response::HTTP_CREATED);

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
