<?php

namespace App\Http\Livewire;

use App\Mail\SendMail;
use App\Models\Fee;
use Livewire\Component;
use PDF;
use Livewire\WithPagination;
use App\Models\UploadAbstract;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReviewAbstract extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $review = false;
    public $topic, $type, $title, $authors, $institutions, $abstract, $keywords, $presenter;
    public $search = '', $search2, $abstract_review, $status_hki;
    public $validVouchers = ['JICESTFST50RB', 'JICESTFST100RB'];

    //LOA
    public $full_name, $institution, $abstractTitle, $loa, $loaPath;
    //Invoice
    public $email, $fee, $participant_type, $invoicePath;

    public function empty()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->topic = null;
        $this->type = null;
        $this->title = null;
        $this->keywords = null;
        $this->authors = null;
        $this->abstract = null;
        $this->institutions = null;
        $this->presenter = null;
        $this->attendance = null;
        $this->abstract_review = null;
    }


    public function cancel()
    {
        $this->review = false;
    }

    public function showReview($id)
    {
        $abstract = UploadAbstract::find($id);
        if($this->status_hki = $abstract->participant->hki_status == 'not yet validated'){

        return redirect('/review-abstract')->with('message', "Cannot review ".$abstract->participant->full_name1." 's abstract because his/her HKI member status has not been validated. click the member hki validation menu to validate!");
        }else{
            $this->review = true;
            $this->abstract_review = $id;
            $this->topic = $abstract->topic;
            $this->type = $abstract->type;
            $this->title = $abstract->title;
            $this->keywords = $abstract->keywords;
            $this->authors = $abstract->authors;
            $this->abstract = $abstract->abstract;
            $this->loa = $abstract->loa;
            $this->attendance = $abstract->attendance;
            $this->institutions = $abstract->institutions;
            $this->presenter = $abstract->presenter;
        }


    }
    
    public function applyDiscount($fee, $amount1, $amount2)
    {
        // Extract the IDR and USD amounts using regular expressions
        preg_match('/IDR ([\d.,]+)/', $fee, $idrMatch);
        preg_match('/\$([\d.]+)/', $fee, $usdMatch);

        // Get the extracted amounts, convert them to numbers, and apply discounts
        $idr = isset($idrMatch[1]) ? floatval(str_replace('.', '', $idrMatch[1])) : 0;
        $usd = isset($usdMatch[1]) ? floatval($usdMatch[1]) : 0;

        // Apply the discount
        $idrDiscounted = max(0, $idr - $amount1);  // Ensure it doesn't go negative
        $usdDiscounted = max(0, $usd - $amount2);

        // Format the results back into a string
        $newFee = 'IDR ' . number_format($idrDiscounted, 0, ',', '.') . ' / $' . number_format($usdDiscounted, 1) . ' USD';

        return $newFee;
    }

    public function showValidate()
    {
        \Log::info('showValidate() called for abstract review ID: ' . $this->abstract_review);
        $participant = UploadAbstract::find($this->abstract_review)->participant;

        $participantType = $participant->participant_type;
        $attendance = $participant->attendance;

        // Get fee from database using Fee model
        $feeData = Fee::getFeeForParticipant($participantType, $attendance);
        $this->fee = $feeData['formatted'];

        $user_id = $participant->user_id;
        $user = User::where('id', $user_id)->first();
        // $this->fee = $user;

        if ($user->voucher != null) {
            if ($user->voucher == $this->validVouchers[0]) {
                $this->fee = $this->applyDiscount($this->fee, 50000, 5);
            } else {
                $this->fee = $this->applyDiscount($this->fee, 100000, 10);
            }
        }

        $this->full_name = $participant->full_name1;
        $this->institution = $participant->institution;
        $this->abstractTitle = UploadAbstract::find($this->abstract_review)->title;
        $this->email = $participant->user->email;
        $this->participant_type = $participant->participant_type;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function back()
    {
        $this->review = false;
        $this->dispatchBrowserEvent('to-top');
    }

    public function accept()
    {
        try {
            \Log::info('Accept function called for abstract review ID: ' . $this->abstract_review);
            $this->email = UploadAbstract::find($this->abstract_review)->participant->user->email;
            \Log::info('Email found: ' . $this->email);

            $loa = PDF::loadView('administrator.pdf.loa', [
                'full_name' => $this->full_name,
                'institution' => $this->institution,
                'abstractTitle' => $this->abstractTitle
            ])->setPaper('a4', 'potrait');
            Storage::disk('public')->put('letter-of-acceptance/' . 'LOA-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf', $loa->output());
            $this->loaPath = 'letter-of-acceptance/' . 'LOA-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf';
            
            $invoice = PDF::loadView('administrator.pdf.invoice', [
                'full_name' => $this->full_name,
                'fee' => $this->fee,
                'participant_type' => $this->participant_type,
                'email' => $this->email
            ])->setPaper('a4', 'landscape');
            Storage::disk('public')->put('invoice/' . 'Invoice-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf', $invoice->output());
            $this->invoicePath = 'invoice/' . 'Invoice-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf';

            UploadAbstract::where('id', $this->abstract_review)->update([
                'status' => 'accepted',
                'loa' => $this->loaPath,
                'invoice' => $this->invoicePath,
                'reviewed_by' => Auth::user()->email
            ]);

            $linkLoa = env('APP_URL') . "/storage/" . $this->loaPath;
            $linkInvoice = env('APP_URL') . "/storage/" . $this->invoicePath;

            \Log::info('Generated LOA URL: ' . $linkLoa);
            \Log::info('Generated Invoice URL: ' . $linkInvoice);
            \Log::info('Attempting to send email to: ' . $this->email);
            
            Mail::to($this->email, $this->full_name)->send(new SendMail('ABSTRACT ACCEPTANCE', "<p>
            Dear " . $this->full_name . ", <br>
            Congratulations! We are happy to inform you that your abstract for The 2nd Jambi International Conference on Engineering, Science, and Technology (JICEST 2025) <br>
            Title of abstract: <strong>" . $this->abstractTitle . "</strong> has been accepted. <br><br>
            Please download your documents:<br>
            <a href='" . $linkLoa . "'>Download Letter of Acceptance</a><br>
            <a href='" . $linkInvoice . "'>Download Invoice</a>
            <br>
            <br>
            <br>
            It is our great pleasure therefore to request that you submit your full paper, no later than November 22nd, 2025 by following the template as attached in the website: <a href='http://localhost:8000'>jicest.unja.ac.id</a>. <br>
            In addition, you are requested to proceed with the payment of the registration fee (no later than November 22nd, 2025). <br><br>
            For payment information, please contact our contact persons:<br>
            - Yudi Arista Yulanda: +6285266524920<br>
            - Andini Vermita Bestari: +6285719405940<br>
            - Email: jicest@unja.ac.id<br><br>
            For the purpose of the conference proceeding, we also require that you submit a detailed resume. Please kindly
            acknowledge the receipt of this email, and do not hesitate to contact the organizing committee
            (jicest@unja.ac.id) for any inquiry. Thank you for your attention. <br> <br>
            Warm regards, <br><br><br><br>
            Steering Committee JICEST 2025</p>"));
            
            \Log::info('Email sent successfully');
            $this->review = false;
            
            $this->dispatchBrowserEvent('review-success', [
                'title' => 'Abstract Accepted!',
                'message' => 'Abstract has been accepted successfully. LOA and invoice have been sent to the author.',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in accept function: ' . $e->getMessage());
            
            $this->dispatchBrowserEvent('review-error', [
                'title' => 'Accept Failed',
                'message' => 'An error occurred while accepting the abstract. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

    public function reject()
    {
        try {
            $this->email = UploadAbstract::find($this->abstract_review)->participant->user->email;
            
            UploadAbstract::where('id', $this->abstract_review)->update([
                'status' => 'rejected',
                'reviewed_by' => Auth::user()->email
            ]);
            
            Mail::to($this->email, $this->full_name)->send(new SendMail('ABSTRACT REJECTION', 'Your abstract for The 2nd Jambi International Conference on Engineering, Science, and Technology (JICEST 2025) has been rejected.'));
            
            $this->review = false;
            
            $this->dispatchBrowserEvent('review-success', [
                'title' => 'Abstract Rejected!',
                'message' => 'Abstract has been rejected and notification email sent to the author.',
                'icon' => 'warning'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in reject function: ' . $e->getMessage());
            
            $this->dispatchBrowserEvent('review-error', [
                'title' => 'Reject Failed',
                'message' => 'An error occurred while rejecting the abstract. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.review-abstract', [
            'abstracts' => UploadAbstract::where('status', 'like', '%' . $this->search)->whereHas('participant', function ($query) {
                $query->where('full_name1', 'like', '%' . $this->search2 . '%');
            })->orderBy('topic')->paginate(10)
        ]);
    }
}
