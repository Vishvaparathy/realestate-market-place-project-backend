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


## Screenshots

###  Realestate market place database
![realestate_marketplace_database](https://github.com/user-attachments/assets/4eec34e2-c4ce-45fe-8648-8b6f393eb53e)


###  User Login & Registration
![user_login_register](https://github.com/user-attachments/assets/d2fed5b3-237d-406a-8679-6422524a949b)


###  Property Listings 
![property_listing](https://github.com/user-attachments/assets/b23c93f6-3434-4cbb-90bc-e1d95b7ff8a6)


###  Subscription plans
![subscription_plans](https://github.com/user-attachments/assets/13dd8fc7-4bca-4302-84c6-64462b4b2dca)


### Otp Request
![otp_request](https://github.com/user-attachments/assets/87cd38e5-16f8-4e0a-8858-9930fcce3f7f)


###  Uesr Roles
![roles](https://github.com/user-attachments/assets/64a13066-e75e-4c68-9c52-40e15e2889d2)


###  Registration testing
![register](https://github.com/user-attachments/assets/950eccb4-05a1-4bba-952f-3a412445d747)


### Login testing
<img width="960" alt="login" src="https://github.com/user-attachments/assets/97105d1a-1ee5-4a4f-9f0b-cf0b157755d4" />


###  Otp request testing
<img width="960" alt="otp" src="https://github.com/user-attachments/assets/91110c05-55a7-4e1e-a438-9eae043969a2" />


###  Create propert testing
<img width="960" alt="create_property" src="https://github.com/user-attachments/assets/5b1512fd-78b7-4dbe-a084-06c9ecdf0d2f" />


###  Property listing testing
![property_testing](https://github.com/user-attachments/assets/17a7a450-6497-4aae-b3c5-e9f03be13076)


###  Logout testing
![logout](https://github.com/user-attachments/assets/54734644-a681-4acb-a023-be8383c59dca)
