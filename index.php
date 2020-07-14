<?php
//connect to database
$conn = mysqli_connect('localhost', 'genevieve','test1234', 'accounts');

//check connection
if (!$conn) {
	echo 'Connection error: ' . mysqli_connect_error();
}

//close connection 
mysqli_close($conn);

 $errors = array('email' => '' );
 
 if (isset($_POST['submit'])) {
 	//echo htmlspecialchars($_POST['email']);

 	//check email
 	if (empty($_POST['email'])) {
 	  $errors['email'] = 'An email is required <br />';
 	} else{
 		$email = $_POST['email'];
 		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 			$errors['email'] = 'email must be a valid email address';
 		}
    }

    if (array_filter($errors)) {
        //echo 'errors in the form';
    } else {
     // echo 'form is valid';
    	header('Location: index.php');
    }
} //end of POST check

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="style.css">

	<title>SpiceUp</title>
</head> 


<body>
  <section id="header">
	<div class="container">
     <div class="pageheader">
     	<img src=" images/SpiceUp.svg">
     </div>
     <div class="row">
     <div class="section1 col-md-6">
     		<h1> Lets Go! Get Notified <br> When SPICEUP is Launched</h1>
     		<p>Falling out of love, but looking for something to bring back the spark <br> and also help you remember how it felt like to have fun together? <br> SPICEUP app got you covered, making your love for each other feel like <br> the wild west with enough sauce to bring back passion or <br> (passion once felt)</p>
          <form action="index.php" method="POST">
  	      <input type="text" name="email" class="text-area" placeholder="Enter Your E-mail"><br>
  	      <div class="text" style="color: #FF0000"><?php echo $errors['email']; ?></div>
  	      <button type="submit" class="btn text-white" name="submit">Notify Me</button>
  	      </form>
       </div>
       <div class="section2 col-md-6">
       	<img src="images/pic.jpg" class="images" alt="">
       </div>
     </div>
 </div>
  </section>

<!--How it works-->
       <section id="features">
          <h1>How SpiceUp Works</h1>
</section>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>