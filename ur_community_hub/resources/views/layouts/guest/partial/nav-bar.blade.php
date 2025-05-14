    <!-- header -->
    {{-- <div class="top-header"> --}}
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="top-header-wrapper">
                    <div class="top-header-left">
                        {{-- <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </li>
                            </ul> --}}
                    </div>
                    {{-- <div class="top-header-right">
                            <!-- Clickable Phone Number -->
                            <a href="{{ route('home') }}" class="top-header-contact">
                                <i class="fa fa-home"></i>UR Community Hub
                            </a>

                            <!-- Clickable Email Address -->
                            <a href="mailto:info@ivorybusinessgroup.com" class="px-4 top-header-contact">
                                <i class="fa fa-envelope"></i>info@urcommunityhub.com
                            </a>

                            
                        </div> --}}
                </div>

            </div>
        </div>
    </div>
    {{-- </div> --}}


    <!-- header -->
    <style>
        /* Add background color to the header */
        .header {
            background-color: #073168;
            /* Blue background */
            color: white;
            /* Ensure text is white for contrast */
            position: fixed;
            /* Make the header static (fixed at the top) */
            top: 0;
            /* Align it to the top of the page */
            left: 0;
            /* Align it to the left of the page */
            width: 100%;
            /* Make it span the full width of the page */
            z-index: 50;
            /* Ensure it stays above other content */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Add a subtle shadow for better visibility */
        }

        .header .nav-link {
            color: white !important;
            /* Ensure links are white */
        }

        .header .logo {
            position: relative;
            /* Position the logo relative to its container */
            z-index: 10;
            /* Bring the logo in front of the background */
            padding-left: 0px;
            center: 0px;
            margin-left: 0px;
        }

        .header .navbar-brand {
            padding-left: 0;
            /* Remove extra padding from the left */
            margin-left: 0;
            /* Remove extra margin from the left */
        }

        .header .navbar-brand img {
            max-height: 250px;
            /* Adjust logo size */
        }

        /* Style for the login button */
        .top-header-btn {
            background-color: transparent;
            /* Transparent background */
            color: white;
            /* White text */
            padding: 8px 15px;
            /* Add padding for better spacing */
            border-radius: 5px;
            /* Add rounded corners */
            text-decoration: none;
            /* Remove underline */
            font-weight: bold;
            /* Make text bold */
            transition: all 0.3s ease;
            /* Smooth transition for hover effect */
        }

        .top-header-btn:hover {
            background-color: white;
            /* White background on hover */
            color: black;
            /* Black text on hover */
            border-radius: 50px;
            /* Make the button fully rounded on hover */
        }

        .nav-link:hover {
            background-color: white;
            /* White background on hover */
            color: black !important;
            /* Black text on hover */
            border-radius: 50px;
            /* Make the button fully rounded on hover */
        }

        /* .img-fluid {
            pa
        } */
    </style>


    <div class="header" id="myHeader">
        <div class="container">
            <nav class="p-0 m-0 navbar navbar-expand-lg navbar-light">
                <div class="logo">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt="img">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#community">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#community-events">Event</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('TermAndCondition') }}">Terms And Condition</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#contact-us">Contact</a>
                        </li>
                        <li>
                            @auth
                                <a href="{{ route('dashboard') }}" class="top-header-btn">
                                    <span class="material-icons"></span>Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="top-header-btn">
                                    <span class="material-icons"></span>Login
                                </a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
