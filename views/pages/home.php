<div class="container">
    <!-- Hero Section -->
    <div class="bg-dark text-white p-5 rounded-3 mb-5">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Welcome to BluehavenFiveM Store</h1>
            <p class="col-md-8 fs-4">Your one-stop shop for high-quality FiveM resources including Vehicle Liveries, Scripts, Websites, and Frameworks.</p>
            <a href="/products" class="btn btn-primary btn-lg">Browse Products</a>
        </div>
    </div>
    
    <!-- Categories Section -->
    <h2 class="text-center mb-4">Our Categories</h2>
    <div class="row mb-5">
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200?text=Vehicle+Liveries" class="card-img-top" alt="Vehicle Liveries">
                <div class="card-body">
                    <h5 class="card-title">Vehicle Liveries</h5>
                    <p class="card-text">High-quality vehicle liveries for your FiveM server.</p>
                    <a href="/products/vehicle-liveries" class="btn btn-primary">Browse Liveries</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200?text=Scripts" class="card-img-top" alt="Scripts">
                <div class="card-body">
                    <h5 class="card-title">Scripts</h5>
                    <p class="card-text">Custom scripts to enhance your FiveM server functionality.</p>
                    <a href="/products/scripts" class="btn btn-primary">Browse Scripts</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200?text=Websites" class="card-img-top" alt="Websites">
                <div class="card-body">
                    <h5 class="card-title">Websites</h5>
                    <p class="card-text">Professional websites for your FiveM community.</p>
                    <a href="/products/websites" class="btn btn-primary">Browse Websites</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200?text=Frameworks" class="card-img-top" alt="Frameworks">
                <div class="card-body">
                    <h5 class="card-title">Frameworks</h5>
                    <p class="card-text">Robust frameworks to build your FiveM server upon.</p>
                    <a href="/products/frameworks" class="btn btn-primary">Browse Frameworks</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Featured Products Section -->
    <h2 class="text-center mb-4">Featured Products</h2>
    <div class="row">
        <?php if (empty($featured_products)): ?>
            <div class="col-12 text-center">
                <p>No featured products available at the moment.</p>
            </div>
        <?php else: ?>
            <?php foreach ($featured_products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?= $product['image_url'] ?? 'https://via.placeholder.com/300x200?text=Product' ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text"><?= substr($product['description'], 0, 100) ?>...</p>
                            <p class="card-text"><strong>Price: <?= format_price($product['price']) ?></strong></p>
                            <a href="/products/view/<?= $product['id'] ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <!-- Testimonials Section -->
    <h2 class="text-center mb-4 mt-5">What Our Customers Say</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <p class="card-text"><i class="fas fa-quote-left me-2"></i>The vehicle liveries I purchased are absolutely stunning! Great quality and attention to detail.<i class="fas fa-quote-right ms-2"></i></p>
                    <div class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text"><i class="fas fa-quote-left me-2"></i>The scripts I bought have significantly improved my server's functionality. Excellent support too!<i class="fas fa-quote-right ms-2"></i></p>
                    <div class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Mike Johnson</h5>
                    <p class="card-text"><i class="fas fa-quote-left me-2"></i>The framework I purchased was easy to install and customize. It saved me weeks of development time!<i class="fas fa-quote-right ms-2"></i></p>
                    <div class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
