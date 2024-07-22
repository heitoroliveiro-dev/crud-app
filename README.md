# crud-app
## A simple CRUD system using PHP, MySQL, HTML, and a bit of CSS


In this small project, a system was created using the main operations in MySQL (CRUD) and PHP. Initially, we have a database with the following characteristics::

![db-description](https://github.com/user-attachments/assets/17cefcb9-da13-465d-ad40-fc92d2d810c0)

With the database created, we moved on to the basic HTML structure, with appropriate links to style.css and Bootstrap.

On the index.php screen, we have the database content displayed in a table. $query receives the SELECT command.

Using a loop to traverse the database information, we fill the table with the content.

The ADD button opens a modal with a form to be filled out by the user, which sends the data via $_POST to 'insert.php' where the data will be processed and sent to the database.

Buttons were added for 'update' and 'delete' functions, both using $query and $result=mysqli($conn, $query);

This is my first project, and I am open to criticism and suggestions. Feel free to collaborate.
