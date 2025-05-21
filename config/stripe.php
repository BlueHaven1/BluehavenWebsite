<?php
/**
 * Stripe Configuration
 */
return [
    'publishable_key' => env('STRIPE_PUBLISHABLE_KEY', ''),
    'secret_key' => env('STRIPE_SECRET_KEY', ''),
    'webhook_secret' => env('STRIPE_WEBHOOK_SECRET', ''),
    'api_version' => env('STRIPE_API_VERSION', '2025-04-30.basil'), // Latest Stripe API version
];
