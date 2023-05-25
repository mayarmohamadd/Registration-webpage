# Registration-webpage

Design a registration web page that inserts a user data into MySQL database, the details are as follow:
1. The form includes a user personal detail: full_name, user_name, birthdate, phone, address, 
password, confirm_password, user_image, and email. Use three appropriate client-side 
validations. (All fields mandatory, email and birthdate and full_name are correct types, 
password match with confirm_password and is at least 8 characters with at least 1 number 
literal and 1 special character) [Client-side VALIDATIONs]
2. Include a header and footer pages of your own design inside the registration webpage. 
3. Maintain a User’s table in the database to check if the username is not registered before. If the 
user inputs a username that exists before, the form alerts the user to choose another username
[Server-side VALIDATIONs]
4. Upload the user image (the image will be stored on the server, while the image name is stored 
in the database).


Project Structure:
a. “Header.php”: will include the header.
b. “Footer.php”: will include the footer.
c. “Index.php”: will be your main page and will include header and footer.
d. “DB_Ops.php”: will include your DB functions like connection and Insert and Select. 
Also, it will handle any checking server side.
e. “Upload.php”: will include your code for processing the uploaded image.
