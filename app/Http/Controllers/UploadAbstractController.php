<?php

namespace App\Http\Controllers;

use PDF;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\UploadAbstract;
use App\Models\Participant;
use Illuminate\Support\Facades\Storage;

class UploadAbstractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function review()
    {
        $this->authorize('administrator');
        return view('administrator.review-abstract', [
            'title' => 'Review Abstract'
        ]);
    }

    public function testEmail()
    {
        $data = array('name' => 'Khoirul Anam');
        $storageDisk = config('filesystems.storage');
        $attachmentPath = $storageDisk === 'public_html'
            ? config('filesystems.disks.public_html.root') . '/letter-of-acceptance/LOA-Muhammad Ridho.pdf'
            : public_path() . '/storage/letter-of-acceptance/LOA-Muhammad Ridho.pdf';

        $attachment = [$attachmentPath];


        Mail::to('anam@gmail.com', 'Anam')->send(new SendMail('Abstract Rejected', "<p>
        Dear ANAM, <br>
        Congratulation! We are happy to inform you that your abstract for The 11st International Conference of the
        Indonesian
        Chemical Society
        (ICICS 2023) <br>
        Title of abstract : <strong>ANM ANAM</strong> has been accepted. <br>
        It is our great pleasure therefore to request that you submit your full paper, no later than September 30th
        2023 by following the template as attached in the website: icics2023.unja.ac.id.
        In addition, you are requested to proceed with the payment of the registration fee (no later than September 16th
        2023). <br> <br>
        After finishing the payment, kindly send the receipt to the committee via website. Here is the bank information
        detail: <br>
        Account name : Perkumpulan Indonesian Chemical Society <br>
        Account number : 698124931 <br>
        Bank name : Bank Negara Indonesia (BNI) <br> <br>
        For the purpose of the conference proceeding, we also require that you submit a detailed resume. Please kindly
        acknowledge the receipt of this email, and do not hesitate to contact the organizing committee
        (icics2023@.unja.ac.id) for any inquiry. Thank you for your attention. <br> <br>
        Warm regards, <br><br><br><br>
        Steering Committee ICICS 2023</p>", $attachment));

        // Mail::send('mail.accepted-abstract', $data, function ($message) {
        //     $message->to('anam@gmail.com', 'Anam')->subject('Abstract Accepted');
        //     // $message->attach(asset('storage/letter-of-acceptance/LOA-Muhammad Ridho.pdf'));
        //     $message->attach($attachmentPath);
        // });

        dd('Email Sended');
    }
    
    public function repair2() {

    $abstracts = UploadAbstract::where('loa', '!=', null)->get();

        foreach ($abstracts as $abstract) {
            $user = Participant::find($abstract->participant_id);
            // echo $abstract->title ." ---- ". $user->full_name1." ---- ". $user->institution . "<br>";
            $loa = PDF::loadView('administrator.pdf.loa', [
                'full_name' => $user->full_name1,
                'institution' => $user->institution,
                'abstractTitle' => $abstract->title,
            ])->setPaper('a4', 'potrait');
            Storage::disk(config('filesystems.storage'))->put('letter-of-acceptance/' . 'LOA-ABS' . $abstract->id . '-' . $user->full_name1 . '.pdf', $loa->output());
        }
    }
    
    public function repair() {

    $abstracts = UploadAbstract::where('loa', '!=', null)->get();

        foreach ($abstracts as $abstract) {
            $user = Participant::find($abstract->participant_id);
            // echo $abstract->title ." ---- ". $user->full_name1." ---- ". $user->institution . "<br>";
            $loa = PDF::loadView('administrator.pdf.loa', [
                'full_name' => $user->full_name1,
                'institution' => $user->institution,
                'abstractTitle' => $abstract->title,
            ])->setPaper('a4', 'potrait');
            Storage::disk(config('filesystems.storage'))->put('letter-of-acceptance/' . 'LOA-ABS' . $abstract->id . '-' . $user->full_name1 . '.pdf', $loa->output());
        }
    }
}
