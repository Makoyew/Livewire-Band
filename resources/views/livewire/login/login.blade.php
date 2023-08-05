<div style="display: grid; place-content: center; margin-top: 150px;">
    <div class="card text-dark" style="width: 400px;">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('errorMsg'))
            <div class="alert alert-danger">
                {{ session('errorMsg') }}
            </div>
        @endif

        <div class="card-body">
            <h2 class="card-title text-center">Login</h2>

            <form wire:submit.prevent='login'>
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
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
            </form>

            <div class="text-center">
                <p>Don't have an account? <a href="/register">Sign up</a></p>
            </div>
        </div>
    </div>
</div>
