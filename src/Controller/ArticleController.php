<?php

namespace App\Controller;

use App\Entity\Lesports;
use App\Form\ArticlesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/admin/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="articles_index", methods="GET")
     */

    public function index(): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Lesports::class)
            ->findAll();
        return $this->render('articles/index.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/new", name="articles_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $article = new Lesports();
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('articles/new.html.twig', [
            'articles' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idlesports}", name="articles_show", methods="GET")
     */
    public function show(Lesports $article): Response
    {
        return $this->render('articles/show.html.twig', ['articles' => $article]);
    }

    /**
     * @Route("/{idlesports}/edit", name="articles_edit", methods="GET|POST")
     */
    public function edit(Request $request, Lesports $article): Response
    {
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('articles_edit', ['idlesports' => $article->getIdlesports()]);
        }

        return $this->render('articles/edit.html.twig', [
            'articles' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idlesports}", name="articles_delete", methods="DELETE")
     */
    public function delete(Request $request, Lesports $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getIdlesports(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('articles_index');
    }


}
