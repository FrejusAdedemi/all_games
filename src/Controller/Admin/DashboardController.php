<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
       return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('All Games');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkTo(EditorCrudController::class, 'Editor', 'fa-solid fa-pen-to-square');
        yield MenuItem::linkTo(GameCrudController::class, 'Game', 'fa-solid fa-gamepad');
        yield MenuItem::linkTo(GenreCrudController::class, 'Genre', 'fa-solid fa-list');
        yield MenuItem::linkTo(UserCrudController::class, 'User', 'fa-solid fa-user');
        yield MenuItem::linkTo(ReviewCrudController::class, 'Review', 'fa-solid fa-star');

    }
}
