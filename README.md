# Match-To-Be-One
A Social Networking Web Application with an Admin Dashboard, a Blog section, Friends Suggestion system and a Friendship System (Built With Laravel)

## Basic Functionalities
* There is a Super Admin. The Super Admin adds Admins.(The Super admin is superior to the admin)
* The only difference between the Super Admin and the Admin is that the super admin can add or remove admins.
* An Admin can Create and Delete blog posts
* An Admin can ban users
* Visitors can only read Blog posts. Only registered users can comment on blog posts.
* Registered users can see friends suggestions.
* A user can only chat with his or her friends.
* A user can unfriend any user

# Usage
## Database Setup
This web application uses MySQL database.

To use MySQL database, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

## Migrations
To create all the nessesary tables and columns, run the following command in Your Command Line Interface

    php artisan migrate

# Author
Tunji Ebifemi
