@extends('layouts.main')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:100px">
        <ol class="carousel-indicators mb-3">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Hero Section Begin -->
                <section class="hero-section set-bg" data-setbg="{{ url('') }}/assets/img/fstbbb.jpg">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="primary-btn mb-3" style="font-size:15px">
                                    1
                                    November 2023, Faculty Science and Technology, <br>Jambi University
                                </h3>
                                <h3 style="color: white; font-size: 30px;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                    SMART INNOVATION IN ADVANCED MATERIALS, TECNOLOGIES AND RENEWABLE ENERGIES FOR SUSTAINABLY AND ENVIRONMENTALLY GROWTH
                                    </h3>

                                <br>
                                <a href="/register" class="primary-btn mb-3">Buy Ticket</a>
                            </div>
                            <div class="col-lg-5">
                                <h3 class="primary-btn mb-3" style="font-size:20px">Opening Speech</h3>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/opening-1.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);"> Prof. Drs.
                                            Sutrisno, Ph.D
                                            <span>Rector of Jambi University</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/deann.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);"> Drs. Jefri Marzal, M.Sc., D.I.T.
                                            <span>Dean of Faculty Science and Technology</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-center" {{-- style="background-color: rgba(0,0,0,.5);
                        color: #fff; border: 3px solid white; border-radius: 20px " --}}>
                            <h3
                                style="text-align: center ;color: red;font: 800 40px Arial; -webkit-text-fill-color: white; -webkit-text-stroke: 1px;font-style: italic">
                                Hybrid Conference</h3>
                        </div>
                    </div>
                </section>
                <!-- Hero Section End -->

            </div>
            <!--
            <div class="carousel-item">
                <comment> Hero Section Begin 
                <section class="hero-section set-bg" data-setbg="{{ url('') }}/assets/img/home-unja.png">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row justify-content-center"
                            style="background-color: rgba(0,0,0,.7);
                        color: #fff; border: 5px solid rgba(255, 255, 255, 0.798); border-radius: 20px ">
                            <div class="col-lg-7" style="margin: auto; padding-left: 3%">
                                <h3
                                    style="padding-bottom: 5%; text-align: left;color: gold; font-size: 40px;text-shadow: 1px 1px 1px white">
                                    11<sup>th</sup> International Conference of the Indonesian Chemical Society 2023
                                </h3>
                                <h4 style="color:rgb(46, 121, 241); font-size: 30px;padding-bottom: 3%">
                                    Online Presentation</h4>
                                <div style="text-indent: 3%">
                                    <h4
                                        style="padding-bottom: 3%;text-align: left;color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                        Meeting ID : 284 802 1895</h4>
                                    <h4
                                        style="padding-bottom: 5%;text-align: left;color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                        Passcode : icics2023</h4>
                                </div>
                                <a href="https://zoom.us/join" class="primary-btn mb-3"> Open
                                    Zoom Here</a>
                            </div>
                            <div class="col-lg-5">
                                <img style="height: 450px" src="{{ url('') }}/assets/img/zoom-slide-2.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <comment>Hero Section End 
            </div>
            -->
    
            <div class="carousel-item">
                <!-- Hero Section Begin -->
                <section class="hero-section set-bg" data-setbg="{{ url('') }}/assets/img/fstaaa.jpeg">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="primary-btn mb-3" style="font-size:15px">
                                    1
                                    November 2023, Faculty Science and Technology, <br>Jambi University
                                </h3>
                                <h3 style="color: white; font-size: 30px;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                    SMART INNOVATION IN ADVANCED MATERIALS, TECNOLOGIES AND RENEWABLE ENERGIES FOR SUSTAINABLY AND ENVIRONMENTALLY GROWTH
                                    </h3>
                                <br>
                                <a href="/register" class="primary-btn mb-3">Buy Ticket</a>
                            </div>
                            <div class="col-lg-5">
                                <h3 class="primary-btn mb-3" style="font-size:20px">Opening Speech</h3>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/opening-1.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);"> Prof. Drs.
                                            Sutrisno, Ph.D
                                            <span>Rector of Jambi University</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/deann.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);">Drs. Jefri Marzal, M.Sc., D.I.T.
                                            <span>Dean of Faculty Science and Technology</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-center" {{-- style="background-color: rgba(0,0,0,.5);
                        color: #fff; border: 3px solid white; border-radius: 20px " --}}>
                            <h3
                                style="text-align: center ;color: red;font: 800 40px Arial; -webkit-text-fill-color: white; -webkit-text-stroke: 1px;font-style: italic">
                                Hybrid Conference</h3>
                        </div>
                    </div>
                </section>
                <!-- Hero Section End -->
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

    <!-- Counter Section Begin -->
    <section class="counter-section bg-gradient">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="counter-text">
                        <span>Conference Date</span>
                        <h3>Count Every Second <br />Until the Event</h3>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="cd-timer" id="demo">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->

    <!-- Home About Section Begin -->
    <section class="home-about-section" style="padding-bottom: 2%; background-color: wheat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ha-text">
                        <h2>JICEST</h2>
                        <p>
                            The 1st JICEST aims to bring together researchers, experts, practitioners, scholars, and students 
                            to exchange and share their experiences, new ideas, and research 
                            results about all aspects of engineering, science, and technology in related areas. 
                            The conference will be held every year to make it an ideal platform for people to share views and experiences in engineering, science, and technology.
                        </p>
                        {{-- <ul>
                            <li><span class="icon_check"></span> Organic and Bio Chemistry</li>
                            <li><span class="icon_check"></span> Analytical and Enviromental Chemistry</li>
                            <li><span class="icon_check"></span> Inorganic and Material Chemistry</li>
                            <li><span class="icon_check"></span> Physical and Computation Chemistry</li>
                            <li><span class="icon_check"></span> Chemical Education</li>
                        </ul> --}}
                        {{-- <a href="#" class="ha-btn">Discover Now</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ha-text">
                        <img src="{{ url('') }}/assets/img/Logo JOCEST 23.png" alt="jicest">
                    </div>
                </div>
            </div>
        </div>
        
        <!--
        <div class="container-fluid" style="background-color: wheat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ha-text">
                            <h3 style="font-weight: 600;padding-bottom:2%">Implementation</h3>
                            <ul>
                                <li><span class="icon_check"></span> Offline at Swissbell-Hotel, Jambi</li>
                                <li><span class="icon_check"></span> Online Zoom:</li>
                                <li style="text-indent: 20px">Meeting ID: 284 802 1895
                                </li>
                                <li style="text-indent: 20px">Passcode: icics2023</li>
                                <li style="padding-top: 2%">
                                    <a href="https://zoom.us/join" class="primary-btn mb-3"> Open Zoom</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </section>
    <!-- Home About Section End -->

    <!-- Team Member Section Begin -->
    <section class="team-member-section">
        <!--
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>FGD Speaker</h2>
                        {{-- <p>These are our communicators, you can see each person information</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="member-item set-bg" style="margin: 10px; border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/team-member/fgd-1.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Drs. Roto, M.Eng, Ph.D</h5>
                    <span>Universitas Gadjah Mada</span>
                </div>
            </div>
            <div class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/team-member/fgd-2.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Anang WM Diah, M.Si., Ph.D</h5>
                    <span>Universitas Tadulako</span>
                </div>
            </div>
        </div>
        -->
        <br>
        {{-- batas --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Keynote Speaker</h2>
                        {{--<p>These are our communicators, you can see each person information</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="member-item set-bg" style="margin: 10px;border: 3px solid black;"
                data-setbg="{{ url('') }}/assets/img/keynote-speaker/Dr.VolkanDegirmenci.jpeg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Dr. Volkan Degirmenci</h5>
                    <span>Chemical Engineering, University of Warwick</span>
                </div>
            </div>
            <div class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/keynote-speaker/keynote-2.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Sal Prima Yudha</h5>
                    <span>Chemistry Department, University of Bengkulu (Biobased Materials Development)</span>
                </div>
            </div>
            <div margin: 20px class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/keynote-speaker/keynote-3.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Sougata Ghosh</h5>
                    <span>Microbiology Department Kasetsart University, Thailand and Microbiology Departmenr, School of Science, RK University, India</span>
                </div>
            </div>
            <div margin: 20px class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/keynote-speaker/keynote-4.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Muhammad Azis </h5>
                    <span>The University of Tokyo, Institute of Industrial Science (Clean energy systems)</span>
                </div>
            </div>
        </div>
        <!-- Baris Baru -->
        <div class ="row justify-content-center">
            <div margin: 20px class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/keynote-speaker/keynote-5.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Muhamma Roil Bilad</h5>
                    <span>Faculty of Integrated Technologies, Universiti Brunei Darussalam</span>
                </div>
            </div>
            <div margin: 20px class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/keynote-speaker/keynote-6.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Muhammad Mufti Azis, Ph.D.</h5>
                    <span>Department of Chemical Engineering UGM (Biomass Conversion Technology)</span>
                </div>
            </div>
            <div margin: 20px class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/keynote-speaker/keynote-7.png">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Elvi Restiawaty, Ph.D.</h5>
                    <span>Associate Professor at Faculty of Industrial Technology, ITB</span>
                </div>
            </div>
        </div>
        <!-- Batas Baris Baru -->
        <br>
        {{-- batas --}}
        <!--
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Invited Speaker</h2>
                        {{-- <p>These are our communicators, you can see each person information</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="member-item set-bg" style="margin: 10px; border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/team-member/invited-1.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Dr. Dyah Iswantini</h5>
                    <span>IPB University</span>
                </div>
            </div>
            <div class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/team-member/invited-2.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Nazarudin, S.Si., M.Si., Ph.D</h5>
                    <span>Universitas Jambi</span>
                </div>
            </div>
            <div class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/team-member/invited-3.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Yuli Rahmawati, Ph.D</h5>
                    <span>Universitas Negeri Jakarta</span>
                </div>
            </div>
            <div class="member-item set-bg" style="margin: 10px;border: 3px solid black"
                data-setbg="{{ url('') }}/assets/img/team-member/invited-4.jpg">
                <div class="mi-text" style="padding-right: 10px">
                    <h5>Prof. Indriana Kartini, Ph.D</h5>
                    <span>Universitas Gadjah Mada</span>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- Team Member Section End -->

    <!-- Schedule Section Begin -->
    <section class="schedule-section mb-5 mt-5" style="background-color: wheat; padding-top: 3%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>IMPORTANT DATE</h2>
                        <p>Do not miss anything topic about the event</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-success">
                            <div class="section-title" style="margin:0px;padding:0px">
                                <h4 class="text-white" style="font-weight: bold">Abstract Submission Deadline</h4>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <span style="font-size: 18px; padding:10px; color: white"
                                class="badge bg-success rounded-pill"><del>16 October
                                2023</del></span><br><br>
                                <span style="font-size: 18px; padding:10px; color: white"
                                class="badge bg-success rounded-pill">23 October
                                2023</span>
                            <h6 class="pt-3">Time Remaining : </h6>
                            <p id="abstractSubmit" class="pt-2" style="font-size:18px"></p>

                        </div>
                    </div>
                </div>
                
                <!--
                <div class="col-lg-6 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <div class="section-title" style="margin:0px;padding:0px">
                                <h4 class="text-white"style="font-weight: bold">Abstract Acceptance Notifications
                                </h4>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <span style="font-size: 18px; padding:10px; color: white"
                                class="badge bg-secondary rounded-pill">20
                                September
                                2023</span>
                            <h6 class="pt-3">Time Remaining : </h6>
                            <p id="abstractAccept" class="pt-2" style="font-size:18px"></p>
                        </div>
                    </div>
                </div>
                -->
                
                <div class="col-lg-6 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="section-title" style="margin:0px;">
                                <h4 class="text-white" style="font-weight: bold">Full Paper Submission
                                </h4>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <span style="font-size: 18px; padding:10px; color: white"
                                class="badge bg-info rounded-pill"><del>23 October
                                2023</del></span><br><br>
                                <span style="font-size: 18px; padding:10px; color: white"
                                class="badge bg-info rounded-pill">25 October
                                2023</span>
                            <h6 class="pt-3">Time Remaining : </h6>
                            <p id="fullPaper" class="pt-2" style="font-size:18px"></p>
                        </div>
                    </div>
                </div>
                
                <!--
                <div class="col-lg-6 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-success">
                            <div class="section-title" style="margin:0px;padding:0px">
                                <h4 class="py-2 text-white" style="font-weight: bold">Conference
                                </h4>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <span style="font-size: 18px; padding:10px; color: white"
                                class="badge bg-success rounded-pill">16 November
                                2023</span>
                            <h6 class="pt-3">Time Remaining : </h6>
                            <p id="conference" class="pt-2" style="font-size:18px"></p>
                        </div>
                    </div>
                </div>
                -->
            </div>
            {{-- <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center"
                    style="font-size: 115%; font-weight: 700">
                    Abstract Submission Deadline
                    <span style="font-size: 115%; color: white" class="badge bg-primary rounded-pill"><del>16 September
                        2023</del></span>
                        <span style="font-size: 115%; color: white" class="badge bg-primary rounded-pill">23 October
                        2023</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center"
                    style="font-size: 115%;font-weight: 700">
                    Abstract Acceptance Notifications
                    <span style="font-size: 115%; color: white" class="badge bg-primary rounded-pill">20 September
                        2023</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center"
                    style="font-size: 115%;font-weight: 700">
                    Full Paper Submission
                    <span style="font-size: 115%; color: white" class="badge bg-primary rounded-pill">30 September
                        2023</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center"
                    style="font-size: 115%;font-weight: 700">
                    Conference
                    <span style="font-size: 115%; color: white" class="badge bg-primary rounded-pill">16 November
                        2023</span>
                </li>
            </ul> --}}
            
        </div>
    </section>
    <!-- Schedule Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section set-bg spad" data-setbg="{{ url('') }}/assets/img/pricing-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Ticket Pricing</h2>
                        <p>Get your event ticket plan</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                
                <div class="col-lg-4 col-md-8">
                    <div class="price-item top-rated">
                        <div class="tr-tag">
                            <i class="fa fa-star"></i>
                        </div>
                        <h4 style="padding-top: 20px">Presenter</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">OFFLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="padding-bottom: 10px; color: black;font-weight: 400">Reguler : 350K IDR/25 USD</h4>
                        <h4 style="padding-bottom: 10px; color: black;font-weight: 400">Student : 175K IDR/15 USD</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">ONLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="color: black;font-weight: 400">Reguler : 250K IDR/25 USD</h4>
                        <h4 style="color: black;font-weight: 400">Student : 125K IDR/10 USD</h4>

                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="price-item">
                        <h4>Participant</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">OFFLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="padding-bottom: 10px; color: black;font-weight: 400">Reguler : 100K IDR/10 USD</h4>
                        <h4 style="padding-bottom: 10px; color: black;font-weight: 400">Student : 75K IDR/10 USD</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">ONLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="color: black;font-weight: 400">Reguler : 50K IDR/5 USD</h4>
                        <h4 style="color: black;font-weight: 400">Student : 25K IDR/5 USD</h4>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <!--
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('assets/img/field-trip/gunung kerinci.jpg') }}"
                                alt="Gunung Kerinci">
                            <div class="carousel-caption d-none d-md-block text-white p-3"
                                style="font-weight: bold; background-color:rgb(150, 150, 150);">
                                <h4>Mount Kerinci</h4>
                                <p>Mount Kerinci is an active stratovolcano and the highest mountain in Sumatra, Indonesia.
                                    At 12,484 ft above sea level, it provides Sumatra with the fifth-highest maximum
                                    elevation of any island in the world.</p>
                            </div>
                        </div>
                        -->
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('assets/img/field-trip/gentala.jpg') }}"
                                alt="Gunung Kerinci">
                            <div class="carousel-caption d-none d-md-block text-white p-3"
                                style="font-weight: bold; background-color:rgb(150, 150, 150);">
                                <h4>Gentala Arasy Bridge</h4>
                                <p>Gentala Arasy bridge is one of the icons in Jambi. This bridge was built in 2012 and was
                                    inaugurated by Mr. Jusuf Kalla as Vice President at that time. Actually there are two
                                    objects in this location, the tower of Gentala Arasy and Pedestrian bridge. But most
                                    people prefer to call Gentala Arasy bridge.</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('assets/img/field-trip/candi.jpg') }}"
                                alt="Gunung Kerinci">
                            <div class="carousel-caption d-none d-md-block text-white p-3"
                                style="font-weight: bold; background-color:rgb(150, 150, 150);">
                                <h4>Muaro Jambi Temple Compounds</h4>
                                <p>Muaro Jambi (Indonesian: Candi Muaro Jambi) is a Buddhist temple complex, in Muaro Jambi
                                    Regency, Jambi province, Sumatra, Indonesia. It is situated 26 kilometers east from the
                                    city of Jambi. The temple complex was built by the Melayu Kingdom, with its surviving
                                    temples and other archaeological remains estimated to date from the 7th to 13th century
                                    CE.</p>
                            </div>
                        </div>
                        <!--
                        <div class="carousel-item">
                            <img class="d-block w-100 img-fluid"
                                src="{{ asset('assets/img/field-trip/danau-gunung-tujuh.jpeg') }}" alt="Gunung Kerinci">
                            <div class="carousel-caption d-none d-md-block text-white p-3"
                                style="font-weight: bold; background-color:rgb(150, 150, 150);">
                                <h4>Lake Gunung Tujuh</h4>
                                <p>Lake Gunung Tujuh or The Seven Mountain Lake in English is a volcanic crater lake in the
                                    province of Jambi, Indonesia, located at 1°42′23″S 101°24′42″E within Kerinci National
                                    Park.
                                    Although a young lake, in geologic terms, its surrounding volcano, Mount Tujuh, is old
                                    and
                                    not immediately obvious as such.</p>
                            </div>
                        </div>
                        -->
                        <!--
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('assets/img/field-trip/pulau-berhala.jpeg') }}"
                                alt="Gunung Kerinci">
                            <div class="carousel-caption d-none d-md-block text-white p-3"
                                style="font-weight: bold; background-color:rgb(150, 150, 150);">
                                <h4>Berhala Island (Malacca Strait)</h4>
                                <p>Berhala island is an island off Sumatra in Indonesia with an area of about 2.5 km2. It is
                                    located in the Berhala Strait between Jambi and Singkep.
                                    In the past, the island was at the center of a provincial disputed since 1982,
                                    previously
                                    between Jambi and Riau, including the regency Riau Islands. On 2002, these regency
                                    divided
                                    into new province and switched dispute cases between Riau Islands and Jambi. The matter
                                    was
                                    brought for adjudication to Supreme Court, and on 2012, the Court awarded the island to
                                    Riau
                                    Islands.</p>
                            </div>
                        </div>
                        -->
                        <!--
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('assets/img/field-trip/Kebun-Teh-Kayu-Aro.jpg') }}"
                                alt="Gunung Kerinci">
                            <div class="carousel-caption d-none d-md-block text-white p-3"
                                style="font-weight: bold; background-color:rgb(150, 150, 150);">
                                <h4>Kayu Aro Tea Plantation</h4>
                                <p>For lovers of the great outdoors, several other points of interest are located nearby,
                                    such as Mount Kerinci, Lake Kerinci, and the Kerinci Seblat National Park. Getting to
                                    Kayu Aro Tea Plantation follows the same route as the path to Mount Kerinci in the
                                    direction of Sungai Penuh. The two closest airports to Sungai Penuh, capital city of
                                    Kerinci District, are Jambi and Padang. Getting to Sungai Penuh from Jambi city takes
                                    about 10 hours by car over a distance of approximately 500 KM.</p>
                            </div>
                        </div>
                        -->
                        <!--
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('assets/img/field-trip/gunung-masurai.jpeg') }}"
                                alt="Gunung Kerinci">
                            <div class="carousel-caption d-none d-md-block text-white p-3"
                                style="font-weight: bold; background-color:rgb(150, 150, 150);">
                                <h4>Mount Matsurai</h4>
                                <p>Mount Matsurai, natively known as Gunung Masurai, is a large complex of inactive
                                    stratovolcanoes in Jambi, Sumatra, Indonesia. The volcano attains an elevation of 2,916
                                    m above sea level</p>
                            </div>
                        </div>
                        -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section Begin -->
    <section class="contact-section spad" style="margin-top:50px;margin-bottom:50px; padding:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Location</h2>
                        <p>Get directions to our event center</p>
                    </div>
                    <div class="cs-text">
                        <div class="ct-address">
                            <span>Address:</span>
                            <p> Universitas Jambi, <br /> Indonesia</p>
                        </div>
                        <ul>
                            <li>
                                <span>Phone:</span>
                                Sarah FH (+62  852 1344 1800) <br />
                                Winny LCH (+62  821 8279 7606) <br />
                            </li>

                            <li class="mt-3">
                                <span>Email:</span>
                                jicest@unja.ac.id
                            </li>
                        </ul>
                        <div class="ct-links">
                            <span>Website:</span>
                            <a href=jicest.unja.ac.id<p>https://jicestunja.ac.id</p></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cs-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2112.6927320260347!2d103.52009062425653!3d-1.6153859902453034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f63af4c66b3ab%3A0xcfc5de0b9dfcc65e!2sFakultas%20Sains%20Dan%20Teknologi%20Gedung%20B!5e0!3m2!1sid!2sid!4v1694851413099!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection

