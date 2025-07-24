# Full Stack Developer Technical Test (Laravel + Nuxt.js)

This repository contains my submission for the Full Stack Developer position technical test at eGrow.

## Technologies Used

- Laravel 11 (PHP 8.3) — Backend API
- Nuxt 3 (Vue 3 + Vite) — Frontend SPA

## Project Status

- Laravel backend tasks are completed.
- Nuxt.js frontend tasks are in progress.  
  (Note: I haven’t worked with Nuxt.js for the past 2 years and am currently refreshing my skills.)

## Setup Instructions

### Laravel Backend

```bash
cd laravel-backend
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
