# zoek-assignment
# TASK - 1 (MINI-CRM)
 - Basically, create a project to manage companies and their employees. Mini-CRM.
 -  Basic Laravel Auth: ability to log in as administrator
 -  Use database seeds to create first user with email admin@admin.com and password “password”
 -  CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and
   Employees.
 -  Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100),
   website
 -  Employees DB table consists of these fields: First name (required), last name (required), Company
   (foreign key to Companies), email, phone
 -  Use database migrations to create those schemas above
 -  Store companies logos in storage/app/public folder and make them accessible from public
 -  Use basic Laravel resource controllers with default methods – index, create, store etc.
 -  Use Laravel’s validation function, using Request classes
 -  Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
 -  Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register

# TASK - 2 (FizzBuzz)
 In the Laravel app, create a page that prints the numbers from 1 to 100.
 But for multiples of three output “Fizz” instead of the number and for the multiples of five
 output “Buzz”.
 For numbers which are multiples of both three and five output “FizzBuzz”.
 - one can check it on <hostname>/fizz-buzz

# TASK - 3 (Valid Triangle)
 - Create a page that clearly states what it does (checks if the 3 lengths would form a valid triangle) and
   how to use the app.
 - Use the above information to check if what they enter is valid or not (all side lengths will be less than
   the combined length of the other 2 sides).
 - one can check it on url <hostname>/validate-triangle

# Additional 
 - Docker file added for simple docker deployment
 - step to set up docker instead as follows:
    - docker-compose up
    - docker-compose exec app php artisan key:generate
    - docker-compose exec app php artisan config:cache
    - docker-compose exec app php artisan migrate:fresh --seed
    - docker-compose down
