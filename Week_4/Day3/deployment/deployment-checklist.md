# Laravel Deployment Checklist

## 1. Production Environment

* [ ] Set `APP_ENV=production`
* [ ] Set `APP_DEBUG=false`
* [ ] Set the correct `APP_URL`
* [ ] Configure the production database
* [ ] Verify the Laravel `APP_KEY`
* [ ] Keep production `.env` credentials private

## 2. Laravel Optimization

Run:

```bash
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 3. Upload to Hosting

* [ ] Upload the Laravel application using FTP or SSH
* [ ] Maintain the correct Laravel folder structure
* [ ] Configure the domain/document root to point to the Laravel `public` directory

## 4. File Permissions

* [ ] Directories: `755`
* [ ] Files: `644`
* [ ] `storage/` is writable
* [ ] `bootstrap/cache/` is writable

## 5. Database

* [ ] Create the production database
* [ ] Configure database credentials in `.env`
* [ ] Run migrations on the production server

```bash
php artisan migrate --force
```

## 6. Testing

* [ ] Open the live application URL
* [ ] Test API login
* [ ] Test product listing
* [ ] Test product creation
* [ ] Test product update
* [ ] Test product deletion
* [ ] Test validation errors
* [ ] Test unauthenticated requests
* [ ] Verify HTTP status codes

## 7. Final Security Check

* [ ] `APP_DEBUG=false`
* [ ] Production credentials are not committed to GitHub
* [ ] All required routes work
* [ ] Application works on the live URL
* [ ] Deployment steps are documented in `README.md`
