<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LayerController extends AbstractController
{
    #[Route('/layer/{param}', name: 'app_layer')]
    public function __invoke(string $param): Response
    {
        $data = base64_decode($param);
        dump($data);

        return $this->render('layer/movie-details.html.twig', [
            'controller_name' => 'LayerController',
        ]);
    }
}
