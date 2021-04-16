# PHP MVC Framework with support for routing

To install:

	Run “composer install”
	
After you have created your database, and have added your database credentials in the .env file, 

To apply migration:

	run the file like “php migrations.php”
	
This will create a [users] table with the columns: [email], [firstname], [lastname], [status], [password]


You will then make a postman request to the following routes with the following parameters


To Register:

Post form-data (not raw data) to 


/api/register 

	Data: 
		firstname,
		lastname,
		email,
		password,
		confirmPassword

	
NB: All parameters are model validated including password check for match.
	
If registration was successful, you will have a success message, else, you will have failed.


To Login:

Post form-data (Not raw data) to 

	/api/login
	
		Data:	
			email,
			password
			
NB: If login is successful, you will have success else you will have failed login attempt.

To logout

Send a get request without parameters to 

	/api/logout

To test with views already created:

1.	Open your terminal in the framework root folder.
2.	Navigate to public folder
3.	Run the command “php -C localhost:8080”
4.	Open localhost:8080 in your browser navigate to register, fill and submit the form, login and logout respectively. 
