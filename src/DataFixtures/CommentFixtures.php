<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use Faker;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $comments = Array();
        $nb_comments = 25;
        $nb_posts = $this->getReference(PostFixtures::NB_POSTS);

        $posts_array = (array) $this->getReference(PostFixtures::POSTS);
        
        for($i = 0; $i < $nb_comments; $i++) {
            $comments[$i] = new Comment();
            $comments[$i]->setAuthor($faker->name());
            $comments[$i]->setComment($faker->text(200));
            $comments[$i]->setDate($faker->dateTimeBetween('-1 years', 'now'));

            $comments[$i]->setPost($posts_array[$faker->numberBetween(0, $nb_posts)]);

            $manager->persist($comments[$i]);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PostFixtures::class,
        ];
    }
}
