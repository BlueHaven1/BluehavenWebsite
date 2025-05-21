# BluehavenFiveM Store

A PHP-based e-commerce platform for selling FiveM resources including Vehicle Liveries, Scripts, Websites, and Frameworks. This store includes Stripe integration for payments and subscriptions.

## Features

- Responsive design using Bootstrap 5
- User authentication with Supabase
- Product catalog with categories
- Stripe payment integration (one-time purchases and subscriptions)
- User dashboard for managing purchases and subscriptions
- Admin panel for managing products and orders

## Technologies Used

- PHP 8.0+
- Supabase for database and authentication
- Stripe API (version 2025-04-30.basil) for payments and subscriptions
- Bootstrap 5 for frontend
- Font Awesome for icons

## Requirements

- PHP 8.0 or higher
- Composer
- Supabase account
- Stripe account

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/bluehaven-fivem-store.git
   cd bluehaven-fivem-store
   ```

2. Install dependencies:
   ```
   composer install
   ```

3. Configure Supabase:
   - Create a new Supabase project
   - Set up the following tables:
     - users
     - products
     - orders
     - subscriptions
   - Update the Supabase configuration in `config/supabase.php`

4. Configure Stripe:
   - Create a Stripe account
   - Get your API keys
   - Update the Stripe configuration in `config/stripe.php`

5. Configure your web server:
   - Point your web server to the project directory
   - Ensure the `.htaccess` file is properly configured for URL rewriting

## Database Structure

### Products Table
- id (uuid, primary key)
- name (text)
- description (text)
- price (numeric)
- category (text)
- image_url (text)
- featured (boolean)
- stripe_price_id (text)
- created_at (timestamp)

### Orders Table
- id (uuid, primary key)
- user_id (uuid, foreign key to users.id)
- product_id (uuid, foreign key to products.id)
- amount (numeric)
- status (text)
- payment_intent_id (text)
- created_at (timestamp)

### Subscriptions Table
- id (uuid, primary key)
- user_id (uuid, foreign key to users.id)
- product_id (uuid, foreign key to products.id)
- stripe_subscription_id (text)
- status (text)
- current_period_end (timestamp)
- created_at (timestamp)

## Usage

1. Access the website through your web browser
2. Browse products by category
3. Register an account to make purchases
4. Add products to cart and checkout using Stripe
5. Access your purchases and subscriptions through the dashboard

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Credits

- [Supabase](https://supabase.io/)
- [Stripe](https://stripe.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Font Awesome](https://fontawesome.com/)
