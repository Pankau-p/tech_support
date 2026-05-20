# COMP3541 Assignment 2, Part 2 – SportsPro MVC App

# Author: Yanek Keshavjee (T00678947)

# Course: COMP 3541 - Web Programming

# Date: 2026-05-19

# COMP 3541 - Web Programming

# Assignment 3 — SportsPro Technical Support

# Date: 2026-05-05

## Project Structure

```
Assignment_3/
├── controller
│   ├── admin
│   │   └── index.php
│   ├── assign_incident
│   │   └── index.php
│   ├── create_incident
│   │   └── index.php
│   ├── customer_manager
│   │   └── index.php
│   ├── display_incidents
│   │   └── index.php
│   ├── product_manager
│   │   └── index.php
│   ├── product_register
│   │   └── index.php
│   ├── technician
│   │   └── index.php
│   └── technician_manager
│       └── index.php
├── index.php
├── main.css
├── model
│   ├── assign_incident_db.php
│   ├── auth_db.php
│   ├── customer_db.php
│   ├── database.php
│   ├── display_incidents_db.php
│   ├── incident_db.php
│   ├── product_db.php
│   ├── register_product_db.php
│   └── technician_db.php
├── README.md
└── view
    ├── admin
    │   ├── login.php
    │   └── menu.php
    ├── customer
    │   ├── customer_form.php
    │   └── customer_list.php
    ├── display_incidents
    │   ├── assigned_incidents.php
    │   └── unassigned_incidents.php
    ├── incident_assign
    │   ├── assign_incident.php
    │   ├── select_incident.php
    │   ├── select_technician.php
    │   └── success.php
    ├── incident_create
    │   ├── create_incident.php
    │   ├── get_customer.php
    │   └── success.php
    ├── product
    │   ├── add_product.php
    │   └── product_list.php
    ├── register_product
    │   ├── email_login.php
    │   ├── product_select.php
    │   └── success.php
    ├── shared
    │   ├── database_error.php
    │   ├── error.php
    │   ├── footer.php
    │   ├── header.php
    │   └── under_construction.php
    ├── tech
    │   ├── login.php
    │   └── select_incident.php
    └── technician
        ├── add_technician.php
        └── technician_list.php

```

## Stack

- PHP (PDO)
- MySQL (tech_support database)
- Apache
- MVC architecture

## Running the Project

### Using Docker (Recommended)

Make sure Docker is installed on your system.
Open a terminal in the root project folder and run:

```bash
docker run --rm -it -p 8080:80 -v "$PWD:/var/www/html" php:8.2-apache
```

Open your browser and go to:

```
http://localhost:8080/Assignment_2/index.php
```

### Using NetBeans (Optional)

Open NetBeans and create a new PHP project pointing to the Assignment_2 folder. Run the project using NetBeans' built-in PHP server.

## Test Credentials

| User Type  | Email / Username       | Password |
| ---------- | ---------------------- | -------- |
| Admin      | admin                  | sesame   |
| Technician | (any technician email) | sesame   |
| Customer   | (any customer email)   | sesame   |

You can find technician and customer emails in the tech_support database using phpMyAdmin.

## Testing

Navigate to `http://localhost:8080/Assignment_2/index.php` to start. All user types log in from the home page.

### Task 1 — Create Incident (Admin)

- Log in as admin
- Click "Create Incident" from the admin menu
- Enter a customer email to look them up
- Select a registered product, enter a title and description, and submit

### Task 2 — Sessions for Register Product (Customer)

- Log in as a customer via the home page
- Register a product
- Session persists — closing and reopening the browser ends the session
- Logout button destroys the session and returns to the home page

### Task 3 — Error Handling

- All model classes use OOP with try/catch on every DB call
- All queries use prepared statements with named placeholders
- To test: modify a table name in any model query to trigger the database error page

### Task 4 — Assign Incidents (Admin)

- Log in as admin
- Click "Assign Incident" from the admin menu
- Select an unassigned incident
- Select a technician (open incident count shown per technician)
- Confirm and assign

### Task 5 — Update Incidents (Technician)

- Log in as a technician via the home page
- Displays information about all incidents
- Not yet been assigned to a technician.
- Confirm or refresh

### Task 6 — Display Incidents (Admin)

- Log in as admin
- Click "Display Incidents" from the admin menu
- View all unassigned incidents by default
- Click "View Assigned Incidents" to see assigned incidents with technician name and close date
- Incidents not yet closed show "OPEN" for the close date

### Task 7 — User Authentication

- All pages are protected by session checks
- Unauthorized users are redirected to the appropriate login page
- Three separate login flows: Admin, Technician, Customer
- Logout destroys the session and redirects to the home page
