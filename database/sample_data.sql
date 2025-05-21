-- Sample data for BluehavenFiveM Store

-- Vehicle Liveries
INSERT INTO products (name, description, price, category, image_url, featured, stripe_price_id)
VALUES 
('Police Department Livery Pack', 'A complete set of high-quality police department vehicle liveries for your FiveM server. Includes designs for 10 different vehicles.', 19.99, 'vehicle-liveries', 'https://via.placeholder.com/800x600?text=Police+Livery', true, 'price_1234567890'),
('Fire Department Livery Pack', 'Professional fire department vehicle liveries for your FiveM server. Includes designs for fire trucks, command vehicles, and ambulances.', 24.99, 'vehicle-liveries', 'https://via.placeholder.com/800x600?text=Fire+Livery', false, 'price_2345678901'),
('Sheriff Department Livery Pack', 'High-quality sheriff department vehicle liveries for your FiveM server. Includes designs for patrol cars, SUVs, and trucks.', 19.99, 'vehicle-liveries', 'https://via.placeholder.com/800x600?text=Sheriff+Livery', true, 'price_3456789012'),
('Civilian Vehicle Livery Pack', 'Custom liveries for civilian vehicles in your FiveM server. Includes designs for sports cars, SUVs, and trucks.', 14.99, 'vehicle-liveries', 'https://via.placeholder.com/800x600?text=Civilian+Livery', false, 'price_4567890123');

-- Scripts
INSERT INTO products (name, description, price, category, image_url, featured, stripe_price_id)
VALUES 
('Advanced Job System', 'A comprehensive job system for your FiveM server with multiple career paths, progression, and customizable job tasks.', 49.99, 'scripts', 'https://via.placeholder.com/800x600?text=Job+System', true, 'price_5678901234'),
('Vehicle Dealership Script', 'A complete vehicle dealership system with financing options, test drives, and customizable inventory.', 39.99, 'scripts', 'https://via.placeholder.com/800x600?text=Dealership', false, 'price_6789012345'),
('Property Management System', 'Allow players to buy, sell, and rent properties on your FiveM server with this comprehensive property management system.', 59.99, 'scripts', 'https://via.placeholder.com/800x600?text=Property+System', true, 'price_7890123456'),
('Gang Territory Control', 'A dynamic gang territory control system with turf wars, income generation, and customizable territories.', 44.99, 'scripts', 'https://via.placeholder.com/800x600?text=Gang+System', false, 'price_8901234567');

-- Websites
INSERT INTO products (name, description, price, category, image_url, featured, stripe_price_id)
VALUES 
('Basic Community Website', 'A simple but effective website for your FiveM community with user registration, forums, and server status.', 99.99, 'websites', 'https://via.placeholder.com/800x600?text=Basic+Website', false, 'price_9012345678'),
('Premium Community Portal', 'A comprehensive community portal with user profiles, forums, server status, leaderboards, and admin panel.', 199.99, 'websites', 'https://via.placeholder.com/800x600?text=Premium+Website', true, 'price_0123456789'),
('Custom CAD/MDT System', 'A custom Computer Aided Dispatch and Mobile Data Terminal system for your roleplay server.', 299.99, 'websites', 'https://via.placeholder.com/800x600?text=CAD+System', false, 'price_1234509876'),
('Server Application System', 'A professional application system for your whitelisted FiveM server with custom forms and admin review.', 149.99, 'websites', 'https://via.placeholder.com/800x600?text=Application+System', true, 'price_2345609876');

-- Frameworks
INSERT INTO products (name, description, price, category, image_url, featured, stripe_price_id)
VALUES 
('Basic Roleplay Framework', 'A lightweight roleplay framework for your FiveM server with essential features to get you started.', 99.99, 'frameworks', 'https://via.placeholder.com/800x600?text=Basic+Framework', false, 'price_3456709876'),
('Advanced Roleplay Framework', 'A comprehensive roleplay framework with jobs, inventory, housing, vehicles, and more.', 199.99, 'frameworks', 'https://via.placeholder.com/800x600?text=Advanced+Framework', true, 'price_4567809876'),
('Economy Framework', 'A robust economy framework with banking, businesses, stock market, and more.', 149.99, 'frameworks', 'https://via.placeholder.com/800x600?text=Economy+Framework', false, 'price_5678909876'),
('Law Enforcement Framework', 'A complete law enforcement framework with dispatch, MDT, evidence system, and more.', 179.99, 'frameworks', 'https://via.placeholder.com/800x600?text=Police+Framework', true, 'price_6789009876');
