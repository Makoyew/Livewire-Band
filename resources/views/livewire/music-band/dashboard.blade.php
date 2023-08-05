<div class="p-5" style="margin-top: -75px;">
    <h1 class="text-center">Dash Board</h1>
    <hr>
    <div class="d-flex justify-content-between mt-5">
        <div class="card bg-dark text-white" style="width: 250px;">
            <div class="card-body">
                <h1 class="text-success text-center">{{ $total_bookings->count() }}</h1>
                <h6 class="text-center">Total Booking</h6>
            </div>
        </div>
        <div class="card bg-dark text-white" style="width: 250px;">
            <div class="card-body">
                <h1 class="text-danger text-center">0</h1>
                <h6 class=text-center>Applications Received</h6>
            </div>
        </div>
        <div class="card bg-dark text-white" style="width: 250px;">
            <div class="card-body">
                <h1 class="text-warning text-center">{{ $active_bookings->count() }}</h1>
                <h6 class="text-center">Active Bookings</h6>
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap mt-5">
        @foreach ($bookings as $booking)
        <div class="card m-2" style="width: 435px; background-color: rgba(34, 32, 32, 0.8); border: 1px solid rgba(255, 255, 255, 0.1);">
            <div class="card-body viewImg" data-bs-toggle="modal" data-bs-target="#view" wire:click='viewBar({{ $booking->id }})'>
                <h1 class="text-center text-white">{{ $booking->eventname }}</h1>
                <hr class="border-light">

                @if (!is_null($booking->musicband))
                <h6 class="text-white">Performer: {{ $booking->musicband->name }}</h6>
                @endif

                <h6 class="text-white">Event Date: {{ $booking->eventdate }}</h6>
                <h6 class="text-white">Time Start: {{ $booking->timestart }}</h6>
                <h6 class="text-white">Time End: {{ $booking->timeend }}</h6>
                <h6 class="text-white">Location: {{ $booking->eventlocation }}</h6>

                @if ($booking->status == 'Pending')
                <h6 class="text-white">Status: <span class="badge bg-primary fw-bold">Pending</span></h6>
                <button class="btn btn-sm float-end text-white fw-bold me-2" data-bs-toggle="modal" data-bs-target="#confirmCompleteModal" style="background-color: lime; font-size: 14px;">Finish</button>
                <button class="btn btn-sm float-end text-white fw-bold me-2" data-bs-toggle="modal" data-bs-target="#confirmCancelModal" style="background-color: tomato; font-size: 14px;">Cancel</button>
                @elseif ($booking->status == 'Completed')
                <h6 class="text-white">Status: <span class="badge bg-success fw-bold">Completed</span></h6>
                @elseif ($booking->status == 'Canceled')
                <h6 class="text-white">Status: <span class="badge bg-danger fw-bold">Canceled</span></h6>
                @endif
            </div>
        </div>
        @endforeach
    </div>


    <div wire:ignore.self class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title">Booking Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    @if (!is_null($book))
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-secondary">
                                    <h4 class="text-white mb-0">Event Performer</h4>
                                </div>
                                <div class="card-body bg-dark text-center text-white">
                                    @if (!is_null($book->musicband))
                                    <h5>Performer: {{ $book->musicband->name }}</h5>
                                    <h5>{{ $book->musicband->genre }}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h4 class="text-white mb-0">Event Details</h4>
                                </div>
                                <div class="card-body bg-dark text-center text-white">
                                    <h5>Event Name: {{ $book->eventname }}</h5>
                                    <h5>Time Start: {{ $book->timestart }}</h5>
                                    <h5>Time End: {{ $book->timeend }}</h5>
                                    <h5>Location: {{ $book->eventlocation }}</h5>
                                </div>
                                <hr class="text-black">
                                <div class="card-body bg-dark text-center text-white">
                                    <h4><b>Description</b></h4>
                                    <h5>{{ $book->eventdescription }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="confirmCompleteModal" tabindex="-1" aria-labelledby="confirmCompleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="confirmCompleteModalLabel">Confirm Completion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Are you sure you want to mark this booking as completed?</p>
                    <h4>Rate Booking</h4>
                    <div class="rating-input float-start" style="direction: rtl;">
                        <div class="rating-stars">
                            <input type="radio" wire:model="rating" value="5" id="rating-5" class="visually-hidden">
                            <label for="rating-5"><i class="fa-solid fa-star"></i></label>

                            <input type="radio" wire:model="rating" value="4" id="rating-4" class="visually-hidden">
                            <label for="rating-4"><i class="fa-solid fa-star"></i></label>

                            <input type="radio" wire:model="rating" value="3" id="rating-3" class="visually-hidden">
                            <label for="rating-3"><i class="fa-solid fa-star"></i></label>

                            <input type="radio" wire:model="rating" value="2" id="rating-2" class="visually-hidden">
                            <label for="rating-2"><i class="fa-solid fa-star"></i></label>

                            <input type="radio" wire:model="rating" value="1" id="rating-1" class="visually-hidden">
                            <label for="rating-1"><i class="fa-solid fa-star"></i></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <h4>Give Feedback</h4>
                    <textarea class="form-control bg-dark text-white border-0 mb-3" style="height: 75px;" wire:model="feedback" placeholder="Enter your feedback"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" wire:click="completeBooking({{ $booking->id }})" data-bs-dismiss="modal">Mark as Completed</button>
                </div>
            </div>
        </div>
    </div>



    <div style="margin-top: 325px;" wire:ignore.self class="modal fade" id="confirmCancelModal" tabindex="-1" aria-labelledby="confirmCancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="confirmCancelModalLabel">Confirm Cancellation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this booking?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="cancelBooking({{ $booking->id }})" data-bs-dismiss="modal">Cancel Booking</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .rating-stars {
        font-size: 16px;
    }

    .rating-stars label {
        color: gray;
        cursor: pointer;
        transition: 0.2s;
    }

    .rating-stars label:hover,
    .rating-stars label:hover~label {
        color: yellow;
    }

    .rating-stars input[type="radio"]:checked+label,
    .rating-stars input[type="radio"]:checked~label {
        color: gold;
    }

    .viewImg {
        cursor: pointer;
        background-color: rgba(29, 29, 29, 0.403);
        transition: 0.5s;
        box-shadow: 3px 3px 0px 0px rgb(31, 31, 31);
    }
</style>
