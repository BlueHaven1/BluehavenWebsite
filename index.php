<?php
/**
 * BluehavenFiveM Store
 * Main entry point
 */

// Initialize application
require_once 'includes/init.php';

// Define routes
$route = $_GET['route'] ?? 'home';

// Handle routes
switch ($route) {
    case 'home':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

    case 'products':
        require_once 'controllers/ProductController.php';
        $controller = new ProductController();

        $action = $_GET['action'] ?? 'index';
        $category = $_GET['category'] ?? null;

        if ($action === 'view' && isset($_GET['id'])) {
            $controller->view($_GET['id']);
        } elseif ($category) {
            $controller->category($category);
        } else {
            $controller->index();
        }
        break;

    case 'auth':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();

        $action = $_GET['action'] ?? 'login';

        if ($action === 'login') {
            $controller->login();
        } elseif ($action === 'register') {
            $controller->register();
        } elseif ($action === 'logout') {
            $controller->logout();
        }
        break;

    case 'checkout':
        require_once 'controllers/CheckoutController.php';
        $controller = new CheckoutController();

        $action = $_GET['action'] ?? 'index';

        if ($action === 'process') {
            $controller->process();
        } elseif ($action === 'success') {
            $controller->success();
        } elseif ($action === 'cancel') {
            $controller->cancel();
        } else {
            $controller->index();
        }
        break;

    case 'dashboard':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();

        $action = $_GET['action'] ?? 'index';

        if ($action === 'orders') {
            $controller->orders();
        } elseif ($action === 'subscriptions') {
            $controller->subscriptions();
        } elseif ($action === 'downloads') {
            $controller->downloads();
        } else {
            $controller->index();
        }
        break;

    case 'admin':
        require_once 'controllers/AdminController.php';
        $controller = new AdminController();

        $action = $_GET['action'] ?? 'index';

        if ($action === 'products') {
            $controller->products();
        } elseif ($action === 'orders') {
            $controller->orders();
        } elseif ($action === 'customers') {
            $controller->customers();
        } else {
            $controller->index();
        }
        break;

    case 'webhook':
        require_once 'controllers/WebhookController.php';
        $controller = new WebhookController();
        $controller->handle();
        break;

    default:
        // 404 page
        header("HTTP/1.0 404 Not Found");
        require_once 'views/pages/404.php';
        break;
}