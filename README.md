# Youcan codgin challenge

## Installation

First, you have to clone the projecy by running this command:

```
git clone https://github.com/ChamaneSo/youcan_coding_challenge.git
```
then install the composer dependencies by running this command:

```
composer install
```
finnaly install the npm scripts with vue router:

```
npm install
npm install vue-router@4
```
## Running the app

Just run the two commands in separated CLIs:

```
php artisan serve
```
```
npm run dev
```

## CLI features

### Categories

#### Creation

To create a category throught CLI, you have just run this command:

```
php artisan categorye:create {name} {--parent=id}
```
##### Paramters

- name: the name of the category.
- parent: is an optional paramter, if the category has a prent specify its id with this paramter.

#### Deletion

To delete a category from database throught CLI, just run this command:

```
php artisan categorye:delete {id}
```
##### Paramters

- id: The is of the category that you want to delete.

### Products

#### Creation
To create a new product just run this command:
```
php artisan product:create {name} {description} {price} {image} {--category=id} {--category=id}
```
##### Paramters

- name: The name of the product.
- description: The description of the product.
- price: The price of the product.
- image: The path of the product image.
- categoy: this paramter is optional if the product not belongs to any category, but if the product blongs to a category or many categories you have to specify the ids.

#### Deletion
To delete a product just run this command:
```
php artisan product:delete {id}
```
##### Paramters

- id: the id of the product that you want to delete.

## WEB features

In the web side we have just function related to products.

### Index page
in this page we have a table to present the collection of the products with several functionalities:
- pagination.
- button to sort products by name in acsending order.
- button to sort products by price in ascending order.
- list of categories to filter products by a category.

### Creation page

In this page we have a form to create a new product.
