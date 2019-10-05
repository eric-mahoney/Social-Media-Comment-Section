
# User Comment Section

Creator: Eric Mahoney

Date: November 2018

About: The site features a main, static posting that users can comment to using an HTML form. The HTML form then submits to a PHP file which links to a MySQL database and stores the information. Afterwards, users can view all posted comments using PHP to display the user comments from the database.

## Built With:
**PHP** - used to connect the front-end to the database and display comments using advanced escaping techniques.

**MySQL** - used as main database language to store users, emails, and comments.

## About:

**index.html**: contains a main, static posting with an HTML form that sends the information using POST to a php file.

**postcomment.php**: retrieves the information from the HTML file and forwards the users comment to a MySQL database.

**postedcomments.php**: retrieves the user comments from the MySQL database and uses PHP advanced escaping to list all of the user information from the database.

**ascendedsort.php**: retrieves user comments using MySQL ascended order by sort.

**descendedsort.php**: retrieves user comments using MySQL descended order by sort.
