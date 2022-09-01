# laravel_products
A project that was done in 2 days as a job test. 

-This project has
 - Login/Register/Logout functionality.
 - CURD functionality on the products (create was not reqiured since we pull the data from a json).
 - Display products, serach products, and display by category.
 - Add, delete, update cart.
 
 Technologies used:
  - Composer and Laravel
  - PHP and MySQL using XAMPP
  - JetStream (for authentication mainly)
  - bootstrap, jQuery, and Ajax
  - HTML (php Blade) and CSS
  
  How to run the application:
    - Make sure you have your database up ( I used XAMPP)
    - Run the project ( using php artisan serve)
    - Use the the following routes to seed the data in order:
      - http://127.0.0.1:8000/api/get-categories
      - http://127.0.0.1:8000/api/get-products
      
  Notes:
   - I was rushing this project to submit it on time. I didn't fully secure the website, spend time in making it looking beautiful, and work on validation. However, I had 
   some examples of validation (In register and product edit) and security by using authentication (Admin Dashboard) and authorization (login).
   
 - Here are some resources I used during making this project:
  - https://laravel.com/docs/9.x/installation
  - https://www.youtube.com/watch?v=d8YgWApHMfA (For Jetstream)
  - https://jetstream.laravel.com/2.x/introduction.html
  - https://getbootstrap.com/
  - https://www.itsolutionstuff.com/post/laravel-shopping-add-to-cart-with-ajax-exampleexample.html
