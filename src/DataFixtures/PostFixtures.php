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

        $nb_post = 8;

        for ($i = 0; $i < $nb_post; $i++) {
            $post = new Post();
            $post->setTitle($faker->sentence(10, true));
            $post->setStory($faker->text(1000));
            $post->setPublishDate($faker->dateTimeBetween('-2 years', 'now'));
            $manager->persist($post);

            $this->addReference('post_' . $i, $post);
        }

        $manager->flush();
    }
}
