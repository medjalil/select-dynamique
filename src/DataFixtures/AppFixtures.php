<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $category = new Category();
            $category->setName($i . '. ' . $faker->country);
            $manager->persist($category);
            for ($j = 0; $j < 50; $j++) {
                $product = new Product();
                $product->setName($i . '. ' . $faker->name);
                $product->setCategory($category);
                $manager->persist($product);
            }
        }
        $manager->flush();
    }
}
