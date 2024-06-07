
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
            color: white;
            }

        .nav-link:hover {
        color: black !important;
        }

        @media (max-width: 991.98px) {
        .navbar-collapse {
            text-align: center;
        }
        }
        .section {
            padding: 20px;
            margin: 20px;
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
            height: 100vh; /* Full viewport height */
            width: 100vw; /* Full viewport width */
        }

        .welcome::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .welcome-content {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            color: black;
            font-weight: bold/* Ensure text is readable */
        }

        .welcome h1 {
            font-weight: bolder; /* Set the font-weight to bold */
        }
        .about {

            text-align: center;
            font-family: 'Times New Roman', serif;
            font-size: 30px;

        }
        .about h2 {
            font-weight: bold;
            font-size: 35px;

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
            font-size: 20px; /* Increase the font size of "Church Management" */
            font-weight: bold; /* Optionally, make it bold */
        }

        /* Styling for social icons */
.social {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Add margin to the top to create space */
}

.social a {
    margin: 0 20px; /* Add space between icons */
    transition: color 0.3s; /* Add transition for smooth color change */

}

.social a i {
    color: black;
    font-size: 24px;
}

.social a:hover i {
    color: #007bff; /* Change the color on hover */
}


.section.contact .card-body i {
    color: black; /* Set initial color of icons to black */
    font-size: 24px; /* Set the font size of the icons */
    transition: color 0.3s; /* Add transition for smooth color change */
}

.section.contact .card-body i:hover {
    color: #007bff; /* Change the color on hover */
}

    </style>
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
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


    <section id="welcome" class="section welcome" style="background-image: url('https://media.istockphoto.com/id/948151812/photo/hands-reach-for-the-sky-to-light-in-the-form-of-a-cross.webp?b=1&s=170667a&w=0&k=20&c=YvX8p3pVkIDdt-_4icCcsUBVAOAkBMhC4LeqyUzz_nI=');">
        <div class="welcome-content">
            <h1>Church Management System</h1>
            <p>A complimentary, adaptable system dedicated to organizing church members and managing church finances with simplicity.</p>
        </div>
    </section>

    <section id="about" class="section about">
        <h2>Transparency,Effectiveness</h2>
        <p>Our complimentary church management system offers a comprehensive solution tailored to the unique needs of churches. With its adaptable design, it seamlessly organizes church members and streamlines the management of church finances with simplicity. From tracking membership data to managing donations and expenses, our system provides robust tools to empower church administrators and leaders. With intuitive features and user-friendly interfaces, it's easy for anyone to navigate and utilize effectively. Say goodbye to cumbersome spreadsheets and paperwork – our system offers a modern, efficient solution to optimize church operations and foster greater stewardship.</p>
    </section>
   
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-black"></i>
                    <h2 class="text-black mb-5">Subscribe to receive updates!</h2>
                    <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">

                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                            <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton" type="submit">Notify Me!</button></div>
                        </div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is required.</div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.</div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="contact" class="section contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt"></i>
                            <h4>Address</h4>
                            <hr>
                            <div>001000-NAIROBI</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope"></i>
                            <h4>Email</h4>
                            <hr>
                            <div><a href="mailto:hellen@gmail.com">hellen@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt"></i>
                            <h4>Phone</h4>
                            <hr>
                            <div>+254 (000) 704248752</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a href="#!"><i class="fab fa-twitter"></i></a>
                <a href="#!"><i class="fab fa-facebook-f"></i></a>
                <a href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </div>

    <div class="footer">
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
</script>

</body>
</html>
