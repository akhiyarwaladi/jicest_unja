
<div>
    @if ($add == true)

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Upload Fulltext</h2>
                </div>
            </div>
        </div>
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="payment_id">
                    Upload For Abstract
                </label>
                <select class="custom-select @error('payment_id') is-invalid @enderror" id="payment_id" name="payment_id"
                    wire:model='payment_id'>
                    <option value="">Choose One</option>
                        @foreach ($payment as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->uploadAbstract->title ?? 'N/A' }}
                            </option>
                        @endforeach
                </select>
                @error('payment_id')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Title" name="title" wire:model='title'>
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="fulltext">Upload Fulltext (.pdf)</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" accept=".pdf"
                            class="custom-file-input @error('fulltext') is-invalid @enderror" id="fulltext"
                            wire:model.debounce.500ms='fulltext'>
                        <label class="custom-file-label" for="fulltext">
                            {{ $fulltext == null ? 'Choose' : $fulltext->getClientOriginalName() }}
                        </label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                @error('fulltext')
                    <span class="invalid-feedback" style="display:block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
        </form>

    @elseif ($edit == true)

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Edit Fulltext</h2>
                </div>
            </div>
        </div>
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <form wire:submit.prevent="update">
            <div class="form-group">
                <label for="payment_id">
                    Upload For Abstract
                </label>
                <select class="custom-select @error('payment_id') is-invalid @enderror" id="payment_id" name="payment_id"
                    wire:model='payment_id'>
                    <option value="">Choose One</option>
                        @foreach ($payment as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->uploadAbstract->title ?? 'N/A' }}
                            </option>
                        @endforeach
                </select>
                @error('payment_id')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Title" name="title" wire:model='title'>
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if ($current_file)
                <div class="alert alert-info">
                    <strong>Current File:</strong>
                    <a href="{{ asset('storage/' . $current_file) }}" target="_blank" class="alert-link">
                        <i class="fa fa-file-pdf-o"></i> View Current PDF
                    </a>
                </div>
            @endif

            <div class="form-group">
                <label for="fulltext_edit">Upload New Fulltext (.pdf) - Optional</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" accept=".pdf"
                            class="custom-file-input @error('fulltext') is-invalid @enderror" id="fulltext_edit"
                            wire:model.debounce.500ms='fulltext'>
                        <label class="custom-file-label" for="fulltext_edit">
                            {{ $fulltext == null ? 'Choose new file (optional)' : $fulltext->getClientOriginalName() }}
                        </label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                <small class="form-text text-muted">Leave empty to keep current file</small>
                @error('fulltext')
                    <span class="invalid-feedback" style="display:block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
        </form>

    @else
        <!-- Information Box -->
        <div class="alert alert-success" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border-left: 5px solid #059669; border-radius: 10px; box-shadow: 0 2px 8px rgba(5, 150, 105, 0.15); margin-bottom: 20px;">
            <div style="display: flex; align-items: start; gap: 15px;">
                <div style="flex-shrink: 0;">
                    <i class="fa fa-file-text" style="font-size: 28px; color: #059669;"></i>
                </div>
                <div style="flex: 1;">
                    <h5 style="color: #065f46; font-weight: 700; margin-bottom: 10px; margin-top: 0;">
                        <i class="fa fa-refresh"></i> Full Paper Editing Information
                    </h5>
                    <p style="color: #064e3b; margin-bottom: 8px; line-height: 1.6;">
                        You can <strong>update your full paper submission</strong> before the presentation date.
                        Click the <span style="background: #059669; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px;">Edit</span> button to modify your paper title or re-upload your PDF file.
                    </p>
                    <div style="color: #064e3b; line-height: 1.6;">
                        <div style="margin-bottom: 5px;">
                            <i class="fa fa-check-circle" style="color: #10b981;"></i>
                            <strong>Update title:</strong> Edit your paper title anytime
                        </div>
                        <div>
                            <i class="fa fa-check-circle" style="color: #10b981;"></i>
                            <strong>Re-upload PDF:</strong> Replace your file with an updated version (optional)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (count($payment) == 0)
            <button class="btn btn-primary" disabled>Upload Paper</button>
        @else
            <button class="btn btn-primary" wire:click="add()">Upload Paper</button>
        @endif
        @if (count($fulltexts) !== 0)
            <div style="overflow-x:auto;">
                <table class="table my-3">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">File</th>
                            <th scope="col">Status</th>
                            <th scope="col">Validated by</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $a = 0;
                        @endphp
                        @foreach ($fulltexts as $item)
                            <tr>
                                <th scope="row">{{ ++$a }}</th>
                                <td>{{ $item->title }}</td>
                                <td><a href="{{ asset('storage/' . $item->fulltext) }}" target="_blank"
                                        style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                            aria-hidden="true"></i>
                                    </a></td>
                                <td>{{ $item->validation }}</td>
                                <td>{{ $item->validated_by }}</td>
                                <td>
                                    <button class="btn btn-info" wire:click='editFulltext({{ $item->id }})'>Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    @endif
</div>

@section('script')
<script>
    // Sweet Alert for fulltext upload success
    window.addEventListener('fulltext-success', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Great!',
            confirmButtonColor: '#10b981',
            timer: 5000,
            showConfirmButton: true
        });
    });

    // Sweet Alert for fulltext upload error
    window.addEventListener('fulltext-error', event => {
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
