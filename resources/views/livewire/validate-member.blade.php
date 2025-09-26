<div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="search2">Search</label>
                <input type="text" class="form-control" id="search2" name="search2" wire:model.debounce.500ms="search2"
                    placeholder="Search by full name">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="participant">
                    Filter HKI Member Status
                </label>
                <select class="custom-select" id="search" name="search" wire:model='search'>
                    <option value="">All</option>
                    <option value="valid">Validated</option>
                    <option value="not yet validated">Not yet validated</option>
                </select>
            </div>

            {{-- <div class="form-group">
                <label for="search">Filter Status HKI Member</label>
                <select name="search" id="search" wire:model='search' class="form-control">

                </select>
            </div> --}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">HKI ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Validated By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($participants) == 0)
                            <tr>
                                <td colspan="7" align="center">No data</td>
                            </tr>
                        @endif
                        @foreach ($participants as $item)
                            <tr>
                                <td>{{ ($participants->currentpage() - 1) * $participants->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->full_name1 }}</td>
                                <td>{{ $item->hki_id }}</td>
                                <td>{{ $item->hki_status }}</td>
                                <td>{{ $item->hki_validated_by }}</td>
                                <td><button class="btn btn-primary"
                                        wire:click="showValidate('{{ $item->id }}')">Validate</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ul class="pagination pagination-sm mt-3 float-right ">
                @if (count($participants) != 0)
                    {{ $participants->links() }}
                @endif
            </ul>
        </div>
    </div>

    <div class="modal fade" id="modalValidate" data-backdrop="static" data-keyboard="false" tabindex="-1"
        role="dialog" wire:ignore.self aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Validate HKI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="empty()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="full_name1">Full Name</label>
                                <input type="text" disabled
                                    class="form-control @error('full_name1') is-invalid @enderror" id="full_name1"
                                    name="full_name1" wire:model="full_name1" placeholder="judul">
                                @error('full_name1')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hki_id">HKI ID</label>
                                <input type="text" disabled
                                    class="form-control @error('hki_id') is-invalid @enderror" id="hki_id"
                                    name="hki_id" wire:model="hki_id" placeholder="judul">
                                @error('hki_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-7">
                            <div class="form-group">
                                <label for="">Member Card HKI :</label>
                                <div class="row mx-3 card">
                                    @if ($member_card)
                                        <img src="{{ asset('storage/' . $member_card) }}" style="max-width:100%">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        wire:click="empty()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

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

            // Sweet Alert for HKI validation success (dengan delay untuk tunggu modal tertutup)
            window.addEventListener('hki-validation-success', event => {
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
                        confirmButtonColor: '#10b981',
                        timer: 5000,
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                }, 500);
            });

            // Sweet Alert for HKI validation error
            window.addEventListener('hki-validation-error', event => {
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
