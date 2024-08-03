<?php
// require('db.php');
$conn = mysqli_connect("localhost", "root", "", "blog_samples");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['send'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $address = $_POST['Address'];
   $city = $_POST['city'];


   $sql = "INSERT INTO `CHECKOUT`(`Name`, `Email`, `Number`, `Address`, `City`) VALUES
    ('$name','$email','$number','$address','$city')";


   if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

   mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <!--custom css file link-->
   <link rel="stylesheet" href="style.css">
   <link href="ok.css" type="text/css" rel="stylesheet" />

</head>

<body>
   <div class="container">
      <?php @include 'header.php'; ?>



      <section class="registeration">
         <form class="form" method="post" name="login">
            <div class="flex">

               <h1 class="login-title">Checkout Details</h1>
               <div>
                  <span> Name</span>
                  <input type="text" class="login-input" placeholder="enter your  name" name=" name" required>
                  <span>Email</span>
                  <input type="text" class="login-input" placeholder="enter your email" name=" email" required>
                  <span>number</span>
                  <input type="integer" class="login-input" placeholder="enter your number" name="number" required>
                  <span>Address</span>
                  <input type="address" class="login-input" placeholder="enter your Address" name="Address" required>
                  <span>Select City</span>
                  <select name="city">
                     <option value="LHR">Lahore</option>
                     <option value="KRH">Karachi</option>
                     <option value="MLT">Multan</option>
                     <option value="ISL">Islamabad</option>
                     <option value="FSD">Faislabad</option>
                     <option value="OKR">Okara</option>
                     <option value="MR">Muree</option>
                     <option value="PSWR">Peshawr</option>
                     <option value="QTA">Quetta</option>
                  </select>
                  <br><br>
                  <input type="submit" value="CHECKOUT" name="send" class="login-button">
                  <br><br>
                  <p class="link"><a href="home.php">Return to home</a></p>
               </div>


            </div>
         </form>
      </section>



      <section class="registeration">

         <form class="form" action="" method="post">
            <h1 class="login-title">CHECKOUT PAGE</h1>

            <div class="flex">

               <span> Name</span>
               <input type="text" class="login-input" placeholder="enter your  name" name=" name" required>

               <span>Email</span>
               <input type="text" class="login-input" placeholder="enter your email" name=" email" required>

               <span>number</span>
               <input type="integer" class="login-input" placeholder="enter your number" name="number" required>

               <span>Address</span>
               <input type="address" class="login-input" placeholder="enter your Address" name="Address" required>

               <span>Select City</span>
               <select name="city">
                  <option value="LHR">Lahore</option>
                  <option value="KRH">Karachi</option>
                  <option value="MLT">Multan</option>
                  <option value="ISL">Islamabad</option>
                  <option value="FSD">Faislabad</option>
                  <option value="OKR">Okara</option>
                  <option value="MR">Muree</option>
                  <option value="PSWR">Peshawr</option>
                  <option value="QTA">Quetta</option>
               </select>
               <br>

               <input type="submit" value="CHECKOUT" name="send" class="login-button">

            </div>


         </form>
      </section>

      <?php @include 'footer.php'; ?>

   </div>

</body>

</html>