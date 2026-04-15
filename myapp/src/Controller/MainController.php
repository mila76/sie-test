<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class MainController extends AbstractController
{
  #[Route('/', name: 'index')]
  #[IsGranted('ROLE_USER')]
  public function index(Request $request): Response
  {
    return $this->render('base.html.twig');
  }
}
