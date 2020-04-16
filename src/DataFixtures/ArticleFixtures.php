<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use Exception;

/**
 * Class ArticleFixtures
 * @package App\DataFixtures
 */
class ArticleFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <=15 ; $i++){
            $article = new Article;
            $article->setTitle("Trick n°$i")
                    ->setContent("<p>Contenu de l'article n°$i</p>")
                    ->setImage("http://placehold.it/250x175")
                    ->setCreatedAt(new \DateTime()); /*c'est un namespace */
            $manager->persist($article); /*permet de préparer à faire persister l'objet passé dans le temps */
        }

        $manager->flush(); /*obligatoire pour balancer la requête SQL */
    }
}
