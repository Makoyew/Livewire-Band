<div style="display: grid; place-content: center;" class="mt-5">
    <div class="card text-dark" style="width: 400px">
        <div class="card-body">
            <h2 class="card-title text-center">Register</h2>

            <form wire:submit.prevent='register'>
                <div class="mb-3">
                    <label for="name" class="form-label"><b>Name</b></label>
                    <input type="text" id="name" class="form-control" wire:model='name'>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label"><b>Username</b></label>
                    <input type="text" id="username" class="form-control" wire:model='username'>
                    @error('username')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label"><b>Email</b></label>
                    <input type="email" id="email" class="form-control" wire:model='email'>
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label"><b>Password</b></label>
                    <input type="password" id="password" class="form-control" wire:model='password'>
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="confirmPassword" class="form-label"><b>Confirm Password</b></label>
                    <input type="password" id="confirmPassword" class="form-control" wire:model='password_confirmation'>
                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary w-100" type="submit">Register</button>
                </div>

                <div class="text-center">
                    <p>Already have an account? <a href="/login">Sign in</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
