<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "email_task";

$host = "x40p5pp7n9rowyv6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "qttw4qzhqu3ss9md";
$dbpassword = "e8ja4m41ahzkkns7";
$dbname = "vpdz7amoc6rffqcb";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

$msg = '';
$msgClass = '';
// Email form validation
if (filter_has_var(INPUT_POST, 'submit')) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  if (!empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $msg = 'Please use a valid email';
      $msgClass = 'alert-danger';
    } else {
      $msg = 'You have subscribed successfully';
      $msgClass = 'alert-success';
    }
  } else {
    $msg = 'Please fill in the field';
    $msgClass = 'alert-danger';
  }
  $select = mysqli_query($conn, "SELECT `email` FROM `Subscribers` WHERE `email` = '" . $_POST['email'] . "'");
  if (mysqli_num_rows($select)) {
    $msg = 'This email has been registered';
    $msgClass = 'alert-danger';
  };
  $query = "INSERT INTO Subscribers (email) VALUES ('$email')";
  if (mysqli_query($conn, $query)) {
    //echo 'Success';
    //    $msg = 'You have subscribed successfully';
    //    $msgClass = 'alert-success';
  } else {
    //echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    //    $msg = 'Your email has not been sent...';
    //    $msgClass = 'alert-danger';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css" />
  <!-- AOS CSS-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
  <!-- main css-->
  <link rel="stylesheet" type="text/css" href="style.css">

  <title>SpiceUp</title>
</head>


<body>
  <section id="header">
    <div class="container">
      <div class="pageheader pt-5" data-aos="fade-down">
        <img src=" images/SpiceUp.svg">
      </div>
      <div class="row">
        <div class="section1 col-md-6" data-aos="fade-left">
          <h1><span>Lets Go! Get Notified <br> When SPICEUP is Launched</span></h1>
          <p><span>Falling out of love, but looking for something to bring back the spark <br> and also help you remember how it felt like to have fun together? <br> SPICEUP app got you covered</span></p>
          <form action="index.php" method="POST">
            <?php if ($msg != '') : ?>
              <div style="width: 60%; height: 60px; text-align:center; margin:auto; margin-bottom:30px" class="alert <?php echo $msgClass; ?>">
                <?php echo $msg ?>
              </div>
            <?php endif; ?>
            <div class="form-group">
              <div class="d-flex" data-aos="fade-down">
                <input type="text" name="email" class="text-area email-form" style="color: #FF0000" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" placeholder="Enter Your E-mail"><br>
                <button type="submit" class="btn btn-small text-white" name="submit">Notify Me</button>
              </div>
            </div>
          </form>
        </div>
        <div class="section2 img-fluid col-md-6" data-aos="zoom-in" data-aos-duration="3000">
          <img src="images/pic.jpg" class="images" alt="">
        </div>
      </div>
    </div>
  </section>

  <!--How it works-->
  <section id="features">
    <div class="">
    <div class="container-box writing pt-5 mt-3">
      <h1><span>How SpiceUp Works</span></h1>
      <p><span>Customise and use your spiceUp application in 3 simple steps</span></p>
    </div>

    <div class="container">
      <div class="row">
        <div class="images img-fluid pt-5 pb-5  mb-5  px-5 col-md-5" data-aos="fade-down-left">
          <img src="images/Phone11-pro-back (10) 1.png" alt="" class="center">
        </div>
        <div class=" container write col-md-7 pb-5 mb-5 px-5">
          <div class="row pt-5 col-12">
            <h1 class="number" style="color: #212353"><strong>01</strong></h1>
            <div class="container writeup" data-aos="fade-left" data-aos-duration="3000">
              <h5 style="color: #212353"><span>Create An Acount</span></h5>
              <p><span>After downloading the Spice-Up application, the next <br> thing you have to do is create an account</span></p>
            </div>
          </div>
          <div class="row pt-5 col-12">
            <h1 class="number" style="color: #212353"><strong>02</strong></h1>
            <div class="container writeup" data-aos="fade-left" data-aos-duration="3000">
              <h5 style="color: #212353"><span>Customize Your Preferences</span></h5>
              <p><span>After creating an account and logging in, you have to <br> select you and your partner's preferences</span></p>
            </div>
          </div>
          <div class="row pt-5 col-12">
            <h1 class="number" style="color: #212353"><strong>03</strong></h1>
            <div class="container writeup" data-aos="fade-left" data-aos-duration="3000">
              <h5 style="color: #212353"><span>Tada! You're Good To Go</span></h5>
              <p><span>After creating your account and customizing your <br> preferences you're all good to go as we're watching out <br> for you.</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>

  
    <!--screens and designs -->
<section id="screens">
    <div class="container-box pt-5 mt-3" data-aos="fade-up">
      <h1><span> Screens and Designs</span></h1>
      <p><span>Some nice shots from the app design you’d love to see</span></p>
    </div>
     
     
   <div class="uk-child-width-1-3@m py-5 px-5 mx-auto" uk-grid uk-lightbox="animation: scale" data-aos="zoom-in" data-aos-duration="3000">
  <!--slider 01-->
    <div class="screen-img">
        <a class="uk-inline" href="images/Phone11-pro-back (11).png">
            <img src="images/Phone11-pro-back (11).png" alt="">
        </a>
    </div>
    <!--slider 02-->
    <div class="screen-img">
        <a class="uk-inline" href="images/Phone11-pro-back (10).png">
            <img src="images/Phone11-pro-back (10).png" alt="">
        </a>
    </div>
    <!--slider 03-->
    <div class="screen-img">
        <a class="uk-inline" href="images/Phone11-pro-back (15).png">
            <img src="images/Phone11-pro-back (15).png" alt="">
        </a>
    </div>
    <!--slider 04-->
    <div class="screen-img">
        <a class="uk-inline" href="images/Phone11-pro-back (9).png">
            <img src="images/Phone11-pro-back (9).png" alt="">
        </a>
    </div>
    <!--slider 05-->
    <div class="screen-img">
        <a class="uk-inline" href="images/Phone11-pro-back (14).png">
            <img src="images/Phone11-pro-back (14).png" alt="">
        </a>
    </div>
    <!--slider 06-->
    <div class="screen-img">
        <a class="uk-inline" href="images/Phone11-pro-back (13).png">
            <img src="images/Phone11-pro-back (13).png" alt="">
        </a>
    </div>
</div>

</section>


  <!--subscription-->
  <section id="header">
    <div class="container pt-2 px-5">
      <div class="row">
        <div class="section1 col-md-6 my-auto">
          <h1><span> Subscribe to our newsletter <br> and also get notified when <br> we launch</span></h1>
          <p><span>Subscribe to our newsletter to get more information about <br> Spice-Up and also get details about our launch dates</span></p>
          <form action="index.php" method="POST">
            <?php if ($msg != '') : ?>
              <div style="width: 60%; height: 60px; text-align:center; margin:auto; margin-bottom:30px" class="alert <?php echo $msgClass; ?>">
                <?php echo $msg ?>
              </div>
            <?php endif; ?>
            <div class="form-group">
              <div class="d-flex">
                <input type="text" name="email" class="text-area email-form" style="color: #FF0000" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" placeholder="Enter Your E-mail"><br>
                <button type="submit" class="btn text-white" name="submit">Notify Me</button>
              </div>
            </div>
          </form>
        </div>
        <div class="section2 col-md-6 pt-5 pb-5 px-5">
          <img src="images/Group 74.png" class="images" alt="">
        </div>
      </div>
    </div>
  </section>

  <!--footer-->
  <footer id="features">
    <div class="container">
      <div class="row">
        <div class="footer col-md-6 pt-5 mt-3 px-5">
          <h1><span> Coming Soon!</span></h1>
          <p><span>Get limited 1 week free try our features when we launch!</span></p>
        </div>
        <div class="buttons col-md-3 col-sm-6 pt-5 mt-3 px-5">
          <form class="form-inline">
            <button class="btn btn-small email-button" type="submit" style="background: #F063B8" ;>Learn more</button>
          </form>
        </div>
        <div class="buttons col-md-3 col-sm-6 pt-5 mt-3 px-5">
          <a class="brand" href="#"><img src="images/RequestDemo.png"></a>
        </div>
      </div>
      <div class="icons text-center col-md-12 pt-3">
        <i class="fa fa-twitter p-4"></i>
        <i class="fa fa-facebook-square p-4"></i>
        <i class="fa fa-youtube-play p-4" aria-hidden="true"></i>
      </div>
      <div class="copyright text-center col-md-12 pt-2">
        &copy; Copyright 2018 All rights reserved - Designed by Genevieve
      </div>
    </div>
  </footer>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/gsap.min.js"></script>
  <!--form JS-->
  <script src="php-form.js"></script>
  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit-icons.min.js"></script>
  <!--AOS JS-->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
       AOS.init( {
          duration: 1200
        });
  </script>
</body>

</html>
