<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker;

class PostFixtures extends Fixture
{
    public const POST_1 = "post_1";
    public const POST_2 = "post_2";
    public const POST_3 = "post_3";
    public const POST_4 = "post_4";
    public const POST_5 = "post_5";
    public const POST_6 = "post_6";

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $post_1 = new Post();
        $post_1->setTitle($faker->text(20));
        $post_1->setStory($faker->text(100));
        $post_1->setPublishDate($faker->dateTimeBetween('-1 years', 'now'));
        $manager->persist($post_1);

        $post_2 = new Post();
        $post_2->setTitle($faker->text(20));
        $post_2->setStory($faker->text(100));
        $post_2->setPublishDate($faker->dateTimeBetween('-1 years', 'now'));
        $manager->persist($post_2);

        $post_3 = new Post();
        $post_3->setTitle($faker->text(20));
        $post_3->setStory($faker->text(100));
        $post_3->setPublishDate($faker->dateTimeBetween('-1 years', 'now'));
        $manager->persist($post_3);

        $post_4 = new Post();
        $post_4->setTitle($faker->text(20));
        $post_4->setStory($faker->text(100));
        $post_4->setPublishDate($faker->dateTimeBetween('-1 years', 'now'));
        $manager->persist($post_4);

        $post_5 = new Post();
        $post_5->setTitle($faker->text(20));
        $post_5->setStory($faker->text(100));
        $post_5->setPublishDate($faker->dateTimeBetween('-1 years', 'now'));
        $manager->persist($post_5);

        $post_6 = new Post();
        $post_6->setTitle($faker->text(20));
        $post_6->setStory($faker->text(100));
        $post_6->setPublishDate($faker->dateTimeBetween('-1 years', 'now'));
        $manager->persist($post_6);

        $manager->flush();

        $this->addReference(self::POST_1, $post_1);
        $this->addReference(self::POST_2, $post_2);
        $this->addReference(self::POST_3, $post_3);
        $this->addReference(self::POST_4, $post_4);
        $this->addReference(self::POST_5, $post_5);
        $this->addReference(self::POST_6, $post_6);
    }
}
