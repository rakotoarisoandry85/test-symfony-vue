<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class AuthController extends AbstractController
{
  public function __construct(
    private UserRepository $userRepository,
    private SerializerInterface $serializer
  )
  {
    
  }

  #[Route('/register', name: 'user.register')]
  public function register(Request $request) : JsonResponse
  {

    $jsonData = json_decode($request->getContent());
    dd($jsonData);
    $user = $this->userRepository->create($jsonData);

    return new JsonResponse([
      'user' => $this->serializer->serialize($user, 'json')
    ]);
  }

  #[Route('/profile', name: 'user.profile')]
  public function profile() : JsonResponse
  {
    $currentUser = $this->getUser();
    $user = $this->serializer->serialize($currentUser, 'json');
    return new JsonResponse([
      $user
    ], 200);
  }

  /*  #[Route('/login', name: 'user.login')]
    public function login() : JsonResponse
    {
        $currentUser = $this->getUser();
        $user = $this->serializer->serialize($currentUser, 'json');
        return new JsonResponse([
            $user
        ], 200);
    }*/

    #[Route('/connexion', name:'user.login')]
    public function login(AuthenticationUtils $authenticationUtils): JsonResponse
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

       /* return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);*/

        $user = $this->serializer->serialize($lastUsername, 'json');
        dd($user);
        return new JsonResponse([
            $user,
            'error' => $error
        ], 200);
    }


}