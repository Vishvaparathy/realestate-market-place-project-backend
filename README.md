#  Real Estate Marketplace Backend (Sri Lanka)

This is the backend API for the Real Estate Marketplace platform tailored to Sri Lanka. Built with **Laravel**, it supports property listings, requirements, subscriptions, multilingual support, and more.

---

## Tech Stack

- Laravel 10.x
- MySQL
- RESTful API
- Laravel Sanctum (for auth)
- Role-Based Access Control (RBAC)
- Multilingual fields (English & Tamil)

---

##  Key Functionalities

###  User Roles 
- Guest Users
- Registered Users (can post & search)
- Admin (moderation, analytics)

###  Property Listings
- Post property for **Sale** or **Rent**
- Mark as **Owner** or **Agent**
- Upload multiple images
- Free & Premium listing support
- Multilingual Descriptions

###  Search & Filters
- Filter by property type, location, budget, bedrooms, etc.
- Premium listings shown on top

###  Property Requirements
- Buyers/Tenants can post requirements
- Filter requirements using budget, location, etc.

###  Subscriptions
- Free & Premium plans
- Premium = priority listing + more visibility
- Validity-based (monthly/yearly)

###  User Dashboard
- Manage Listings & Requirements
- View stats (Premium only)
- Save Listings & manage Subscriptions

###  Admin Panel
- Moderate listings
- Manage users & subscriptions
- View analytics (listings, leads, locations)

---

## Getting Started (Local Setup)

1. Clone the repository:
```bash
git clone https://github.com/Vishvaparathy/realestate-market-place-project-backend.git
cd realestate-market-place-project-backend

2. Install dependencies:
composer install

3. Copy .env and generate key:
cp .env.example .env
php artisan key:generate

4.Configure database in .env, then run:
php artisan migrate

5.Start the dev server:
php artisan serve



##  Screenshots

>Real estate market place database
>![Screenshot (772)](https://github.com/user-attachments/assets/510bb73c-866a-4fe8-823f-34699b33f01f)


>Users login & register
>![Screenshot (773)](https://github.com/user-attachments/assets/5cf90a76-581a-40a3-9cb2-9ebff7bfdf4d)


>Otp Tequest
>![Screenshot (774)](https://github.com/user-attachments/assets/4cb06298-727b-4b0a-b68b-b1de6a8e478a)


>Subscription Plans
>![Screenshot (775)](https://github.com/user-attachments/assets/8d56917a-5a55-4bf3-ab13-7ad0278d229e)


>Properties listing
>![Screenshot (776)](https://github.com/user-attachments/assets/4204e8c7-a833-4d98-b58d-6678ea38f189)


>Roles
>![Screenshot (777)](https://github.com/user-attachments/assets/7af92c3c-5b7b-4fcd-9ff0-5d29378de4b1)

>
>Some Screenshots of Testing
>Register
>![Screenshot (778)](https://github.com/user-attachments/assets/b827b790-f544-454c-b5a5-accffaafc2fd)
>login
><img width="960" alt="login" src="https://github.com/user-attachments/assets/b64955e1-9686-44af-8cf4-d22b457fcb9e" />
>get properties
>![Screenshot (779)](https://github.com/user-attachments/assets/113dc674-6c7b-4723-9a1d-2c697324f9cb)
>log out
>![Screenshot (780)](https://github.com/user-attachments/assets/41adaf74-8028-4e2c-92c6-e1d22114e3ad)
>otp request
><img width="960" alt="otp" src="https://github.com/user-attachments/assets/b7342a1f-67a5-40af-885a-d9970c24fa58" />
>Property listing
><img width="960" alt="create_property" src="https://github.com/user-attachments/assets/31e3498b-464e-4fda-a70b-610fcd98363a" />











