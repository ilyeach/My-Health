<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    session_start();
    if ($_SESSION["username"]) {
      include('head.php'); 

		?> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyHealth - Your Health Hub</title>
  <!-- Link Bootstrap CSS -->
  
</head>

<body>
  <!-- Navigation Bar -->
  <?php include('header.php'); ?>
<?php include ('menu.php');?>

  <!-- Hero Section -->
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="display-4">Welcome to MyHealth</h1>
      <p class="lead">Your Health Hub for a Better Lifestyle</p>
      <a href="#" class="btn btn-primary">Learn More</a>
    </div>
  </section>

  <!-- About Section -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="mb-3">About MyHealth</h2>
          <p>MyHealth is a comprehensive health platform that provides valuable resources and information to help you
            lead a healthier lifestyle. Whether you are looking for fitness tips, healthy recipes, or expert medical
            advice, MyHealth has got you covered.</p>
          <p>Our team of dedicated healthcare professionals is committed to bringing you the latest and most reliable
            health information, ensuring you make informed decisions about your well-being.</p>
        </div>
        <div class="col-lg-6">
          <img src="healthcare-image.jpg" alt="Healthcare Image" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="bg-light py-5">
    <div class="container">
      <h2 class="text-center mb-5">Our Services</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="fitness-image.jpg" alt="Fitness Service" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Fitness Tips</h5>
              <p class="card-text">Get access to a wide range of fitness tips and workout routines to stay active and
                maintain a healthy lifestyle.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="nutrition-image.jpg" alt="Nutrition Service" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Healthy Nutrition</h5>
              <p class="card-text">Discover delicious and nutritious recipes curated by our nutrition experts to help
                you eat well and feel great.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="medical-image.jpg" alt="Medical Service" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Expert Medical Advice</h5>
              <p class="card-text">Connect with qualified healthcare professionals for personalized medical advice and
                guidance.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-5">Contact Us</h2>
      <div class="row">
        <div class="col-md-6">
          <form>
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="col-md-6">
          <h5>Contact Information</h5>
          <p><strong>Address:</strong> 123 Health Avenue, City, Country</p>
          <p><strong>Email:</strong> info@myhealth.com</p>
          <p><strong>Phone:</strong> +1 (123) 456-7890</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p>© 2023 MyHealth. All rights reserved.</p>
    </div>
  </footer>

  <!-- Link Bootstrap JS -->
  
<?php 
  } else {
    header("Location: user_login.php");
    exit();
  }
?>