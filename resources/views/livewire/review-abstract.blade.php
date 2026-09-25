@php
    $topics = [
        'Engineering' => [
            'sustainable_engineering' => 'Sustainable Engineering',
            'socio_engineering' => 'Socio-Engineering',
            'technopreneurship' => 'Technopreneurship',
            'renewable_energy' => 'Renewable Energy',
            'advanced_material' => 'Advanced Material',
        ],
        'Science & Technology' => [
            'climate_change' => 'Climate Change',
            'big_data_analytics' => 'Big Data and Analytics',
            'food_science_technology' => 'Food Science and Technology',
            'bio_technology' => 'Bio Technology',
            'ethnobiology' => 'Ethnobiology',
            'green_chemistry' => 'Green Chemistry',
            'bio_medic_technology' => 'Bio Medic Technology',
            'biodiversity' => 'Biodiversity',
            'earth_science' => 'Earth Science',
        ],
        'Edu Technology' => [
            'digital_transformation_education' => 'Digital Transformation in Education',
            'stem_education' => 'STEM (Science, Technology, Engineering, and Mathematics) Education',
        ],
    ];
    
    function getTopicLabel($topicValue, $topics) {
        foreach ($topics as $category => $options) {
            if (array_key_exists($topicValue, $options)) {
                return $options[$topicValue]; // Return the label
            }
        }
        return null; // Return null if not found
    }
@endphp

