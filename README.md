# 🛍 E-Commerce Backend API

[![CI/CD](https://github.com/ayamahmoud11/ecommerce-backend/actions/workflows/laravel.yml/badge.svg)](https://github.com/ayamahmoud11/ecommerce-backend/actions)
[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php)](https://php.net/)
[![Laravel Version](https://img.shields.io/badge/Laravel-10.x-FF2D20?logo=laravel)](https://laravel.com)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

Advanced e-commerce backend system with multi-tenant architecture and modern API features.

## 🚀 Features

- **🔐 Multi-Tenancy** - Isolated data per user  
- **🔑 Sanctum Auth** - API token authentication  
- **👥 Role Management** - Admin/Customer roles  
- **⚡ Redis Cache** - High-performance caching  
- **📦 Queue System** - Background job processing  
- **✅ Pest Testing** - Full test coverage  
- **📚 L5 Swagger Docs** - Interactive API documentation
- **✅ CI/CD** - github/workflows/laravel.yml to run tests automatically.
- **👥 Admin Dashboard** - Simple dashboard howing stats (product count, order count)..

## 📦 Installation

```bash
# Clone repository
git clone https://github.com/ayamahmoud11/ecommerce-backend.git
cd ecommerce-backend

# Install dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_backend
DB_USERNAME=root
DB_PASSWORD=

# Run migrations & seeders
php artisan migrate --seed


# 🧪 Running Tests

# Install testing dependencies
composer require --dev pestphp/pest

# Run all tests
php artisan test

# Run parallel tests
php artisan test --parallel

# Generate test coverage
php artisan test --coverage-html coverage

# 📚 API Documentation
# Generate Swagger docs
php artisan l5-swagger:generate

# Access API docs at:
http://localhost:8000/api/documentation
![Screenshot 2025-05-01 171354](https://github.com/user-attachments/assets/3e86d79c-0d10-4d4d-9b42-237b14ffba1e)

#🚀 Deployment
# Heroku setup
heroku config:set APP_KEY=$(php artisan key:generate --show)
heroku config:set DB_CONNECTION=pgsql
heroku addons:create heroku-redis:hobby-dev

#🛠 Tech Stack
Framework: Laravel 10

Database: MySQL/PostgreSQL

Cache: Redis

Auth: Laravel Sanctum

Testing: Pest PHP

Docs: Swagger OpenAPI

CI/CD: GitHub Actions

Admin Dashboard Vue.js
