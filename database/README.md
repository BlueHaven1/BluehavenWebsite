# Database Setup

This directory contains SQL files for setting up the Supabase database for the BluehavenFiveM Store.

## Files

- `schema.sql`: Contains the database schema with tables, indexes, and constraints
- `sample_data.sql`: Contains sample product data for testing

## Setup Instructions

1. Create a new Supabase project at [https://app.supabase.io/](https://app.supabase.io/)
2. Go to the SQL Editor in your Supabase dashboard
3. Copy and paste the contents of `schema.sql` into the SQL Editor and run it
4. (Optional) Copy and paste the contents of `sample_data.sql` into the SQL Editor and run it to add sample products

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
- updated_at (timestamp)

### Orders Table
- id (uuid, primary key)
- user_id (uuid, foreign key to auth.users.id)
- product_id (uuid, foreign key to products.id)
- amount (numeric)
- status (text)
- payment_intent_id (text)
- created_at (timestamp)
- updated_at (timestamp)

### Subscriptions Table
- id (uuid, primary key)
- user_id (uuid, foreign key to auth.users.id)
- product_id (uuid, foreign key to products.id)
- stripe_subscription_id (text)
- status (text)
- current_period_end (timestamp)
- created_at (timestamp)
- updated_at (timestamp)

### Profiles Table
- id (uuid, primary key, references auth.users.id)
- name (text)
- stripe_customer_id (text)
- created_at (timestamp)
- updated_at (timestamp)

## Row Level Security (RLS)

The schema includes Row Level Security policies to ensure that:

- Products are publicly readable but only admins can modify them
- Users can only view and manage their own orders and subscriptions
- Admins can view and manage all orders and subscriptions
- Users can only view and update their own profiles
- Admins can view all profiles
