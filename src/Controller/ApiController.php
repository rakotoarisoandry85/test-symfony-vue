<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
  /*  #[Route('/api/helloword/{name}', name: 'api_helloword')]
    public function apiHelloworld(string $name): Response
    {
        return new JsonResponse('hello ' .$name);
    }
*/
public function __construct(
    private UserRepository $userRepository,
    private SerializerInterface $serializer
  )
  {
    
  }
    #[Route('/api/searchuser/{name}', name: 'api_search_user')]
    public function apiSearchUser(string $name): Response
    {
        $user = [];
        $user = $this->userRepository->searchUser($name);
      //  $this->json([
            //  'user' => $this->serializer->serialize($user, 'json')
           // 'id' => $user-> 
    //  'user' => $this->serializer->serialize($user, 'json')
    //]
        //    ])
        //    dd($user);
        return new JsonResponse([
      'user' => $this->serializer->serialize($user, 'json')
    ]);
       // return new JsonResponse('user' . $user);
    }

}
