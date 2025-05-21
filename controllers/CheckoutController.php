<?php
/**
 * Checkout Controller
 */
class CheckoutController extends BaseController {
    /**
     * Display checkout page
     * 
     * @return void
     */
    public function index() {
        // Require authentication
        if (!$this->requireAuth()) {
            return;
        }
        
        // Check if product ID is provided
        if (!isset($_GET['product_id'])) {
            flash_message('error', 'No product selected');
            redirect('/products');
            return;
        }
        
        $product_id = $_GET['product_id'];
        
        // Get product details
        $product = supabase_get('products', [
            'where' => ['id' => $product_id],
            'limit' => 1
        ]);
        
        if (!$product) {
            flash_message('error', 'Product not found');
            redirect('/products');
            return;
        }
        
        // Check if subscription or one-time purchase
        $is_subscription = isset($_GET['subscription']) && $_GET['subscription'] === '1';
        
        // Render checkout page
        $this->render('checkout/index', [
            'title' => 'Checkout',
            'product' => $product,
            'is_subscription' => $is_subscription
        ]);
    }
    
    /**
     * Process checkout
     * 
     * @return void
     */
    public function process() {
        // Require authentication
        if (!$this->requireAuth()) {
            return;
        }
        
        // Check if form submitted
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/');
            return;
        }
        
        // Get product ID
        $product_id = $_POST['product_id'] ?? null;
        
        if (!$product_id) {
            flash_message('error', 'No product selected');
            redirect('/products');
            return;
        }
        
        // Get product details
        $product = supabase_get('products', [
            'where' => ['id' => $product_id],
            'limit' => 1
        ]);
        
        if (!$product) {
            flash_message('error', 'Product not found');
            redirect('/products');
            return;
        }
        
        // Check if subscription or one-time purchase
        $is_subscription = isset($_POST['is_subscription']) && $_POST['is_subscription'] === '1';
        
        // Get user details
        $user_id = get_user_id();
        
        // Get or create Stripe customer
        // (In a real application, you would store and retrieve the customer ID from Supabase)
        $customer = stripe_create_customer($_SESSION['user_email'], null, [
            'user_id' => $user_id
        ]);
        
        if (!$customer) {
            flash_message('error', 'Failed to create customer');
            redirect('/checkout?product_id=' . $product_id);
            return;
        }
        
        if ($is_subscription) {
            // Create subscription
            // (In a real application, you would have price IDs stored in Supabase)
            $subscription = stripe_create_subscription($customer->id, $product['stripe_price_id'], [
                'product_id' => $product_id,
                'user_id' => $user_id
            ]);
            
            if (!$subscription) {
                flash_message('error', 'Failed to create subscription');
                redirect('/checkout?product_id=' . $product_id . '&subscription=1');
                return;
            }
            
            // Redirect to Stripe Checkout
            redirect($subscription->latest_invoice->payment_intent->next_action->redirect_to_url->url);
        } else {
            // Create payment intent for one-time purchase
            $amount = $product['price'] * 100; // Convert to cents
            
            $payment_intent = stripe_create_payment_intent($amount, 'usd', [
                'product_id' => $product_id,
                'user_id' => $user_id
            ]);
            
            if (!$payment_intent) {
                flash_message('error', 'Failed to create payment');
                redirect('/checkout?product_id=' . $product_id);
                return;
            }
            
            // Return client secret for Stripe Elements
            $this->json([
                'clientSecret' => $payment_intent->client_secret
            ]);
        }
    }
    
    /**
     * Handle successful payment
     * 
     * @return void
     */
    public function success() {
        // Require authentication
        if (!$this->requireAuth()) {
            return;
        }
        
        // Get payment intent ID
        $payment_intent_id = $_GET['payment_intent'] ?? null;
        
        if (!$payment_intent_id) {
            flash_message('error', 'Invalid payment');
            redirect('/');
            return;
        }
        
        // Verify payment (in a real application)
        // ...
        
        // Render success page
        $this->render('checkout/success', [
            'title' => 'Payment Successful'
        ]);
    }
    
    /**
     * Handle cancelled payment
     * 
     * @return void
     */
    public function cancel() {
        // Require authentication
        if (!$this->requireAuth()) {
            return;
        }
        
        // Render cancel page
        $this->render('checkout/cancel', [
            'title' => 'Payment Cancelled'
        ]);
    }
}
