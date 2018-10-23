<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Styles;
use App\Entity\Lesports;


class PublicController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        // get Doctrine Manager for all entities
        $entityManager = $this->getDoctrine()->getManager();

        // get all sections in db for menu
        $style = $entityManager->getRepository(Styles::class)->findAll();

        // get all articles from db ORDER BY idarticles DESC
        $sport = $entityManager->getRepository(Lesports::class)->findBy([],["idlesports"=>"DESC"]);

        // return the Twig's view with 2 arguments
        return $this->render('public/index.html.twig', [
            'styles' => $style,
            'lesports' => $sport,
        ]);
    }
    /**
     *
     * Matches /articles/{id},
     * {id} is a requirement digit: "\d+" for more security
     * to view an articles's detail
     *
     * @Route("/lesports/{id}", name="detail_lesports", requirements={"id"="\d+"})
     */
    public function oneArticle($id)
    {
        // get Doctrine Manager for all entities
        $entityManager = $this->getDoctrine()->getManager();

        // get all sections in db for menu
        $styles = $entityManager->getRepository(Styles::class)->findAll();

        // get one articles by its "id" from db
        $sports = $entityManager->getRepository(Lesports::class)->find($id);

        // return the Twig's view with 2 arguments
        return $this->render('public/one_article.html.twig', [
            'styles' => $styles,
            'lesports' => $sports,
        ]);
    }
    /**
     *
     * Matches /section/{id},
     * {id} is a requirement digit: "\d+" for more security
     * to view an section's detail
     *
     * @Route("/styles/{id}", name="detail_styles", requirements={"id"="\d+"})
     */
    public function oneSection($id){
        // get Doctrine Manager for all entities
        $entityManager = $this->getDoctrine()->getManager();

        // get all sections in db for menu
        $styles = $entityManager->getRepository(Styles::class)->findAll();

        // get one section by its "id" from db
        $section = $entityManager->getRepository(Styles::class)->find($id);
        // get all articles by one section, it's the easy way, you can use ORDER BY into sections.php entity, views annotation before private $articlesarticles;
        $sport = $section->getLesportslesports();

        // return the Twig's view with 2 arguments
        return $this->render('public/one_section.html.twig', [
            'styles' => $styles,
            'section' => $section,
            'sports' => $sport,
        ]);
    }
}

