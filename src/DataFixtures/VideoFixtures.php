<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class VideoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $category = new Category();
        for($i = 1; $i<=10; $i++){
            $tag = new Tag();
            $tag->setName($faker->word);
            $tag->setColor($faker->hexColor);

            $manager->persist($tag);

            for($j = 1; $j<=2; $j++){
                $video = new Video();
                $video->setTitle("Titre de la vidéo $i");
                $video->setLien("https://www.youtube.com/embed/e5udJTjbYzw");
                $video->addTag($tag);
                if($j==1){

                    $category->setName('Fun video');
                    $manager->persist($category);
                    $video->setCategory($category);
                }else{

                    $category->setName('News');
                    $manager->persist($category);
                    $video->setCategory($category);
                }

                $manager->persist($video);

            }

        }
        $manager->flush();
    }
}
