<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use Doctrine\Persistence\ManagerRegistry;

class ProduitController extends AbstractController
{
    #[Route('/Produit/liste', name: 'produit_liste')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $data['produits'] = $em->getRepository(Produit::class)->findAll();

        return $this->render('produit/liste.html.twig', $data);
    }

    #[Route('/Produit/get/{$id}', name: 'produit_get')]
    public function getProduit($id): Response
    {
        return $this->render('produit/liste.html.twig');
    }

    #[Route('/Produit/add', name: 'produit_add')]
    public function add(ManagerRegistry $doctrine)
    {
        $p = new Produit();
        $p->setLibelle(libelle: "Clavier");
        $p->setQtStock(qtStock:0.0);

        $em = $doctrine->getManager();
        $em->persist($p);
        $em->flush();
        return $this->render('produit/liste.html.twig');
    }
}