<style>
    .review-accept-modal .modal-dialog {
        max-width: 780px;
        margin: 1.75rem auto;
    }

    .review-accept-modal .modal-content {
        overflow: hidden;
        border: 1px solid var(--ed-hair);
        border-radius: 0;
        background: var(--ed-paper);
        box-shadow: 0 24px 64px rgba(11, 27, 20, .22);
    }

    .review-accept-modal .modal-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 24px;
        padding: 28px 32px 24px;
        border: 0;
        background: var(--ed-ink);
        color: #fff;
    }

    .review-accept-modal .review-accept-kicker {
        margin: 0;
        color: #6ee7b7;
        font-family: 'IBM Plex Mono', monospace;
        font-size: 11px;
        letter-spacing: .14em;
        text-transform: uppercase;
    }

    .review-accept-modal .review-accept-title {
        margin: 7px 0 8px;
        color: #fff;
        font-family: 'IBM Plex Serif', Georgia, serif;
        font-size: clamp(28px, 4vw, 38px);
        font-weight: 500;
        line-height: 1.1;
    }

    .review-accept-modal .review-accept-description {
        max-width: 570px;
        margin: 0;
        color: rgba(255, 255, 255, .72);
        font-size: 14px;
        line-height: 1.6;
    }

    .review-accept-modal .review-accept-close {
        flex: 0 0 auto;
        width: 40px;
        height: 40px;
        padding: 0;
        border: 1px solid rgba(255, 255, 255, .32);
        background: transparent;
        color: #fff;
        font-size: 26px;
        line-height: 1;
        transition: background-color .3s ease, color .3s ease;
    }

    .review-accept-modal .review-accept-close:hover,
    .review-accept-modal .review-accept-close:focus {
        background: #fff;
        color: var(--ed-ink);
    }

    .review-accept-modal .modal-body {
        padding: 26px 32px 30px;
        background: var(--ed-paper);
        color: var(--ed-ink);
    }

    .review-accept-modal .review-accept-recipient {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 12px 14px;
        margin-bottom: 24px;
        border-top: 1px solid var(--ed-hair);
        border-bottom: 1px solid var(--ed-hair);
        background: #fff;
    }

    .review-accept-modal .review-accept-label {
        display: block;
        margin-bottom: 7px;
        color: var(--ed-ink-70);
        font-family: 'IBM Plex Mono', monospace;
        font-size: 11px;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .review-accept-modal .review-accept-recipient .review-accept-label {
        margin: 0;
        white-space: nowrap;
    }

    .review-accept-modal .review-accept-recipient strong {
        color: var(--ed-ink);
        font-size: 14px;
        overflow-wrap: anywhere;
        text-align: right;
    }

    .review-accept-modal .review-accept-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px 20px;
    }

    .review-accept-modal .review-accept-field--wide {
        grid-column: 1 / -1;
    }

    .review-accept-modal .form-group {
        margin: 0;
    }

    .review-accept-modal .form-control {
        min-height: 46px;
        padding: 10px 12px;
        border: 1px solid var(--ed-hair);
        border-radius: 0;
        background: #fff;
        color: var(--ed-ink);
        box-shadow: none;
    }

    .review-accept-modal textarea.form-control {
        min-height: 92px;
        resize: vertical;
    }

    .review-accept-modal .form-control:focus {
        border-color: var(--ed-accent);
        box-shadow: 0 0 0 2px rgba(4, 120, 87, .14);
    }

    .review-accept-modal .form-control[readonly] {
        background: var(--ed-paper);
        color: var(--ed-ink-70);
    }

    .review-accept-modal .invalid-feedback {
        color: #b91c1c;
    }

    .review-accept-modal .modal-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 18px 32px 24px;
        border-top: 1px solid var(--ed-hair);
        background: #fff;
    }

    .review-accept-modal .review-accept-footnote {
        max-width: 360px;
        margin: 0;
        color: var(--ed-ink-70);
        font-family: 'IBM Plex Mono', monospace;
        font-size: 11px;
        line-height: 1.55;
    }

    .review-accept-modal .review-accept-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 10px;
    }

    .review-accept-modal .review-accept-btn {
        min-height: 44px;
        padding: .7rem 1rem;
        border: 1px solid var(--ed-hair);
        border-radius: 0;
        font-family: 'IBM Plex Mono', monospace;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: .08em;
        text-transform: uppercase;
        transition: background-color .3s ease, border-color .3s ease, color .3s ease;
    }

    .review-accept-modal .review-accept-btn--secondary {
        background: var(--ed-paper);
        color: var(--ed-ink);
    }

    .review-accept-modal .review-accept-btn--secondary:hover,
    .review-accept-modal .review-accept-btn--secondary:focus {
        border-color: var(--ed-ink);
        background: #fff;
        color: var(--ed-ink);
    }

    .review-accept-modal .review-accept-btn--primary {
        border-color: var(--ed-ink);
        background: var(--ed-ink);
        color: #fff;
    }

    .review-accept-modal .review-accept-btn--primary:hover,
    .review-accept-modal .review-accept-btn--primary:focus {
        background: #fff;
        color: var(--ed-ink);
    }

    .review-accept-modal .review-accept-btn:disabled {
        cursor: wait;
        opacity: .65;
    }

    @media (max-width: 640px) {
        .review-accept-modal .modal-dialog {
            margin: .75rem;
        }

        .review-accept-modal .modal-header {
            padding: 22px 20px 20px;
        }

        .review-accept-modal .modal-body {
            padding: 22px 20px 24px;
        }

        .review-accept-modal .review-accept-grid {
            grid-template-columns: 1fr;
        }

        .review-accept-modal .review-accept-recipient {
            align-items: flex-start;
            flex-direction: column;
            gap: 6px;
        }

        .review-accept-modal .review-accept-recipient strong {
            text-align: left;
        }

        .review-accept-modal .modal-footer {
            align-items: stretch;
            flex-direction: column;
            padding: 18px 20px 22px;
        }

        .review-accept-modal .review-accept-actions {
            justify-content: stretch;
        }

        .review-accept-modal .review-accept-btn {
            flex: 1;
        }
    }
</style>

