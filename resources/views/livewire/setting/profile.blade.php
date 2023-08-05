<div class="container">
    <div class="card mt-3 text-white" style="background-color: rgba(25, 25, 25, 0.645); -webkit-backdrop-filter: blur(15px); backdrop-filter: blur(15px);">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-image">
                        @if(auth()->check())
                        <div class="image-upload position-relative mt-5">
                            <input type="file" class="form-control position-absolute top-0 start-0 opacity-0" wire:model="image" id="image" name="image">
                            <label for="image" class="upload-label d-flex align-items-center justify-content-center">
                                <img width="275" height="275" src="{{ $image ? $image->temporaryUrl() : (auth()->user()->image ? asset('uploads/image_uploads/' . auth()->user()->image) : asset('default_images/blank-profile.jpg')) }}" alt="Profile Image" class="preview-image rounded-circle bg-dark" style="object-fit: cover;">
                            </label>
                        </div>
                        <h4 class="p-3 w-100 rounded mt-4 text-center">{{auth()->user()->name}}</h4>
                        @endif
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-5 shadow">
                        <a href="/profile" class="btn w-100 active-link text-white">
                            <h5><i class="fas fa-info-circle"></i> Profile</h5>
                        </a>
                        <a href="/account" class="btn w-100 text-white"><i class="fa-solid fa-user"></i> Account</a>
                    </div>
                    <button class="btn w-100 delete-btn text-white bg-danger" data-bs-toggle="modal" data-bs-target="#delete"><h5><i class="fa fa-trash"></i> Delete</h5></button>
                </div>
                <div class="col-md-8">
                    <div class="profile-form">
                        <h1 class="profile-heading text-center">User's Profile</h1>
                        <hr>
                        <form wire:submit.prevent="editProfile">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control profile-input" value="{{ auth()->user()->name }}" wire:model="name">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" class="form-control profile-input" value="{{ auth()->user()->location }}" wire:model="location">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control profile-textarea" rows="5" placeholder="Description" wire:model="description">{{ auth()->user()->description }}</textarea>
                            </div>
                            <div class="form-group">
                                @if ($name !== auth()->user()->name || $location !== auth()->user()->location || $description !== auth()->user()->description || ($image && $image->getClientOriginalName() !== auth()->user()->image))
                                    <button type="submit" class="btn btn-success">Save</button>
                                @else
                                    <button type="submit" class="btn btn-success" disabled>Save</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade text-white mt-lg-5" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 250px">
            <div class="modal-content" style="background-color: rgba(25, 25, 25, 0.645); -webkit-backdrop-filter: blur(15px); backdrop-filter: blur(15px);">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete User <i class="fa-solid fa-user"></i> {{auth()->user()->username}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-white">Are you sure you want to delete this User?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> No</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteUser" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .card {
        background-color: rgba(25, 25, 25, 0.8);
        -webkit-backdrop-filter: blur(15px);
        backdrop-filter: blur(15px);
        border: none;
    }

    .card-body {
        padding: 30px;
    }

    .profile-image {
        text-align: center;
        margin-top: 30px;
    }

    .profile-heading {
        margin-top: 20px;
        font-size: 28px;
        font-weight: bold;
    }

    .profile-form {
        margin-top: 30px;
    }

    .profile-input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .profile-textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        resize: vertical;
    }

    .btn-success {
        width: 150px;
        margin-top: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-success {
        width: 150px;
    }
</style>
