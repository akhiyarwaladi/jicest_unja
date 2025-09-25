@extends('layouts.main')

@section('css')
    <style>
        .bg-gradient {
            background: linear-gradient(to right, #10b981, #06b6d4);
            border: 2px solid transparent;
            width: 100%;
            text-align: start;
            display: flex;
            font-weight: 600;
            padding: 10px 10px;
        }

        .logout {
            background: #d44c4c;
            border: 2px solid transparent;
            width: 100%;
            text-align: start;
            display: flex;
            font-weight: 600;
            padding: 10px 10px;
        }

        .bg-current,.bg-current:hover,.bg-current:focus {
            background: white;
            color: black;
            border: 2px solid #10b981;
            width: 100%;
            text-align: start;
            display: flex;
            font-weight: 600;
            padding: 10px 10px;
        }

        .bg-gradient:hover {
            background: white;
            color: black;
            border: 2px solid #10b981;
            width: 100%;
            text-align: start;
            display: flex;
            font-weight: 600;
            padding: 10px 10px;
        }
    </style>
@endsection

@section('content')
    <!-- Schedule Table Section Begin -->
    <section class="schedule-table-section spad" style="margin-top:200px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="schedule-table-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            @if (in_array(Auth::user()->participant->participant_type, ['presenter', 'presenter_reguler', 'presenter_student']))
                                <li class="nav-item">
                                    <a class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}" href="/dashboard">Dashboard</a>
                                </li>
                                <li class="nav-item" style="white-space:nowrap;">
                                    <a class="nav-link {{ $title == 'My Abstrak' ? 'active' : '' }}" href="/abstrak">Abstract</a>
                                </li>
                                <li class="nav-item" style="white-space:nowrap;">
                                    <a class="nav-link {{ $title == 'Payment' ? 'active' : '' }}" href="payment">Payment</a>
                                </li>
                                <li class="nav-item" style="white-space:nowrap;">
                                    <a class="nav-link {{ $title == 'Upload Fulltext' ? 'active' : '' }}" href="/upload-fulltext">Upload Paper</a>
                                </li>
                                <li class="nav-item" style="white-space:nowrap;">
                                    <a class="nav-link {{ $title == 'My Profile' ? 'active' : '' }}" href="profile">Profile</a>
                                </li>
                            @endif

                            @if (in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler', 'participant_student']))
                                <li class="nav-item col-4" style="padding:0px;margin:0px">
                                    <a class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}"
                                        href="/dashboard">Dashboard</a>
                                </li>
                                <li class="nav-item col-4" style="padding:0px;margin:0px">
                                    <a class="nav-link {{ $title == 'Payment' ? 'active' : '' }}" href="payment">Payment</a>
                                </li>
                                <li class="nav-item col-4" style="padding:0px;margin:0px">
                                    <a class="nav-link {{ $title == 'My Profile' ? 'active' : '' }}" href="profile">Profile</a>
                                </li>
                            @endif
                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div class="card">
                                <div class="card-body">
                                    @yield('content-dashboard')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="ha-text" style="padding-left:5px;padding-top:0px">
                                <h5 style="font-weight: 600">User Menu</h5>
                                <ul>
                                    <li><a href="/profile" class="btn btn-primary {{ $title == 'My Profile' ? 'bg-current' : 'bg-gradient'}} shadow fw-bold text-start my-2">My Profile</li></a>
                                    @if (in_array(Auth::user()->participant->participant_type, ['presenter', 'presenter_reguler', 'presenter_student']))
                                        <li><a href="/abstrak" class="btn btn-primary {{ $title == 'My Abstrak' ? 'bg-current' : 'bg-gradient'}} shadow fw-bold text-start mb-2">My Abstract</li></a>
                                    @endif

                                    <li><a href="/payment" class="btn btn-primary {{ $title == 'Payment' ? 'bg-current' : 'bg-gradient'}} shadow fw-bold text-start mb-2">Payment</li></a>
                                    @if (in_array(Auth::user()->participant->participant_type, ['presenter', 'presenter_reguler', 'presenter_student']))
                                        <li><a href="/upload-fulltext" class="btn btn-primary {{ $title == 'Upload Fulltext' ? 'bg-current' : 'bg-gradient'}} shadow fw-bold text-start mb-2">Full Paper</li></a>
                                    @endif
                                    <li><a href="/change-password" class="btn btn-primary {{ $title == 'Change Password' ? 'bg-current' : 'bg-gradient'}} shadow fw-bold text-start mb-2">Change Password</li></a>

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary logout shadow fw-bold text-start">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>
    <!-- Schedule Table Section End -->
@endsection
