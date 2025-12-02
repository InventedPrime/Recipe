# Connecting To A Database

1. Make your [phpmyadmin](http://localhost/phpmyadmin/) page is running and working.

2. Create a database called `recipe` in it and import our [SQL-Export](./SQL_EXPORT.sql) into it.

3. copy and paste your [example-env](.env.example) into a `.env` file:

    ```bash
    cp .env.example .env # or mannually
    ```

4. open the `.env` file and update the following variables with your database credentials:

    ```env
    DB_DATABASE=recipe
    DB_USERNAME=your_database_username
    DB_PORT=your_database_port
    DB_PASSWORD=your_database_password (usually empty for local setups)

    ```
