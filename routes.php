<?php

declare(strict_types=1);

$router->get("/user", "ShoppingCart\User\UserController::getAll");
$router->post("/user", "ShoppingCart\User\UserController::insert");
$router->group("/user", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\User\UserController::get");
    $router->post("/{id:number}", "ShoppingCart\User\UserController::update");
    $router->delete("/{id:number}", "ShoppingCart\User\UserController::delete");
});

$router->get("/product", "ShoppingCart\Product\ProductController::getAll");
$router->post("/product", "ShoppingCart\Product\ProductController::insert");
$router->group("/product", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\Product\ProductController::get");
    $router->post("/{id:number}", "ShoppingCart\Product\ProductController::update");
    $router->delete("/{id:number}", "ShoppingCart\Product\ProductController::delete");
});

$router->get("/product-meta", "ShoppingCart\ProductMeta\ProductMetaController::getAll");
$router->post("/product-meta", "ShoppingCart\ProductMeta\ProductMetaController::insert");
$router->group("/product-meta", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\ProductMeta\ProductMetaController::get");
    $router->post("/{id:number}", "ShoppingCart\ProductMeta\ProductMetaController::update");
    $router->delete("/{id:number}", "ShoppingCart\ProductMeta\ProductMetaController::delete");
});

$router->get("/product-review", "ShoppingCart\ProductReview\ProductReviewController::getAll");
$router->post("/product-review", "ShoppingCart\ProductReview\ProductReviewController::insert");
$router->group("/product-review", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\ProductReview\ProductReviewController::get");
    $router->post("/{id:number}", "ShoppingCart\ProductReview\ProductReviewController::update");
    $router->delete("/{id:number}", "ShoppingCart\ProductReview\ProductReviewController::delete");
});

$router->get("/category", "ShoppingCart\Category\CategoryController::getAll");
$router->post("/category", "ShoppingCart\Category\CategoryController::insert");
$router->group("/category", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\Category\CategoryController::get");
    $router->post("/{id:number}", "ShoppingCart\Category\CategoryController::update");
    $router->delete("/{id:number}", "ShoppingCart\Category\CategoryController::delete");
});

$router->get("/product-category", "ShoppingCart\ProductCategory\ProductCategoryController::getAll");
$router->post("/product-category", "ShoppingCart\ProductCategory\ProductCategoryController::insert");
$router->group("/product-category", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\ProductCategory\ProductCategoryController::get");
    $router->post("/{id:number}", "ShoppingCart\ProductCategory\ProductCategoryController::update");
    $router->delete("/{id:number}", "ShoppingCart\ProductCategory\ProductCategoryController::delete");
});

$router->get("/cart", "ShoppingCart\Cart\CartController::getAll");
$router->post("/cart", "ShoppingCart\Cart\CartController::insert");
$router->group("/cart", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\Cart\CartController::get");
    $router->post("/{id:number}", "ShoppingCart\Cart\CartController::update");
    $router->delete("/{id:number}", "ShoppingCart\Cart\CartController::delete");
});

$router->get("/cart-item", "ShoppingCart\CartItem\CartItemController::getAll");
$router->post("/cart-item", "ShoppingCart\CartItem\CartItemController::insert");
$router->group("/cart-item", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\CartItem\CartItemController::get");
    $router->post("/{id:number}", "ShoppingCart\CartItem\CartItemController::update");
    $router->delete("/{id:number}", "ShoppingCart\CartItem\CartItemController::delete");
});

$router->get("/order", "ShoppingCart\Order\OrderController::getAll");
$router->post("/order", "ShoppingCart\Order\OrderController::insert");
$router->group("/order", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\Order\OrderController::get");
    $router->post("/{id:number}", "ShoppingCart\Order\OrderController::update");
    $router->delete("/{id:number}", "ShoppingCart\Order\OrderController::delete");
});

$router->get("/order-item", "ShoppingCart\OrderItem\OrderItemController::getAll");
$router->post("/order-item", "ShoppingCart\OrderItem\OrderItemController::insert");
$router->group("/order-item", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\OrderItem\OrderItemController::get");
    $router->post("/{id:number}", "ShoppingCart\OrderItem\OrderItemController::update");
    $router->delete("/{id:number}", "ShoppingCart\OrderItem\OrderItemController::delete");
});

$router->get("/transaction", "ShoppingCart\Transaction\TransactionController::getAll");
$router->post("/transaction", "ShoppingCart\Transaction\TransactionController::insert");
$router->group("/transaction", function ($router) {
    $router->get("/{id:number}", "ShoppingCart\Transaction\TransactionController::get");
    $router->post("/{id:number}", "ShoppingCart\Transaction\TransactionController::update");
    $router->delete("/{id:number}", "ShoppingCart\Transaction\TransactionController::delete");
});

