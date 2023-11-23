<?php

namespace App\Controller;

use App\Api\ApiConsumer;
use App\Entity\Movie;
use App\Event\MoviePageViewedEvent;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

#[Route(path: '/movie')]
class MovieController extends AbstractController
{
    #[Route(path: '/by-genre', name: 'app_movie_by_genre', methods: ['GET'])]
    public function byGenre(): Response
    {
        return $this->render('movie/by_genre.html.twig');
    }

    #[Route(path: '/fake-cart', name: 'app_user_cart', methods: ['GET'])]
    public function cart(): Response
    {
        return $this->render('movie/by_genre.html.twig');
    }

    #[Route(path: '/details/{id}', name: 'app_movie_details', methods: ['GET'])]
    public function details(Movie $movie, EventDispatcherInterface $eventDispatcher): Response
    {
        $eventDispatcher->dispatch(new MoviePageViewedEvent($movie));

        return $this->render('movie/details.html.twig', ['movie' => $movie]);
    }

    #[Route(path: '/latest', name: 'app_movie_latest', methods: ['GET'])]
    public function latest(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findLastMovies();

        return $this->render('movie/latest.html.twig', [
            'movie_list' => $movies,
        ]);
    }

    #[Route(path: '/player', name: 'app_movie_player', methods: ['GET'])]
    public function player(): Response
    {
        return $this->render('movie/player.html.twig');
    }

    #[Route(path: '/top-rated', name: 'app_movie_top_rated', methods: ['GET'])]
    public function topRated(): Response
    {
        return $this->render('movie/top_rated.html.twig');
    }

    #[Route(path: '/preferred', name: 'app_movie_preferred', methods: ['GET'])]
    public function preferredMovies(ApiConsumer $apiConsumer): Response
    {
        $ids = ['tt0076759', 'tt0109040', 'tt1375666', 'tt0097576', 'tt0499549'];

        $movies = [];
        foreach ($ids as $id) {
            $movie = $apiConsumer->getMovieById($id);
            if ($movie !== null) {
                $movies[] = $movie;
            }
        }

        return $this->render('movie/preferred.html.twig', ['movies' => $movies]);
    }
}
