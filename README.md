
### Project Preparation
```
    git clone https://github.com/wi11z/orsms.git
```

### Install Project Dependancies
```
    composer install
```

### Database Preparation
    
   Rename .env.example to .env 
   Add your database credentials to .env 
 
 Create project database
 ```
    php artisan migrate
 ```
 
 Then populate the database with required data through seed
 ```
    php artisan db:seed
 ```
 ### Create superuser or the adminstrator of the system
 ```
    php artisan make:admin
 ```
 
 After creating superuser you can login normal through a system.
 
 ### Hosting the system
 ```
    php artisan serve
 ```
 
 Then go to the localhost:<port-number> though your browser
    
 # Note
    
   Everytime you pull from this repo makesure to:-
   ```
       php artisan migrate
   ```
   and
   ```
       php artisan db:seed
   ```

