<div class="container">
    <div class="card-body d-flex justify-content-center">
        <div class="card-left w-50 text-white p-5" style="border-radius: 20px; background-color: #121212; box-shadow: 3px 3px 0px 0px #1f1f1f;">
            <div class="d-flex justify-content-between mb-5 shadow">
                <a href="/profile" class="btn w-100 active-link text-white">
                    <h5><i class="fas fa-info-circle"></i> Profile</h5>
                </a>
                <a href="/account" class="btn w-100 text-white"><i class="fa-solid fa-user"></i> Account</a>
            </div>
            @if (session()->has('success_message'))
                <div class="alert alert-success mb-4">
                    {{ session('success_message') }}
                </div>
            @endif
            <form wire:submit.prevent='editUsername'>
                <h1 class="text-white mb-4 text-center">Account</h1>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control border-0 bg-dark text-white" value="{{ auth()->user()->username }}" wire:model="username">
                </div>
                <div class="text-end">
                    @if ($username !== auth()->user()->username)
                        <button type="submit" class="btn btn-success px-4" style="height: 38px;">Save</button>
                    @else
                        <button type="submit" class="btn btn-success px-4" style="height: 38px;" disabled>Save</button>
                    @endif
                </div>
                <hr>
            </form>
            <form wire:submit.prevent='editAccount'>
                <h6 class="mb-3 text-center" style="font-size: 30px;">Change Password</h6>
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control border-0 bg-dark text-white @error('current_password') is-invalid @enderror" wire:model="current_password">
                    @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="newpassword" class="form-label">New Password</label>
                    <input type="password" name="newpassword" id="newpassword" class="form-control border-0 bg-dark text-white" wire:model.defer="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border-0 bg-dark text-white" wire:model.defer="password_confirmation">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .card {
        background-color: #1f1f1f;
    }

    .active-link {
        border-bottom: 1px solid #000;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 0px;
    }

    .form-control {
        color: white;
    }

    .invalid-feedback {
        color: #dc3545;
    }
</style>
