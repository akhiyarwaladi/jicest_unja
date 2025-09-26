<div>
    @if ($add == true)
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Add Payment</h2>
            </div>
        </div>
    </div>

    <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
    <form wire:submit.prevent="save">
        {{-- <div class="form-group">
            <label for="topic">
                Payment For
            </label>
            <select class="custom-select @error('topic') is-invalid @enderror" id="topic" name="topic"
                wire:model='topic'>
                <option value="">Choose One</option>
                <option value="organic and bio chemistry">Organic and Bio Chemistry</option>
                <option value="analytical and enviromental chemistry">Analytical and Enviromental Chemistry</option>
                <option value="inorganic and material chemistry">Inorganic and Material Chemistry</option>
                <option value="physical and computation chemistry">Physical and Computation Chemistry</option>
                <option value="chemical education">Chemical Education</option>
            </select>
            @error('topic')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> --}}
        @if (in_array(Auth::user()->participant->participant_type, ['presenter', 'presenter_reguler',
        'presenter_student']))
        <div class="form-group">
            <label for="uploadAbstractId">
                Pay for abstract
            </label>
            <select class="custom-select @error('uploadAbstractId') is-invalid @enderror" id="uploadAbstractId"
                name="uploadAbstractId" wire:model='uploadAbstractId'>
                <option value="">Choose One</option>
                @foreach ($abstract as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
            @error('uploadAbstractId')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @endif

        <div class="form-group">
            <label for="fee">Fee</label>
            <input disabled type="text" class="form-control @error('fee') is-invalid @enderror" id="fee" name="fee"
                value="{{ $original_fee }}">
            @error('fee')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="discount">Discount</label>
            <input disabled type="text" class="form-control @error('discount') is-invalid @enderror" id="discount"
                placeholder="Title" name="discount" value='{{ $discount }}'>
            @error('discount')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="fee_after_discount">Fee after discount</label>
            <input disabled type="text" class="form-control @error('fee_after_discount') is-invalid @enderror"
                id="fee_after_discount" placeholder="Title" name="fee_after_discount" value='{{ $fee_after_discount }}'>
            @error('fee_after_discount')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="total_bill">Total Bill</label>
            <input disabled type="text" class="form-control @error('total_bill') is-invalid @enderror" id="total_bill"
                name="total_bill" wire:model='total_bill'>
            @error('total_bill')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="proof_of_payment">Proof of Payment</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" accept=".jpg,.png,.jpeg,.gif,.svg"
                        class="custom-file-input @error('proof_of_payment') is-invalid @enderror" id="proof_of_payment"
                        wire:model='proof_of_payment'>
                    <label class="custom-file-label" for="proof_of_payment">
                        {{ $proof_of_payment == null ? 'Choose' : $proof_of_payment->getClientOriginalName() }}
                    </label>
                </div>
            </div>
            @error('proof_of_payment')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save">
            <span wire:loading.remove wire:target="save">Submit</span>
            <span wire:loading wire:target="save">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Submitting...
            </span>
        </button>
        <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
    </form>

    @else
    @if (in_array(Auth::user()->participant->participant_type, ['presenter', 'presenter_reguler', 'presenter_student']))
    @if (count($abstract) == 0)
    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-yellow-700 font-medium">Abstract Required</p>
                <p class="text-sm text-yellow-600">Please submit your abstract first before making payment.</p>
            </div>
        </div>
    </div>
    <button disabled class="btn btn-secondary">Add Payment</button>
    @else
    <button wire:click="add()" class="btn btn-primary">Add Payment</button>
    @endif
    @endif
    @if (in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler',
    'participant_student']))
    <button wire:click="add()" class="btn btn-primary">Add Payment</button>
    @endif


    {{-- @if (Auth::user()->voucher == NULL) --}}
    <form wire:submit.prevent="redeem" class="mt-5">
        <!-- Changed from save to redeem -->
        <div class="form-group">
            <label for="fee">Voucher Code</label>
            <input @if (Auth::user()->voucher != null) disabled placeholder="{{Auth::user()->voucher}}" @endif
            type="text" class="form-control @error('voucher')
            is-invalid @enderror" id="voucher" name="voucher"
            placeholder="Enter your voucher code" wire:model='voucher'>
            @error('voucher')
            <span class="invalid-feedback">
                <strong>Invalid Voucher!</strong>
            </span>
            @enderror
            <button @if (Auth::user()->voucher == null) class="btn btn-primary mt-2" type="submit" wire:loading.attr="disabled" wire:target="redeem" @else class="btn btn-secondary mt-2" disabled @endif>
                <span wire:loading.remove wire:target="redeem">Redeem Voucher</span>
                <span wire:loading wire:target="redeem">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Redeeming...
                </span>
            </button>
        </div>
    </form>
    {{-- @endif --}}



    @if (count($payments) !== 0)
    <h4 class="mt-5">Your Payments</h4>
    <div class="" style="overflow-x:auto;">
        <table class="table my-3" style="">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Total Bill</th>
                @can('presenter')
                <th scope="col">Payment for abstract</th>
                @endcan
                <th scope="col">Status</th>
                <th scope="col">Receipt</th>
                <th scope="col">Validated By</th>
            </tr>
        </thead>
        <tbody>
            @php
            $a = 0;
            @endphp
            @foreach ($payments as $item)
            <tr>
                <td>{{ ++$a }}</td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
                <td>{{ $item->total_bill }}</td>
                @if (in_array(Auth::user()->participant->participant_type, ['presenter', 'presenter_reguler',
                'presenter_student']))
                @if ($item->uploadAbstract)
                <td>{{ $item->uploadAbstract->title }}</td>
                @else
                <td>No Title</td>
                @endif
                @endif
                <td>{{ $item->validation }}</td>
                <td>
                    @if ($item->receipt)
                    <a href="{{ asset('storage/' . $item->receipt) }}" target="_blank">View PDF</a>
                    @else
                    No file
                    @endif
                </td>
                <td>{{ $item->validated_by ?: 'Not validated' }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    @endif

    <h4 class="mt-5">Registration Fee Structure</h4>
    <div class="" style="overflow-x:auto;">
        <table class="table my-3" style="">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Early Bird</th>
                    <th scope="col">Non Early Bird</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Presenter</td>
                    <td>IDR 350K / $25 USD</td>
                    <td>IDR 450K / $30 USD</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Participant</td>
                    <td>IDR 250K / $18 USD</td>
                    <td>IDR 350K / $23 USD</td>
                </tr>
            </tbody>
        </table>
    </div>


    <h4 class="mt-5">Payment</h4>
    <div class="" style="overflow-x:auto;">
        <table class="table my-3" style="">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Account Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bank BTN</td>
                    <td>0003801300008828</td>
                    <td>RPL 012 BLU UNJA UTK OPS PENERIMAAN</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</div>

<script>
    // Sweet Alert for payment success
    window.addEventListener('payment-success', event => {
        console.log('Payment success event received:', event.detail);

        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'OK',
            confirmButtonColor: '#10b981',
            timer: 5000,
            showConfirmButton: true,
            allowOutsideClick: false
        });
    });

    // Sweet Alert for voucher success
    window.addEventListener('voucher-success', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Great!',
            confirmButtonColor: '#10b981',
            timer: 4000,
            showConfirmButton: true
        });
    });

    // Sweet Alert for voucher error
    window.addEventListener('voucher-error', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Try Again',
            confirmButtonColor: '#ef4444',
            showConfirmButton: true
        });
    });

    // Sweet Alert for payment error
    window.addEventListener('payment-error', event => {
        console.log('Payment error event received:', event.detail);

        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Try Again',
            confirmButtonColor: '#ef4444',
            showConfirmButton: true
        });
    });
</script>
