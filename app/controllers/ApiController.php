<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->library('api');
        $this->call->model('ProductModel');
        $this->call->model('UsersModel');
    }

    // =====================================================
    // LOGIN
    // =====================================================
    public function login()
    {
        $this->api->require_method('POST');

        $input = $this->api->body();

        $username = trim($input['username'] ?? '');
        $password = $input['password'] ?? '';

        if ($username === '' || $password === '') {
            $this->api->respond_error(
                'Username and password are required.',
                400
            );
        }

        // Get user from users table
        $user = $this->UsersModel->get_user_by_username($username);

        if (!$user) {
            $this->api->respond_error(
                'Invalid username or password.',
                401
            );
        }

        // Support hashed password
        if (password_get_info($user['password'])['algo']) {

            $validPassword = password_verify(
                $password,
                $user['password']
            );

        } else {

            // Compatibility with old plain-text password
            $validPassword = ($password === $user['password']);
        }

        if (!$validPassword) {
            $this->api->respond_error(
                'Invalid username or password.',
                401
            );
        }

        // Generate JWT access + refresh token
        $tokens = $this->api->issue_tokens([
            'id'     => $user['id'],
            'role'   => $user['role'] ?? 'user',
            'scopes' => [
                'products:read',
                'products:write'
            ]
        ]);

        $this->api->respond([
            'message' => 'Login successful',
            'user' => [
                'id'       => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role'] ?? 'user'
            ],
            'tokens' => $tokens
        ]);
    }


    // =====================================================
    // GET PRODUCTS
    // =====================================================
    public function products()
    {
        $this->api->require_method('GET');

        // User must be logged in
        $this->api->require_jwt();

        $products = $this->ProductModel->get_all();

        $this->api->respond($products);
    }


    // =====================================================
    // CREATE PRODUCT
    // =====================================================
    public function create_product()
    {
        $this->api->require_method('POST');

        // Require token
        $this->api->require_jwt();

        $input = $this->api->body();

        if (
            empty($input['product_name']) ||
            !isset($input['price']) ||
            !isset($input['quantity'])
        ) {
            $this->api->respond_error(
                'Product name, price and quantity are required.',
                400
            );
        }

        $data = [
            'product_name' => $input['product_name'],
            'description'  => $input['description'] ?? '',
            'price'        => $input['price'],
            'quantity'     => $input['quantity']
        ];

        $this->ProductModel->insert($data);

        $this->api->respond([
            'message' => 'Product created successfully.'
        ], 201);
    }


    // =====================================================
    // UPDATE PRODUCT
    // =====================================================
    public function update_product($id)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if (!in_array($method, ['PUT', 'PATCH'])) {
            $this->api->respond_error(
                'Method not allowed.',
                405
            );
        }

        // Require token
        $this->api->require_jwt();

        $product = $this->ProductModel->get_by_id($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $input = $this->api->body();

        $data = [
            'product_name' => $input['product_name'],
            'description'  => $input['description'] ?? '',
            'price'        => $input['price'],
            'quantity'     => $input['quantity']
        ];

        $this->ProductModel->update($id, $data);

        $this->api->respond([
            'message' => 'Product updated successfully.'
        ]);
    }


    // =====================================================
    // DELETE PRODUCT
    // =====================================================
    public function delete_product($id)
    {
        $this->api->require_method('DELETE');

        // Require token
        $this->api->require_jwt();

        $product = $this->ProductModel->get_by_id($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $this->ProductModel->delete($id);

        $this->api->respond([
            'message' => 'Product deleted successfully.'
        ]);
    }
}