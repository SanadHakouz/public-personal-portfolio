7.Setup and Installation
Prerequisites
Before installing the portfolio application, ensure your system meets these requirements:
●
●
●
●
●
PHP 8.1 or higher
Composer
SQLite (or other database of choice)
Node.js and NPM (for asset compilation)
Git (for version control and installation)
Installation Steps
Follow these steps to set up the portfolio on your local environment:
1. Clone the Repository
git clone https://github.com/sanadhakouz/public-personal-portfolio.git
cd portfolio
2. Install PHP Dependencies
composer install
3. Copy Environment File
cp .env.example .env
4. Generate Application Key
php artisan key:generate
5. Set Up the Database
For SQLite:
touch database/database.sqlite
Edit .env file to use SQLite:
DB
DB
_
CONNECTION=sqlite
_
DATABASE=/absolute/path/to/database/database.sqlite
6. Run Migrations and Seeders
php artisan migrate --seed
7. Create Storage Link
php artisan storage:link
8. Install Frontend Dependencies and Compile Assets
npm install
npm run dev
9. Serve the Application
php artisan serve
The application should now be accessible at http://localhost:8000
Configuration
Several aspects of the application can be configured through the .env file:
Basic Configuration
APP
APP
APP
APP
NAME="Your Portfolio Name"
_
ENV=local
_
DEBUG=true
_
_
URL=http://localhost:8000
File Storage Configuration
FILESYSTEM
_
DISK=public
Mail Configuration (for contact form)
MAIL
MAIL
MAIL
MAIL
MAIL
MAIL
MAIL
_
MAILER=smtp
_
HOST=smtp.mailtrap.io
PORT=2525
_
USERNAME=null
_
PASSWORD=null
_
ENCRYPTION=null
_
FROM
_
_
ADDRESS="hello@example.com"
MAIL
FROM
_
_
NAME="${APP
_
NAME}"
Initial Admin User
After running seeders, you can log in with these credentials:
●
●
Email: admin@example.com
Password: password
For security reasons, change these credentials immediately after first login.

🛠️ Customization
To modify the portfolio:

Edit the index.html file for content changes.
Modify the style.css file for styling updates.
Update script.js for interactive features.

📄 License
This project is open-source and free to use. Feel free to modify it as needed.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
