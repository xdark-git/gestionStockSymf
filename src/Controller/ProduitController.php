<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;

class ProduitController extends AbstractController
{
    #[Route('/Produit/liste', name: 'produit_liste')]
    public function index(): Response
    {
        return $this->render('produit/liste.html.twig');
    }

    // #[Route('/Produit/get/{$id}', name: 'produit_get')]
    // public function getProduit($id): Response
    // {
    //     return $this->render('produit/liste.html.twig');
    // }

    #[Route('/Produit/add', name: 'produit_liste')]
    public function add()
    {
        $p = new Produit();
        $p->setLibelle(libelle: "Scanner");
        $p->setQtStock(qtStock:0.0);

        $em = $this->getManager();
        $em->persist($p);
        $em->flush();
        return $this->render('produit/liste.html.twig');
    }
}
