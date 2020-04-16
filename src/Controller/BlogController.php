<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     * @param ArticleRepository $repository
     * @return Response
     */
    public function index(ArticleRepository $repository)//injection de dépendance
    {

        $articles = $repository->findAll();
        return $this->render('blog/index.html.twig',
            [
                'controller_name' => 'BlogController',
                'articles'=>$articles
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
     * @Route("/blog/new", name="blog_create")
     * @return Response
     */
    public function create(){

        $article = new Article();

        $form = $this->createFormBuilder($article)
            ->add('title', TextType::class,[
                'attr' => [
                    'placeholder' => "Titre de l'article",
                    "class" => 'form-control'
                ]
            ])
            ->add('content',TextareaType::class, [
                'attr' => [
                    "placeholder" => "Contenu de l'article",
                    "class" => 'form-control'
                ]
            ])
            ->add('image' ,TextType::class, [
                'attr' => [
                    "placeholder" => "Image de l'article",
                    "class" => 'form-control'
                ]
        ])
            ->add('save', SubmitType::class)
            ->getForm();

        return $this->render('blog/create.html.twig', [
            'formArticle' => $form->createView()
        ]);
    }


    /**
     * @Route ("/blog/{id}", name="blog_show")
     * @param Article $article
     * @return Response
     */
    public function show(Article $article){
        /*remplace =>(ArticleRepository $repository, $id)  $repository = $this->getDoctrine()->getRepository(Article::class);
         et $article = $repository->find($id); GRACE AU PARAMCONVERTER*/

        return $this->render('blog/show.html.twig',[
            'article'=>$article
        ]);
    }

}
