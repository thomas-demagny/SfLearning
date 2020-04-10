<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route ("/", name="home")
     * @return Response
     */
    public function home(){

    return $this->render('blog/home.html.twig');
}

    /**
     * @Route ("/blog/12", name="blog_show")
     * @return Response
     */
    public function show(){
        return $this->render('blog/show.html.twig');
}
}