@section('script')
    {{-- COUNTDOWN AWAL --}}
    <script>
        // Set the date we're counting down to
        var countDownAbstract = new Date("Nov 1, 2023 10:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownAbstract - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML =
                '<div class="cd-item"><span>' + days + '</span><p>Days</p></div>' + '<div class="cd-item"><span>' +
                hours + '</span><p>Hour</p></div>' + '<div class="cd-item"><span>' +
                minutes + '</span><p>Minutes</p></div>' + '<div class="cd-item"><span>' + seconds +
                '</span><p>Seconds</p></div>';


            // days + "d " + hours + "h " +
            // minutes + "m " + seconds + "s "

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script>

    {{-- COUNT DOWN ABSTRACT NOTIF --}}
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Sept 20, 2023 23:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("abstractAccept").innerHTML = days + " days " + hours + " hour " +
                minutes + " minutes " + seconds + " second ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("abstractAccept").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script>

    {{-- COUNTDOWN ABSTRACT SUBMIT --}}
    <script>
        // Set the date we're counting down to
        var countDownSubmit = new Date("Oct 23, 2023 23:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownSubmit - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("abstractSubmit").innerHTML = days + " days " + hours + " hour " +
                minutes + " minutes " + seconds + " second ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("abstractSubmit").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script>

    {{-- COUNTDOWN Full Paper --}}
    <script>
        // Set the date we're counting down to
        var countDownFullPaper = new Date("Oct 25, 2023 23:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownFullPaper - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("fullPaper").innerHTML = days + " days " + hours + " hour " +
                minutes + " minutes " + seconds + " second ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("fullPaper").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script>

    {{-- COUNTDOWN Conference --}}
    <script>
        // Set the date we're counting down to
        var countDownConference = new Date("Nov 16, 2023 10:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownConference - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("conference").innerHTML = days + " days " + hours + " hour " +
                minutes + " minutes " + seconds + " second ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("conference").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script>
@endsection
