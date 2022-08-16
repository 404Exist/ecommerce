<h1 align="center">Ecommerce</h1>

<h2>Introduction</h2> 
This is a simple ecommerce application.

<h2>Requirements</h2> 

```
php >= 8.0.2
laravel >= 9.19
```

<h2>Installation</h2>

```bash
composer install
npm install
npm run build
```

<h2>Configuration</h2>
<p>Create database called "ecommerce" as database name in .env file</p> 
<h4>.env</h4>

```php
MAIL_USERNAME=
MAIL_PASSWORD=
GOOGLE_CLIENT_ID=
GOOGLE_SECRET=
```
<h4>migrate and seed</h4> 

```bash
php artisan migrate --seed
```

<h4>start server</h4> 

```bash
php artisan serve
```

<h2>Testing</h2>

```bash
php artisan test
```
