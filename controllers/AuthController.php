<?php
/**
 * Authentication Controller
 */
class AuthController extends BaseController {
    /**
     * Display login page
     * 
     * @return void
     */
    public function login() {
        // Check if already logged in
        if (is_logged_in()) {
            redirect('/dashboard');
        }
        
        // Check if form submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Validate input
            if (empty($email) || empty($password)) {
                flash_message('error', 'Please enter both email and password');
                $this->render('auth/login', [
                    'title' => 'Login',
                    'email' => $email
                ]);
                return;
            }
            
            // Attempt login
            $user = supabase_login($email, $password);
            
            if ($user) {
                // Redirect to dashboard
                redirect('/dashboard');
            } else {
                flash_message('error', 'Invalid email or password');
                $this->render('auth/login', [
                    'title' => 'Login',
                    'email' => $email
                ]);
                return;
            }
        }
        
        // Display login form
        $this->render('auth/login', [
            'title' => 'Login'
        ]);
    }
    
    /**
     * Display registration page
     * 
     * @return void
     */
    public function register() {
        // Check if already logged in
        if (is_logged_in()) {
            redirect('/dashboard');
        }
        
        // Check if form submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $password_confirm = $_POST['password_confirm'] ?? '';
            
            // Validate input
            if (empty($name) || empty($email) || empty($password) || empty($password_confirm)) {
                flash_message('error', 'Please fill in all fields');
                $this->render('auth/register', [
                    'title' => 'Register',
                    'name' => $name,
                    'email' => $email
                ]);
                return;
            }
            
            if ($password !== $password_confirm) {
                flash_message('error', 'Passwords do not match');
                $this->render('auth/register', [
                    'title' => 'Register',
                    'name' => $name,
                    'email' => $email
                ]);
                return;
            }
            
            // Register user
            $user = supabase_register($email, $password, [
                'name' => $name
            ]);
            
            if ($user) {
                // Create Stripe customer
                $customer = stripe_create_customer($email, $name, [
                    'user_id' => $user['id']
                ]);
                
                if ($customer) {
                    // Store Stripe customer ID in Supabase
                    // (This would be implemented in a real application)
                }
                
                flash_message('success', 'Registration successful! Please check your email to confirm your account.');
                redirect('/auth/login');
            } else {
                flash_message('error', 'Registration failed. Please try again.');
                $this->render('auth/register', [
                    'title' => 'Register',
                    'name' => $name,
                    'email' => $email
                ]);
                return;
            }
        }
        
        // Display registration form
        $this->render('auth/register', [
            'title' => 'Register'
        ]);
    }
    
    /**
     * Logout user
     * 
     * @return void
     */
    public function logout() {
        supabase_logout();
        flash_message('success', 'You have been logged out');
        redirect('/');
    }
}
