@extends('layouts.participant')

@section('css')
    @parent
    {{-- Inherit CSS dari layouts/participant.blade.php untuk User Menu styling --}}

<style>
    /* Scoped styles untuk dashboard submissions - tidak mempengaruhi User Menu */
    /* Semua CSS di-scope dalam .dashboard-submissions-wrapper sehingga TIDAK mempengaruhi sidebar */

    .dashboard-submissions-wrapper .submission-card {
        border: 1px solid #dee2e6;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        background: white;
    }

    .dashboard-submissions-wrapper .submission-card:hover {
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    .dashboard-submissions-wrapper .submission-header {
        background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%);
        color: #ffffff !important;
        padding: 24px;
        position: relative;
    }

    .dashboard-submissions-wrapper .submission-header * {
        color: #ffffff !important;
    }

    .dashboard-submissions-wrapper .submission-header.participant-type {
        background: linear-gradient(135deg, #047857 0%, #059669 100%);
    }

    .dashboard-submissions-wrapper .conference-badge {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        padding: 6px 16px;
        border-radius: 25px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
        display: inline-block;
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #ffffff !important;
    }

    .dashboard-submissions-wrapper .status-row {
        display: flex;
        align-items: center;
        padding: 18px 0;
        border-bottom: 1px solid #f1f3f5;
    }

    .dashboard-submissions-wrapper .status-row:last-child {
        border-bottom: none;
    }

    .dashboard-submissions-wrapper .status-icon {
        width: 45px;
        text-align: center;
        margin-right: 16px;
        flex-shrink: 0;
    }

    .dashboard-submissions-wrapper .status-content {
        flex: 1;
        min-width: 0;
    }

    .dashboard-submissions-wrapper .status-label {
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 4px;
        font-size: 14px;
    }

    .dashboard-submissions-wrapper .status-date {
        font-size: 12px;
        color: #6b7280;
        margin-top: 4px;
    }

    .dashboard-submissions-wrapper .status-badge {
        padding: 6px 16px;
        border-radius: 25px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }

    .dashboard-submissions-wrapper .status-accepted,
    .dashboard-submissions-wrapper .status-valid {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #86efac;
    }

    .dashboard-submissions-wrapper .status-rejected,
    .dashboard-submissions-wrapper .status-invalid {
        background-color: #fee2e2;
        color: #991b1b;
        border: 1px solid #fca5a5;
    }

    .dashboard-submissions-wrapper .status-pending {
        background-color: #fef3c7;
        color: #92400e;
        border: 1px solid #fde047;
    }

    .dashboard-submissions-wrapper .status-not-submitted {
        background-color: #f3f4f6;
        color: #6b7280;
        border: 1px solid #d1d5db;
    }

    .dashboard-submissions-wrapper .empty-state {
        text-align: center;
        padding: 50px 30px;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border: 2px dashed #93c5fd;
        border-radius: 12px;
    }

    .dashboard-submissions-wrapper .template-section {
        padding: 35px 30px;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border-radius: 12px;
        margin-top: 30px;
        border: 1px solid #bfdbfe;
    }

    .dashboard-submissions-wrapper .template-section-title {
        text-align: center;
        font-size: 20px;
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 25px;
    }

    .dashboard-submissions-wrapper .template-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .dashboard-submissions-wrapper .template-card {
        background: white;
        border: 2px solid #bfdbfe;
        border-radius: 10px;
        padding: 25px 20px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .dashboard-submissions-wrapper .template-card:hover {
        border-color: #1e40af;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.15);
        transform: translateY(-3px);
    }

    .dashboard-submissions-wrapper .template-card a {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .dashboard-submissions-wrapper .template-card .template-icon {
        color: #1e40af;
        margin-bottom: 15px;
    }

    .dashboard-submissions-wrapper .template-card .template-title {
        font-size: 16px;
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 8px;
    }

    .dashboard-submissions-wrapper .template-card .template-desc {
        font-size: 13px;
        color: #6b7280;
        line-height: 1.5;
    }

    .dashboard-submissions-wrapper .card-title-text {
        color: #ffffff !important;
        font-weight: 600 !important;
        margin: 0 !important;
    }

    .dashboard-submissions-wrapper .card-subtitle-text {
        color: rgba(255, 255, 255, 0.95) !important;
        font-size: 14px !important;
    }

    .dashboard-submissions-wrapper .card-meta-text {
        color: rgba(255, 255, 255, 0.85) !important;
        font-size: 12px !important;
    }

    .dashboard-submissions-wrapper .page-title {
        font-weight: 600;
        margin-bottom: 20px;
        color: #1f2937;
    }
</style>
@endsection

@section('content-dashboard')
    <div class="dashboard-submissions-wrapper">
        <h3 class="page-title">My Submissions</h3>

        @if (!in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler', 'participant_student']))
            @php
                $abstracts = Auth::user()->participant->uploadAbstracts()->orderBy('created_at', 'desc')->get();
            @endphp

            @if ($abstracts->count() > 0)
                @foreach ($abstracts as $index => $abstract)
                    @php
                        // Get payment for this abstract
                        $payment = App\Models\Payment::where('upload_abstract_id', $abstract->id)->first();

                        // Get fulltext for this payment
                        $fulltext = null;
                        if ($payment) {
                            $fulltext = App\Models\UploadFulltext::where('payment_id', $payment->id)->first();
                        }

                        // Determine conference year based on submission date
                        // JICEST is held in November, so:
                        // - Submissions Jan-Nov: for current year conference
                        // - Submissions in Dec: for next year conference (after event)
                        $submissionYear = $abstract->created_at->year;
                        if ($abstract->created_at->month <= 11) {
                            $conferenceYear = $submissionYear;
                        } else {
                            $conferenceYear = $submissionYear + 1;
                        }
                    @endphp

                    <div class="submission-card">
                        <!-- Card Header -->
                        <div class="submission-header">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                                <div style="flex: 1; min-width: 0;">
                                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                        <span class="conference-badge">JICEST {{ $conferenceYear }}</span>
                                        <span class="card-meta-text" style="font-size: 11px; opacity: 0.8;">
                                            <i class="fa fa-hashtag" style="margin-right: 3px;"></i>{{ $abstracts->count() - $index }}
                                        </span>
                                    </div>
                                    <h4 class="card-title-text" style="margin: 0; font-size: 18px; font-weight: 700; line-height: 1.4;">
                                        {{ $abstract->title }}
                                    </h4>
                                </div>
                            </div>
                            <p class="card-meta-text" style="margin: 0; display: flex; align-items: center; gap: 5px;">
                                <i class="fa fa-calendar"></i>
                                <span>Submitted: {{ $abstract->created_at->format('F d, Y') }}</span>
                            </p>
                        </div>

                        <!-- Card Body -->
                        <div style="padding: 24px;">
                            <!-- Abstract Status -->
                            <div class="status-row">
                                <div class="status-icon">
                                    @if ($abstract->status === 'accepted')
                                        <i class="fa fa-check-circle" style="font-size: 24px; color: #10b981;"></i>
                                    @elseif ($abstract->status === 'rejected')
                                        <i class="fa fa-times-circle" style="font-size: 24px; color: #ef4444;"></i>
                                    @else
                                        <i class="fa fa-clock-o" style="font-size: 24px; color: #f59e0b;"></i>
                                    @endif
                                </div>
                                <div class="status-content">
                                    <div class="status-label">Abstract Status</div>
                                </div>
                                <div>
                                    <span class="status-badge status-{{ $abstract->status === 'accepted' ? 'accepted' : ($abstract->status === 'rejected' ? 'rejected' : 'pending') }}">
                                        {{ ucfirst($abstract->status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Payment Status -->
                            <div class="status-row">
                                <div class="status-icon">
                                    @if ($payment && $payment->validation === 'valid')
                                        <i class="fa fa-check-circle" style="font-size: 24px; color: #10b981;"></i>
                                    @elseif ($payment && $payment->validation === 'invalid')
                                        <i class="fa fa-times-circle" style="font-size: 24px; color: #ef4444;"></i>
                                    @elseif ($payment)
                                        <i class="fa fa-clock-o" style="font-size: 24px; color: #f59e0b;"></i>
                                    @else
                                        <i class="fa fa-exclamation-circle" style="font-size: 24px; color: #9ca3af;"></i>
                                    @endif
                                </div>
                                <div class="status-content">
                                    <div class="status-label">Payment Status</div>
                                    @if ($payment)
                                        <div class="status-date">
                                            <i class="fa fa-calendar" style="margin-right: 3px;"></i>
                                            Submitted: {{ $payment->created_at->format('F d, Y') }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    @if ($payment)
                                        <span class="status-badge status-{{ $payment->validation === 'valid' ? 'valid' : ($payment->validation === 'invalid' ? 'invalid' : 'pending') }}">
                                            {{ ucfirst($payment->validation) }}
                                        </span>
                                    @else
                                        <span class="status-badge status-not-submitted">
                                            Not Submitted
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Fulltext Status -->
                            <div class="status-row">
                                <div class="status-icon">
                                    @if ($fulltext && $fulltext->validation === 'valid')
                                        <i class="fa fa-check-circle" style="font-size: 24px; color: #10b981;"></i>
                                    @elseif ($fulltext && $fulltext->validation === 'invalid')
                                        <i class="fa fa-times-circle" style="font-size: 24px; color: #ef4444;"></i>
                                    @elseif ($fulltext)
                                        <i class="fa fa-clock-o" style="font-size: 24px; color: #f59e0b;"></i>
                                    @else
                                        <i class="fa fa-exclamation-circle" style="font-size: 24px; color: #9ca3af;"></i>
                                    @endif
                                </div>
                                <div class="status-content">
                                    <div class="status-label">Full-text Status</div>
                                    @if ($fulltext)
                                        <div class="status-date">
                                            <i class="fa fa-calendar" style="margin-right: 3px;"></i>
                                            Submitted: {{ $fulltext->created_at->format('F d, Y') }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    @if ($fulltext)
                                        <span class="status-badge status-{{ $fulltext->validation === 'valid' ? 'valid' : ($fulltext->validation === 'invalid' ? 'invalid' : 'pending') }}">
                                            {{ ucfirst($fulltext->validation) }}
                                        </span>
                                    @else
                                        <span class="status-badge status-not-submitted">
                                            Not Submitted
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="fa fa-info-circle" style="font-size: 48px; color: #60a5fa; margin-bottom: 15px;"></i>
                    <h5 style="font-weight: 600; color: #1f2937; margin-bottom: 8px;">No abstracts submitted yet</h5>
                    <p style="color: #6b7280; margin: 0;">Please add your abstract in the abstract menu to get started.</p>
                </div>
            @endif
        @else
            <!-- For regular participants without presenter role -->
            @php
                $payments = Auth::user()->participant->payments()->orderBy('created_at', 'desc')->get();
            @endphp

            @if ($payments->count() > 0)
                @foreach ($payments as $index => $payment)
                    @php
                        // JICEST is held in November, so:
                        // - Submissions Jan-Nov: for current year conference
                        // - Submissions in Dec: for next year conference (after event)
                        $submissionYear = $payment->created_at->year;
                        if ($payment->created_at->month <= 11) {
                            $conferenceYear = $submissionYear;
                        } else {
                            $conferenceYear = $submissionYear + 1;
                        }
                    @endphp

                    <div class="submission-card">
                        <div class="submission-header participant-type">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                                <div style="flex: 1; min-width: 0;">
                                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                        <span class="conference-badge">JICEST {{ $conferenceYear }}</span>
                                        <span class="card-meta-text" style="font-size: 11px; opacity: 0.8;">
                                            <i class="fa fa-hashtag" style="margin-right: 3px;"></i>{{ $payments->count() - $index }}
                                        </span>
                                    </div>
                                    <h4 class="card-title-text" style="margin: 0; font-size: 18px; font-weight: 700;">
                                        <i class="fa fa-ticket" style="margin-right: 10px;"></i>
                                        Participant Registration
                                    </h4>
                                </div>
                            </div>
                            <p class="card-meta-text" style="margin: 0; display: flex; align-items: center; gap: 5px;">
                                <i class="fa fa-calendar"></i>
                                <span>Submitted: {{ $payment->created_at->format('F d, Y') }}</span>
                            </p>
                        </div>
                        <div style="padding: 24px;">
                            <div class="status-row">
                                <div class="status-icon">
                                    @if ($payment->validation === 'valid')
                                        <i class="fa fa-check-circle" style="font-size: 24px; color: #10b981;"></i>
                                    @elseif ($payment->validation === 'invalid')
                                        <i class="fa fa-times-circle" style="font-size: 24px; color: #ef4444;"></i>
                                    @else
                                        <i class="fa fa-clock-o" style="font-size: 24px; color: #f59e0b;"></i>
                                    @endif
                                </div>
                                <div class="status-content">
                                    <div class="status-label">Payment Status</div>
                                </div>
                                <div>
                                    <span class="status-badge status-{{ $payment->validation === 'valid' ? 'valid' : ($payment->validation === 'invalid' ? 'invalid' : 'pending') }}">
                                        {{ ucfirst($payment->validation) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="fa fa-info-circle" style="font-size: 48px; color: #60a5fa; margin-bottom: 15px;"></i>
                    <h5 style="font-weight: 600; color: #1f2937; margin-bottom: 8px;">No payment submitted yet</h5>
                    <p style="color: #6b7280; margin: 0;">Please add your payment in the payment menu.</p>
                </div>
            @endif
        @endif

        <!-- Template Download Section -->
        @if (!in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler', 'participant_student']))
            <div class="template-section">
                <h4 class="template-section-title">
                    <i class="fa fa-download" style="margin-right: 10px;"></i>
                    Download Templates
                </h4>

                <div class="template-grid">
                    <!-- Abstract Template -->
                    <div class="template-card">
                        <a href="https://jicest.unja.ac.id/uploads/TemplateAbstract2025.docx">
                            <div class="template-icon">
                                <i class="fa fa-file-text-o" style="font-size: 50px;"></i>
                            </div>
                            <div class="template-title">Abstract Template</div>
                            <div class="template-desc">
                                Download the template for submitting your abstract to JICEST conference
                            </div>
                        </a>
                    </div>

                    <!-- Full Paper Template -->
                    <div class="template-card">
                        <a href="https://jicest.unja.ac.id/uploads/downloads/JICEST_Paper.docx">
                            <div class="template-icon">
                                <i class="fa fa-file-word-o" style="font-size: 50px;"></i>
                            </div>
                            <div class="template-title">Full Paper Template</div>
                            <div class="template-desc">
                                Download the template for submitting your full paper after acceptance
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
