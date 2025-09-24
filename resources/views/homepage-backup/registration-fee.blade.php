@extends('layouts.main')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad" style="margin-top:200px" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Registration Fee</h2>
                        {{-- <p>Fill in the form below to register.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- CONTENT --}}
                            <h4 class="mt-5">Fee</h4>
                            <table class="table my-3">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Fee</th>
                                        <th scope="col">Offline</th>
                                        <th scope="col">Online</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Presenter</td>
                                        <td>Reguler : IDR 350K / $30 USD <br>Student : IDR 175K / $15 USD</td>
                                        <td>Reguler : IDR 250K / $25 USD <br>Student : IDR 125K / $10 USD</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Participant</td>
                                        <td>Reguler : IDR 100K / $10 USD <br>Student : IDR 75K / $10 USD</td>
                                        <td>Reguler : IDR 50K / $5 USD <br> Student : IDR 25K / $5 USD</td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td>3</td>
                                        <td>Participant</td>
                                        <td>IDR 350K / $24 USD</td>
                                        <td>IDR 100K / $7 USD</td>
                                    </tr>
                                    -->
                                    
                                </tbody>
                            </table>
                            <h4 class="mt-5">Payment</h4>
                            <table class="table my-3">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">Account Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bank Syariah Indonesia</td>
                                        <td>7240669018</td>
                                        <td>DPP PENAPROLIS JAMBI</td>
                                        <!--
                                        <td>Bank Negara Indonesia</td>
                                        <td>698124931</td>
                                        <td>Perkumpulan Indonesian Chemical Society</td>
                                        -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
