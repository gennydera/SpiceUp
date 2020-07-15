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

    	$email = mysqli_real_escape_string($conn, $_POST['email']);

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
     <div class="pageheader pt-5">
     	<img src=" images/SpiceUp.svg">
     </div>
     <div class="row">
     <div class="section1 col-md-6">
     		<h1> Lets Go! Get Notified <br> When SPICEUP is Launched</h1>
     		<p>Falling out of love, but looking for something to bring back the spark <br> and also help you remember how it felt like to have fun together? <br> SPICEUP app got you covered, making your love for each other feel like <br> the wild west with enough sauce to bring back passion or <br> (passion once felt)</p>
          <form action="index.php" method="POST">
            <div class="form-group">
              <div class="d-flex">
  	            <input type="text" name="email" class="text-area" placeholder="Enter Your E-mail"><br>
  	              <button type="submit" class="btn text-white" name="submit">Notify Me</button>
              </div>
              <div class="text" style="color: #FF0000"><?php echo $errors['email']; ?></div>
            </div>
  	      </form>
       </div>
       <div class="section2 img-fluid col-md-6">
       	<img src="images/pic.jpg" class="images" alt="">
       </div>
     </div>
 </div>
  </section>

<!--How it works-->
       <section id="features">
        <div class="container-box pt-5 mt-3">
          <h1>How SpiceUp Works</h1>
          <p>Customise and use your spiceUp application in 3 simple steps</p>
        </div>
        <div class="container">
          <div class="row">
            <div class="images img-fluid pt-5 pb-5  mb-5  px-5 col-md-5">
            <img src="images/body.png" alt="" class="center">
          </div>
          <div class=" container write col-md-7 pb-5 mb-5 px-5">
            <div class="row pt-5 col-12">
              <h1><strong style="color: #212353">01</strong></h1>
              <div class="container">
                <h5 style="color: #212353">Create An Acount</h5>
                <p>After downloading the Spice-Up application, the next <br> thing you have to do is create an account</p>
            </div>
          </div>
          <div class="row pt-5 col-12">
              <h1><strong style="color: #212353">02</strong></h1>
              <div class="container">
                <h5 style="color: #212353">Customize Your Preferences</h5>
                <p>After creating an account and logging in, you have to <br> select you and your partner's preferences</p>
            </div>
          </div>
          <div class="row pt-5 col-12">
              <h1><strong style="color: #212353">03</strong></h1>
              <div class="container">
                <h5 style="color: #212353">Tada! You're Good To Go</h5>
                <p>After creating your account and customizing your <br> preferences you're all good to go as we're watching out <br> for you.</p>
            </div>
          </div>
        </div>
       </div>
      </div> 
</section>

<!--subscription-->
      <section id="header">
        <div class="container pt-2 px-5">
           <div class="row">
           <div class="section1 col-md-6 my-auto">
            <h1> Subscribe to our newsletter <br> and also get notified when <br> we launch</h1>
              <p>Subscribe to our newsletter to get more information about <br> Spice-Up and also get details about our launch dates</p>
           <form action="index.php" method="POST">
            <div class="form-group">
              <div class="d-flex">
                <input type="text" name="email" class="text-area" placeholder="Enter Your E-mail"><br>
                  <button type="submit" class="btn text-white" name="submit">Notify Me</button>
              </div>
              <div class="text" style="color: #FF0000"><?php echo $errors['email']; ?></div>
            </div>
          </form>  
       </div>
       <div class="section2 img-fluid col-md-6 pt-5 pb-5 px-5">
        <img src="images/body.png" class="images" alt="">
       </div>
     </div>    
        </div>
      </section>

      <!--footer-->
      <footer id="features">
        <div class="container">
          <div class="row">
            <div class="footer col-md-6 pt-5 mt-3 px-5">
            <h1> Coming Soon!</h1>
             <p>Get limited 1 week free try our features when we launch!</p>
           </div>
           <div class="buttons col-md-3 pt-5 mt-3 px-5">
             <form class="form-inline my-2 ">
                <button class="btn btn-book" type="submit" style= "background: #F063B8";>Learn more</button>
            </form>
          </div>
          <div class="buttons col-md-3 pt-5 mt-3 px-5">
              <a class="brand" href="#"><img src="images/RequestDemo.png"></a>
           </div>
          </div> 
        </div>
      </footer>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>