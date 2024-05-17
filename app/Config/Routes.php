<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'AuthController::index'); // Display login page
 $routes->post('/register', 'AuthController::register'); // post registration
 $routes->get('/registerPage', 'AuthController::registerPage'); // get registration
 $routes->post('/login', 'AuthController::login'); // Handle login
 $routes->get('/athlete-dashboard', 'AuthController::athleteDashboard'); // Display athlete dashboard
 $routes->get('/coach-dashboard', 'AuthController::coachDashboard'); // Display coach dashboard
 $routes->get('/admin/view-coaches', 'AdminController::viewCoaches'); // Display all coaches for admin


$routes->get('update-profile', 'AuthController::updateProfile');
$routes->post('save-profile', 'AuthController::saveProfile');

$routes->get('coach/download-pdf/(:num)', 'AuthController::downloadPDF/$1');

$routes->get('/coach/view-athlete-portfolio/(:num)', 'AuthController::viewAthletePortfolio/$1');
$routes->get('/coach/search-athlete', 'AuthController::searchAthlete');
$routes->get('/coach/view-athlete-portfolio/(:num)', 'AuthController::viewAthletePortfolio/$1');

$routes->get('admin', 'AdminController::index');
// app/Config/Routes.php
$routes->get('/admin', 'AdminController::index'); // Admin dashboard
$routes->get('/admin/approveUser/(:num)', 'AdminController::approveUser/$1');
$routes->get('/admin/declineUser/(:num)', 'AdminController::declineUser/$1');
$routes->get('/admin/suspendUser/(:num)', 'AdminController::suspendUser/$1');


$routes->get('download-portfolio/(:num)', 'AuthController::downloadPortfolio/$1');

$routes->get('forgot-password', 'AuthController::forgotPassword');
$routes->post('forgot-password', 'AuthController::sendPasswordResetLink');

$routes->get('reset-password/(:segment)', 'AuthController::resetPassword/$1');
$routes->post('reset-password/(:segment)', 'AuthController::resetPassword/$1');

$routes->get('/packages', 'WebsiteController::packages');




