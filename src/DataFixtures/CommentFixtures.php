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

        $comment_1 = new Comment();
        $comment_1->setAuthor($faker->name());
        $comment_1->setComment($faker->text(100));
        $comment_1->setDate($faker->dateTimeBetween('-1 years', 'now'));
        $comment_1->setPost($this->getReference(PostFixtures::POST_1));
        $manager->persist($comment_1);

        $comment_2 = new Comment();
        $comment_2->setAuthor($faker->name());
        $comment_2->setComment($faker->text(100));
        $comment_2->setDate($faker->dateTimeBetween('-1 years', 'now'));
        $comment_2->setPost($this->getReference(PostFixtures::POST_1));
        $manager->persist($comment_2);

        $comment_3 = new Comment();
        $comment_3->setAuthor($faker->name());
        $comment_3->setComment($faker->text(100));
        $comment_3->setDate($faker->dateTimeBetween('-1 years', 'now'));
        $comment_3->setPost($this->getReference(PostFixtures::POST_2));
        $manager->persist($comment_3);

        $comment_4 = new Comment();
        $comment_4->setAuthor($faker->name());
        $comment_4->setComment($faker->text(100));
        $comment_4->setDate($faker->dateTimeBetween('-1 years', 'now'));
        $comment_4->setPost($this->getReference(PostFixtures::POST_3));
        $manager->persist($comment_4);

        $comment_5 = new Comment();
        $comment_5->setAuthor($faker->name());
        $comment_5->setComment($faker->text(100));
        $comment_5->setDate($faker->dateTimeBetween('-1 years', 'now'));
        $comment_5->setPost($this->getReference(PostFixtures::POST_4));
        $manager->persist($comment_5);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PostFixtures::class,
        ];
    }
}
