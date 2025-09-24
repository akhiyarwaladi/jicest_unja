@extends('layouts.participant')

@section('content-dashboard')
    <div class="">
        @if (!in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler', 'participant_student']))
            @if (Auth::user()->participant->uploadAbstracts->first())
                <p><strong>Abstract Information : </strong>Your abstract status is
                    <strong>{{ Auth::user()->participant->uploadAbstracts->first()->status }}</strong>
                    <br>
                </p>
            @else
                <p><strong>Information : </strong>You haven't added abstract yet, add abstract in abstract menu</p>
            @endif
        @endif
    </div>
    <div class="row mx-3">
        @if (Auth::user()->participant->payments->first())
            <p><strong>Payment Information : </strong>Your payment status is
                <strong>{{ Auth::user()->participant->payments->first()->validation }}</strong>
            </p>
        @else
            <p><strong>Information : </strong>you have not made a payment, add payment in payment menu</p>
        @endif
    </div>
    <div class="row mx-3">
        @if (!in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler', 'participant_student']))
            <a href="https://jicest.unja.ac.id/uploads/TemplateAbstract2024.docx" class="text-primary"><i class="fa fa-file-text-o"style="font-size:100px"
                    aria-hidden="true"></i>
                <br>
                Template Article
            </a>
        @endif
    </div>

@endsection
