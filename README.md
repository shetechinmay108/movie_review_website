# Movie Review Website

A simple movie review website showcasing multiple films with images, trailers, and basic information, organized into separate folders.

## Important Note
- This project is a **college-level mini project**.
- It is built strictly according to the **college syllabus**.
- **No external data, APIs, or third‑party services** were used. All assets and data are stored locally within the project or a local MySQL database.

## Tech Stack
- HTML, CSS, basic JavaScript
- PHP (basic, no framework)
- MySQL (local database)

## Entry Point
- The first page (start page) is: `home page 1/home page.php`

## Requirements
- PHP 8.x (or PHP 7.4+) installed locally
- XAMPP (Apache + PHP + MySQL) or any equivalent stack
- PHP extensions: `mysqli` or `pdo_mysql` enabled (enabled by default in XAMPP)
- A modern web browser (Chrome, Edge, Firefox, Safari)

## Database Setup (star_x.sql)
A MySQL dump file is provided at the project root: `star_x.sql`.

### Import via phpMyAdmin (XAMPP)
1. Start Apache and MySQL from XAMPP.
2. Open phpMyAdmin: `http://localhost/phpmyadmin`.
3. Create a database (example): `star_x`.
4. Select the new database, go to the Import tab.
5. Choose the file `star_x.sql` from the project root and click Import.

Default XAMPP credentials:
- User: `root`
- Password: (leave empty)
- Host: `localhost`

### Import via MySQL CLI
```bash
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS star_x;"
mysql -u root -p star_x < "/path/to/movie_review_website/star_x.sql"
```
Adjust the database name, user, and password as needed for your setup.

## How to Run (recommended: XAMPP)
1. Install XAMPP and start Apache and MySQL.
2. Copy the project folder `movie_review_website` into your XAMPP `htdocs` directory.
   - macOS: `/Applications/XAMPP/htdocs/movie_review_website`
   - Windows: `C:\xampp\htdocs\movie_review_website`
3. Import the database using the steps above.
4. In your browser, open:
   - `http://localhost/movie_review_website/home%20page%201/home%20page.php`
5. Browse to the individual movie pages via the UI links.

## How to Run (alternative: PHP built-in server)
1. Ensure PHP is installed and available in your terminal.
2. In a terminal, navigate to the project directory:
   - `cd /path/to/movie_review_website`
3. Start the PHP dev server from the project root:
   - `php -S localhost:8000`
4. Open the entry page in your browser:
   - `http://localhost:8000/home%20page%201/home%20page.php`

## Project Structure
- Each movie has its own folder containing its HTML (or PHP) page, styles, and media.
- There are also "home page" folders with additional assets and pages.
- The MySQL dump `star_x.sql` is provided at the project root for local database setup.

## License
This project is for educational purposes as part of a college syllabus.
