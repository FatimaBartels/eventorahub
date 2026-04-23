# EventoraHub 🎉

EventoraHub is a Laravel-based event booking platform where users can browse, book, and manage event reservations, while administrators can manage the entire system through an admin panel.

---

## 🚀 Features

### 👤 Guest Users

* View all available events
* Browse event details without signing in

### 🔐 Authenticated Users

* Register and log in (Laravel Breeze authentication)
* Book events
* Prevented from booking the same event multiple times
* Book multiple different events
* Confirm bookings and simulate payments (fake payment flow)

### 🧑‍💻 User Dashboard

* View all bookings
* Cancel bookings
* Update profile information

---

## 🛠️ Admin Panel

### 📊 Dashboard

* View total number of events
* View total bookings
* View number of active users

### 🎟️ Event Management

* Create new events
* Edit/update events
* Delete events

### 🗂️ Category Management

* Add categories
* Update categories
* Delete categories

### 👥 User Management

* View all users
* Update user information
* Delete users

### 📅 Booking Management

* View all bookings
* View bookings per user

---

## 🧰 Tech Stack

### Backend

* Laravel (PHP Framework)
* Laravel Breeze (Authentication)

### Frontend

* Blade Templates
* Tailwind CSS

### Database

* MySQL

### Tools & Environment

* Composer
* Node.js & NPM

---

## ⚙️ Installation

1. Clone the repository:

```bash
git clone https://github.com/FatimaBartels/eventorahub.git
```

2. Navigate into the project:

```bash
cd eventorahub
```

3. Install dependencies:

```bash
composer install
npm install
```

4. Setup environment:

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in `.env`

6. Run migrations:

```bash
php artisan migrate
```

7. Start the server:

```bash
php artisan serve
```

---

## 📌 Notes

* This project includes a simulated payment system (no real transactions)
* Users cannot book the same event multiple times
* Admin panel provides full CRUD operations for events, categories, users, and bookings

---

## 📄 License

This project is for educational purposes.
