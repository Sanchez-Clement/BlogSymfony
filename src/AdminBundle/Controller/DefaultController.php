<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route(
     *     path = "/admin/" ,
     *     name = "admin_index")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }

    /**
     * @Route(
     *     path = "/admin/article/add" ,
     *     name = "admin_add")
     */
    public function addAction()
    {
        return $this->render('AdminBundle:Default:add.html.twig');
    }
}
