<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function payment()
    {
        if (Auth::user()->role == 'administrator') {
            return abort(403);
        }

        return view('participant.payment', [
            'title' => 'Payment',
        ]);
    }

    public function validation()
    {
        $this->authorize('administrator');

        return view('administrator.payment-validation', [
            'title' => 'Verify Payments',
        ]);
    }

    public function participantPaid()
    {
        $this->authorize('administrator');

        return view('administrator.participant-have-paid', [
            'title' => 'Participant Payments',
        ]);
    }

    public function presenterPaid()
    {
        $this->authorize('administrator');

        return view('administrator.presenter-have-paid', [
            'title' => 'Presenter Payments',
        ]);
    }
}
