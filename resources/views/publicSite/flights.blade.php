<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EliteStays - About Us</title>

  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="assets/css/fontawesome.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Inline CSS for Ultra-Modern Styling -->
  <style>
    :root {
      --primary-color: #2a4b7c;
      --secondary-color: #ffffff;
      --accent-color: #1a3a6b; /* Darker shade for hover */
      --text-muted: #6c757d;
    }
    body {
      font-family: 'Poppins', sans-serif;
    }
    .hero-section {
      position: relative;
      height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: var(--secondary-color);
      background: url('https://media.cntraveller.com/photos/64f4f95cb09a2e2dc3967e98/16:9/w_4928,h_2772,c_limit/1288609237') no-repeat center center fixed;
      background-size: cover;
      overflow: hidden;
    }
		.hero-section {
		position: relative;
		z-index: 0;
		color: white; /* Adjust text color for contrast */
		}

		.hero-section::before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: 1;
		background: rgba(255, 255, 255, 0.5); /* Blue with transparency */
		backdrop-filter: blur(0.1px); /* Optional: adds a blur effect */
		}

		.hero-section * {
		position: relative;
		z-index: 2;
		}

    .hero-content {
      position: relative;
      z-index: 2;
    }
    .hero-content h1 {
      font-size: 4rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 1.5rem;
    }
    .hero-content p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: 0 auto 2rem;
    }
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      color: var(--secondary-color);
      font-weight: 600;
      padding: 12px 30px;
      border-radius: 50px;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background-color: var(--accent-color);
      border-color: var(--accent-color);
      transform: translateY(-3px);
    }
    .btn-whites {
      background-color: var(--secondary-color);
      border: 2px solid var(--primary-color);
      color: var(--primary-color);
      font-weight: 600;
      padding: 12px 30px;
      border-radius: 50px;
      transition: all 0.3s ease;
    }
    .btn-whites:hover {
      background-color: var(--primary-color);
      color: var(--secondary-color);
      transform: translateY(-3px);
    }
    .section-heading {
      color: var(--primary-color);
      font-weight: 700;
      font-size: 2.5rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .story-section {
      background-color: #f1f3f5;
      padding: 80px 0;
    }
    .team-card {
      position: relative;
      overflow: hidden;
      border: none;
      border-radius: 15px;
      transition: transform 0.3s ease;
    }
    .team-card:hover {
      transform: scale(1.05);
    }
    .team-card img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 15px;
    }
    .team-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(42, 75, 124, 0.8);
      color: var(--secondary-color);
      padding: 20px;
      text-align: center;
      transform: translateY(100%);
      transition: transform 0.3s ease;
    }
    .team-card:hover .team-overlay {
      transform: translateY(0);
    }
    .team-overlay h5 {
      color: var(--secondary-color);
      margin-bottom: 0.5rem;
    }
    .back-to-top {
      background-color: var(--primary-color);
      color: var(--secondary-color);
      border-radius: 50%;
      padding: 12px;
      position: fixed;
      bottom: 30px;
      right: 30px;
      transition: all 0.3s ease;
    }
    .back-to-top:hover {
      background-color: var(--accent-color);
      transform: translateY(-5px);
    }
  </style>
</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="preloader"><span></span><span></span></div>
  </div>

  <!-- Main Wrapper -->
  <div id="main-wrapper">
    <!-- Navigation -->
    @include('layouts.nav')
    <div class="clearfix"></div>

    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-content">
        <h1>EliteStays</h1>
        <p>Your gateway to unforgettable hotel experiences. Book with confidence, stay with comfort.</p>
        <a href="{{ route('hotelFilter') }}" class="btn btn-primary">
          <i class="fa-solid fa-hotel me-2"></i>Discover Hotels
        </a>
      </div>
    </section>

    <!-- Our Story Section -->
    <section class="story-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <h2 class="section-heading">Our Story</h2>
            <p class="lead">
              EliteStays was born from a passion for travel and a vision to simplify hotel booking. 
              We partner with top hotels worldwide to offer you curated stays that blend luxury, 
              affordability, and authenticity.
            </p>
            <p>
              With a focus on innovation and guest satisfaction, our platform uses advanced technology 
              to match you with the perfect stay, whether you're planning a weekend getaway or a global adventure.
            </p>
            <a href="{{ route('hotelFilter') }}" class="btn btn-whites">
              <i class="fa-solid fa-search me-2"></i>Start Your Journey
            </a>
          </div>
          <div class="col-lg-6">
            <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/620730470.jpg?k=832b523963279e32a09adf4e4ff4e76996842d551069f00b495af27b194d15c2&o=&hp=1" alt="Hotel Story" class="img-fluid rounded-3 shadow-sm">
          </div>
        </div>
      </div>
    </section>

    <!-- Team Section -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Our Team</h2>
            <p class="text-muted mb-5">The visionaries behind your seamless travel experience.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="team-card">
              <img src="https://www.shutterstock.com/image-photo/smiling-confident-mature-businessman-leader-600nw-2014536944.jpg" alt="Jane Doe">
              <div class="team-overlay">
                <h5>Jane Doe</h5>
                <p>Founder & CEO</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="team-card">
              <img src="https://t3.ftcdn.net/jpg/09/74/17/84/360_F_974178495_uuv6g5vCKGwpa9zUKuJNzwLYIYBAEp5A.jpg" alt="John Smith">
              <div class="team-overlay">
                <h5>John Smith</h5>
                <p>Chief Technology Officer</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="team-card">
              <img src="https://assets.entrepreneur.com/content/3x2/2000/1676491332-GettyImages-1406172064.jpg?format=pjeg&auto=webp&crop=1:1" alt="Emily Brown">
              <div class="team-overlay">
                <h5>Emily Brown</h5>
                <p>Head of Customer Experience</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    @include('layouts.publicFooter')

    <!-- Back to Top -->
    <a id="back2Top" class="back-to-top" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>
  </div>

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>