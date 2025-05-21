<?php
// Random index.php file for BluehavenFiveM Store

// Set page title
$pageTitle = 'BluehavenFiveM Store - Home';

// Random array of FiveM server features
$fivemFeatures = [
    'Custom Vehicle Liveries',
    'Advanced Scripting',
    'Professional Websites',
    'Roleplay Frameworks',
    'Server Optimization',
    'Custom Development',
    'Premium Support',
    'Regular Updates'
];

// Random array of testimonials
$testimonials = [
    [
        'name' => 'John Doe',
        'server' => 'Los Santos RP',
        'text' => 'The vehicle liveries we purchased are amazing! Our players love them.'
    ],
    [
        'name' => 'Jane Smith',
        'server' => 'Liberty City Life',
        'text' => 'The scripts we got from Bluehaven have transformed our server completely.'
    ],
    [
        'name' => 'Mike Johnson',
        'server' => 'Vice City Roleplay',
        'text' => 'Our community website looks professional and works flawlessly. Highly recommended!'
    ],
    [
        'name' => 'Sarah Williams',
        'server' => 'San Andreas Adventures',
        'text' => 'The framework we purchased was easy to install and customize. Great value for money.'
    ]
];

// Random function to shuffle an array
function shuffleArray($array) {
    $shuffled = $array;
    shuffle($shuffled);
    return array_slice($shuffled, 0, rand(3, count($array)));
}

// Get random features and testimonials
$randomFeatures = shuffleArray($fivemFeatures);
$randomTestimonials = shuffleArray($testimonials);

// Random discount code generator
function generateDiscountCode() {
    $prefix = 'FIVEM';
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = $prefix . '-';
    for ($i = 0; $i < 6; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

$discountCode = generateDiscountCode();
$discountAmount = rand(10, 30);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        
        header h1 {
            margin: 0;
        }
        
        nav {
            background-color: #34495e;
            padding: 10px 0;
        }
        
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        
        nav ul li {
            display: inline-block;
            margin: 0 10px;
        }
        
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        
        .hero {
            background-color: #3498db;
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }
        
        .features {
            padding: 40px 0;
            text-align: center;
        }
        
        .feature-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .feature-item {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            width: 200px;
        }
        
        .testimonials {
            background-color: #ecf0f1;
            padding: 40px 0;
        }
        
        .testimonial-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }
        
        .testimonial-item {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            width: 300px;
        }
        
        .discount-banner {
            background-color: #e74c3c;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin: 40px 0;
        }
        
        footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>BluehavenFiveM Store</h1>
            <p>Premium Resources for Your FiveM Server</p>
        </div>
    </header>
    
    <nav>
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </nav>
    
    <section class="hero">
        <div class="container">
            <h2>Enhance Your FiveM Server Today</h2>
            <p>Discover high-quality resources for your FiveM server, including vehicle liveries, scripts, websites, and frameworks.</p>
            <button>Browse Products</button>
        </div>
    </section>
    
    <section class="features">
        <div class="container">
            <h2>Our Features</h2>
            <p>We offer a wide range of products and services to enhance your FiveM server experience.</p>
            
            <div class="feature-list">
                <?php foreach ($randomFeatures as $feature): ?>
                    <div class="feature-item">
                        <h3><?php echo $feature; ?></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <div class="discount-banner">
        <div class="container">
            <h2>Special Offer!</h2>
            <p>Use code <strong><?php echo $discountCode; ?></strong> at checkout to get <?php echo $discountAmount; ?>% off your purchase!</p>
            <p>Limited time offer. Don't miss out!</p>
        </div>
    </div>
    
    <section class="testimonials">
        <div class="container">
            <h2>What Our Customers Say</h2>
            <p>Don't just take our word for it. Here's what server owners have to say about our products.</p>
            
            <div class="testimonial-list">
                <?php foreach ($randomTestimonials as $testimonial): ?>
                    <div class="testimonial-item">
                        <p>"<?php echo $testimonial['text']; ?>"</p>
                        <h4><?php echo $testimonial['name']; ?></h4>
                        <p><em><?php echo $testimonial['server']; ?></em></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> BluehavenFiveM Store. All rights reserved.</p>
            <p>Random page generated at: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
    </footer>
</body>
</html>
