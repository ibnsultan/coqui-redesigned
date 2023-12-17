<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- #favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
        
        <title>{{config('app_name')}} :: @yield('title')</title>
        <meta name="keywords" content="{{config('keywords')}}">
        <meta name="description" content="{{config('description')}}">

        <!-- stylesheets -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/all.min.css">
        <link rel="stylesheet" href="/assets/css/Glyphter.css">
        <link rel="stylesheet" href="/assets/css/nice-select.css">
        <link rel="stylesheet" href="/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="/assets/css/slick.css">
        <link rel="stylesheet" href="/assets/css/animate.css">

        <!-- foreign assets -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

        <!-- custom css -->
        <link rel="stylesheet" href="/assets/css/main.min.css">
        <link rel="stylesheet" href="/assets/css/custom.css">
    </head>
    <body>
        <!-- preloader -->
        <div id="preloader">
            <div id="loader"></div>
        </div>
        <!-- ==== page wrapper start ==== -->
        <div class="my-app home-light">
            <!-- ==== header start ==== -->
            <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="nav">
                                <div class="nav__content">
                                    <div class="nav__logo">
                                        <a href="/">
                                            <img src="/assets/images/logo.png" style="width: 140px" alt="Logo">
                                        </a>
                                    </div>
                                    <div class="nav__menu">
                                        <ul class="nav__menu-items">
                                            <li class="nav__menu-item">
                                                <a href="/" class="nav__menu-link">
                                                    Home
                                                </a>
                                            </li>
                                            <li class="nav__menu-item">
                                                <a href="/about" class="nav__menu-link hide-nav">
                                                    About Us
                                                </a>
                                            </li>
                                            <li class="nav__menu-item">
                                                <a href="/blog" class="nav__menu-link">
                                                    Blog
                                                </a>
                                            </li>
                                            <li class="nav__menu-item">
                                                <a href="/contact" class="nav__menu-link hide-nav">
                                                    Contact Us
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="social">
                                            <a href="javascript:void(0)" aria-label="social media">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                            <a href="javascript:void(0)" aria-label="social media">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                            <a href="javascript:void(0)" aria-label="social media">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                            <a href="javascript:void(0)" aria-label="social media">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="nav__uncollapsed">
                                        <div class="nav__uncollapsed-item d-none d-md-flex">
                                            <a href="javascript:void(0)" class="btn btn--secondary">
                                                Acquire Licence
                                            </a>
                                        </div>
                                        <button class="nav__bar d-block d-xl-none">
                                            <span class="icon-bar top-bar"></span>
                                            <span class="icon-bar middle-bar"></span>
                                            <span class="icon-bar bottom-bar"></span>
                                        </button>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="backdrop"></div>
            </header>
            <!-- ==== / header end ==== -->
            <!-- ==== mobile menu start ==== -->
            <div class="mobile-menu d-block d-xl-none">
                <nav class="mobile-menu__wrapper">
                    <div class="mobile-menu__header">
                        <div class="nav__logo">
                            <a href="/" aria-label="home page" title="logo">
                                <img src="/assets/images/logo-four.png" alt="Image">
                            </a>
                        </div>
                        <button aria-label="close mobile menu" class="close-mobile-menu">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="mobile-menu__list"></div>
                    <div class="mobile-menu__social social">
                        <a href="javascript:void(0)" aria-label="social media">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="javascript:void(0)" aria-label="social media">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="javascript:void(0)" aria-label="social media">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="javascript:void(0)" aria-label="social media">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="mobile-menu__backdrop"></div>

            @yield('content')

            <!-- ==== footer start ==== -->
            <footer class="footer section pb-0 footer-light">
                <div class="container">
                    <div class="row items-gap-two">
                        <div class="col-12 col-sm-6 col-lg-5">
                            <div class="footer__single wow fadeInUp" data-wow-duration="600ms">
                                <h5 class="h5">our Products</h5>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)"> XTTS</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Coqui Studio</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Coqui Labs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-5">
                            <div class="footer__single wow fadeInUp" data-wow-duration="600ms" data-wow-delay="200ms">
                                <h5 class="h5">Coqui AI</h5>
                                <ul>
                                    <li>
                                        <a href="/about">About</a>
                                    </li>
                                    <li>
                                        <a href="/blog">Blog</a>
                                    </li>
                                    <li>
                                        <a href="/contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-2">
                            <div class="footer__single wow fadeInUp" data-wow-duration="600ms" data-wow-delay="600ms">
                                <h5 class="h5">support</h5>
                                <ul>
                                    <li>
                                        <a href="javascrip:void(0)">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="javascrip:void(0)">Terms of Service</a>
                                    </li>
                                    <li>
                                        <a href="javascrip:void(0)">Cookie Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright-inner bg-light">
                                <div class="row items-gap align-items-center">
                                    <div class="col-12 col-lg-3">
                                        <div class="logo text-center text-lg-start">
                                            <a href="/">
                                                <img src="/assets/images/logo.png" style="width: 140px" alt="Image">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <p class="text-center">
                                            Copyright &copy;
                                            <span id="copyYear"></span>
                                            <a href="/">Coqui</a> | 
                                            Made with ❤️ in 
                                            <a href="https://berlinlovesyou.com/">Berlin!</a>
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="social justify-content-center justify-content-lg-end">
                                            <a href="https://www.facebook.com/coquiai" target="_blank" aria-label="social media">
                                                <i class="fa-brands fa-facebook-f text-dark"></i>
                                            </a>
                                            <a href="https://twitter.com/coqui_ai" target="_blank" aria-label="social media">
                                                <i class="fa-brands fa-twitter text-dark"></i>
                                            </a>
                                            <a href="https://www.linkedin.com/company/coqui-ai" target="_blank" aria-label="social media">
                                                <i class="fa-brands fa-linkedin-in text-dark"></i>
                                            </a>
                                            <a href="https://github.com/coqui-ai" aria-label="social media">
                                                <i class="fa-brands fa-github text-dark"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="anime">
                    <img src="/assets/images/footer-anime-one.png" alt="Image" class="one">
                    <img src="/assets/images/footer-anime-two.png" alt="Image" class="two">
                </div>
            </footer>
            <!-- ==== / footer end ==== -->
        </div>
        <!-- ==== / page wrapper end ==== -->
        <!-- scroll to top -->
        <div class="progress-wrap">
            <svg
                class="progress-circle svg-content"
                width="100%"
                height="100%"
                viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
            </svg>
        </div>
        <!-- ==== js dependencies start ==== -->
        <!-- jquery -->
        <script src="/assets/js/jquery-3.7.0.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/jquery.nice-select.min.js"></script>
        <script src="/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="/assets/js/slick.min.js"></script>
        <script src="/assets/js/typed.umd.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!-- main js -->
        <script src="/assets/js/plugins.js"></script>
        <script src="/assets/js/main.js"></script>

        @yield('scripts')
    </body>
</html>