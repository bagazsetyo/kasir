<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

#   About Kasir
A Cashier Web App Made With Laravel, And Livewire:

**Features**
-   Roles
    -   Super Admin, Administrator, Kasir, Gudang
- Basic Features
    - Authentication, Create Product, Edit Product, Set Gudang Stock, Create Order, Edit Order, Add & Edit Product On Every Order And Menu Stock Automatically Changed, Cancel Order, Checkouts, Manage Gudang Stock, And Manage Dasgboard admin.
-   user manage 
    -   Create Cashier, Manage Cashier Profile, Create Admin, Manage Profile.
-    Super Admin Manage
        - Auth, Create Team, Update Name Team, Change Team, Change Role Team, Change Profile, Delete Team, Delete User Team. 

**What's in it?**
- Laravel 8.x
- Livewire 2.x
- Tailwind 2
- Font Awesome

**Learning Laravel**

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

**Requirement**
-   mysql >= 7.3

#   Installation

Create a Database Table in phpMyAdmin

Extract the Kasir Source Code that has been downloaded to a folder anywhere.

Open Code Editor → Terminal.

In Terminal, navigate to the extracted Oashier folder.
  ```$ cd kasir```
  
Enter these commands one by one ,
  ```
  $ composer install
  $ npm install
  $ cp .env.example .env
  $ php artisan key:generate
  $ php artisan storage:link
  ```
Edit the .env file like this,
  ```
  DB_CONNECTION = mysql
  DB_HOST = 127.0.0.1 // change to Host your database
  DB_PORT = 3306
  DB_DATABASE = kasir // change to the name of the database table that you created
  DB_USERNAME = root // change to be your database username, default root
  DB_PASSWORD = ... // change to your databse password, null default 
  ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
