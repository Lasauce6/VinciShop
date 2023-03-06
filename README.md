<div align="center">
    <h1>VinciShop</h1>
    <p align="center"><a href="https://www.vinci-melun.org/" target="_blank"><img src="https://raw.githubusercontent.com/Lasauce6/VinciShop/master/storage/app/imgs/logo.svg" width="250" alt="Lycée Léonard de Vinci"></a></p>
    <p>Pop-up store of the business BTS at Lycée Léonard de Vinci in Melun</p>
</div>

## About The Project

This project was made with the purpose of learning how to use Laravel.

The students of business BTS at Lycée Léonard de Vinci in Melun had to create a pop-up store to sell beekeeping products.

I was in charge of the website, so I decided to use Laravel to learn how to use it.

### Built With

- [Laravel](https://laravel.com/)
- [Bootstrap](https://getbootstrap.com)
- [Sqlite](https://www.sqlite.org/index.html)

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)
- [PHP](https://www.php.net/)
- [Sqlite](https://www.sqlite.org/index.html) or [Mysql](https://www.mysql.com/fr/)

### Installation

1. Clone the repo

```sh
git clone https://github.com/Lasauce6/VinciShop.git && cd VinciShop
```

2. Install Composer packages

```sh
composer install
```

3. Create a copy of your .env file

```sh
cp .env.example .env
```

4. Generate an app encryption key

```sh
php artisan key:generate
```

5. Create an empty database for our application

For Mysql:
```sh
mysql -u root -p
CREATE DATABASE the_name_of_your_database;
```

For Sqlite:
```sh
touch database/database.sqlite
```

6. In the .env file, add database information to allow Laravel to connect to the database

For Mysql:
```sh
DB_CONNECTION=mysql
DB_HOST=your_host
DB_PORT=your_port
DB_DATABASE=the_name_of_your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

For Sqlite:
```sh
DB_CONNECTION=sqlite
DB_DATABASE=your_database_path
```

7. Create the tables in the databases

For Mysql:
```sql
CREATE TABLE produits (
    id INTEGER PRIMARY KEY,
    nom TEXT NOT NULL,
    description TEXT NOT NULL,
    prix DECIMAL(5,2) NOT NULL,
    image TEXT NOT NULL,
    qte INTEGER NOT NULL
);

CREATE TABLE commandes (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(40) NOT NULL,
    nom VARCHAR(40) NOT NULL,
    email VARCHAR(40) NOT NULL,
    panier TEXT NOT NULL,
    total DECIMAL(5,2) NOT NULL,
    updated_at DATE NOT NULL,
    created_at DATE NOT NULL
);
```

For Sqlite:
```sql
CREATE TABLE produits (
    id INTEGER PRIMARY KEY,
    nom TEXT NOT NULL,
    description TEXT NOT NULL,
    prix DECIMAL(5,2) NOT NULL,
    image TEXT NOT NULL,
    qte INTEGER NOT NULL
);

CREATE TABLE commandes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    prenom VARCHAR(40) NOT NULL,
    nom VARCHAR(40) NOT NULL,
    email VARCHAR(40) NOT NULL,
    panier TEXT NOT NULL,
    total DECIMAL(5,2) NOT NULL,
    updated_at DATE NOT NULL,
    created_at DATE NOT NULL
);
```

8. Migrate the database

```sh
php artisan migrate
```


9. Start the local development server

```sh
php artisan serve
```

10. You can now access the server at http://localhost:8000


11. To create admin credentials, uncomment the function createCreds() in the file app/Http/Controllers/AdminController.php and modify it to your needs. Uncomment the line 27 in the file routes/web.php and access the page http://localhost:8000/admin/createCreds. Then, comment the function createCreds() and the line 27 in the file routes/web.php.




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
