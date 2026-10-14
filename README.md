# LuckyDraw Simple System

A QR code lucky draw system for a product campaign. Customers scan a QR code on a product, register the product code with their phone number, and the admin picks winners from a spinning wheel that is built into the admin panel, so no third party wheel is needed.

Built for Kaftanasia's Raya campaign (AS Tech Legacy Group) with PHP and MySQL.

## How it works

1. The admin sets the campaign name, dates and prizes in **Settings**.
2. The admin creates a batch of unique QR codes in **QR codes**, then prints them for the products.
3. A customer scans a code with their phone camera, which opens `lucky.php?pid=CODE`, and registers with their name and phone number.
4. Each registered product code is one entry. Customers can check their entries at `check.php`.
5. In **Lucky draw**, the admin spins the wheel. The winner is chosen on the server with a secure random number, and an entry can never win twice.
6. The admin notifies the winner on WhatsApp with a ready made message.

Customers only ever see the customer pages. Everything else is behind the admin login.

## Features

- Unique QR code batches, ready to print
- Customer registration by phone number, one entry per product code
- Built in spinning wheel draw, with winner tracking and an option to exclude previous winners
- Admin overview with entries per day, QR activity and latest entries
- Customer list with search, winner filter and CSV export
- Editable campaign settings and WhatsApp messages
- Admin login with hashed passwords

## Pages

| Page | Who | Purpose |
| --- | --- | --- |
| `index.php` | Customer | Campaign status, countdown, how to scan, prizes |
| `lucky.php` | Customer | Registration form, opened by scanning a QR code |
| `check.php` | Customer | Check entries by phone number |
| `admin_lucky.php` | Admin | Sign in and overview |
| `admin_customers.php` | Admin | Customers, winners, CSV export |
| `generate_qr.php` | Admin | Create and print QR code batches |
| `admin_draw.php` | Admin | Spinning wheel draw |
| `admin_settings.php` | Admin | Campaign, prizes and WhatsApp settings |

## Tech

PHP, MySQL, JavaScript, HTML and CSS. Developed locally with XAMPP.

## Set up

1. Start Apache and MySQL in XAMPP.
2. Create an empty database called `astech_lucky` in phpMyAdmin, then import `FULL_DATABASE_SETUP.sql`.
3. Copy `config.example.php` to `config.php` and fill in your database login and your `$base_url`.
4. Open `admin_register.php` to create the first admin account, then sign in at `admin_lucky.php`.

The link inside each QR code comes from `$base_url`, so it must be reachable from customers' phones before you print. When testing on a local network, use the computer's LAN IP address and keep it fixed.

See `SETUP_GUIDE.md` for the full walkthrough.

## Author

Muhammad Izzuddin Bin Azmi
Portfolio: https://itsizz.vercel.app