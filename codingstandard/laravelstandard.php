<?php
//naming of controller should be in pascal case and in singualr form 

// CustomerController.php


// naming convention for routes in laravel 

//    /customers/25   it should be in plural
//    /customers/password-reset  // kebab case if two words in single aprt

// route name should be in snake_case
// customers.view and customers.password_reset


//migration convention

// 2021_03_19_033513_add_image_id_to_customers_table.php

// table name must be singualr and in snake case and name must be in alphabetical order


// column name doesnt include table name and in snake_case
// it should like first_name not user_first_name 


// for foreign key 

// use snake_case for foreign key 
//  use singular table name with id prefix 

// cousse_id 

// for foreign key 

// only use name as id 
// id      not customer_name_id


// model name must be in singualr form, pascal case and must be singular
// Customer  not Customers

// Model single relations[Has One, Belongs To]
// method name must be in singuallr form 
// should use camelcase 
// studentCourse 

// model all other relations [Ha Many, Other]
// model name must be in plural form 
// should use camelcase
//cartItems

// functions must be in snake_case 
// show_route

// variables name 
// camelcase 

// $customerMeassages

?>