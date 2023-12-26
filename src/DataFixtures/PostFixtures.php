<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker;
use App\Entity\Comment;

class PostFixtures extends Fixture
{
    public const POSTS = "posts_array";
    public const NB_POSTS = 2;

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $posts = Array();

        for($i = 0; $i < self::NB_POSTS; $i++) {
            $posts[$i] = new Post();
            $posts[$i]->setTitle($faker->text(20));
            $posts[$i]->setStory($faker->text(100));
            $posts[$i]->setPublishDate($faker->dateTimeBetween('-1 years', 'now'));

            $manager->persist($posts[$i]);
        }
        $this->addReference(self::POSTS, (object) $posts);
        $manager->flush();
    }
}
