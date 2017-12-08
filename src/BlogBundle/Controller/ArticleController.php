<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BlogBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class ArticleController extends Controller
{
    /**
     * @Route("/" , name="blog_index")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em -> getRepository(Article::class);
        $query = $repository->createQueryBuilder('a')
            ->orderBy('a.date',"DESC")
            ->setFirstResult(0)
            ->setMaxResults(3);
        $articles = $query->getQuery()->getResult();
        dump($articles);
        
        return $this->render('BlogBundle:Article:index.html.twig',compact('articles'));
    }


    /**
     * @Route(
     *      path = "/article/" ,
     *      defaults={"id" = 1},)
     * @Route(
     *      path = "/article/{id}" ,
     *      name="blog_view" ,
     *      defaults={"id" = 1},
     *      requirements={"id": "\d+"})
     */
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article= $em -> getRepository(Article::class)->find($id);

        return $this->render('BlogBundle:Article:view.html.twig',compact('article'));

    }
}
