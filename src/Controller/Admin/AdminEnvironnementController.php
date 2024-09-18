<?php

namespace App\Controller\Admin;

use App\Repository\EnvironnementRepository;
use App\Entity\Environnement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminEnvironnementController extends AbstractController 
{
    /**
     * Summary of repository
     * @var EnvironnementRepository
     */
    private $repository;

    /**
     * Summary of __construct
     * @param App\Repository\EnvironnementRepository $repository
     */
    public function __construct(EnvironnementRepository $repository)
    {
        $this->repository = $repository;
    }
    #[Route('/admin/environnements', name: 'admin.environnements')]
    public function index(Request $request): Response   
    {
        $environnements = $this->repository->findAll();
        return $this->render('admin/admin.environnements.html.twig', ['environnements' => $environnements]);
    }
    #[Route('/admin/environnements/suppr/{id}', name: 'admin.environnement.suppr')]
    public function suppr(int $id): Response   
    {
        $environnement = $this->repository->find($id);
        $this->repository->remove($environnement);
        return $this->redirectToRoute('admin.environnements');
    }
    #[Route('/admin/environnements/ajout', name: 'admin.environnement.ajout')]
    public function ajout(Request $request) : Response 
    {
        $nom = $request->get("nom");
        $env = new Environnement();
        $env->setNom($nom);
        $this->repository->add($env);
        return $this->redirectToRoute("admin.environnements");
    }
}