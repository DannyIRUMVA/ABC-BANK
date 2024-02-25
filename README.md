# ABC Bank Laravel Application

Welcome to ABC Bank Laravel Application! This application provides a simple platform for users to manage their bank accounts, allowing them to deposit funds, withdraw funds, transfer money between accounts, and view their transaction statements.

## Features

- **Deposit:** Users can deposit funds into their accounts.
- **Withdraw:** Users can withdraw funds from their accounts.
- **Transfer:** Users can transfer funds between their own accounts or to other users' accounts.
- **Statement:** Users can view their transaction statements to keep track of their financial activities.

## Installation

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/your/repository.git
    ```

2. Navigate to the project directory:

    ```bash
    cd abc-bank-laravel
    ```

3. Install dependencies using Composer:

    ```bash
    composer install
    ```

4. Create a copy of the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate application key:

    ```bash
    php artisan key:generate
    ```

6. Configure your database connection details in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

7. Migrate the database:

    ```bash
    php artisan migrate
    ```

8. Run the development server:

    ```bash
    php artisan serve
    ```

9. Access the application in your web browser at `http://localhost:8000`.

## Usage

1. Register for an account or login if you already have one.
2. Once logged in, you can perform the following actions:
   - Deposit funds into your account.
   - Withdraw funds from your account.
   - Transfer funds between your accounts or to other users' accounts.
   - View your transaction statements to keep track of your financial activities.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue if you encounter any problems or have suggestions for improvements.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
