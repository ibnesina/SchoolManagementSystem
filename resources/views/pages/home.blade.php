    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IQRA MODEL MADRASAH</title>
        <link rel="shortcut icon" type="image/x-icon" href="../dist/img/images/logo.png">

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css link -->
        <link rel="stylesheet" href="{{ asset('../dist/css/style.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

        <style>
            /* CSS for fixed size and responsive images */
            #carouselExampleIndicators .carousel-inner img {
                width: 100%;
                height: 500px;
                /* Set a fixed height for the images */
                object-fit: cover;
                /* Ensure images cover their containers */
            }

            .teacher .box .image img {
                width: 100%;
                height: 300px;
                /* Set a fixed height for the images */
                object-fit: cover;
                /* Ensure images cover their containers */
            }


            @-webkit-keyframes ticker {
                0% {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    visibility: visible;
                }

                100% {
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }
            }

            @keyframes ticker {
                0% {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    visibility: visible;
                }

                100% {
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }
            }

            .ticker-heading {
                position: absolute;
                background: #A6C22F;
                display: block;
                left: 0;
                top: 0;
                height: 7rem;
                padding: 6px 11px;
                z-index: 2;
                color: white;
                text-transform: uppercase;
                font-size: 2rem;
            }

            .ticker-wrap .ticker__item:before {
                content: "";
                height: 11px;
                width: 11px;
                display: inline-block;
                background-color: #1074bc;
                border-radius: 100%;
                position: relative;
                margin-right: 15px;
            }

            .ticker-heading:after {
                content: "";
                width: 0;
                height: 0;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-left: 11px solid #A6C22F;
                position: absolute;
                margin-left: 10px;

            }

            .ticker-wrap {
                position: relative;
                bottom: 0;
                width: 100%;
                overflow: hidden;
                height: 4rem;
                background-color: #f9f9f9;
                padding-left: 100%;
                box-sizing: content-box;
                /* padding: 10px; */
            }

            .ticker-wrap .ticker:hover {
                -webkit-animation-play-state: paused;
                -moz-animation-play-state: paused;
                -ms-animation-play-state: paused;
                -o-animation-play-state: paused;
                animation-play-state: paused;
            }

            .ticker-wrap .ticker {
                display: inline-block;
                height: 2.5rem;
                line-height: 2.5rem;
                white-space: nowrap;
                padding-right: 100%;
                box-sizing: content-box;
                -webkit-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
                -webkit-animation-timing-function: linear;
                animation-timing-function: linear;
                -webkit-animation-name: ticker;
                animation-name: ticker;
                -webkit-animation-duration: 30s;
                animation-duration: 30s;
            }

            .ticker-wrap .ticker__item {
                display: inline-block;
                padding: 0 2rem;
                font-size: 2rem;
                padding: 8px 12px;
                color: #454545;
            }

            @media screen and (max-width: 768px) {
                /* .ticker-wrap {
                    height: auto;
                    overflow-x: hidden;
                    white-space: nowrap;
                    padding-left: 0;
                } */

                @-webkit-keyframes ticker {
                0% {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    visibility: visible;
                }

                100% {
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }
            }

            @keyframes ticker {
                0% {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    visibility: visible;
                }

                100% {
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }
            }

                .ticker-wrap {
                    /* Your other styles */
                    padding-left: 0;
                    /* Change padding-left to 0 for smaller screens */
                    width: 100%;
                    /* Add width: 100% to fill the container */
                    box-sizing: border-box;
                    /* Ensure the padding is included in the width */
                }


                .ticker-heading {
                    font-size: 1.8rem;
                    /* Decrease font size for the heading on smaller screens */
                }

                .ticker-wrap .ticker__item {
                    font-size: 1.6rem;
                    /* Decrease font size for ticker items on smaller screens */
                    padding: 8px 12px 8px 0px;
                    /* Adjust padding for smaller screens */
                }
            }
        </style>

    </head>

    <body>

        <!-- header section starts -->

        <header class="header">
            <a href="/">
                <img src="{{ asset('../dist/img/images/logo.png') }}" alt="School Logo"
                    style="width: 120px; height: 100px;">
            </a>

            <nav class="navbar">
                <a href="#gallery" class="hover-underline">Gallery</a>
                <a href="#notice" class="hover-underline">Notice</a>
                <a href="#about" class="hover-underline">About</a>
                <a href="#prospectus" class="hover-underline">Prospectus</a>
                {{-- <a href="#teacher" class="hover-underline">teacher</a> --}}
                {{-- <a href="#blog" class="hover-underline">blog</a> --}}
                <a href="#contact" class="hover-underline">Contact</a>
            </nav>

            <div class="icons">
                @if (auth()->check())
                    <!-- User is logged in - Display dashboard button -->
                    @if (Auth::user()->user_type == 1)
                        <a href="{{ url('superadmin/dashboard') }}" id="dashboard-btn" class="btn btn-primary">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    @elseif(Auth::user()->user_type == 2)
                        <a href="{{ url('admin/dashboard') }}" id="dashboard-btn" class="btn btn-primary">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    @elseif(Auth::user()->user_type == 3)
                        <a href="{{ url('teacher/dashboard') }}" id="dashboard-btn" class="btn btn-primary">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    @elseif(Auth::user()->user_type == 4)
                        <a href="{{ url('student/dashboard') }}" id="dashboard-btn" class="btn btn-primary">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    @endif
                @else
                    <!-- User is not logged in - Display login button -->
                    <a href="{{ url('login') }}" id="login-btn" class="btn btn-primary">
                        <i class="fas fa-user"></i> Login
                    </a>
                @endif
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>

            <!-- login form -->

            {{-- <form action="" class="login-form">
                <h3>login form</h3>
                <input type="email" placeholder="enter your email" class="box">
                <input type="password" placeholder="enter your password" class="box">
                <div class="remember">
                    <input type="checkbox" name="" id="remember">
                    <label for="remember-me">remember me</label>
                </div>
                <a href="#" class="btn">
                    <span class="text text-1">login now</span>
                    <span class="text text-2" aria-hidden="true">login now</span>
                </a>
            </form> --}}

        </header>

        <!-- header section ends -->

        <!-- home section starts-->

        {{-- <section style="margin-top: 50px;">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('../dist/img/images/banner3.webp') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('../dist/img/images/banner2.jpeg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('../dist/img/images/banner2.webp') }}" alt="Third slide">
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            

        </section> --}}

        <section style="margin-top: 100px;" id="gallery">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    {{-- <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="12"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="13"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="14"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_8.jpeg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_1.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_2.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_3.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_4.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_5.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_6.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_7.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_10.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_9.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_12.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_11.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_13.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_14.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/banner_15.jpeg') }}" alt="Second slide">
                        </div>
                    </div> --}}

                    <ol class="carousel-indicators">
                        @foreach ($images as $key => $image)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                class="{{ $key === 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ asset('../upload/gallary/') }}/{{ $image->image }}"
                                    alt="Slide {{ $key }}">
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>


        <!-- home section ends -->

        <section  id="notice">

            <div class="ticker-wrap">
                <div class="ticker-heading">Notice</div>
                <div class="ticker">
                    @foreach ($notice as $key => $notices)
                        <div class="ticker__item">{{$notices->notice}}</div>
                    @endforeach
                </div>
            </div>

        </section>

        <!-- about section starts -->

        <section class="about" id="about">

            <div class="container">

                {{-- <figure class="about-image">
                    <img src="{{ asset('../dist/img/images/about.jpeg') }}" alt="" height="500">
                    <img src="{{ asset('../dist/img/images/about-1.png') }}" alt="" class="about-img">
                </figure> --}}

                <div class="about-content">
                    <h1 class="heading">about us</h1>
                    <h3>IQRA MODEL MADRASAH</h3>
                    <p style="text-align: justify;">Welcome to IQRA MODEL MADRASAH in Bogura City, where excellence in
                        education meets a nurturing environment. Our madrasah, situated at Jaleshwarital, stands as a
                        beacon of holistic learning, offering a unique blend of Hifz (memorization of the Quran),
                        residential stay education, and traditional academic studies.</p>
                    <p style="text-align: justify;">At IQRA MODEL MADRASAH, we prioritize the spiritual and
                        intellectual
                        development of our students. Our dedicated faculty is committed to providing quality education,
                        fostering a deep understanding of traditional Islamic studies, and nurturing memorization skills
                        through Hifz programs.</p>
                    <p style="text-align: justify;">With a focus on character development, our residential stay program
                        ensures a supportive and conducive living environment for students. This holistic approach aims
                        to instill values, discipline, and a sense of community, preparing students not only
                        academically but also morally for the challenges of life.</p>
                    <p style="text-align: justify;">Situated in the heart of Bogura City, IQRA MODEL MADRASAH embraces
                        a
                        serene and conducive setting for learning and spiritual growth. We strive to create an
                        atmosphere that inspires curiosity, critical thinking, and a strong connection to Islamic
                        principles.</p>
                    <p style="text-align: justify;">Join us at IQRA MODEL MADRASAH, where education goes beyond
                        textbooks, and students embark on a transformative journey of knowledge, character building, and
                        spiritual enlightenment.</p>
                    {{-- <a href="#" class="btn">
                        <span class="text text-1">read more</span>
                        <span class="text text-2" aria-hidden="true">read more</span>
                    </a>         --}}
                </div>

            </div>

        </section>

        <section id="prospectus">
            <div class="container">
                <h1 class="heading">Prospectus</h1>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/prospective_1.jpeg') }}"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/prospective_2.jpeg') }}"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/prospective_3.jpeg') }}"
                                alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/prospective_4.jpeg') }}"
                                alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/prospective_5.jpeg') }}"
                                alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('../dist/img/images/prospective_6.jpeg') }}"
                                alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- about section ends -->

        <!-- subjects section starts -->

        {{-- <section class="subjects">

            <h1 class="heading">our popular subjects</h1>

            <div class="box-container">

                <div class="box">
                    <img src="{{ asset('../dist/img/images/subject-4.png') }}" alt="">
                    <h3>Science</h3>
                    <p>fun & challenging</p>
                </div>

                <div class="box">
                    <img src="{{ asset('../dist/img/images/subject-2.png') }}" alt="">
                    <h3>Mathematics</h3>
                    <p>fun & challenging</p>
                </div>

                <div class="box">
                    <img src="{{ asset('../dist/img/images/subject-3.png') }}" alt="">
                    <h3>Geography</h3>
                    <p>fun & challenging</p>
                </div>

                <div class="box">
                    <img src="{{ asset('../dist/img/images/subject-1.png') }}" alt="">
                    <h3>Social Science</h3>
                    <p>fun & challenging</p>
                </div>

            </div>

        </section> --}}

        <!-- subject section ends -->

        <!-- teacher section starts -->

        {{-- <section class="teacher" id="teacher">

            <h1 class="heading">our expert teacher</h1>

            <div class="box-container">

                <div class="box">
                    <div class="image">
                        <img src="{{ asset('../dist/img/images/teacher-1.png') }}" alt="">
                        <div class="share">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>john deo</h3>
                        <span>instructor</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="{{ asset('../dist/img/images/teacher-2.png') }}" alt="">
                        <div class="share">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>john deo</h3>
                        <span>instructor</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="{{ asset('../dist/img/images/teacher-3.png') }}" alt="">
                        <div class="share">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>john deo</h3>
                        <span>instructor</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="{{ asset('../dist/img/images/teacher-4.png') }}" alt="">
                        <div class="share">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>john deo</h3>
                        <span>instructor</span>
                    </div>
                </div>

            </div>

        </section> --}}

        <!-- teacher section ends -->

        <!-- blog section starts -->

        {{-- <section class="blog" id="blog">

            <h1 class="heading">our blogs</h1>

            <div class="box-container">

                <div class="box">
                    <div class="image shine">
                        <img src="{{ asset('../dist/img/images/blog-1.jpg') }}" alt="">
                        <h3>09 dec 2022</h3>
                    </div>
                    <div class="content">
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                        </div>
                        <h3>we have best courses for you</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo minus.</p>
                        <a href="#" class="btn">
                            <span class="text text-1">read more</span>
                            <span class="text text-2" aria-hidden="true">read more</span>
                        </a>
                    </div>
                </div>

                <div class="box">
                    <div class="image shine">
                        <img src="{{ asset('../dist/img/images/blog-2.jpg') }}" alt="">
                        <h3>09 dec 2022</h3>
                    </div>
                    <div class="content">
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                        </div>
                        <h3>we have best courses for you</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo minus.</p>
                        <a href="#" class="btn">
                            <span class="text text-1">read more</span>
                            <span class="text text-2" aria-hidden="true">read more</span>
                        </a>
                    </div>
                </div>

                <div class="box">
                    <div class="image shine">
                        <img src="{{ asset('../dist/img/images/blog-3.jpg') }}" alt="">
                        <h3>09 dec 2022</h3>
                    </div>
                    <div class="content">
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                        </div>
                        <h3>we have best courses for you</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo minus.</p>
                        <a href="#" class="btn">
                            <span class="text text-1">read more</span>
                            <span class="text text-2" aria-hidden="true">read more</span>
                        </a>
                    </div>
                </div>

            </div>

        </section> --}}

        <!-- blog section ends -->

        <!-- contact section starts -->

        <section class="contact" id="contact">

            <h1 class="heading">Contact us</h1>
            @include('_message')

            <div class="row">
                <div class="image">
                    <img src="{{ asset('../dist/img/images/logo.png') }}" alt="">
                </div>
                <form method="POST" action="">
                    {{ csrf_field() }}
                    <h3>Send Us a Message</h3>
                    <input type="text" placeholder="Name" name="name" class="box" required>
                    <input type="email" placeholder="Email" name="email" class="box" required>
                    <input type="text" placeholder="Phone Number" name="phone" class="box" required>
                    <textarea placeholder="Message" name="message" class="box" cols="30" rows="10" required></textarea>
                    <button type="submit" class="btn">
                        <span class="text text-1">Send Message</span>
                        <span class="text text-2" aria-hidden="true">Send Message</span>
                    </button>
                </form>
            </div>

        </section>

        <!-- contact section ends -->

        <!-- footer section stars -->

        <section class="footer">

            <div class="box-container">

                <div class="box">
                    <h3>Find Us Here</h3>
                    <p>www.iqramodelmadrasa.com</p>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>

                <div class="box">
                    <h3>Contact Us</h3>
                    <p>01558-262754<br>01312-899675</p>
                    <a href="#" class="link">iqramodelmadrasa2014@gmail.com</a>
                </div>

                <div class="box">
                    <h3>Location</h3>
                    <p>200 meter away from PIT more,<br>
                        Jolessharitola, Bogura<br></p>
                </div>

            </div>
            <div class="credit">All Copy-rights are Reserved!</div>
            {{-- created by <span>sina </span>|  --}}
        </section>

        <!-- footer section ends -->

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <!-- custom js -->
        <script src="{{ asset('../dist/js/script.js') }}"></script>

        <!-- Include jQuery first (if not already included) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Include Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

    </html>
