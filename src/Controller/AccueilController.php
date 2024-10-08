<?php

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{

    /**
     * @param \App\Repository\VisiteRepository  
     */
    private $repository = null;
    public function __construct(VisiteRepository $repository)
    {
        $this->repository = $repository;
    }
    #[Route('/', name: 'accueil')]
    public function index() : Response
    {
        $visites = $this->repository->findLastVisites();
        return $this->render("pages/accueil.html.twig", ['visites' => $visites]);
    }
}