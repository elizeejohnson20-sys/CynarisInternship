# Week 4 — Day 3: Laravel Deployment

## Objective

Deploy the Laravel application to a production hosting environment and configure the application for production use.

## Application

The Laravel API application developed in Week 4 Day 2 is used as the deployment target.

**Application Path:**

`Week_4/Day2/api_integration`

## Production Configuration

The application is configured for production using:

* `APP_ENV=production`
* `APP_DEBUG=false`
* `DB_CONNECTION=sqlite`
* SQLite database path configured through the Render environment variable
* A valid Laravel `APP_KEY`
* `LOG_CHANNEL=stderr`

Production environment values are configured in Render and are not committed to GitHub.

## Laravel Optimization

The deployment runs the following Laravel optimization commands:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

These commands cache Laravel configuration, routes, and Blade views for production use.

## Hosting Platform

The application is deployed using **Render** with Docker.

**Service Name:**

`CynarisInternship`

**Live Application URL:**

https://cynarisinternship.onrender.com

**Deployment Branch:**

`feature/week-4-day-3-deployment`

**Runtime:**

* Docker
* PHP 8.4
* Laravel 13.34.0

## Docker Deployment

A Docker configuration was added to prepare the Laravel application for deployment.

The Docker setup:

* Installs the required PHP extensions
* Installs Composer
* Installs production Composer dependencies
* Copies the Laravel application
* Creates the SQLite database
* Sets required directory permissions
* Caches Laravel configuration, routes, and views
* Runs database migrations
* Starts the Laravel application

## Database

The deployment uses SQLite.

The deployment creates the SQLite database and runs:

```bash
php artisan migrate --force
```

The following migrations were successfully executed during deployment:

* Users table
* Cache table
* Jobs table
* Personal access tokens table
* Products table

## Deployment Verification

The live application was tested after deployment.

Verified:

* Live application URL loads successfully
* Laravel application responds successfully
* Laravel version is 13.34.0
* Production configuration is loaded
* Configuration cache completed successfully
* Route cache completed successfully
* Blade view cache completed successfully
* SQLite database was created successfully
* Database migrations completed successfully
* Laravel server started successfully on Render

## File Permissions

The Docker deployment prepares the required Laravel directories and gives write permissions to:

* `storage`
* `bootstrap/cache`
* `database`

## Security Checklist

* `APP_DEBUG=false`
* Production credentials are not committed
* `APP_KEY` is configured through Render environment variables
* `.env` is excluded from the Docker build context
* Laravel configuration is cached for production
* Database migrations use the `--force` option during deployment

## Deployment Status

**Deployment completed successfully.**

The Laravel application is live on Render:

**https://cynarisinternship.onrender.com**

The application successfully starts in the production environment, connects to the SQLite database, completes the database migrations, and serves the Laravel application.
