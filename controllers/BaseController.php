<?php
/**
 * Base Controller
 */
class BaseController {
    /**
     * Render a view
     * 
     * @param string $view View name
     * @param array $data Data to pass to the view
     * @return void
     */
    protected function render($view, $data = []) {
        // Extract data to make variables available in the view
        extract($data);
        
        // Include header
        require_once BASE_PATH . '/views/partials/header.php';
        
        // Include the view
        require_once BASE_PATH . '/views/pages/' . $view . '.php';
        
        // Include footer
        require_once BASE_PATH . '/views/partials/footer.php';
    }
    
    /**
     * Render a view without header and footer
     * 
     * @param string $view View name
     * @param array $data Data to pass to the view
     * @return void
     */
    protected function renderPartial($view, $data = []) {
        // Extract data to make variables available in the view
        extract($data);
        
        // Include the view
        require_once BASE_PATH . '/views/pages/' . $view . '.php';
    }
    
    /**
     * Render JSON response
     * 
     * @param mixed $data Data to encode as JSON
     * @param int $status HTTP status code
     * @return void
     */
    protected function json($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    /**
     * Check if user is authenticated
     * 
     * @param bool $redirect Whether to redirect to login page
     * @return bool Authentication status
     */
    protected function requireAuth($redirect = true) {
        if (!is_logged_in()) {
            if ($redirect) {
                flash_message('error', 'Please login to access this page');
                redirect('/auth/login');
            }
            return false;
        }
        return true;
    }
    
    /**
     * Check if user is admin
     * 
     * @param bool $redirect Whether to redirect to home page
     * @return bool Admin status
     */
    protected function requireAdmin($redirect = true) {
        if (!$this->requireAuth($redirect)) {
            return false;
        }
        
        // Check if user is admin (implement your logic here)
        $is_admin = false; // Replace with actual check
        
        if (!$is_admin && $redirect) {
            flash_message('error', 'You do not have permission to access this page');
            redirect('/');
        }
        
        return $is_admin;
    }
}
