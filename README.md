
CMS Sedjoek

Project untuk CMS di Sedjoek, digunakan untuk  mengelola, mengubah, dan mempublikasikan konten web di Sedjoek.
## Features

- Full REST API
- Full Responsive
- Midtrans Payment
- Firebase Push Notification

## Authors

- [@kodenatan17](https://www.github.com/kodenatan17)
- [@umrshydik](https://www.github.com/umrshydik)


## Installation

Install Composer

```bash
  composer install
```

Copy .env.example to .env

```bash
  .env.example => .env
```

Make database

```bash
  name database: sedjoek
```

Setting database .env

```bash
  DB_PORT=3306
  DB_DATABASE=sedjoek
  DB_USERNAME=root
  DB_PASSWORD=
```
Setting your Midtrans API on .env
```bash
  MIDTRANS_SERVER_KEY="#####" (your key)
  MIDTRANS_CLIENT_KEY="#####" (your key)
  MIDTRANS_IS_PRODUCTION=true
  MIDTRANS_IS_SANITIZED=true
  MIDTRANS_IS_3DS=true
```

Buat Storage link

```bash
  php artisan storage:link
```

Run Serve

```bash
  php artisan serve
```
