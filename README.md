# Bookstore Project (Study & Basic CRUD)

## Project Overview
This project is a simplified web application developed to demonstrate basic CRUD (Create, Read, Update, Delete) operations and fundamental web development concepts using the Laravel framework. It serves as a study aid to understand how to build data-driven applications, manage routes, and handle user input effectively.

## Scope of Problem
The primary objective is to create a functional system for managing a bookstore's inventory. The application focuses on the core necessity of maintaining a digital record of books.

### Key Features
*   **Public Access**: Users can browse the list of available books.
*   **Admin Management**: Restricted area for administrators to perform CRUD operations on the book inventory.
*   **Authentication**: Basic login system to secure administrative features.

### Core Entities
*   **Book**: The central entity containing data such as Title, Author, Year, Price, Stock, and Category.
*   **Category**: Classification for books (e.g., Fiction, Science).

## Initial Implementation Plan

### Phase 1: Setup & Configuration
- [x] **Initialize Project**: Create new Laravel application.
- [x] **Database Setup**: Configure `.env` and established database connection.
- [x] **Dependencies**: Install TailwindCSS and Alpine.js for frontend styling and interactivity.

### Phase 2: Database Layer
- [ ] **Migrations**: 
    - Create `categories` table.
    - Create `books` table with foreign key `category_id`.
- [ ] **Seeding**: Generate dummy data using Factories to populate the database for testing.

### Phase 3: Backend Logic (MVC)
- [ ] **Model**: Define `Book` model and fillable properties.
- [ ] **Controller**: Implement `BookController` handling 7 standard resource actions:
    - `index()`: List all books.
    - `create()`: Show form to add new book.
    - `store()`: Save new book to database.
    - `show()`: Display specific book details.
    - `edit()`: Show form to update book.
    - `update()`: Commit changes to database.
    - `destroy()`: Delete book.
- [ ] **Routing**: Define web routes using `Route::resource`.

### Phase 4: Frontend Development
- [ ] **Views**: Create Blade templates for the application layout.
    - `index.blade.php`: Table view of books with Actions column.
    - `create.blade.php` & `edit.blade.php`: Forms for input with validation error display.
- [ ] **Feedback**: Implement flash messages for success/error notifications using functionalities like toaster.

### Phase 5: Testing & Review
- [ ] **Manual Testing**: Verify flow of creating, editing, and deleting a book.
- [ ] **Validation Testing**: Ensure forms reject invalid inputs (e.g., negative prices).

## How to Run Locally

1. **Clone the repository**
2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```
3. **Setup Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Run Database Migrations**:
   ```bash
   php artisan migrate --seed
   ```
5. **Start Dev Server**:
   ```bash
   composer run dev
   ```
