<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!--font style-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <!--swiper css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

      <!--custom css file link-->
      <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
<?php @include 'header.php'; ?>
<section class="home">

   <div class=" home-slider">

      <div class="wrapper">

         <div class=" slide" style="background:url('https://images.pexels.com/photos/205961/pexels-photo-205961.jpeg?auto=compress&cs=tinysrgb&w=600') no-repeat">
            <div class="content">
               <h3>Bagga-Bakers</h3>
               <p> When you’re marketing to bakery customers, you always need to be tempting them with something new
                              <br>
                               
                               <br>
                               
               </p>
               <a href="new.php" class="btn">discover more</a>
            </div>
         </div>

         

</section>
<section class="services">

   <h1 class="heading">our items</h1>

   <div class="swiper service-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="https://images.pexels.com/photos/3776942/pexels-photo-3776942.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
            <div class="content">
               <h3>Cookies</h3>
               <p>Cookies
Our sumptuous sugar cookies are a labor of love. 

                  <br>
                  They are made from scratch using only the finest ingredients and extracts.
                   <br>
                   </p>
               <a href="cookies.php" class="btn">cookies</a>
            </div>
         </div>


         <div class="swiper-slide slide">
            <img src="https://wallpaperaccess.com/full/1986112.jpg" alt="">
            <div class="content">
               <h3>Cake</h3>
               <p>Our cakes can be decorated to suit any occasion. 
                  <br>
                  From birthdays to weddings, our muffins are the perfect single-serving confection.
                   <br>
                    </p>
               <a href="cakes.php" class="btn">cakes</a>
            </div>
            </div>

            <div class="swiper-slide slide">
            <img src="https://images.pexels.com/photos/291528/pexels-photo-291528.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
            <div class="content">
               <h3>Pastries</h3>
               <p>pastry is essentially a type of bread and so many different 
                  <br>
                  types exist that there is no one way to classify them
                   <br>
                   </p>
               <a href="pastries.php" class="btn">pastries</a>
            </div>
         </div>
            
         <div class="swiper-slide slide">
            <img src="https://images.pexels.com/photos/3060255/pexels-photo-3060255.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
            <div class="content">
               <h3>Donuts</h3>
               <p>Donuts are usually deep fried from a flour dough, 
                  <br>
                  but other types of batters can also be used. Various toppings and flavorings are used for different types
                   <br>
                    photographers, of cours!</p>
               <a href="donut.php" class="btn">donuts</a>
            </div>
         </div>
      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>


<?php @include 'footer.php'; ?>

</div>







     <!--swiper jslink-->

     <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>


      <!--custom js file link-->
      <script src="script.js"></script>


</body>
</html>