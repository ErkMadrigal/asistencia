<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}


/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Login::index',['filter' => 'noauth']);
$routes->get('logout', 'Login::logout',['filter' => 'noauth']);


$routes->get('dash', 'Dashboard::index',['filter' => 'auth']);


$routes->get('estudiantes', 'Estudiantes::index', ['filter' => 'auth']);
$routes->get('GetAllEstudents', 'Estudiantes::GetAllEstudents', ['filter' => 'auth']);
$routes->get('getEstudent/(:num)', 'Estudiantes::getEstudent/$1', ['filter' => 'auth']);
$routes->post('setEstudiante', 'Estudiantes::setEstudiante', ['filter' => 'auth']);
$routes->post('updateEstudiante/(:num)', 'Estudiantes::updateEstudiante/$1', ['filter' => 'auth']);
$routes->post('deleteEstudiantes/(:num)', 'Estudiantes::deleteEstudiantes/$1', ['filter' => 'auth']);
$routes->get('getContacts/(:num)', 'Estudiantes::getContacts/$1', ['filter' => 'auth']);
$routes->get('getContact/(:num)', 'Estudiantes::getContact/$1', ['filter' => 'auth']);
$routes->post('active_Desactive_Phone/(:num)', 'Estudiantes::active_Desactive_Phone/$1', ['filter' => 'auth']);
$routes->post('setContacts', 'Estudiantes::setContacts', ['filter' => 'auth']);
$routes->post('updateContacts/(:num)', 'Estudiantes::updateContacts/$1', ['filter' => 'auth']);



$routes->get('docentes', 'Docentes::index', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
