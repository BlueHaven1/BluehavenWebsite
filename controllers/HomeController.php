<?php
/**
 * Home Controller
 */
class HomeController extends BaseController {
    /**
     * Display home page
     * 
     * @return void
     */
    public function index() {
        // Get featured products
        $featured_products = $this->getFeaturedProducts();
        
        // Render home page
        $this->render('home', [
            'title' => 'Welcome to BluehavenFiveM Store',
            'featured_products' => $featured_products
        ]);
    }
    
    /**
     * Get featured products
     * 
     * @return array Featured products
     */
    private function getFeaturedProducts() {
        // Get featured products from Supabase
        $products = supabase_get('products', [
            'where' => ['featured' => true],
            'limit' => 6
        ]);
        
        return $products ?: [];
    }
}
