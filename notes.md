Cloning a project

1. git clone https://github.com/GitNabs/library-app.git
2. cp .env.example .env
3. composer install - install the packages & vendor directory will pop out in the composer.json
4. npm install - install the packages on the package.json
5. php artisan key:generate
6. php artisan migrate



Generate factories
php artisan make:factory BookFactory --model=Book

Generate migration
php artisan make:migration "add timestamps to categories table" or add_timestamps_to_categories_table




Optimization
1. N+1 Query Problem - a performance problem in which the application makes database queries in a loop
 1.1. Solve thru eager loading



Always re-run the thinker when you have hard coded/manually updates a database or in your codebase

Findings:
1. @error('isbn') only accepts non array values



.class-name + tab = <div class="class-name"></div>



**Gmail set up**
1. set up the `.env`
    - ref: `https://medium.com/@agavitalis/how-to-send-an-email-in-laravel-using-gmail-smtp-server-53d962f01a0c`
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=ENTER_YOUR_EMAIL_ADDRESS(GMAIL)
MAIL_PASSWORD=ENTER_YOUR_GMAIL_PASSWORD
MAIL_ENCRYPTION=ssl
```
    - username: your email
    - password: your `App Password`

- env(/** .env key */)
    - example: env('APP_NAME') or env('MAIL_PASSWORD')

- generate the table for the notifications
    - php artisan notifications:table
- in order for a user to receive a notification import the class `Illuminate\Notifications\Notifiable`

https://spatie.be/docs/laravel-permission/v5/basic-usage/middleware
https://spatie.be/docs/laravel-permission/v5/basic-usage/basic-usage
- create a role
    ```php
    Role::create(['name' => 'Role Name'])
    ```
- attach a role to a user
    - get the user
    - assignthe role with assignRole method
    ```php
    $admin = User::first();
    $admin->assignRole('Administrator');
    ```