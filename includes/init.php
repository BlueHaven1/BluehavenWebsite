<?php
/**
 * Application Initialization
 */

// Start session
session_start();

// Define base path
define('BASE_PATH', dirname(__DIR__));

// Load environment variables
require_once BASE_PATH . '/includes/env.php';
load_env();

// Load configuration files
$app_config = require BASE_PATH . '/config/app.php';
$stripe_config = require BASE_PATH . '/config/stripe.php';
$supabase_config = require BASE_PATH . '/config/supabase.php';

// Set error reporting based on debug mode
if ($app_config['debug']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// Autoload function for classes
spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // Check in models directory
    $model_path = BASE_PATH . '/models/' . $class . '.php';
    if (file_exists($model_path)) {
        require_once $model_path;
        return;
    }

    // Check in controllers directory
    $controller_path = BASE_PATH . '/controllers/' . $class . '.php';
    if (file_exists($controller_path)) {
        require_once $controller_path;
        return;
    }

    // Check in includes directory
    $include_path = BASE_PATH . '/includes/' . $class . '.php';
    if (file_exists($include_path)) {
        require_once $include_path;
        return;
    }
});

// Include helper functions
require_once BASE_PATH . '/includes/helpers.php';

// Initialize Supabase client (will be implemented)
require_once BASE_PATH . '/includes/supabase.php';

// Initialize Stripe (will be implemented)
require_once BASE_PATH . '/includes/stripe.php';
