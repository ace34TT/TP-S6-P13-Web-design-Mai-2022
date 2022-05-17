<?php

namespace Config;

use App\Models\NewModel;
use App\Libraries\GroceryCrud;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
// $routes->get('/', 'Home::index');
$routes->add('/', function () {
    $newModel = new NewModel();
    $data["news"] = $newModel->orderby("created_at", "desc")->findAll();
    return view("frontoffice/index", $data);
});
$routes->add('/news/(:any)/(:any)', function ($id, $title) {
    $newModel = new NewModel();
    $data["new"] = $newModel->find($id);
    return view("frontoffice/new", $data);
}, ["as" => "new.details"]);

$routes->group('admin', function ($routes) {
    $routes->add('login-form', function () {
        // echo  password_hash('1234', PASSWORD_DEFAULT);
        return view("backoffice/index");
    }, ['as' => 'admin.login']);

    $routes->post('login-process', "AdminController::login", ['as' => 'admin.login.process']);

    $routes->add('dashboard', function () {
        return view("backoffice/homepage");
    }, ['as' => 'admin.dashboard']);

    $routes->group('news', function ($routes) {
        $routes->add('all', function () {
            $newModel = new NewModel();
            $data["news"] = $newModel->findAll();

            return view("backoffice/news/all", $data);
        }, ['as' => 'admin.news.all']);
        $routes->add('insert-form-get', function () {
            return view("backoffice/news/insert-form");
        }, ['as' => 'admin.news.insert.get']);

        $routes->add('insert-form-post', "NewController::insert", ['as' => 'admin.news.insert.post']);
    });
});

function _exampleOutput($output = null)
{
    return view('example', (array)$output);
}

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
