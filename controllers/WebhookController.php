<?php
/**
 * Webhook Controller
 */
class WebhookController extends BaseController {
    /**
     * Handle Stripe webhook
     * 
     * @return void
     */
    public function handle() {
        // Get payload
        $payload = file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
        
        // Verify webhook signature
        $event = stripe_verify_webhook($payload, $sig_header);
        
        if (!$event) {
            http_response_code(400);
            exit;
        }
        
        // Handle event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $this->handlePaymentIntentSucceeded($event->data->object);
                break;
                
            case 'payment_intent.payment_failed':
                $this->handlePaymentIntentFailed($event->data->object);
                break;
                
            case 'customer.subscription.created':
                $this->handleSubscriptionCreated($event->data->object);
                break;
                
            case 'customer.subscription.updated':
                $this->handleSubscriptionUpdated($event->data->object);
                break;
                
            case 'customer.subscription.deleted':
                $this->handleSubscriptionDeleted($event->data->object);
                break;
                
            case 'invoice.payment_succeeded':
                $this->handleInvoicePaymentSucceeded($event->data->object);
                break;
                
            case 'invoice.payment_failed':
                $this->handleInvoicePaymentFailed($event->data->object);
                break;
                
            default:
                // Unexpected event type
                http_response_code(400);
                exit;
        }
        
        http_response_code(200);
    }
    
    /**
     * Handle payment intent succeeded
     * 
     * @param \Stripe\PaymentIntent $payment_intent Payment intent
     * @return void
     */
    private function handlePaymentIntentSucceeded($payment_intent) {
        // Get metadata
        $product_id = $payment_intent->metadata['product_id'] ?? null;
        $user_id = $payment_intent->metadata['user_id'] ?? null;
        
        if (!$product_id || !$user_id) {
            return;
        }
        
        // Create order in Supabase
        // (In a real application, you would implement this)
        // ...
    }
    
    /**
     * Handle payment intent failed
     * 
     * @param \Stripe\PaymentIntent $payment_intent Payment intent
     * @return void
     */
    private function handlePaymentIntentFailed($payment_intent) {
        // Log failure
        error_log('Payment failed: ' . $payment_intent->id);
    }
    
    /**
     * Handle subscription created
     * 
     * @param \Stripe\Subscription $subscription Subscription
     * @return void
     */
    private function handleSubscriptionCreated($subscription) {
        // Get metadata
        $product_id = $subscription->metadata['product_id'] ?? null;
        $user_id = $subscription->metadata['user_id'] ?? null;
        
        if (!$product_id || !$user_id) {
            return;
        }
        
        // Create subscription in Supabase
        // (In a real application, you would implement this)
        // ...
    }
    
    /**
     * Handle subscription updated
     * 
     * @param \Stripe\Subscription $subscription Subscription
     * @return void
     */
    private function handleSubscriptionUpdated($subscription) {
        // Update subscription in Supabase
        // (In a real application, you would implement this)
        // ...
    }
    
    /**
     * Handle subscription deleted
     * 
     * @param \Stripe\Subscription $subscription Subscription
     * @return void
     */
    private function handleSubscriptionDeleted($subscription) {
        // Delete subscription in Supabase
        // (In a real application, you would implement this)
        // ...
    }
    
    /**
     * Handle invoice payment succeeded
     * 
     * @param \Stripe\Invoice $invoice Invoice
     * @return void
     */
    private function handleInvoicePaymentSucceeded($invoice) {
        // Process successful invoice payment
        // (In a real application, you would implement this)
        // ...
    }
    
    /**
     * Handle invoice payment failed
     * 
     * @param \Stripe\Invoice $invoice Invoice
     * @return void
     */
    private function handleInvoicePaymentFailed($invoice) {
        // Process failed invoice payment
        // (In a real application, you would implement this)
        // ...
    }
}
