<header class="d-flex mb-5">
    <a href="/" class="btn text-white">
        <h1 class="p-3 mt-2" style="font-family: 'Font Name', sans-serif;">Music Bar</h1>
    </a>

    @auth
    <div class="d-inline-flex ms-auto mt-3" style="margin-right: 20px"></div>
    <div class="me-5 d-flex mt-4">
        <div class="me-5 mt-2">
            <a href="/dashboard" class="btn text-white">
                <h6>Dashboard</h6>
            </a>
        </div>
        <div class="me-5 mt-2">
            <a href="/profile" class="btn text-white">
                <i class="fa-solid fa-gear"></i>
            </a>
        </div>
        <div class="me-5 mt-2">
            <div class="d-flex align-items-center">
                <span class="text-white me-2">Logged in as:</span>
                <span class="text-white fw-bold">{{ auth()->user()->username }}</span>
            </div>
        </div>
    </div>

    <div class="dropdown">
        <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            @if(auth()->check())
            <img class="rounded-circle mt-2" width="75" height="75" src="{{ asset((auth()->user()->image ? 'uploads/image_uploads/' . auth()->user()->image : 'default_images/blank-profile.jpg')) }}" alt="" style="object-fit: cover; margin-right: 20px;">
            @endif
        </a>

        <ul class="dropdown-menu dropdown-menu-end mt-3 me-3" aria-labelledby="dropdownMenuLink" style="width: 300px; background-color: rgba(25, 25, 25, 0.8); backdrop-filter: blur(15px);">
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="account dropdown-item" style="text-align: center;">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
    @endauth

    @guest
    <div class="buttons d-inline-flex ms-auto mt-3">
        <a class="btn me-5 mt-2 fs-5 text-white" href="/login" role="button">Login</a>
        <a class="btn me-5 mt-2 fs-5 text-white" href="/register" role="button">Register</a>
    </div>
    @endguest
</header>

<style>
     .account {
        border: none;
        padding: 0;
        width: 100%;
    }

    .page {
        cursor: pointer;
        transition: 0.5s;
        padding: 10px;
    }

    .page:hover {
        background-color: white;
        box-shadow: 0px 10px 0px 0px rgb(118, 118, 118);
        color: black;
        transform: translateY(-10px);
    }

    .dropdown-item {
        color: white;
        transition: background-color 0.3s;
    }

    .dropdown-item:hover {
        background-color: #b6b1b1;
    }
</style>
