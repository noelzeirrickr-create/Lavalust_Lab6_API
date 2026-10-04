<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
*/

/** @var object $router **/

// =====================================================
// DEFAULT ROUTE
// =====================================================
$router->get('/', 'Welcome::index');


// =====================================================
// WEB AUTHENTICATION ROUTES
// =====================================================
$router->get('/login', 'AuthController::login');
$router->post('/login', 'AuthController::login');
$router->get('/logout', 'AuthController::logout');


// =====================================================
// WEB PRODUCT CRUD ROUTES
// =====================================================
$router->get('login/products', 'ProductController::index');

$router->get(
    'login/products/create',
    'ProductController::create'
);

$router->post(
    'login/products/store',
    'ProductController::store'
);

$router->get(
    'login/products/edit/{id}',
    'ProductController::edit'
)->where_number('id');

$router->post(
    'login/products/update/{id}',
    'ProductController::update'
)->where_number('id');

$router->get(
    'login/products/delete/{id}',
    'ProductController::delete'
)->where_number('id');


// =====================================================
// MIGRATION ROUTES
// =====================================================
$router->get(
    'create-migration/{migration_class}',
    'MigrationController::create_migration'
);

$router->get(
    'migrate',
    'MigrationController::migrate'
);

$router->get(
    'rollback',
    'MigrationController::rollback'
);

$router->get(
    'rollback-all',
    'MigrationController::rollback_all'
);

$router->get(
    'refresh',
    'MigrationController::refresh'
);

$router->get(
    'status',
    'MigrationController::status'
);


// =====================================================
// LAB 6 API AUTHENTICATION ROUTES
// =====================================================

// Login user and get token
$router->post(
    '/api/login',
    'ApiController::login'
);
$router->options('/api/login', 'ApiController::login');

// Refresh access token
$router->post(
    '/api/refresh',
    'ApiController::refresh'
);
$router->options('/api/refresh', 'ApiController::login');

// Logout API user
$router->post(
    '/api/logout',
    'ApiController::logout'
);
$router->options('/api/logout', 'ApiController::login');


// =====================================================
// LAB 6 PRODUCT API ROUTES
// =====================================================

// GET - Display all products
$router->get(
    '/api/products',
    'ApiController::products'
);
$router->options('/api/products', 'ApiController::login');

// POST - Add new product
$router->post(
    '/api/products',
    'ApiController::create_product'
);

// PUT - Update product
$router->put(
    '/api/products/{id}',
    'ApiController::update_product'
)->where_number('id');

// PATCH - Update product
$router->patch(
    '/api/products/{id}',
    'ApiController::update_product'
)->where_number('id');

// DELETE - Delete product
$router->delete(
    '/api/products/{id}',
    'ApiController::delete_product'
)->where_number('id');
$router->options(
    '/api/products/{id}',
    'ApiController::login'
)->where_number('id');