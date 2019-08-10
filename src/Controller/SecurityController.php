<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;

/**
 * @Route("/api")
 */
class SecurityController extends AbstractController
{
    private $passwordEncoder;
                                                                                                                                                                                    
        public function __construct(UserPasswordEncoderInterface $passwordEncoder)
        {
          $this->passwordEncoder = $passwordEncoder;
        }
    /**
     * @Route("/register", name="register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
            $user = new User();
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
            $values=$request->reauest->all();
            $form->submit($values);
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

            $data = [
                'status' => 201,
                'message' => 'L\'utilisateur a été créé'
            ];

            return new JsonResponse($data, 201);
        
        $data = [
            'status' => 500,
            'message' => 'Vous devez renseigner les clés username et password'
        ];
        return new JsonResponse($data, 500);
    }
    /**
     * @Route("/login", name="login", methods={"POST"})
     * @param JWTEncoderInterface $JWTEncoder
     * @return JsonResponse
     * @throws \Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException
     */
     
    
        
    public function login(Request $request,JWTEncoderInterface $JWTEncoder)
    {
     
            $values=json_decode($request->getContent());
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
                'username' => $values->username
                
            ]);

            if (!$user) {
                return new JsonResponse(['l\'utilisateur n\'existe pas']);
            }
                $isValid = $this->passwordEncoder->isPasswordValid($user, $values->password);
                
            if (!$isValid) {
                return new JsonResponse(['Veuillez saisir un bon mot de pass']);
            }
            if ($user->getStatusUser()=='Désactivé') {

                return new JsonResponse(['Veuillez contacter votre administrateur vous etes bloqué']);
            }
    
            
            $token = $JWTEncoder->encode([
                    'username' => $user->getUsername(),
                    'exp' => time() + 3600 // 1 hour expiration
                ]);
    
            return new JsonResponse(['token' => $token]);
        }
        

}
