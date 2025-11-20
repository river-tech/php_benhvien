# Hospital Vaccination Management (PHP MVC)

This project is a plain PHP MVC port of the original JSP/Servlet hospital vaccination manager. Drop the folder into `/Applications/MAMP/htdocs/baitap`, start MAMP, and browse `http://localhost:8888/baitap/`.

## Project Layout
```
project/
├── public/          # Front controller + assets
├── app/
│   ├── core/        # Router, Controller base, DB helper, middleware
│   ├── controllers/ # Feature controllers
│   ├── models/      # PDO models
│   └── services/    # Business logic
├── views/           # Layout + feature views
├── routes.php       # Route definitions
├── config.php       # Base path + DB config
└── README.md
```

## Requirements
- PHP >= 8.1 with PDO_PGSQL extension
- PostgreSQL running with the following connection info:
  - DSN: `pgsql:host=localhost;port=9696;dbname=benhvien`
  - User: `admin`
  - Password: *(empty)*

## Database Tables
Ensure these tables exist (column names can be adjusted but should match controllers/services):
- `admin(id, username, password, fullname)`
- `diseases(id, name, description)`
- `vaccines(id, name, manufacturer, price, description)`
- `vaccine_disease(vaccine_id, disease_id)`
- `customers(id, fullname, phone, email, address, dob)`
- `vaccination_history(id, customer_id, vaccine_id, disease_id, dose_number, injected_at, next_schedule_at)`

Seed at least one admin record to access the system.

## Running Locally
1. Copy the folder to `/Applications/MAMP/htdocs/baitap`.
2. Update `config.php` if your base path differs (default assumes `/baitap`).
3. Import database structure + seed data.
4. Navigate to `http://localhost:8888/baitap/` and log in.

## Features
- Authentication with sessions and middleware guard
- CRUD for diseases and vaccines (with disease linking)
- Customer registration
- Vaccination scheduling with validation + 30-day auto follow-up
- AJAX endpoint `GET /api/vaccines?disease_id=` for dependent selects
- Vaccination history reporting
- Cost statistics per customer

Feel free to extend controllers, services, or views; just register new routes in `routes.php` and reuse the existing layout/components.
