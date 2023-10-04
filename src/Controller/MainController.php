<?php

namespace App\Controller;

use DateTime;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
   
    return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
    ]);
       /* $token = (new Builder())
                ->withClaim('mercure',['subscribe' => [sprintf(format:"/%s",$username)] ])
                ->getToken(
                    new Sha256(),
                    new Key($this->getParameter('mercure_key_secret'))
                );
      
        $response->headers->setCookie(
            new Cookie(
                'mercureAuthorization',
                $token,
                (new \DateTime())
                ->add(\DateInterval('PT2H')),
                ' /.well-known/mercure',
                null,
                false,
                true,
                false,
                'strict'
            )
         );*/
    
    }
}
