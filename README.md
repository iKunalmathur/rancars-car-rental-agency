# Intro

**RanCars** is a car rental agency project.

# Tech Stack

-   **PHP Framework** : Laravel
-   **CSS Framework** : Tailwind CSS 3
-   **Database** : MySQL

# Details

[Check Out Requirements](REQUIREMENTS.md)

# Installation

### Step 1 - Clone Repo or download zip

### Step 2 - Install packages and dependencies

```
$ composer install --optimize-autoloader

#OR

$ composer install --optimize-autoloader --no-dev
```

```
$ npm install && npm run dev
```

### Step 3 - Add .env and generate new key

```
$ mv .env.example .env
```

```
$ php artisan key:generate
```

### Step 4 - Add db credentials in .env

```
DB_DATABASE=rancar_db
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5 - Run Migrations and seed database

```
$ php artisan migrate --seed
```

### Step 5 - Link Storage

```
$ php artisan storage:link
```

### Step 7 - Start Development Server

```
$ php artisan serve
```

Open http://localhost:8000 with your browser to see the result.

# Access Credentials

| Account type |        Email         | Password |
| :----------: | :------------------: | :------: |
|    Admin     |  admin@example.com   | password |
| Owner/Agency |  owner@example.com   | password |
|   Customer   | customer@example.com | password |
