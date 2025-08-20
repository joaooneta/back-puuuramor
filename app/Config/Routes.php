<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PublicHome');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'PublicHome::index');
$routes->get('/loja', 'Loja::index');
$routes->get('/adotar', 'Adotar::index');
$routes->get('/parceiros', 'Parceiros::index');
$routes->get("/prestacao", "PrestacaoContas::index");
$routes->get('/resgates', 'Resgates::index');
$routes->get('/quero_ajudar', 'Quero_Ajudar::index');
$routes->get('/galeria', 'Galeria::index');
$routes->get('/galeria/exibir/(:num)', 'Galeria::exibir/$1');
$routes->get('/apadrinhar', 'Apadrinhar::index');
$routes->get('/apadrinhar/exibir/(:num)', 'Apadrinhar::exibir/$1');
$routes->get('/adotar', 'Adotar::index');
$routes->get('/adotar/exibir/(:num)', 'Adotar::exibir/$1');
$routes->get('/loja', 'Loja::index');
$routes->get('loja/exibir/(:num)', 'Loja::exibir/$1');
$routes->get('/resgates', 'Resgates::index');
$routes->get('/resgates/exibir/(:num)', 'Resgates::exibir/$1');
$routes->get('/politica_de_adocao', 'Politica_de_Adocao::index');

// Shield Routes
service('auth')->routes($routes);
$routes->get('login', 'LoginController::index');
$routes->get('logout', '\CodeIgniter\Shield\Controllers\LoginController::logout');

service('auth')->routes($routes, [
    'except' => ['register', 'magic-link', 'forgot', 'reset-password']
]);

// Protected Routes
$routes->group('', ['filter' => 'session'], static function ($routes) {
    //----- Galeria -----//
    $routes->get("/galeria/listar", "Galeria::list");
    $routes->get("/galeria/criar", "Galeria::create");
    $routes->post("/galeria/salvar", "Galeria::store");
    $routes->get("/galeria/editar/(:num)", "Galeria::edit/$1");
    $routes->post("/galeria/deletar/(:num)", "Galeria::delete/$1");

    //----- Apadrinhar -----//
    $routes->get("/apadrinhar/listar", "Apadrinhar::list");
    $routes->get("/apadrinhar/criar", "Apadrinhar::create");
    $routes->post("/apadrinhar/salvar", "Apadrinhar::store");
    $routes->get("/apadrinhar/editar/(:num)", "Apadrinhar::edit/$1");
    $routes->post("/apadrinhar/deletar/(:num)", "Apadrinhar::delete/$1");

    //----- Adotar -----//
    $routes->get('/adotar/listar', 'Adotar::list');
    $routes->get('/adotar/criar', 'Adotar::create');
    $routes->get('/adotar/editar/(:num)', 'Adotar::edit/$1');
    $routes->post('/adotar/salvar', 'Adotar::store');
    $routes->post('/adotar/deletar/(:num)', 'Adotar::delete/$1');

    //----- Loja -----//
    $routes->get('/loja/listar', 'Loja::listar');
    $routes->get('/loja/editar/(:num)', 'Loja::edit/$1');
    $routes->post('/loja/salvar', 'Loja::store');
    $routes->get('/loja/criar', 'Loja::create');
    $routes->post('/loja/deletar/(:num)', 'Loja::delete/$1');

    //----- Resgates -----//
    $routes->get('/resgates/criar', 'Resgates::create');
    $routes->post('/resgates/salvar', 'Resgates::store');
    $routes->get('/resgates/editar/(:num)', 'Resgates::edit/$1');
    $routes->post('/resgates/deletar/(:num)', 'Resgates::delete/$1');
    $routes->get('/resgates/listar', 'Resgates::list');

    //----- Parceiro -----//
    $routes->get("/parceiro/list", "Parceiro::listar");
    $routes->get("/parceiro/create", "Parceiro::create");
    $routes->post("/parceiro/store", "Parceiro::store");
    $routes->get("/parceiro/edit/(:num)", "Parceiro::edit/$1");
    $routes->post("/parceiro/delete/(:num)", "Parceiro::delete/$1");

    //----- Prestacao de Contas -----//
    $routes->get("/prestacao/listar", "PrestacaoContas::list");
    $routes->get("/prestacao/criar", "PrestacaoContas::create");
    $routes->post("/prestacao/salvar", "PrestacaoContas::store");
    $routes->post("/prestacao/deletar/(:num)", "PrestacaoContas::delete/$1");
});

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
