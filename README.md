# PHP-MVC-Framework-with-support-for-routing

To install:

	Run “composer install”
	
After you have created your database, written migrations in the migration folder and have added your database credentials in the .env file, 

To apply migration:

	run the file like “php migrations.php”

Api routes for testing:

1.	Register (post form-data) – /api/register
2.	Login (post form-data) - /api/login
3.	Logout (get) - /api/logout

To test with views already created:
1.	Open your terminal in the framework root folder.
2.	Navigate to public folder
3.	Run the command “php -C localhost:8080”
4.	Open localhost:8080 in your browser
