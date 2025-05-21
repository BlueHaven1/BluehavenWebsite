<?php
/**
 * Supabase Integration
 */

use PHPSupabase\Service;

// Initialize Supabase client
function get_supabase_client() {
    global $supabase_config;
    
    static $supabase = null;
    
    if ($supabase === null) {
        $supabase = new Service([
            'supabase_url' => $supabase_config['url'],
            'supabase_key' => $supabase_config['key']
        ]);
    }
    
    return $supabase;
}

/**
 * Authenticate user with Supabase
 * 
 * @param string $email User email
 * @param string $password User password
 * @return array|false User data or false on failure
 */
function supabase_login($email, $password) {
    $supabase = get_supabase_client();
    
    try {
        $response = $supabase->auth()->signIn([
            'email' => $email,
            'password' => $password
        ]);
        
        if (isset($response['access_token'])) {
            // Store user session
            $_SESSION['user_id'] = $response['user']['id'];
            $_SESSION['user_email'] = $response['user']['email'];
            $_SESSION['access_token'] = $response['access_token'];
            $_SESSION['refresh_token'] = $response['refresh_token'];
            
            return $response['user'];
        }
    } catch (Exception $e) {
        error_log('Supabase login error: ' . $e->getMessage());
    }
    
    return false;
}

/**
 * Register user with Supabase
 * 
 * @param string $email User email
 * @param string $password User password
 * @param array $metadata Additional user metadata
 * @return array|false User data or false on failure
 */
function supabase_register($email, $password, $metadata = []) {
    $supabase = get_supabase_client();
    
    try {
        $response = $supabase->auth()->signUp([
            'email' => $email,
            'password' => $password,
            'data' => $metadata
        ]);
        
        if (isset($response['id'])) {
            return $response;
        }
    } catch (Exception $e) {
        error_log('Supabase registration error: ' . $e->getMessage());
    }
    
    return false;
}

/**
 * Logout user from Supabase
 * 
 * @return bool Success status
 */
function supabase_logout() {
    $supabase = get_supabase_client();
    
    try {
        $supabase->auth()->signOut();
        
        // Clear session
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['access_token']);
        unset($_SESSION['refresh_token']);
        
        return true;
    } catch (Exception $e) {
        error_log('Supabase logout error: ' . $e->getMessage());
    }
    
    return false;
}

/**
 * Get data from Supabase table
 * 
 * @param string $table Table name
 * @param array $params Query parameters
 * @return array|false Data or false on failure
 */
function supabase_get($table, $params = []) {
    $supabase = get_supabase_client();
    
    try {
        $query = $supabase->from($table);
        
        // Apply filters
        if (isset($params['select'])) {
            $query->select($params['select']);
        }
        
        if (isset($params['where'])) {
            foreach ($params['where'] as $column => $value) {
                $query->eq($column, $value);
            }
        }
        
        if (isset($params['order'])) {
            $query->order($params['order']['column'], $params['order']['direction'] ?? 'asc');
        }
        
        if (isset($params['limit'])) {
            $query->limit($params['limit']);
        }
        
        $response = $query->get();
        return $response;
    } catch (Exception $e) {
        error_log('Supabase get error: ' . $e->getMessage());
    }
    
    return false;
}
