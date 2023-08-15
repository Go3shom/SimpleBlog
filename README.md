# SimpleBlog

SimpleBlog is mini-blogging system which includes:

## Authentication

- User Roles:
  - Admin:
    - Login into his account.

  - User:
    - Login into his account.

  - Guest:
    - Register/ Login.

## Middleware

- *isAdmin* is checking for the role of the user to be used in policies.

## Authorization, Permissions, and Policies

- Admin can do:
  - CRUD operations on **all** Categories.
  - CRUD operations on **all** Posts.
  
- User can do:
  - CRUD operations **only** on **his** own Categories.
  - CRUD operations **only** on **his** own Posts.

- Guest can:
  - **Only** Read Categories.
  - **Only** Read Posts.

## Route Grouping

- Guest can't:
  - Reach ```Create``` or ```Edit``` Route Endpoins for either Categories or Posts; he'll be redirected to **login** page instantly.

## Database Seeding

- A User with Admin previlleges.
- Default ```uncategorized``` Category.

Are seeded to the database to facilitate dealing with app.

## Validation

- Showing Errors -in errorBag- on the blade view when the inputs dosen't match the validation criteria.
- Using ```FormRequest``` classes to separate validation logic from controllers, and give it a **Single Responsibility** and **Separation of Concerns** (SoC).

### Upcomming features (TODO)

- Extracting all the repeated blade code into their own components for the sake of **reusability** and **DRY** principle.
- Make a **Profile** page including the user's history.
- Completely Separating Admin from User in everything (namespaces, controllers, routes, views), and make **guard**

### Fixing Bugs (BUG)

- On Updating records as an Admin, it binds the admin user_id instead of the user who creates the post.
