<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">MediConnect
                    </h4>
                    <p class="mb-4">We are dedicated to providing high-quality healthcare services with expert doctors and advanced facilities. Your health is our priority.</p>
                   
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Services</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Doctors</a>
                        <a class="text-light" href="#"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Contact Us</h4>
                    <div class="d-flex flex-column justify-content-start">
                    <p class=""><i class="fa fa-angle-right me-2"></i> 123 Health Street, City, Country</p>
                    <p class=""><i class="fa fa-angle-right me-2"></i> +91 98765 43210</p>
                    <p class=""><i class="fa fa-angle-right me-2"></i> contact@healthcare.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Follow Us</h4>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Mediconnect</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-primary" href="#"> Sonia Kumari </a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

<!-- Add FontAwesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



<!-- jQuery (Required for AJAX) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $("#appoint_Form").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        $.ajax({
            type: "POST",
            url: "submit_appointment.php", // Change to your PHP file
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                $("#response").html(response); // Show success/error message below form
                $("#appoint_Form")[0].reset(); // Reset form after successful submission
            },
            error: function() {
                $("#response").html("<p style='color:red;'>Something went wrong. Please try again.</p>");
            }
        });
    });
});
</script>




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>