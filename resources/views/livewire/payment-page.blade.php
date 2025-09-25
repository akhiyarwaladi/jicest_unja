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
        <button type="submit" class="btn btn-primary">Submit</button>
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

    @if (session()->has('message'))
    <div class="mt-6 bg-emerald-50 border-l-4 border-emerald-400 p-4 rounded-r-lg">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-emerald-700">{{ session('message') }}</p>
                </div>
            </div>
            <button type="button" class="text-emerald-400 hover:text-emerald-600 transition-colors duration-200" onclick="this.parentElement.parentElement.style.display='none'">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
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
            <button @if (Auth::user()->voucher == null) class="btn btn-primary mt-2" type="submit" @else class="btn
                btn-secondary mt-2" disabled @endif>Redeem
                Voucher</button>
        </div>
    </form>
    {{-- @endif --}}



    @if (count($payments) !== 0)

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 mt-8">
        <h4 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"/>
            </svg>
            Your Payments
        </h4>
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-sm text-left">
                <thead class="bg-gradient-to-r from-emerald-50 to-sky-50 text-gray-700 border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">#</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Date</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Total Bill</th>
                    @can('presenter')
                    <th scope="col" class="px-6 py-3 font-semibold">Payment for abstract</th>
                    @endcan
                    <th scope="col" class="px-6 py-3 font-semibold">Status</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Receipt</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Validated By</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                $a = 0;
                @endphp
                @foreach ($payments as $item)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ ++$a }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 font-semibold text-emerald-600">{{ $item->total_bill }}</td>
                    @if (in_array(Auth::user()->participant->participant_type, ['presenter', 'presenter_reguler',
                    'presenter_student']))
                    @if ($item->uploadAbstract)
                    <td class="px-6 py-4 text-gray-600 max-w-xs truncate" title="{{ $item->uploadAbstract->title }}">{{ $item->uploadAbstract->title }}</td>
                    @else
                    <td class="px-6 py-4 text-gray-400 italic">No Title</td>
                    @endif
                    @endif
                    <td class="px-6 py-4">
                        @if($item->validation == 'valid')
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Valid</span>
                        @elseif($item->validation == 'pending')
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        @else
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">{{ $item->validation }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if ($item->receipt)
                        <a href="{{ asset('uploads/' . $item->receipt) }}" target="_blank"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors duration-200">
                            <i class="fa fa-file-pdf-o mr-2" aria-hidden="true"></i>
                            View PDF
                        </a>
                        @else
                        <span class="text-gray-400 italic">No file</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $item->validated_by ?: 'Not validated' }}</td>
                    {{-- <td> --}}
                        {{-- @if ($item->status == 'not yet reviewed')
                        <button class="btn btn-info" wire:click='editAbstract({{ $item->id }})'>edit</button>
                        @else
                        <p>No actions</p>
                        @endif --}}
                        {{--
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    @endif

    <h4 class="mt-5">Registration Fee Structure</h4>
    <div class="" style="overflow-x:auto;">
        <table class="table my-3" style="">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Offline</th>
                    <th scope="col">Online</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Presenter</td>
                    <td>Regular: IDR 600K / $60 USD<br>Student: IDR 350K / $35 USD</td>
                    <td>Regular: IDR 400K / $40 USD<br>Student: IDR 300K / $30 USD</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Participant</td>
                    <td>Regular: IDR 200K / $20 USD<br>Student: IDR 125K / $12.5 USD</td>
                    <td>Regular: IDR 150K / $15 USD<br>Student: IDR 75K / $7.5 USD</td>
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
