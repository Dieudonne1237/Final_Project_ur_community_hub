@include('layouts.guest.partial.head')

<style>
    footer {
        background-color: #073168;
        color: white;
        padding: 20px 0;
    }

    footer a {
        color: #f0f8ff;
        text-decoration: none;
    }

    /* Remove hover effect for Quick Links */
    .footer-wrapper ul li a:hover {
        color: #f0f8ff;
        /* Same as default – no change on hover */
    }

    .footer-bottom {
        text-align: center;
        margin-top: 20px;
        border-top: 1px solid #ffffff33;
        padding-top: 10px;
    }

    .footer-bottom ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .footer-bottom ul li a {
        color: white;
        font-size: 18px;
    }

    /* Keep hover effect only on footer social icons */
    .footer-bottom ul li a:hover {
        background-color: #097e78;
        /* Dark blue background */
        color: white;
        /* Keep the icon color white for contrast */
        padding: 5px;
        /* Optional: Adds space inside the icon area */
        border-radius: 5px;
        /* Optional: Rounds the corners */
        transition: background-color 0.1s ease;
        /* Smooth hover effect */
    }
</style>



<body>

    <button onclick="topFunction()" id="backTop" title="Go to top"><i class="fa fa-arrow-up"></i></button>
    <div id="loading">
        <div class="d-flex flex-column justify-content-center align-items-center text-success vh-100">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>

    </div>


    @include('layouts.guest.partial.nav-bar')

    @yield('content')
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="mb-4 col-12 col-md-6 col-lg-4">
                    <div class="footer-wrapper">
                        <h3>About Us</h3>
                        <p>UR Community Hub is a platform designed to connect students, faculty, and alumni, fostering
                            collaboration, knowledge sharing, and community engagement.</p>
                    </div>
                </div>
                <div class="mb-4 col-12 col-md-6 col-lg-4">
                    <div class="footer-wrapper">
                        <h3>Quick Links</h3>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('home') }}#about-us"
                                    class="text-white d-inline-block px-2 py-1 rounded hover-bg-primary">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}#community"
                                    class="text-white d-inline-block px-2 py-1 rounded hover-bg-primary">Community</a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}#community-events"
                                    class="text-white d-inline-block px-2 py-1 rounded hover-bg-primary">Event</a>
                            </li>
                            <li>
                                <a href="{{ route('TermAndCondition') }}"
                                    class="text-white d-inline-block px-2 py-1 rounded hover-bg-primary">Terms And
                                    Condition</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="mb-4 col-12 col-md-6 col-lg-4">
                    <div class="footer-wrapper">
                        <h3>Contact Us</h3>
                        <ul>
                            <li>
                                <a href="https://maps.app.goo.gl/J6AjbchV29F9asrt9">
                                    <p>Office Address</p>
                                    University of Rwanda, Kigali
                                </a><br>
                                <a href="tel:+250781065367">
                                    <i class="fa fa-phone"></i> +25078xxxxxxx
                                </a><br>
                                <a href="mailto:info@urcommunityhub.com">
                                    <i class="fa fa-envelope"></i> info@urcommunityhub.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="footer-bottom">
                        <p>© {{ date('Y') }} UR Community Hub, All Rights Reserved.</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @include('layouts.guest.partial.foot')

    <style>
        .hover-bg-primary:hover {
            background-color: #fff !important;
            color: #000 !important;
            font-weight: bold !important;
        }
    </style>
