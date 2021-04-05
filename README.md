# html-email-and-php-mailing
HTML web form and PHP scripts to store user data and to send emails.
From the book - Head first php & mysql

MakeMeElvis - web application:

- The owner of this web application can store data persistenly in a MySQL database, and
also interact with that data through web forms. A combination of HTML pages, PHP scripts and
embedded SQL queries allow the a User to add themselves to a "newsletter signup" that's tranferred
to an email list located on a database.

- The owner of this web application can add and remove customers to/from his email list, as well
as send email messages to the entire list. 

In this web application we used:
- HTML web forms
- PHP Scripts
- SQL queries

- PHP variables and assigning them to the $_POST array form the HTML form
- PHP While loop to loop through the email list within the 
database to send everyone an email message regarding an update
- PHP built-in function mysqli_fetch_array() to retrieve a single row of data from the
results of a database query.

- sql statements such as: 
CREATE database_name; (elvis_store)
CREATE table_name; (email_list)
SELECT * FROM column_name; (email)
DESCRIBE table_name; 
DELETE FROM email_list WHERE email = 'email@someone.com';

In this web application:
addemail.html - web form where the user enter's their first , last name , and email to be added
to the mailing list
addemail.php - PHP script that adds the form data to the mysql database containing the user's
first name, last name, and email

For the owner of the web app:
Sendemail.html - web form for the owner of the app to fill out \
and to send all the users in the database an email

Sendemail.php - a PHP script that retrieves all the user's emails in the
database. Used by a while loop to loop through each row under the email column.
Once the email is sent they should receive a "Dear firstname, last name, and 
whichever text was written in the form. After the submit the owner will receive
a small confirmation

If a user no longer wants to receive emails the user or the owner can put their
email address into the form field of removeemail.html.

removeemail.php - PHP script that takes a query and uses DELETE FROM column
and a specific row of data and removes it, and in our case it removes any email
that is typed into the web form - from the database

![addemail](https://user-images.githubusercontent.com/12597841/113635018-6e777180-964a-11eb-8db2-eb9362d2e200.png)
![sendemail](https://user-images.githubusercontent.com/12597841/113635026-720af880-964a-11eb-8135-3fd8bf262e53.png)
![removeemail](https://user-images.githubusercontent.com/12597841/113635033-73d4bc00-964a-11eb-8205-97dfba7af5a0.png)
![email-in-action](https://user-images.githubusercontent.com/12597841/113635043-78997000-964a-11eb-9118-e0a4b61a325c.png)
