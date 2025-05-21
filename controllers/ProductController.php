<?php
/**
 * Product Controller
 */
class ProductController extends BaseController {
    /**
     * Display all products
     * 
     * @return void
     */
    public function index() {
        // Get all products
        $products = supabase_get('products');
        
        // Render products page
        $this->render('products/index', [
            'title' => 'All Products',
            'products' => $products ?: []
        ]);
    }
    
    /**
     * Display products by category
     * 
     * @param string $category Category name
     * @return void
     */
    public function category($category) {
        // Validate category
        $valid_categories = ['vehicle-liveries', 'scripts', 'websites', 'frameworks'];
        
        if (!in_array($category, $valid_categories)) {
            header("HTTP/1.0 404 Not Found");
            $this->render('404', [
                'title' => 'Page Not Found'
            ]);
            return;
        }
        
        // Get category title
        $category_titles = [
            'vehicle-liveries' => 'Vehicle Liveries',
            'scripts' => 'Scripts',
            'websites' => 'Websites',
            'frameworks' => 'Frameworks'
        ];
        
        // Get products by category
        $products = supabase_get('products', [
            'where' => ['category' => $category]
        ]);
        
        // Render category page
        $this->render('products/category', [
            'title' => $category_titles[$category],
            'category' => $category,
            'category_title' => $category_titles[$category],
            'products' => $products ?: []
        ]);
    }
    
    /**
     * Display product details
     * 
     * @param int $id Product ID
     * @return void
     */
    public function view($id) {
        // Get product by ID
        $product = supabase_get('products', [
            'where' => ['id' => $id],
            'limit' => 1
        ]);
        
        if (!$product) {
            header("HTTP/1.0 404 Not Found");
            $this->render('404', [
                'title' => 'Product Not Found'
            ]);
            return;
        }
        
        // Get related products
        $related_products = supabase_get('products', [
            'where' => ['category' => $product['category']],
            'limit' => 4
        ]);
        
        // Filter out current product from related products
        if ($related_products) {
            $related_products = array_filter($related_products, function($item) use ($id) {
                return $item['id'] != $id;
            });
        }
        
        // Render product page
        $this->render('products/view', [
            'title' => $product['name'],
            'product' => $product,
            'related_products' => $related_products ?: []
        ]);
    }
}
