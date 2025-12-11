# Connecting To A Database

1. Make your [phpmyadmin](http://localhost/phpmyadmin/) page is running and working.

-   You can optionally use workbench as well.

2. Create a database named Recipe in your sql client:

```sql
create database Recipe;
use Recipe;
```

3. Run our Sql [recipe_backup](./SQL_EXPORT.sql) into that database.

4. copy and paste your [example-env](.env.example) into a `.env` file:

    ```bash
    cp .env.example .env # or mannually
    ```

5. open the `.env` file and update the following variables with your database credentials:

    ```env
    DB_DATABASE=Recipe (leave it as Recipe)
    DB_USERNAME=your_database_username
    DB_PORT=your_database_port
    DB_PASSWORD=your_database_password (usually empty for local setups)
    CACHE_STORE=file (change it to file)
    SESSION_DRIVER=file (make sure its set to file)
    ```

6. Generate the application key by running the following command in your terminal:

    ```bash
    php artisan key:generate
    ```

7. Finally, run the following command to clear any cached configurations and ensure your application has the latest configuration:

    ```bash
    php artisan optimize:clear
    ```

8. Go back to the [README](./README.md) to continue the setup process.
