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
$routes->post('auth/token/validate', [AuthController::class, 'verify_token']);

$routes->group('admin', static function($routes) {
    
    $routes->get('dashboard', [DashboardController::class, 'index']);

    $routes->group('menus', static function($routes){
        $routes->get('', [MenusController::class, 'index']);
        $routes->post('access', [MenusController::class, 'access'],['filter' => 'authFilter']);
    });

    $routes->group('configuration', static function($routes){
        $routes->get('', [SettingsController::class, 'index']);
        $routes->get('list', [SettingsController::class, 'list'],['filter' => 'authFilter']);
        $routes->get('list/(:any)', [SettingsController::class, 'detail/$1'],['filter' => 'authFilter']);
        $routes->put('', [SettingsController::class, 'update'],['filter' => 'authFilter']);
    });

    $routes->group('usergroup', static function($routes){
        $routes->get('', [UsergroupsController::class, 'index']);
        $routes->get('list', [UsergroupsController::class, 'list'],['filter' => 'authFilter']);
        $routes->get('list/(:num)', [UsergroupsController::class, 'detail/$1'],['filter' => 'authFilter']);
        $routes->post('', [UsergroupsController::class, 'create'],['filter' => 'authFilter']);
        $routes->put('(:num)', [UsergroupsController::class, 'update/$1'],['filter' => 'authFilter']);
        $routes->delete('(:num)', [UsergroupsController::class, 'delete/$1'],['filter' => 'authFilter']);
    });

    $routes->group('user', static function($routes){
        $routes->get('', [UsersController::class, 'index']);
        $routes->get('list', [UsersController::class, 'list'],['filter' => 'authFilter']);
        $routes->get('list/(:num)', [UsersController::class, 'detail/$1'],['filter' => 'authFilter']);
        $routes->post('', [UsersController::class, 'create'],['filter' => 'authFilter']);
        $routes->put('', [UsersController::class, 'update'],['filter' => 'authFilter']);
        $routes->delete('', [UsersController::class, 'delete'],['filter' => 'authFilter']);
    });
    
});
