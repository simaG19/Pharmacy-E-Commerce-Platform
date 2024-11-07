<p?php
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Medilab Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <!-- <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
     
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
  <!-- Uncomment the line below if you also wish to use an image logo -->
  <img src="https://assets.zyrosite.com/AoPvGVjbgMc2pORR/wellmed-pharmacy-logo-01-mjEv9p7526U5JzjY.png"
       alt=""
       style="width: 150px; height: auto;">
</a>


        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php" >Home<br></a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="concelt.php">Conceltation</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        
        <style>
        /* Center the navmenu container */
#navmenu {
  display: flex;
  justify-content: center;
}

/* Remove any default padding or margin from ul */
#navmenu ul {
  display: flex;
  list-style-type: none;
  padding: 0;
  margin: 0;
}

/* Space out each list item */
#navmenu ul li {
  margin: 0 15px; /* Adjust the spacing between menu items */
}

/* Optional: Style for links */
#navmenu ul li a {
  text-decoration: none;
  color: inherit;
  font-weight: bold;
}

/* Mobile nav toggle button positioning */
.mobile-nav-toggle {
  position: absolute;
  right: 20px; /* Position to the right side */
  top: 20px;   /* Adjust vertical positioning */
}
</style>

        <a class="cta-btn d-none d-sm-block" href="#appointment">Upload Prescription</a>

      </div>

    </div>

  </header>

  <main class="main">

    
    
    <!-- Contact Section -->
    <section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Send Your Prescription</h2>
    </div>

    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>

    <div class="contact-container">
        <form method="POST" action="db_connect.php" enctype="multipart/form-data" class="contact-form">
            <div class="form-row">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
            </div>

          

            <div class="form-group mt-3">
                <input type="phone" class="form-control" name="phone" placeholder="Phone" required>
            </div>

            <div class="form-group mt-3">
                <label for="image">Upload or Take a Picture of Prescription</label>
                <input type="file" name="image" class="form-control border-0 bg-light" id="image" accept="image/*" onchange="previewImage(event)" required>
            </div>

            <div class="preview-container mt-3">
                <img id="image-preview" alt="Image Preview" style="display: none; max-width: 100%; height: auto; border-radius: 8px; border: 1px solid #ddd;" />
            </div>

            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="3" placeholder="Additional Notes (optional)"></textarea>
            </div>

            <div class="form-group mt-3">
                <input type="checkbox" name="terms" required>
                <label for="terms">I confirm that this prescription is valid.</label>
            </div>

            <div class="form-group mt-3">
                <input type="submit" value="Submit Prescription" class="btn btn-primary btn-block">
            </div>

            <div id="loading" style="display: none;">Submitting...</div>
        </form>
    </div>
</section>

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('image-preview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.style.display = 'block';
    }

    document.querySelector('.contact-form').addEventListener('submit', function() {
        document.getElementById('loading').style.display = 'block';
    });
</script>

<!-- <div class="camera-container mt-3">
  <button type="button" onclick="startCamera()">Take a Picture</button>
  <video id="camera-stream" autoplay playsinline style="display: none; max-width: 100%; height: auto;"></video>
  <canvas id="capture-canvas" style="display: none;"></canvas>
</div> -->
<!-- 
<script>
  let videoStream;

  // Preview uploaded image
  function previewImage(event) {
    const preview = document.getElementById('image-preview');
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block'; // Show the image
      };

      reader.readAsDataURL(file);
    }
  }

  // Start the camera
  function startCamera() {
    const video = document.getElementById('camera-stream');
    video.style.display = 'block';

    navigator.mediaDevices.getUserMedia({ video: true })
      .then(stream => {
        video.srcObject = stream;
        videoStream = stream;
      })
      .catch(error => {
        alert('Camera not accessible: ' + error.message);
      });
  }

  // Capture image from the video stream
  function captureImage() {
    const video = document.getElementById('camera-stream');
    const canvas = document.getElementById('capture-canvas');
    const context = canvas.getContext('2d');
    
    // Set canvas dimensions to video dimensions
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    // Draw the current frame from the video onto the canvas
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    
    // Convert the canvas image to data URL and show it in the preview
    const preview = document.getElementById('image-preview');
    preview.src = canvas.toDataURL('image/png');
    preview.style.display = 'block';

    // Stop the video stream
    videoStream.getTracks().forEach(track => track.stop());
    video.style.display = 'none';
  }
</script>
 -->

    
  </form>
</div>


<style>
    /* Center the form container */
.contact-container {
  max-width: 600px;
  margin: 0 auto;
  background-color: #f9f9ff; /* Light background color */
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Shadow for depth */
  text-align: center;
}

/* Center text in headings */
.contact-container h2 {
  font-size: 1.8rem;
  color: #333;
  margin-bottom: 10px;
}

/* Style for form rows */
.form-row {
  display: flex;
  gap: 10px;
}

.col {
  flex: 1;
}

.form-control {
  height: 45px;
  border-radius: 8px;
  border: 1px solid #ddd;
  padding: 0 15px;
  box-sizing: border-box;
}

textarea.form-control {
  resize: none;
}

/* Button styling */
.btn-primary {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 20px;
  font-size: 1rem;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #0056b3;
}

</style>




      </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">WellMed</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p> Addis Ababa, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+251-929190911</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Conceltation</a></li>
            <li><a href="#">Upload Precribtion</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Delivery</a></li>
            <li><a href="#">Conceltation</a></li>
            <li><a href="#">shoping</a></li>
            
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Nana Digita Ads</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
      
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>