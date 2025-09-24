@extends('layouts.main')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad" style="margin-top:200px" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Contact</h2>
                        {{-- <p>Fill in the form below to register.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- CONTENT --}}
                            <!-- Contact Section Begin -->
                            <section class="contact-section spad">
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
                                                    <p>Universitas Jambi, <br /> Indonesia</p>
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
                                                    <p>https://jicest.unja.ac.id</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="cs-map">

                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15952.892253639964!2d103.50913745!3d-1.62028295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f62c01aa6b39b%3A0x79e2b7ce458689aa!2sFakultas%20Sains%20dan%20Teknologi%20UNJA!5e0!3m2!1sid!2sid!4v1695019118929!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Contact Section End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
