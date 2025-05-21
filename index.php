<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Haven</title>
    <style>
        /* Basic CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f9ff;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header Styles */
        header {
            background-color: #0066cc;
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 20px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: #e0f0ff;
        }
        
        /* Hero Section */
        .hero {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/ocean.jpg');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        
        .hero-content {
            max-width: 800px;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            background-color: #0066cc;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #0055aa;
        }
        
        /* Features Section */
        .features {
            padding: 60px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2rem;
            color: #0066cc;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .feature-card h3 {
            margin-bottom: 15px;
            color: #0066cc;
        }
        
        /* Footer */
        footer {
            background-color: #003366;
            color: white;
            padding: 40px 0;
            text-align: center;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        
        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 20px;
        }
        
        .footer-section h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 10px;
        }
        
        .footer-section a {
            color: #a0c8ff;
            text-decoration: none;
        }
        
        .footer-section a:hover {
            text-decoration: underline;
        }
        
        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
            }
            
            nav ul {
                margin-top: 20px;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">Blue Haven</div>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Blue Haven</h1>
            <p>Your paradise by the ocean awaits. Experience luxury, comfort, and the beauty of nature.</p>
            <a href="#" class="btn">Explore Now</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2 class="section-title">Our Features</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>Luxury Accommodations</h3>
                    <p>Experience our premium rooms and suites with ocean views and modern amenities.</p>
                </div>
                <div class="feature-card">
                    <h3>Fine Dining</h3>
                    <p>Enjoy exquisite cuisine prepared by our award-winning chefs using local ingredients.</p>
                </div>
                <div class="feature-card">
                    <h3>Spa & Wellness</h3>
                    <p>Relax and rejuvenate with our comprehensive spa treatments and wellness programs.</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>Blue Haven is a luxury resort dedicated to providing exceptional experiences in a beautiful ocean setting.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>123 Ocean Drive<br>Coastal City, CC 12345<br>Phone: (123) 456-7890<br>Email: info@bluehaven.com</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Blue Haven. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple JavaScript for interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to current navigation item
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navLinks.forEach(item => item.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // You can add more frontend JavaScript functionality here
            // For example: image sliders, form validation, animations, etc.
        });
    </script>
</body>
</html>
