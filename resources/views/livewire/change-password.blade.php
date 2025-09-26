<div>
    <h4>Update Password</h4>
    <small class="my-3">Ensure your account is using a long, random password to stay secure.</small>
    <form method="post" wire:submit.prevent="save" class="mt-6 space-y-6">
        @csrf

        @method('put')
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input wire:model.debounce.500ms='current_password' id="current_password" type="password"
                class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                autocomplete="current_password">
            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input wire:model.debounce.500ms='password' id="password" type="password"
                class="form-control @error('password') is-invalid @enderror" name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input wire:model.debounce.500ms='password_confirmation' id="password_confirmation" type="password"
                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:loading.class="btn-secondary">
                <span wire:loading.remove wire:target="save">
                    <i class="fa fa-save mr-1"></i> Save
                </span>
                <span wire:loading wire:target="save">
                    <div class="d-flex align-items-center">
                        <div class="spinner-border spinner-border-sm mr-2" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Updating... Please wait
                    </div>
                </span>
            </button>
        </div>
    </form>
</div>

@section('script')
<script>
    // Sweet Alert for password update success
    window.addEventListener('password-success', event => {
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

    // Sweet Alert for password update error
    window.addEventListener('password-error', event => {
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
