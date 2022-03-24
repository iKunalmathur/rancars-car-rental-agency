# Intro

**RanCars** is a car rental agency project.

# Tech Stack

-   **PHP Framework** : Laravel
-   **CSS Framework** : Tailwind CSS 3
-   **Database** : MySQL

# Details

-   [x] real-life system that will be used by real users
-   [x] 2 types of users: Customers and Car Rental Agency(Car Owners)
-   [x] ‘Registration’ pages - Different registration pages for customers & car rental agencies
-   [x] ‘Login’ pages - Single/different login pages for customers & car rental agencies.
-   [x] ‘Add new cars’ page - A Car rental agency once logged in, should be able to add details of new cars available for rental. Details to add
    -   [x] vehicle model
    -   [x] vehicle number (plate number)
    -   [x] seating capacity
    -   [x] rent per day
    -   [x] access to this page should be restricted only to the car rental agency
    -   [x] car rental agencies should also be able to edit the details of a particular car
-   [x] ‘Available cars to rent’ page - There should be a page that displays all the available cars to rent. Details to display -
    -   [x] vehicle model
    -   [x] vehicle number (plate number)
    -   [x] seating capacity
    -   [x] rent per day
    -   [x] Capture start date
    -   [x] Capture input as dropdown for the number of days the customer need to rent the car
    -   [x] This inputs only be shown when the customer is logged in
    -   [x] ‘Rent Car’ button (Book Now)
-   [x] This page should be accessible to everyone, irrespective of whether the user is logged in or not. Expected functionality on click of the ‘Rent Car’ button-
-   [x] Only customers should be able to book the available car by clicking the ‘Rent Car’ button.
-   [x] If the customer is not logged in, then he/she should be redirected to the login page.
-   [x] If a user is logged in as an agency, then the user should not be allowed to book
        the available car
-   [x] Car Agency ‘View booked cars’ page - Agency should be able to see the list of all the customers who have booked a particular car.

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

### Step 6 - Start Development Server

```
$ php artisan serve
```

# Access Credentials

| Account type |        Email         | Password |
| :----------: | :------------------: | :------: |
| Admin |  admin@example.com   | password |
| Owner/Agency |  owner@example.com   | password |
|   Customer   | customer@example.com | password |
