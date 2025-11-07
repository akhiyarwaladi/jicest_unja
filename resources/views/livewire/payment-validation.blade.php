<div>

    @if ($validation == false)
        <div class="row mb-2">
            <div class="col-lg-6">
                <button wire:click="export()" class="btn btn-success" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="export">Export</span>
                    <span wire:loading wire:target="export">Exporting..</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="search2">Search</label>
                    <input type="text" class="form-control" id="search2" name="search2"
                        wire:model.debounce.500ms="search2" placeholder="Search by full name">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="participant">
                        Filter Payment Status
                    </label>
                    <select class="custom-select" id="search" name="search" wire:model.debounce.500ms='search'>
                        <option value="">All</option>
                        <option value="valid">Validated</option>
                        <option value="not yet validated">Not yet validated</option>
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
        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Email</th>
                                <th scope="col">Attendance</th>
                                <th scope="col">Total Bill</th>
                                <th scope="col">Invoice For</th>
                                <th scope="col">Status</th>
                                <th scope="col">Validated By</th>
                                <th>Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($payments) == 0)
                                <tr>
                                    <td colspan="10" align="center">No data</td>
                                </tr>
                            @endif
                            @foreach ($payments as $item)
                                <tr>
                                    <td><button class="btn btn-primary btn-sm" wire:click="showDetail('{{ $item->id }}')">Validate</button></td>
                                    <td>{{ ($payments->currentpage() - 1) * $payments->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->participant->user->email }}</td>
                                    <td>
                                        @if ($item->participant->attendance)
                                            {{ $item->participant->attendance }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $item->total_bill }}</td>
                                    <td>{{ $item->upload_abstract_id == null ? 'participant' : $item->uploadAbstract->title }}</td>
                                    <td>{{ $item->validation }}</td>
                                    <td>{{ $item->validated_by }}</td>
                                    <td>
                                        @if ($item->receipt && $item->validation === 'valid')
                                            <a href="{{ asset('storage/' . $item->receipt_path) }}" target="_blank" style="color:red; font-size:20px" title="Receipt: {{ $item->receipt }}">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination pagination-sm mt-3 float-right ">
                    @if (count($payments) != 0)
                        {{ $payments->links() }}
                    @endif
                </ul>
            </div>
        </div>
    @else
        <div class="row" wire:key="payment-detail-{{ $paymentValidate }}">
            <div class="col-5">
                <div class="form-group">
                    <label for="full_name1">Full Name</label>
                    <input type="text" disabled class="form-control @error('full_name1') is-invalid @enderror"
                        id="full_name1" name="full_name1" wire:model.debounce.500ms="full_name1">
                    @error('full_name1')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" disabled class="form-control @error('email') is-invalid @enderror"
                        id="email" name="email" wire:model.debounce.500ms="email">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="participant_type">Participant Type</label>
                    <input type="text" disabled class="form-control @error('participant_type') is-invalid @enderror"
                        id="participant_type" name="participant_type" wire:model.debounce.500ms="participant_type">
                    @error('participant_type')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fee">Fee (IDR)</label>
                    <input type="text" class="form-control @error('fee') is-invalid @enderror"
                        id="fee" name="fee" wire:model.lazy="fee" placeholder="e.g. 450000">
                    @error('fee')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <small class="form-text text-muted">Enter amount in IDR (numbers only). Example: 450000</small>
                </div>

                <div class="form-group">
                    <label for="discount">Discount (IDR)</label>
                    <input type="text" class="form-control @error('discount') is-invalid @enderror"
                        id="discount" name="discount" wire:model.lazy="discount" placeholder="e.g. 50000">
                    @error('discount')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <small class="form-text text-muted">Enter discount in IDR (optional). Example: 50000</small>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block" wire:click="updateUSDDisplay"
                        wire:loading.attr="disabled" wire:loading.class="btn-secondary" wire:target="updateUSDDisplay">
                        <span wire:loading.remove wire:target="updateUSDDisplay">
                            <i class="fa fa-calculator"></i> Calculate & Convert to USD
                        </span>
                        <span wire:loading wire:target="updateUSDDisplay">
                            <i class="fa fa-spinner fa-spin"></i> Calculating...
                        </span>
                    </button>
                </div>

                <div class="form-group">
                    <label for="fee_after_discount">Fee After Discount <span class="badge badge-success">Auto-Calculated</span></label>
                    <input type="text" readonly class="form-control bg-light @error('fee_after_discount') is-invalid @enderror" id="fee_after_discount"
                        name="fee_after_discount" wire:model="fee_after_discount" placeholder="Will be calculated">
                    @error('fee_after_discount')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    @if($fee_after_discount_usd_display)
                        <div class="alert alert-success mt-2 py-2 px-3">
                            <strong>USD:</strong> {{ $fee_after_discount_usd_display }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="total_bill">Total Bill <span class="badge badge-success">Auto-Calculated</span></label>
                    <input type="text" readonly class="form-control bg-light @error('total_bill') is-invalid @enderror"
                        id="total_bill" name="total_bill" wire:model="total_bill" placeholder="Same as Fee After Discount">
                    @error('total_bill')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-7">
                <div class="form-group">
                    <label for="">Proof of Payment :</label>
                    <div class="row mx-3 card">
                        @if ($proof_of_payment)
                            <img src="{{ asset('storage/' . $proof_of_payment) }}" style="max-width:100%">
                        @else
                            <p class="text-muted p-3">No proof of payment uploaded</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            @if (!$receipt)
                <button wire:click="invalid()" class="btn btn-danger" wire:loading.attr="disabled" wire:loading.class="btn-secondary">
                    <span wire:loading.remove wire:target="invalid">
                        <i class="fa fa-times mr-1"></i> Invalid
                    </span>
                    <span wire:loading wire:target="invalid">
                        <div class="d-flex align-items-center">
                            <div class="spinner-border spinner-border-sm mr-2" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Processing... Please wait
                        </div>
                    </span>
                </button>
                <button class="btn btn-primary" wire:click='showValidate()'>Valid</button>
            @endif
            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                wire:click="back()">Cancel</button>
        </div>

        <div class="modal fade" id="modalValidate" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" wire:ignore.self aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditTitle">Make Receipt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="full_name1">Full Name</label>
                            <input type="text" class="form-control @error('full_name1') is-invalid @enderror"
                                id="full_name1" name="full_name1" wire:model.debounce.500ms="full_name1">
                            @error('full_name1')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_receipt">Nomor Receipt <span class="badge badge-success">Auto-Generated</span></label>
                            <div class="input-group">
                                <input type="text" readonly class="form-control bg-light @error('no_receipt') is-invalid @enderror"
                                    id="no_receipt" name="no_receipt" wire:model="no_receipt">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('no_receipt').removeAttribute('readonly'); document.getElementById('no_receipt').focus();">
                                        <i class="fa fa-pencil"></i> Edit
                                    </button>
                                </div>
                            </div>
                            @error('no_receipt')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                            <small class="form-text text-muted">Receipt number auto-generated. Click "Edit" button to modify manually.</small>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount Paid</label>
                            <input type="text" class="form-control @error('amount') is-invalid @enderror"
                                id="amount" name="amount" wire:model.debounce.500ms="amount">
                            @error('amount')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="for_payment_of">For the Payment Of</label>
                            <input type="text" class="form-control @error('for_payment_of') is-invalid @enderror"
                                id="for_payment_of" name="for_payment_of" wire:model.debounce.500ms="for_payment_of">
                            @error('for_payment_of')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="valid()" class="btn btn-primary" wire:loading.attr="disabled" wire:loading.class="btn-secondary">
                            <span wire:loading.remove wire:target="valid">
                                <i class="fa fa-check mr-1"></i> Valid
                            </span>
                            <span wire:loading wire:target="valid">
                                <div class="d-flex align-items-center">
                                    <div class="spinner-border spinner-border-sm mr-2" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    Validating... Please wait
                                </div>
                            </span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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

            // Sweet Alert for validation success (dengan delay untuk tunggu modal tertutup)
            window.addEventListener('validation-success', event => {
                // Delay 500ms untuk memastikan modal dan backdrop benar-benar hilang
                setTimeout(() => {
                    Swal.fire({
                        title: event.detail.title,
                        text: event.detail.message,
                        icon: event.detail.icon,
                        confirmButtonText: 'Great!',
                        confirmButtonColor: '#10b981',
                        timer: 6000,
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                }, 500);
            });

            // Sweet Alert for validation error
            window.addEventListener('validation-error', event => {
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
