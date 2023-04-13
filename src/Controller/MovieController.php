<?php

namespace App\Controller;

use App\Form\MovieType;
use App\Movie\NotFoundException;
use App\Movie\Service;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    #[Route('/movies', name: 'movies')]
    public function index(Service $movieService): Response
    {
        $movies = $movieService->getAll();

        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MoviesController',
            'movies' => $movies,
        ]);
    }

    #[Route('/movie/details/{param}', 'movie-details')]
    public function details(Service $movieService, string $param): JsonResponse
    {
        try {
            $movie = $movieService->getById('8f6f4ab4-f15b-11ed-8f58-d92738a592ec');
        } catch (NotFoundException $nfe) {
            return $this->json($nfe->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return $this->json('', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->json($movie, Response::HTTP_OK);
    }

    #[Route('/movie/add', name: 'add-movie')]
    public function add(Request $request, Service $movieService): Response
    {
        $form = $this->createForm(MovieType::class)->handleRequest($request);

        if ($form->isSubmitted()) {
            if (!$form->isValid()) {
                $message = 'nope, validation failed';
                $error   = true;
            }

            $data  = $form->getData();
dd($data, $error);
        }

        return $this->render('movie/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/movie/edit/{param}', name: 'edit-movie')]
    public function edit(Request $request, Service $movieService, string $param): Response
    {
        $movieId       = base64_decode($param);
        $movieNotFound = false;

        try {
            $movie = $movieService->getById($movieId);
            $form  = $this->createForm(MovieType::class, $movie);
        }
        catch (NotFoundException $nfe) {
            $this->logger->error($nfe->getMessage());
            $movieNotFound = true;
        }

        return $this->render('movie/edit.html.twig', [
            'form'          => $form->createView(),
            'movieNotFound' => $movieNotFound,
        ]);
    }
}
