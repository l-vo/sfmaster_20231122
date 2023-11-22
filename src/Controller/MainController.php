<?php

namespace App\Controller;

use App\Api\OmdbApiClient;
use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route(path: '/', name: 'app_main_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route(path: '/data', name: 'data', methods: ['GET'])]
    public function data(EntityManagerInterface $entityManager): Response
    {
        for ($i=1; $i<20; $i++) {
            $movie = (new Movie())
                ->setDescription('Un requin qui...')
                ->setTitle('Dent de la mer '.$i)
                ->setAuthor('Spielberg')
                ->setDuration(180)
            ;

            $entityManager->persist($movie);
        }

        $entityManager->flush();

        return new Response('OK movie loaded');
    }

    #[Route(path: '/contact', name: 'app_main_contact', methods: ['GET'])]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig');
    }

    #[Route(path: '/movie/login', name: 'app_main_login', methods: ['GET'])]
    public function login(): Response
    {
        return $this->render('main/login.html.twig');
    }

    #[Route(path: '/register', name: 'app_main_register', methods: ['GET'])]
    public function register(): Response
    {
        return $this->render('main/register.html.twig');
    }

    #[Route(path: '/password-recovering', name: 'app_main_password_recovering', methods: ['GET'])]
    public function passwordRecovering(): Response
    {
        return $this->render('main/password_recovering.html.twig');
    }

    #[Route(path: '/trailer-player', name: 'app_main_trailer_player', methods: ['GET'])]
    public function trailerPlayer(): Response
    {
        return $this->render('main/trailer_player.html.twig');
    }
}
