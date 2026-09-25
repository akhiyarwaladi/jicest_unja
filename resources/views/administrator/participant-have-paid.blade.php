@extends('layouts.administrator')

@section('content-dashboard')
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h4>Participant Payments</h4>
            </div>
        </div>
    </div>
    <livewire:participant-paid />
@endsection
