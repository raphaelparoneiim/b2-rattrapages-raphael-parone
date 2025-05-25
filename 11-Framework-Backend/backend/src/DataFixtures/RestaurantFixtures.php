<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable();

        $restaurantsData = [
            ['name' => 'Mongoo Champs-Elysées', 'location' => '8 Avenue des Champs-Élysées, Paris'],
            ['name' => 'Mongoo Bastille', 'location' => '12 Rue de la Bastille, Paris'],
            ['name' => 'Mongoo Gare de Lyon', 'location' => 'Place Louis-Armand, Paris'],
            ['name' => 'Mongoo La Défense', 'location' => '1 Parvis de la Défense, Courbevoie'],
            ['name' => 'Mongoo Montparnasse', 'location' => '33 Boulevard du Montparnasse, Paris'],
            ['name' => 'Mongoo Saint-Lazare', 'location' => '12 Rue Saint-Lazare, Paris'],
            ['name' => 'Mongoo Opéra', 'location' => '9 Boulevard Haussmann, Paris'],
            ['name' => 'Mongoo Gare du Nord', 'location' => '18 Rue de Dunkerque, Paris'],
            ['name' => 'Mongoo République', 'location' => '5 Place de la République, Paris'],
            ['name' => 'Mongoo Bercy', 'location' => '10 Rue de Bercy, Paris'],
        ];

        foreach ($restaurantsData as $index => $data) {
            $restaurant = new Restaurant();
            $restaurant->setName($data['name']);
            $restaurant->setLocation($data['location']);
            $restaurant->setCreatedAt($now);
            $restaurant->setUpdatedAt($now);

            $manager->persist($restaurant);
            $this->addReference('restaurant_' . $index, $restaurant);
        }

        $manager->flush();
    }
}
