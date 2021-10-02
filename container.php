<?php

declare(strict_types=1);

// Core

$container->add("Pdo", PDO::class)
    ->addArgument("mysql:dbname={$_ENV["DB_NAME"]};host={$_ENV["DB_HOST"]}")
    ->addArgument($_ENV["DB_USER"])
    ->addArgument($_ENV["DB_PASS"])
    ->addArgument([]);
$container->add("Database", ShoppingCart\Database\PdoDatabase::class)
    ->addArgument("Pdo");

// User

$container->add("UserRepository", ShoppingCart\User\UserRepository::class)
    ->addArgument("Database");
$container->add("UserService", ShoppingCart\User\UserService::class)
    ->addArgument("UserRepository");
$container->add(ShoppingCart\User\UserController::class)
    ->addArgument("UserService");

// Product

$container->add("ProductRepository", ShoppingCart\Product\ProductRepository::class)
    ->addArgument("Database");
$container->add("ProductService", ShoppingCart\Product\ProductService::class)
    ->addArgument("ProductRepository");
$container->add(ShoppingCart\Product\ProductController::class)
    ->addArgument("ProductService");

// ProductMeta

$container->add("ProductMetaRepository", ShoppingCart\ProductMeta\ProductMetaRepository::class)
    ->addArgument("Database");
$container->add("ProductMetaService", ShoppingCart\ProductMeta\ProductMetaService::class)
    ->addArgument("ProductMetaRepository");
$container->add(ShoppingCart\ProductMeta\ProductMetaController::class)
    ->addArgument("ProductMetaService");

// ProductReview

$container->add("ProductReviewRepository", ShoppingCart\ProductReview\ProductReviewRepository::class)
    ->addArgument("Database");
$container->add("ProductReviewService", ShoppingCart\ProductReview\ProductReviewService::class)
    ->addArgument("ProductReviewRepository");
$container->add(ShoppingCart\ProductReview\ProductReviewController::class)
    ->addArgument("ProductReviewService");

// Category

$container->add("CategoryRepository", ShoppingCart\Category\CategoryRepository::class)
    ->addArgument("Database");
$container->add("CategoryService", ShoppingCart\Category\CategoryService::class)
    ->addArgument("CategoryRepository");
$container->add(ShoppingCart\Category\CategoryController::class)
    ->addArgument("CategoryService");

// ProductCategory

$container->add("ProductCategoryRepository", ShoppingCart\ProductCategory\ProductCategoryRepository::class)
    ->addArgument("Database");
$container->add("ProductCategoryService", ShoppingCart\ProductCategory\ProductCategoryService::class)
    ->addArgument("ProductCategoryRepository");
$container->add(ShoppingCart\ProductCategory\ProductCategoryController::class)
    ->addArgument("ProductCategoryService");

// Cart

$container->add("CartRepository", ShoppingCart\Cart\CartRepository::class)
    ->addArgument("Database");
$container->add("CartService", ShoppingCart\Cart\CartService::class)
    ->addArgument("CartRepository");
$container->add(ShoppingCart\Cart\CartController::class)
    ->addArgument("CartService");

// CartItem

$container->add("CartItemRepository", ShoppingCart\CartItem\CartItemRepository::class)
    ->addArgument("Database");
$container->add("CartItemService", ShoppingCart\CartItem\CartItemService::class)
    ->addArgument("CartItemRepository");
$container->add(ShoppingCart\CartItem\CartItemController::class)
    ->addArgument("CartItemService");

// Order

$container->add("OrderRepository", ShoppingCart\Order\OrderRepository::class)
    ->addArgument("Database");
$container->add("OrderService", ShoppingCart\Order\OrderService::class)
    ->addArgument("OrderRepository");
$container->add(ShoppingCart\Order\OrderController::class)
    ->addArgument("OrderService");

// OrderItem

$container->add("OrderItemRepository", ShoppingCart\OrderItem\OrderItemRepository::class)
    ->addArgument("Database");
$container->add("OrderItemService", ShoppingCart\OrderItem\OrderItemService::class)
    ->addArgument("OrderItemRepository");
$container->add(ShoppingCart\OrderItem\OrderItemController::class)
    ->addArgument("OrderItemService");

// Transaction

$container->add("TransactionRepository", ShoppingCart\Transaction\TransactionRepository::class)
    ->addArgument("Database");
$container->add("TransactionService", ShoppingCart\Transaction\TransactionService::class)
    ->addArgument("TransactionRepository");
$container->add(ShoppingCart\Transaction\TransactionController::class)
    ->addArgument("TransactionService");

