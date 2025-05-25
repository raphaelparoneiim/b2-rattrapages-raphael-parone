<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(RestaurantRepository $restaurantRepo, EmployeeRepository $employeeRepo): Response
    {
        $restaurants = $restaurantRepo->findAll();

        $restaurantStats = [];

        foreach ($restaurants as $restaurant) {
            $activeEmployees = $employeeRepo->count(['restaurant' => $restaurant, 'active' => true]);
            $inactiveEmployees = $employeeRepo->count(['restaurant' => $restaurant, 'active' => false]);
            $totalEmployees = $activeEmployees + $inactiveEmployees;

            $restaurantStats[] = [
                'id' => $restaurant->getId(),
                'name' => $restaurant->getName(),
                'activeEmployees' => $activeEmployees,
                'inactiveEmployees' => $inactiveEmployees,
                'totalEmployees' => $totalEmployees,
            ];
        }

        $activeEmployeeCount = $employeeRepo->count(['active' => true]);
        $inactiveEmployeeCount = $employeeRepo->count(['active' => false]);
        $restaurantCount = count($restaurants);

        return $this->render('dashboard/base.html.twig', [
            'restaurant_count' => $restaurantCount,
            'active_employee_count' => $activeEmployeeCount,
            'inactive_employee_count' => $inactiveEmployeeCount,
            'restaurant_stats' => $restaurantStats,
        ]);
    }
}