<?php
/**
 * Stripe Integration
 */

require_once BASE_PATH . '/vendor/autoload.php';

// Initialize Stripe
function get_stripe_client() {
    global $stripe_config;
    
    \Stripe\Stripe::setApiKey($stripe_config['secret_key']);
    \Stripe\Stripe::setApiVersion($stripe_config['api_version']);
    
    return new \Stripe\StripeClient($stripe_config['secret_key']);
}

/**
 * Create a payment intent
 * 
 * @param float $amount Amount in cents
 * @param string $currency Currency code
 * @param array $metadata Additional metadata
 * @return \Stripe\PaymentIntent|false Payment intent or false on failure
 */
function stripe_create_payment_intent($amount, $currency = 'usd', $metadata = []) {
    $stripe = get_stripe_client();
    
    try {
        return $stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => $currency,
            'metadata' => $metadata,
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        error_log('Stripe payment intent error: ' . $e->getMessage());
        return false;
    }
}

/**
 * Create a customer
 * 
 * @param string $email Customer email
 * @param string $name Customer name
 * @param array $metadata Additional metadata
 * @return \Stripe\Customer|false Customer or false on failure
 */
function stripe_create_customer($email, $name = null, $metadata = []) {
    $stripe = get_stripe_client();
    
    try {
        $params = [
            'email' => $email,
            'metadata' => $metadata
        ];
        
        if ($name) {
            $params['name'] = $name;
        }
        
        return $stripe->customers->create($params);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        error_log('Stripe customer creation error: ' . $e->getMessage());
        return false;
    }
}

/**
 * Create a subscription
 * 
 * @param string $customer_id Customer ID
 * @param string $price_id Price ID
 * @param array $metadata Additional metadata
 * @return \Stripe\Subscription|false Subscription or false on failure
 */
function stripe_create_subscription($customer_id, $price_id, $metadata = []) {
    $stripe = get_stripe_client();
    
    try {
        return $stripe->subscriptions->create([
            'customer' => $customer_id,
            'items' => [
                ['price' => $price_id],
            ],
            'metadata' => $metadata,
            'payment_behavior' => 'default_incomplete',
            'expand' => ['latest_invoice.payment_intent'],
        ]);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        error_log('Stripe subscription creation error: ' . $e->getMessage());
        return false;
    }
}

/**
 * Cancel a subscription
 * 
 * @param string $subscription_id Subscription ID
 * @return \Stripe\Subscription|false Subscription or false on failure
 */
function stripe_cancel_subscription($subscription_id) {
    $stripe = get_stripe_client();
    
    try {
        return $stripe->subscriptions->cancel($subscription_id);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        error_log('Stripe subscription cancellation error: ' . $e->getMessage());
        return false;
    }
}

/**
 * Verify Stripe webhook signature
 * 
 * @param string $payload Request body
 * @param string $sig_header Stripe signature header
 * @return \Stripe\Event|false Event or false on failure
 */
function stripe_verify_webhook($payload, $sig_header) {
    global $stripe_config;
    
    try {
        return \Stripe\Webhook::constructEvent(
            $payload,
            $sig_header,
            $stripe_config['webhook_secret']
        );
    } catch (\UnexpectedValueException $e) {
        error_log('Invalid payload: ' . $e->getMessage());
        return false;
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        error_log('Invalid signature: ' . $e->getMessage());
        return false;
    }
}
