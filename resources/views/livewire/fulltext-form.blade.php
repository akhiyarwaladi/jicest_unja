<div class="fulltext-workspace">
    @if ($add || $edit)
        <header class="abstract-heading">
            <p class="ed-eyebrow">Full paper submission</p>
            <h2>{{ $edit ? 'Edit full paper' : 'Submit a full paper' }}</h2>
            <p>{{ $edit ? 'Update the title or replace the Word document.' : 'Select the accepted abstract that matches this paper, then upload the Word document.' }}</p>
        </header>

        <form class="abstract-form" wire:submit.prevent="{{ $edit ? 'update' : 'save' }}">
            <div class="form-group">
                <label for="payment_id">Accepted abstract</label>
                <select class="custom-select @error('payment_id') is-invalid @enderror" id="payment_id" name="payment_id" wire:model="payment_id">
                    <option value="">Choose an accepted abstract</option>
                    @foreach ($payment as $item)
                        <option value="{{ $item->id }}">{{ $item->uploadAbstract->title ?? 'Untitled abstract' }}</option>
                    @endforeach
                </select>
                @error('payment_id')
                    <p class="participant-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="fulltext-title">Paper title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="fulltext-title"
                    placeholder="Enter the full paper title" name="title" wire:model="title">
                @error('title')
                    <p class="participant-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            @if ($edit && $current_file)
                <div class="current-document">
                    <div>
                        <p class="ed-mono">Current document</p>
                        <a href="{{ asset('storage/' . $current_file) }}" target="_blank" rel="noopener">View uploaded paper</a>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <label for="fulltext">{{ $edit ? 'Replacement document' : 'Word document' }}</label>
                <input type="file" accept=".docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    class="form-control-file @error('fulltext') is-invalid @enderror" id="fulltext" wire:model.debounce.500ms="fulltext">
                <p class="participant-help">Microsoft Word .docx only{{ $edit ? '. Leave this empty to keep the current document.' : '.' }}</p>
                @error('fulltext')
                    <p class="participant-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="abstract-actions">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save,update">
                    {{ $edit ? 'Save changes' : 'Submit full paper' }}
                </button>
                <button type="button" class="btn btn-warning" wire:click="cancel">Back to submissions</button>
                <span class="participant-loading" wire:loading wire:target="save,update">Uploading document...</span>
            </div>
        </form>
    @else
        <header class="abstract-heading">
            <p class="ed-eyebrow">Full paper submission</p>
            <h2>My full paper submissions</h2>
            <p>Upload a Word document for each accepted abstract and track its validation status.</p>
        </header>

        <div class="paper-format-note">
            <p class="ed-mono">Required format</p>
            <p>Upload Microsoft Word files in .docx format. The paper title must match the accepted abstract record.</p>
        </div>

        @if (count($payment) === 0)
            <div class="abstract-empty">
                <p class="ed-mono">Submission unavailable</p>
                <h3>Payment verification is required</h3>
                <p>The full paper form opens after the conference secretariat verifies your payment.</p>
            </div>
        @else
            <div class="abstract-list-actions">
                <button type="button" class="btn btn-primary" wire:click="add">Submit Full Paper</button>
                <span class="participant-loading" wire:loading wire:target="add">Opening form...</span>
            </div>
        @endif

        @if (count($fulltexts) > 0)
            <div class="table-responsive abstract-table-wrap">
                <table class="table abstract-table">
                    <caption class="sr-only">Submitted full papers</caption>
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Paper</th>
                            <th scope="col">Status</th>
                            <th scope="col">Validated by</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fulltexts as $index => $item)
                            <tr wire:key="fulltext-{{ $item->id }}">
                                <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <strong>{{ $item->title }}</strong>
                                    <a class="abstract-topic" href="{{ asset('storage/' . $item->fulltext) }}" target="_blank" rel="noopener">View Word document</a>
                                </td>
                                <td>{{ $item->validation }}</td>
                                <td>{{ $item->validated_by ?: 'Pending' }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" wire:click="editFulltext({{ $item->id }})">Edit paper</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif
</div>

<script>
    window.addEventListener('fulltext-success', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Close',
            confirmButtonColor: '#0b1b14',
            timer: 5000,
            showConfirmButton: true
        });
    });

    window.addEventListener('fulltext-error', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Close',
            confirmButtonColor: '#b91c1c',
            showConfirmButton: true
        });
    });
</script>
