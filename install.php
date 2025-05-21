<?php
/**
 * BluehavenFiveM Store Installation Script
 */

// Check PHP version
if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    die('PHP 8.0.0 or higher is required. Your PHP version: ' . PHP_VERSION);
}

// Check if Composer is installed
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    die('Composer dependencies not found. Please run "composer install" first.');
}

// Check if .env file exists
if (!file_exists(__DIR__ . '/.env')) {
    // Copy .env.example to .env
    if (!copy(__DIR__ . '/.env.example', __DIR__ . '/.env')) {
        die('Failed to create .env file. Please copy .env.example to .env manually.');
    }
    
    echo "Created .env file from .env.example. Please update it with your configuration.\n";
} else {
    echo ".env file already exists.\n";
}

// Check directory permissions
$directories = [
    'assets',
    'uploads',
    'cache',
    'logs'
];

foreach ($directories as $directory) {
    $dir = __DIR__ . '/' . $directory;
    
    // Create directory if it doesn't exist
    if (!is_dir($dir)) {
        if (!mkdir($dir, 0755, true)) {
            echo "Warning: Failed to create directory: {$directory}\n";
        } else {
            echo "Created directory: {$directory}\n";
        }
    }
    
    // Check if directory is writable
    if (!is_writable($dir)) {
        echo "Warning: Directory not writable: {$directory}\n";
    }
}

// Display success message
echo "\nInstallation completed!\n";
echo "Please follow these steps to complete the setup:\n";
echo "1. Update your .env file with your Supabase and Stripe credentials\n";
echo "2. Set up your Supabase database using the schema in database/schema.sql\n";
echo "3. Configure your web server to point to this directory\n";
echo "4. Visit your website to verify the installation\n";
