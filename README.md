# crud-generator-package
Package to generate crud operations, model, relations, resource, form request, routes and more

## Installation
  Install the package via Composer:
  ```
  composer require elngar/crud_generator
  ```

## Usage
  * To Generate Basic Controller, FormRequest, Trait:
    ``` 
    php artisan make:rest-api-base
    ```
  * To Generate Auth Controller, FormRequest, Routes, Resource:
    ``` 
    php artisan make:rest-api-auth
    ```
  * To Generate Crud Model, Controller, FormRequest, Routes, Resource:
    ``` 
    php artisan make:rest-api-crud modelName
    ```
    
## One Time Commands:
  * Take care and use it only one time:
    ``` 
    php artisan make:rest-api-base
    php artisan make:rest-api-auth
    ```
  * using it again:   
    - will not duplicate files but will duplicates injected code (in routes/api.php for example).
   
## Upcoming Changes:
  1. relations between modes
  2. crud for web apps
  
