# House Rental System
A Laravel-based house rental system where tenants can list their properties for rent, and users can apply through an integrated chat system. Once both parties agree on terms, users can complete the rental application, and tenants can approve or reject requests to finalize the process.

## Required Configuration
- **PHP** >= 8.1
- **Laravel** 10

## Installation
Follow these steps to set up the project:

**Clone the Repository**:
```bash
git clone <repository-url>
cd <project-directory>
```

**Install Dependencies**:
Run the following commands to install the required packages:
```bash
composer update
composer install
```

**Generate Application Key**:
Generate the Laravel application key: This will update the APP_KEY in your .env file.
```bash
php artisan key:generate
```

**Set Up Storage Link**:
Create a symbolic link for the storage directory:
```bash
php artisan storage:link
```

**Configure Database**:
Update your .env file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

**Run Migrations**:
Initialize the database by running migrations:
```bash
php artisan migrate
```

To seed the database with initial data, use:
```bash
php artisan migrate:refresh --seed
```

## Commands

**Create a Controller with CRUD Operations**:
To generate a controller with CRUD methods, use:
```bash
php artisan make:controller <ControllerName> -r
```

**Create a Model with Migration**:
To create a model along with its migration file, use:
```bash
php artisan make:model <ModelName> -m
```

## Project Features

1. **Multi-Authentication System**
   - Admin, Tenant, and User roles are implemented.
   - Laravel Breeze is used for authentication scaffolding.
   - Email Verification is enabled for users.
   - Login is available for all roles.
   - Registration is available for Tenants and Users.

2. **Property Management**
   - Tenants can list their properties for rent.
   - Property CRUD operations.

3. **Chat System**
   - Integrated chat system for communication between tenants and users.

4. **Rental Application Process**
   - Users can apply for rental properties.
   - Tenants can approve or reject rental applications to finalize the process.

## Contributing
If you'd like to contribute to this project, please follow these steps:
1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Submit a pull request.

## License
This project is open-source and available under the MIT License.

## Support
For any issues or questions, please contact the development team or open an issue on the repository.
