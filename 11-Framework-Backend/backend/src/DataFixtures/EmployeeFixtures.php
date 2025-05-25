<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EmployeeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable();

        $employeesData = [
            ['name' => 'Alice Dupont', 'email' => 'alice.dupont@example.com', 'active' => true, 'restaurant' => 0],
            ['name' => 'Bob Martin', 'email' => 'bob.martin@example.com', 'active' => false, 'restaurant' => 1],
            ['name' => 'Claire Bernard', 'email' => 'claire.bernard@example.com', 'active' => true, 'restaurant' => 2],
            ['name' => 'David Moreau', 'email' => 'david.moreau@example.com', 'active' => true, 'restaurant' => 3],
            ['name' => 'Emma Laurent', 'email' => 'emma.laurent@example.com', 'active' => false, 'restaurant' => 4],
            ['name' => 'François Petit', 'email' => 'francois.petit@example.com', 'active' => true, 'restaurant' => 5],
            ['name' => 'Gabrielle Roux', 'email' => 'gabrielle.roux@example.com', 'active' => true, 'restaurant' => 6],
            ['name' => 'Henri Fabre', 'email' => 'henri.fabre@example.com', 'active' => false, 'restaurant' => 7],
            ['name' => 'Isabelle Leroy', 'email' => 'isabelle.leroy@example.com', 'active' => true, 'restaurant' => 0],
            ['name' => 'Jacques Fontaine', 'email' => 'jacques.fontaine@example.com', 'active' => true, 'restaurant' => 1],
            ['name' => 'Karine Simon', 'email' => 'karine.simon@example.com', 'active' => false, 'restaurant' => 2],
            ['name' => 'Ludovic Garcia', 'email' => 'ludovic.garcia@example.com', 'active' => true, 'restaurant' => 3],
            ['name' => 'Marie Noël', 'email' => 'marie.noel@example.com', 'active' => true, 'restaurant' => 4],
            ['name' => 'Nicolas Gauthier', 'email' => 'nicolas.gauthier@example.com', 'active' => true, 'restaurant' => 5],
            ['name' => 'Océane Richard', 'email' => 'oceane.richard@example.com', 'active' => false, 'restaurant' => 6],
            ['name' => 'Paul Girard', 'email' => 'paul.girard@example.com', 'active' => true, 'restaurant' => 7],
        ];

        foreach ($employeesData as $data) {
            $employee = new Employee();
            $employee->setName($data['name']);
            $employee->setEmail($data['email']);
            $employee->setActive($data['active']);

            $restaurant = $this->getReference('restaurant_' . $data['restaurant'], Restaurant::class);
            $employee->setRestaurant($restaurant);

            $employee->setCreatedAt($now);
            $employee->setUpdatedAt($now);

            $manager->persist($employee);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            RestaurantFixtures::class,
        ];
    }
}
