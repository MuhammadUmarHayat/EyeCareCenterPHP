<?php
include 'includes/header.php';//include footer

include 'includes/main_navbar.php';//include footer
include 'db_actions.php';//include database file

 //`name`, `to_email`, `from_email`,  `message`
 if(isset($_POST['send'])) //check contactus button is clicked or not
{
    $name= $_POST['name'];
   $to_email= "admin@admin.com";
   $from_email= $_POST['from_email'];
   $message= $_POST['message'];
   $saveData=sendContactUsMessage($name,$to_email,$from_email,$message);

   if($saveData)
   {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your message has been submitted successfully.
          <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
   }  

}

?>
    <!-- Hero Section -->
    <section class="hero bg-primary text-white text-center d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="container">
            <h1 class="display-4">Book Your Appointment Today</h1>
            <p class="lead">Easy and fast appointment booking with top doctors.</p>
            <a href="#booking" class="btn btn-light btn-lg">Book Now</a>
        </div>
    </section>
<!-- Services Section -->
<section id="aboutus" class="py-5 text-center">
    <div class="container">
        <div class="row">
            <!-- About Us Card -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">About Us</h5>
                        <p class="card-text">
                            Welcome to the XYZ Foundation's EyeCare Center, a beacon of hope for Sialkot and beyond. We are committed to providing free, high-quality eye care to those in need, ensuring everyone has access to essential vision services.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Our Vision Card -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Our Vision</h5>
                        <p class="card-text">
                            At XYZ Foundation, we believe clear vision is a fundamental right. Our EyeCare Center in Sialkot is dedicated to offering comprehensive eye exams and treatments free of charge, aiming to prevent vision loss and enhance our patients' quality of life.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Our Services Card -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Our Services</h5>
                        <p class="card-text">
                            Our EyeCare Center, staffed by experienced specialists, offers personalized care through a range of services, including:
                        </p>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action list-group-item-primary">Comprehensive eye exams</li>
                            <li class="list-group-item list-group-item-action list-group-item-light">Diagnosis and treatment of eye diseases</li>
                            <li class="list-group-item list-group-item-action list-group-item-light">Vision correction recommendations</li>
                            <li class="list-group-item list-group-item-action list-group-item-light">Follow-up care and patient history management</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Services Section -->
    <section id="services" class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Consultations</h5>
                            <p class="card-text">Get professional medical advice from expert doctors.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Medical Exams</h5>
                            <p class="card-text">Comprehensive medical exams for a healthy life.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Emergency Care</h5>
                            <p class="card-text">Round-the-clock emergency care services.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="doctors" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center">Meet Our Doctors</h2>
            <div class="row">
                <!-- Doctor 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="images/m3.jpg" class="card-img-top" alt="Doctor 1">
                        <div class="card-body">
                            <h5 class="card-title">Dr. John Doe</h5>
                            <p class="card-text">Specialist in Cardiology with over 15 years of experience.</p>
                        </div>
                    </div>
                </div>
                <!-- Doctor 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="images/w1.jpg" class="card-img-top" alt="Doctor 2">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Jane Smith</h5>
                            <p class="card-text">Pediatrician with a focus on child healthcare and wellness.</p>
                        </div>
                    </div>
                </div>
                <!-- Doctor 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="images/m3.jpg" class="card-img-top" alt="Doctor 3">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Emily White</h5>
                            <p class="card-text">Expert in Orthopedic Surgery, helping patients with bone and joint issues.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Patient Reviews Section -->
    <section id="reviews" class="py-5 text-center">
        <div class="container">
            <h2>What Our Patients Say</h2>
            <div id="carouselReviews" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <blockquote class="blockquote">
                            <p class="mb-0">"Dr. John Doe is amazing! He took the time to explain everything and made me feel at ease."</p>
                            <footer class="blockquote-footer">Jane Doe</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-0">"Dr. Jane Smith has been fantastic with my child. He’s caring and very knowledgeable."</p>
                            <footer class="blockquote-footer">Mark Johnson</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-0">"I couldn’t be happier with the surgery performed by Dr. Emily White. He’s a true professional."</p>
                            <footer class="blockquote-footer">Sarah Lee</footer>
                        </blockquote>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselReviews" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselReviews" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->

   

    <section id="contactus" class="bg-light py-5">
        <div class="container text-center">
            <h2>Contact Us</h2>
            <form class="mt-4" action="index.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" id="from_email" name="from_email" class="form-control" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="message" name="message" placeholder="Your message !" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <button type="submit" name="send" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <?php
include 'includes/footer.php';//include footer
?>