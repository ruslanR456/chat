# Basic PHP Chat App
A simple, AJAX-powered chat system with SQL storage and word censoring.

## Setup Instructions
1. **Database**: Create a database named `chat_system` or run the `install.sql` file in phpMyAdmin.
2. **Configuration**: Open `index.php` and update the `$user` and `$pass` if you are not using default root credentials.
3. **Hosting**: Place `index.html` and `index.php` in your web server directory (e.g., `htdocs` for XAMPP).
4. **Usage**: Open `localhost/your_folder/index.html` in your browser.

## Features
- Real-time polling (refreshes every 3s).
- Word censoring filter.
- Tailwind CSS UI.
- Secure PDO SQL integration.
