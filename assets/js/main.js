/**
 * BluehavenFiveM Store - Main JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Initialize Bootstrap popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
    
    // Auto-dismiss alerts
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert-dismissible');
        alerts.forEach(function(alert) {
            var bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
    
    // Stripe payment form handling
    const stripeForm = document.getElementById('payment-form');
    if (stripeForm) {
        initializeStripeForm();
    }
});

/**
 * Initialize Stripe payment form
 */
function initializeStripeForm() {
    // Get Stripe publishable key
    const stripe_key = document.getElementById('stripe-key').value;
    const stripe = Stripe(stripe_key);
    
    // Create elements instance
    const elements = stripe.elements();
    
    // Create card element
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');
    
    // Handle form submission
    const form = document.getElementById('payment-form');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Disable the submit button to prevent repeated clicks
        cardButton.disabled = true;
        cardButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';
        
        // Confirm card payment
        const { error, paymentIntent } = await stripe.confirmCardPayment(clientSecret, {
            payment_method: {
                card: cardElement,
                billing_details: {
                    name: document.getElementById('cardholder-name').value
                }
            }
        });
        
        if (error) {
            // Show error message
            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
            
            // Re-enable the submit button
            cardButton.disabled = false;
            cardButton.innerHTML = 'Pay Now';
        } else {
            // Payment succeeded, redirect to success page
            window.location.href = '/checkout/success?payment_intent=' + paymentIntent.id;
        }
    });
}

/**
 * Handle subscription checkout
 */
function handleSubscriptionCheckout(priceId) {
    const form = document.getElementById('subscription-form');
    const priceInput = document.getElementById('price-id');
    
    priceInput.value = priceId;
    form.submit();
}

/**
 * Toggle product description
 */
function toggleDescription(id) {
    const shortDesc = document.getElementById('short-desc-' + id);
    const fullDesc = document.getElementById('full-desc-' + id);
    const toggleBtn = document.getElementById('toggle-btn-' + id);
    
    if (shortDesc.style.display === 'none') {
        shortDesc.style.display = 'block';
        fullDesc.style.display = 'none';
        toggleBtn.innerHTML = 'Read More';
    } else {
        shortDesc.style.display = 'none';
        fullDesc.style.display = 'block';
        toggleBtn.innerHTML = 'Read Less';
    }
}
