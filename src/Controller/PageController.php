<?php

namespace App\Controller;

use App\Services\RMProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PageController extends AbstractController
{
    public function index():Response{
        return new Response('<html><h1>Site index</h1></html>');
    }

    public function displayCharacter(int $id, RMProvider $RMProvider):Response
    {
        $character = $RMProvider->getCharacter($id);
        return $this->render('pages/character.html.twig', ['character' => $character]);
    }
}