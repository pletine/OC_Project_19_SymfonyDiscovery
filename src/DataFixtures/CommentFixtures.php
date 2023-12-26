<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use Faker;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            PostFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $nb_post = 7;

        for ($i = 0; $i < 20; $i++) {
            $comment = new Comment();
            $comment->setAuthor($faker->name);
            $comment->setComment($faker->paragraph);
            $comment->setDate($faker->dateTimeBetween('-2 years', 'now'));

            // Sélection aléatoire d'un post pour chaque commentaire
            $postReference = $this->getReference('post_' . rand(0, $nb_post));
            $comment->setPost($postReference);

            $manager->persist($comment);
        }

        $manager->flush();
    }
}
