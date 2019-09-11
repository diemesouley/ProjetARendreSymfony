<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
     * @Route("/register/{id}", name="register", methods={"POST","GET"})
     */
    public function register(Request $request, EntityManagerInterface $entityManager, $id)
    {
            $user=$this->getDoctrine()->getRepository(User::class)->findOneBy(['id'=>$id]);
           //var_dump($user->getStatusUser());die();
            if ($user->getStatusUser()=='Activé') {
                $user->setStatusUser("Désactive");
            }else{
                $user->setStatusUser("Activé");
            }
           // var_dump($user);die();
            $entityManager->persist($user);
            $entityManager->flush();

            $data = [
                'status' => 201,
                'message' => 'Le status de l\'utilisateur a été créé'
            ];

            return new JsonResponse($data, 201);
        
        $data = [
            'status' => 500,
            'message' => 'Vous devez renseigner les clés username et password'
        ];
        return new JsonResponse($data, 500);
    }

    /**
     * @Route("/registerPart/{id}", name="registerPart", methods={"POST","GET"})
     */
    public function registerPart(Request $request, EntityManagerInterface $entityManager, $id)
    {
            $partenaire=$this->getDoctrine()->getRepository(Partenaire::class)->findOneBy(['id'=>$id]);
            $users=$partenaire->getUsers();
        //var_dump($users);die();
            if ($partenaire->getStatus()=='Activé') {
                $partenaire->setStatus("Désactivé");
            }else{
                $partenaire->setStatus("Activé");
            }
           // var_dump($user);die();
            $entityManager->persist($partenaire);
            $entityManager->flush();

            $data = [
                'status' => 201,
                'message' => 'Le status du partenaire a été modifier'
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

            /** if ($partenaire->$user->getStatusUser()=='Désactivé') {

                return new JsonResponse(['Veuillez contacter votre administrateur vous etes bloqué']);
            }*/
    
            
            $token = $JWTEncoder->encode([
                    'username' => $user->getUsername(),
                    'exp' => time() + 3600 // 1 hour expiration
                ]);
    
            return new JsonResponse(['token' => $token]);
        }
        

}
