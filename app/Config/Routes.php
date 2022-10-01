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
$routes->get('/', 'User::index',['filter' => 'noauth']);
$routes->get('ingresar', 'User::index',['filter' => 'noauth']);
$routes->get('lang/(:any)', 'Language::index',['filter' => 'auth']);
$routes->get('logout', 'User::logout',['filter' => 'auth']);
$routes->get('dash', 'Dashboard::index',['filter' => 'auth']);
$routes->get('Confirmar/(:any)', 'ConfirmaCuenta::Confirmar',['filter' => 'noauth']);
$routes->get('forgotPass', 'User::olvide_contrasena',['filter' => 'noauth']);
$routes->post('recoveryPass','User::recuperarContrasena',['filter' => 'noauth']);
$routes->get('empresa', 'Administrador::InfoEmpresa',['filter' => 'auth']);
$routes->get('editEmpresa', 'Administrador::EditarEmpresa',['filter' => 'auth']);
$routes->post('EditInfoEmpresa', 'Administrador::SaveEmpresa',['filter' => 'auth']);
$routes->get('usuarios', 'Administrador::GetUsuario',['filter' => 'auth']);
$routes->get('AddUser', 'Administrador::AgregarUsuario',['filter' => 'auth']);
$routes->get('detailUser', 'Administrador::DetalleUsuario',['filter' => 'auth']);
$routes->get('multicatalogo', 'PortaCatalogoMulti::GetMulti',['filter' => 'auth']);
$routes->get('editMulti', 'PortaCatalogoMulti::EditarMulticatalogo',['filter' => 'auth']);
$routes->post('EditInfoMulti', 'PortaCatalogoMulti::SaveMulti',['filter' => 'auth']);
$routes->get('detailMulti', 'PortaCatalogoMulti::DetalleMulticatalogo',['filter' => 'auth']);
$routes->post('SaveUser', 'Administrador::CrearUsuario',['filter' => 'auth']);
$routes->get('editUser', 'Administrador::EditarUsuario',['filter' => 'auth']);
$routes->post('EditInfoUser', 'Administrador::EditarUsuarioById',['filter' => 'auth']);
$routes->post('EditUserPermiso', 'Administrador::EditarPermiso',['filter' => 'auth']);
$routes->get('armas', 'Armas::GetArmas',['filter' => 'auth']);
$routes->get('detailArmas', 'Armas::DetalleArmas',['filter' => 'auth']);
$routes->get('editArmas', 'Armas::EditarArma',['filter' => 'auth']);
$routes->post('EditInfoArma', 'Armas::SaveArma',['filter' => 'auth']);
$routes->get('AddArmas', 'Armas::AgreArma',['filter' => 'auth']);
$routes->post('GuardarArma', 'Armas::AgregarArma',['filter' => 'auth']);
$routes->get('AddMulti', 'PortaCatalogoMulti::AgregarMulti',['filter' => 'auth']);
$routes->post('GuardarMulti', 'PortaCatalogoMulti::AgregarMulticatalogo',['filter' => 'auth']);
$routes->get('catDocumentos', 'Documentos::GetDocumentos',['filter' => 'auth']);
$routes->get('detailCatDoc', 'Documentos::DetalleDocumentos',['filter' => 'auth']);
$routes->get('editCatDoc', 'Documentos::EditarDocumento',['filter' => 'auth']);
$routes->post('EditCatDoc', 'Documentos::SaveDocumento',['filter' => 'auth']);
$routes->get('AddCatDoc', 'Documentos::AgregarDocumento',['filter' => 'auth']);
$routes->post('GuardarCatDocumento', 'Documentos::AgregarDoc',['filter' => 'auth']);

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
