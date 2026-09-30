# Week 4 — Day 3: Laravel Deployment

## Objective

Deploy a Laravel application to shared hosting and configure the application for a production environment.

## Application

The Laravel API application developed in Week 4 Day 2 is used as the deployment target.

**Application Path:**

`Week_4/Day2/api_integration`

## Production Configuration

The production environment should use:

* `APP_ENV=production`
* `APP_DEBUG=false`
* Correct production `APP_URL`
* Production database credentials
* Valid Laravel `APP_KEY`

Production `.env` values must remain private and must not be committed to GitHub.

## Laravel Optimization

The following commands are used during production deployment:

```bash
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

These commands cache Laravel configuration, routes, and views for production use.

## Hosting

The Laravel application can be uploaded to shared hosting using FTP or SSH.

The hosting document root should point to Laravel's:

```text
public
```

directory.

## File Permissions

Recommended permissions:

* Directories: `755`
* Files: `644`
* `storage`: writable
* `bootstrap/cache`: writable

## Database

The production database must be configured in the server `.env` file.

After configuring the database:

```bash
php artisan migrate --force
```

## Testing

After deployment, verify:

* Live application URL
* API login
* Product listing
* Product creation
* Product update
* Product deletion
* Validation errors
* Unauthenticated API requests
* HTTP status codes

## Security Checklist

* `APP_DEBUG=false`
* Production credentials are not committed
* `APP_KEY` is configured
* Laravel `public` directory is used as the document root
* Required directories have correct permissions
* All application routes work correctly

## Deployment Status

Deployment preparation completed.

The application is ready for production configuration and hosting deployment.
