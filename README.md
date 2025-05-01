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
