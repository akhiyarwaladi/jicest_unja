@extends('layouts.administrator')

@section('content-dashboard')
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h4>HKI Member Verification</h4>
            </div>
        </div>
    </div>
    <livewire:validate-member />
@endsection
