
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .thank-you-message {
            display: none;
            margin-top: 20px;
        }
        .navbar {
        padding: 0rem 0;
        }

        .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        }

        .nav-link {
            font-size: 1.6rem;
            font-weight: bold;
            transition: color 0.3s;
            margin-right: 1.5rem;
            color: black;
            }

        .nav-link:hover {
        color: brown !important;
        }

        @media (max-width: 991.98px) {
        .navbar-collapse {
            text-align: center;
        }
        }
        .about-section .card-title {
        font-weight: bold;
        font-size: 1.9rem;
        }

        .about-section .card-text {
            font-size: 1.3rem;
        }

        .about-section .card {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .welcome {
            text-align: center;
            font-family: 'Times New Roman', serif;
            font-size: 30px;
            color: black;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            height: 90vh;
            width: 100vw;
            border-radius: 0px;
        }

        .welcome::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: rgba(0, 0, 0, 0.2); */
            z-index: 1;
        }

        .welcome-content {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            color: black;
            font-weight: bold
        }

        .welcome h1 {
            font-weight: bolder;
        }

        .custom-card {
            border-radius: 15px;
            overflow: hidden;
        }

        .custom-card img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .custom-card .card-body {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 0px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .navbar .church-management {
            font-size: 20px;
            font-weight: bold;
        }


        .social {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social a {
            margin: 0 20px;
            transition: color 0.3s;
            margin-bottom: 40px;
        }

        .social a i {
            color: black;
            font-size: 24px;
        }

        .social a:hover i {
            color: brown;
        }

        .section.contact .card-body i {
            color: black;
            font-size: 24px;
            transition: color 0.3s;
        }

        .section.contact .card-body i:hover {
            color: brown;
        }

        .contact-card {
                border-radius: 15px;
                max-width: 80%;
                margin: auto;
        }

        .contact-card .card-body {
            padding: 20px;
        }

        .nav-item.dropdown:hover .dropdown-menu {
             display: block;
        }

        .section.welcome {

  /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); */
}




    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">Church Management</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Solution
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#member management">Members Management</a>
                  <a class="dropdown-item" href="#contribution management">Contribution Management</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <section id="welcome" class="section welcome" style="background-image: url('https://media.istockphoto.com/id/948151812/photo/hands-reach-for-the-sky-to-light-in-the-form-of-a-cross.webp?b=1&s=170667a&w=0&k=20&c=YvX8p3pVkIDdt-_4icCcsUBVAOAkBMhC4LeqyUzz_nI='); margin-bottom: 55px;">
        <div class="welcome-content">
            <h1 style="color: bLACK;">Church Management System</h1>
            <p style="color: black;">A complimentary, adaptable system dedicated to organizing church members and managing church finances with simplicity.</p>
        </div>
      </section>

    <section id="about" class="about-section" style="margin-top: 55px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3 custom-card">
                        <img src="https://media.istockphoto.com/id/471627397/photo/girl-with-hat-has-its-hands-in-prayer-position.webp?b=1&s=170667a&w=0&k=20&c=E18RU2BlCDUAMQf7Bpl2cviFsTtaub3aY9lWCjc3HMk=" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Transparency</h5>
                            <p class="card-text">Our complimentary church management system offers a comprehensive solution tailored to the unique needs of churches. With its adaptable design, it seamlessly organizes church members and streamlines the management of church finances with simplicity.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 custom-card">
                        <img src="https://media.istockphoto.com/id/2070403046/photo/holy-bible.webp?b=1&s=170667a&w=0&k=20&c=fh-MzZW3FeUNBOQTPKx5Hv-Cdzao23ZYkkFqFNngfVY=" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Effectiveness</h5>
                            <p class="card-text">From tracking membership data to managing donations and expenses, our system provides robust tools to empower church administrators and leaders.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 custom-card">
                        <img src="https://images.unsplash.com/photo-1522158637959-30385a09e0da?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fHdvcnNoaXAlMjBoZCUyMGltYWdlc3xlbnwwfHwwfHx8MA%3D%3D" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Efficiency</h5>
                            <p class="card-text">With intuitive features and user-friendly interfaces, it's easy for anyone to navigate and utilize effectively. Say goodbye to cumbersome spreadsheets and paperwork – our system offers a modern, efficient solution to optimize church operations and foster greater stewardship.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="signup-section mb-5" id="signup" style="margin-top: 55px;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-black"></i>
                    <h2 class="text-black mb-5">Subscribe to receive updates!</h2>
                    <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                            <div class="col-auto"><button class="btn btn-primary bg-success border-0" id="submitButton" type="submit">Notify Me!</button></div>
                        </div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is required.</div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.</div>
                    </form>
                    <div class="thank-you-message text-success">
                        Thank you for subscribing!
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="contact" class="section contact bg-success" style="margin-top: 25px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card contact-card mb-3">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt"></i>
                            <h4>Address</h4>
                            <hr>
                            <div>
                                <a href="https://maps.app.goo.gl/u8KbcW35rRzb76836" target="_blank" style="color: inherit; text-decoration: none;">001000-NAIROBI</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-card mb-3">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope"></i>
                            <h4>Email</h4>
                            <hr>
                            <div><a href="mailto:hellen@gmail.com">hellen@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-card mb-3">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt"></i>
                            <h4>Phone</h4>
                            <hr>
                            <div>+254 (000) 704248752</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="social d-flex justify-content-center " >
                <a href="#!"><i class="fab fa-twitter"></i></a>
                <a href="#!"><i class="fab fa-facebook-f"></i></a>
                <a href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </div>

    <div class="footer" >
        <p>&copy; Church web @2024 Hellen Irungu. All rights reserved.</p>
    </div>


@yield('content')


<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Smooth scrolling when clicking on a link
        $('a[href*="#about"]').on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                var offset = $(hash).offset().top - $('.navbar').outerHeight(); // Adjust for navbar height
                $('html, body').animate({
                    scrollTop: offset
                }, 800, function(){
                    window.location.hash = hash;
                });
            }
        });
    });
    $(document).ready(function() {
        // Smooth scrolling when clicking on a link
        $('a[href*="#contact"]').on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                var offset = $(hash).offset().top - $('.navbar').outerHeight(); // Adjust for navbar height
                $('html, body').animate({
                    scrollTop: offset
                }, 800, function(){
                    window.location.hash = hash;
                });
            }
        });
    });

    function toggleMenu() {
            var x = document.getElementById("navbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
        const socialIcons = document.querySelectorAll('.section.contact .social i');

        socialIcons.forEach(icon => {
            icon.addEventListener('click', function () {
                socialIcons.forEach(icon => icon.classList.remove('active')); // Remove active class from all icons
                this.classList.toggle('active'); // Toggle active class on clicked icon
            });
        });
    });

    document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Validate the email address (simple validation)
            var email = document.getElementById('emailAddress').value;
            if (!email || !email.includes('@')) {
                // Show validation error
                document.querySelector('[data-sb-feedback="emailAddress:email"]').style.display = 'block';
                return;
            } else {
                // Hide validation error if email is valid
                document.querySelector('[data-sb-feedback="emailAddress:email"]').style.display = 'none';
            }

            // Hide the form and show the thank you message
            document.querySelector('.form-signup').style.display = 'none';
            document.querySelector('.thank-you-message').style.display = 'block';
        });
</script>

</body>
</html>