<div>

    @if ($review !== true)
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="search2">Search</label>
                    <input type="text" class="form-control" id="search2" name="search2"
                        wire:model.debounce.500ms="search2" placeholder="Search by presenter name">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="participant">
                        Filter Status Reviewed
                    </label>
                    <select class="custom-select" id="search" name="search" wire:model='search'>
                        <option value="">All</option>
                        <option value="ted">Reviewed</option>
                        <option value="not yet reviewed">Not yet reviewed</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="date_from">Date From</label>
                    <input type="date" class="form-control" id="date_from" name="date_from"
                        wire:model="date_from">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="date_to">Date To</label>
                    <input type="date" class="form-control" id="date_to" name="date_to"
                        wire:model="date_to">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <button class="btn btn-success" wire:click="exportExcel()" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="exportExcel">
                        <i class="fa fa-file-excel-o mr-1"></i> Export to Excel
                    </span>
                    <span wire:loading wire:target="exportExcel">
                        <i class="fa fa-spinner fa-spin mr-1"></i> Exporting...
                    </span>
                </button>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">#</th>
                                <th scope="col">Presenter</th>
                                <th scope="col">Title</th>
                                <th scope="col">Tanggal Submit</th>
                                <th scope="col">Status</th>
                                <th scope="col">Reviewed By</th>
                                <th scope="col">LOA</th>
                                <th scope="col">Invoice</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($abstracts) == 0)
                                <tr>
                                    <td colspan="9" align="center">No abstract submissions found.</td>
                                </tr>
                            @endif
                            @foreach ($abstracts as $item)
                                <tr>
                                    <td><button class="btn btn-primary btn-sm"
                                            wire:click="showReview('{{ $item->id }}')">Review abstract</button></td>
                                    <td>{{ ($abstracts->currentpage() - 1) * $abstracts->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $item->participant->full_name1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->reviewed_by }}</td>
                                    <td>
                                        @if ($item->loa)
                                            <a href="{{ asset('storage/' . $item->loa) }}" target="_blank"
                                                style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                                    aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->invoice)
                                            <a href="{{ asset('storage/' . $item->invoice) }}" target="_blank"
                                                style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                                    aria-hidden="true"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination pagination-sm mt-3 float-right ">
                    @if (count($abstracts) != 0)
                        {{ $abstracts->links() }}
                    @endif
                </ul>
            </div>
        </div>
    @else
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <div class="row">
            <div class="form-group mx-3">
                <label for="topic">
                    Topic
                </label>
                <select disabled class="custom-select @error('topic') is-invalid @enderror" id="topic"
                    name="topic" wire:model='topic'>
                    <!--<option value="">Choose One</option>-->
                    <!--<option value="organic and bio chemistry">Organic and Bio Chemistry</option>-->
                    <!--<option value="analytical and environmental chemistry">Analytical and Environmental-->
                    <!--    Chemistry-->
                    <!--</option>-->
                    <!--<option value="inorganic and material chemistry">Inorganic and Material Chemistry-->
                    <!--</option>-->
                    <!--<option value="physical and computation chemistry">Physical and Computation Chemistry-->
                    <!--</option>-->
                    <!--<option value="chemical education">Chemical Education</option>-->
                    <option value="">Choose One</option>
                     @foreach($topics as $category => $options)
                        <optgroup label="{{ $category }}">
                            @foreach($options as $value => $label)
                                <option value="{{ $value }}" @if ($topic == $value) selected @endif>{{ $label }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('topic')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">
                    Type
                </label>
                <select disabled class="custom-select @error('type') is-invalid @enderror" id="type" name="type"
                    wire:model='type'>
                    <option value="">Choose One</option>
                    <option value="oral presentation">Oral Presentation</option>
                </select>
                @error('type')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <textarea disabled class="form-control @error('title') is-invalid @enderror" id="title" rows="3"
                placeholder="All Authors" name="title" wire:model='title'></textarea>
            @error('title')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="authors">All Authors</label>
            <textarea disabled class="form-control @error('authors') is-invalid @enderror" id="authors" rows="3"
                placeholder="All Authors" name="authors" wire:model='authors'></textarea>
            @error('authors')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="institutions">Institutions</label>
            <textarea disabled class="form-control @error('institutions') is-invalid @enderror" id="institutions"
                placeholder="Institutions" rows="3" name="institutions" wire:model='institutions'></textarea>
            @error('institutions')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="abstract">Content of Abstract</label>
            <textarea disabled class="form-control @error('abstract') is-invalid @enderror" id="abstract" rows="15"
                placeholder="Content of abstract" name="abstract" wire:model='abstract'></textarea>
            @error('abstract')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="keywords">Keywords</label>
            <textarea disabled class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                placeholder="Institutions" rows="3" name="keywords" wire:model='keywords'></textarea>
            @error('keywords')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="presenter">Presenter</label>
            <input disabled type="text" class="form-control @error('presenter') is-invalid @enderror"
                id="presenter" aria-describedby="emailHelp" name="presenter" wire:model='presenter'>
            @error('presenter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="modal-footer">
            @if (!$loa)
                <button class="btn btn-danger" wire:click='reject()' wire:loading.attr="disabled" wire:loading.class="btn-secondary">
                    <span wire:loading.remove wire:target="reject">
                        <i class="fa fa-times mr-1"></i> Reject abstract
                    </span>
                    <span wire:loading wire:target="reject">
                        <div class="d-flex align-items-center">
                            <div class="spinner-border spinner-border-sm mr-2" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Rejecting abstract...
                        </div>
                    </span>
                </button>
                <button class="btn btn-primary" wire:click='showValidate()'>Accept abstract</button>
            @endif
            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                wire:click="back()">Cancel</button>
        </div>

        <div class="modal fade review-accept-modal" id="modalValidate" data-backdrop="static" data-keyboard="true" tabindex="-1"
            role="dialog" wire:ignore.self aria-labelledby="reviewAcceptTitle" aria-describedby="reviewAcceptDescription" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <p class="review-accept-kicker">JICEST 2026 · Review action</p>
                            <h2 class="review-accept-title" id="reviewAcceptTitle">Accept abstract</h2>
                            <p class="review-accept-description" id="reviewAcceptDescription">
                                Create the Letter of Acceptance and invoice, then send both documents to the presenter.
                            </p>
                        </div>
                        <button type="button" class="review-accept-close" data-dismiss="modal" aria-label="Close acceptance dialog">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="review-accept-recipient">
                            <span class="review-accept-label">Recipient</span>
                            <strong>{{ $email }}</strong>
                        </div>
                        <div class="review-accept-grid">
                            <div class="form-group review-accept-field--wide">
                                <label class="review-accept-label" for="full_name">Full name</label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                    id="full_name" name="full_name" wire:model="full_name">
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group review-accept-field--wide">
                                <label class="review-accept-label" for="institution">Institution</label>
                                <textarea class="form-control @error('institution') is-invalid @enderror" id="institution"
                                    name="institution" wire:model="institution"></textarea>
                                @error('institution')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group review-accept-field--wide">
                                <label class="review-accept-label" for="abstractTitle">Abstract title</label>
                                <textarea class="form-control @error('abstractTitle') is-invalid @enderror" id="abstractTitle"
                                    name="abstractTitle" wire:model="abstractTitle"></textarea>
                                @error('abstractTitle')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="review-accept-label" for="participant_type">Author type</label>
                                <input type="text" readonly
                                    class="form-control @error('participant_type') is-invalid @enderror"
                                    id="participant_type" name="participant_type" wire:model="participant_type_label">
                                @error('participant_type')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="review-accept-label" for="fee">Registration fee</label>
                                <input type="text" readonly class="form-control @error('fee') is-invalid @enderror"
                                    id="fee" name="fee" wire:model="fee">
                                @error('fee')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p class="review-accept-footnote">
                            This action marks the submission as accepted and stores both documents before attempting to email them.
                        </p>
                        <div class="review-accept-actions">
                            <button type="button" class="review-accept-btn review-accept-btn--secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" wire:click="accept()" class="review-accept-btn review-accept-btn--primary"
                                wire:loading.attr="disabled" wire:target="accept">
                                <span wire:loading.remove wire:target="accept">Send acceptance email</span>
                                <span wire:loading wire:target="accept">Sending…</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @section('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#modalValidate').modal('hide');

                // Force remove backdrop untuk memastikan layar tidak hitam
                setTimeout(() => {
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open').css('padding-right', '');
                }, 300);
            });
            window.addEventListener('show-modal', event => {
                // console.log('MASUK SINI');
                $('#modalValidate').modal('show');
            });

            // Sweet Alert for review success (dengan delay untuk tunggu modal tertutup)
            window.addEventListener('review-success', event => {
                // Close modal dulu, baru tampilkan success alert
                $('#modalValidate').modal('hide');

                // Delay 500ms untuk memastikan modal dan backdrop benar-benar hilang
                setTimeout(() => {
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open').css('padding-right', '');

                    Swal.fire({
                        title: event.detail.title,
                        text: event.detail.message,
                        icon: event.detail.icon,
                        confirmButtonText: 'Great!',
                        confirmButtonColor: '#047857',
                        timer: 5000,
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                }, 500);
            });

            window.addEventListener('review-warning', event => {
                $('#modalValidate').modal('hide');

                setTimeout(() => {
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open').css('padding-right', '');

                    Swal.fire({
                        title: event.detail.title,
                        text: event.detail.message,
                        icon: event.detail.icon,
                        confirmButtonText: 'Understood',
                        confirmButtonColor: '#a16207',
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                }, 500);
            });

            window.addEventListener('review-error', event => {
                Swal.fire({
                    title: event.detail.title,
                    text: event.detail.message,
                    icon: event.detail.icon,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ef4444',
                    showConfirmButton: true
                });
            });
        </script>
    @endsection
</div>

