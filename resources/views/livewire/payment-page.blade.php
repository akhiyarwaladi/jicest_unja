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
    <button class="btn btn-primary" disabled>Add Payments</button>
    <p>please add your abstract first</p>
    @else
    <button class="btn btn-primary" wire:click="add()">Add Payments</button>
    @endif
    @endif
    @if (in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler',
    'participant_student']))
    <button class="btn btn-primary" wire:click="add()">Add Payments</button>
    @endif

    @if (session()->has('message'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
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

    <h4 class="mt-5">Your Payments</h4>
    <div class="" style="overflow-x:auto;">
        <table class="table my-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Bill</th>
                    @can('presenter')
                    <th scope="col">Payment for abstract</th>
                    @endcan
                    <th scope="col">Status Validation</th>
                    <th>Receipt</th>
                    <th scope="col">Validated By</th>

                </tr>
            </thead>
            <tbody>
                @php
                $a = 0;
                @endphp
                @foreach ($payments as $item)
                <tr>
                    <td scope="row">{{ ++$a }}</td>
                    <td>{{ $item->created_at }}</td>
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
                        <a href="{{ asset('uploads/' . $item->receipt) }}" target="_blank"
                            style="color:red; font-size:20px"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        </a>
                        @endif
                    </td>
                    <td>{{ $item->validated_by }}</td>
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
    @endif

    <h4 class="mt-5">Fee</h4>
    <div style="overflow-x:auto;">
        <table class="table my-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Offline</th>
                    <th scope="col">Online</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Presenter</td>
                    <td>Reguler : IDR 600K / $60 USD <br>Student : IDR 350K / $35 USD</td>
                    <td>Reguler : IDR 400K / $40 USD <br>Student : IDR 300K / $30 USD</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Participant</td>
                    <td>Reguler : IDR 200K / $20 USD <br>Student : IDR 125K / $12.5 USD</td>
                    <td>Reguler : IDR 150K / $15 USD <br> Student : 75K / $7.5 USD</td>
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
