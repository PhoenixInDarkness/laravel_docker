<section class="my-4">
    <header>
        <h2 class="h5">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <div class="d-flex align-items-center gap-3 justify-content-end">
        <button
            class="btn btn-danger"
            data-toggle="modal"
            data-target="#confirm-user-deletion"
        >
            {{ __('Delete Account') }}
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirm-user-deletion" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Are you sure you want to delete your account?') }}</h5>
                </div>
                <div class="modal-body">
                    <p>
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
                    <div class="mt-3">
                        <label for="password" class="sr-only mb-2">{{ __('Password') }}</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control border-gray mb-4"
                            placeholder="{{ __('Password') }}"
                        />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
