<?php

use App\Controllers\Admin\AuthController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\MenusController;
use App\Controllers\Admin\SettingsController;
use App\Controllers\Admin\UsergroupsController;
use App\Controllers\Admin\UsersController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('api/healthy', 'Healthy::index');

$routes->get('auth/login', [AuthController::class, 'index']);
$routes->post('auth/login', [AuthController::class, 'login']);

$routes->group('admin', static function($routes) {
    $routes->get('dashboard', [DashboardController::class, 'index']);
    $routes->get('usergroups', [UsergroupsController::class,'index']);
    $routes->get('users', [UsersController::class, 'index']);
    $routes->get('menus', [MenusController::class, 'index']);
    $routes->get('settings', [SettingsController::class, 'index']);
});
