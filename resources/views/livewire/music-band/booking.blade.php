<div class="container">
    <div class="container">
        <div class="card mt-3 p-4" style="background-color: rgba(223, 218, 218, 0.645); -webkit-backdrop-filter: blur(15px); backdrop-filter: blur(15px);">
                    <div class="d-flex justify-content-between w-100">
                        <div class="card-left d-block rounded p-5" style="width: 1300px; background-color: rgb(18, 18, 18)">
                            <h4 class="text-center">Booking Details</h4>
                            <hr>
                            <form wire:submit.prevent="sendRequest">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }} <div class="float-end" style="margin-top: -5px;"><a href="/dashboard" class="btn btn-success">View bookings</a></div>
                                    </div>
                                @endif
                                <div class="flex-wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                          <input type="hidden" wire:model="selectedMusicBand.id" name="musicband_id">
                                          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                          <label for="">Event Name</label> <br>
                                          <input style="background-color: rgb(52, 52, 52)" class="form-control border-0 text-white p-2 mb-2" style="width: 300px;" type="text" name="eventname" id="" wire:model="eventname">
                                          @error('eventname')
                                            <span class="text-danger text-lg">{{$message}}</span>
                                          @enderror

                                          <label for="">Event Location</label>
                                          <input style="background-color: rgb(52, 52, 52)" class="form-control border-0 text-white p-2 mb-2" style="width: 300px;" type="text" name="eventlocation" id="" wire:model="eventlocation">
                                          @error('eventlocation')
                                            <span class="text-danger text-lg">{{$message}}</span>
                                          @enderror

                                          <label for="" class="">Event Date</label>
                                          <input style="background-color: rgb(52, 52, 52)" class="form-control border-0 text-white p-2 mb-2" style="width: 300px;" type="date" name="eventdate" id="eventdate" wire:model="eventdate">
                                          @error('eventdate')
                                            <span class="text-danger text-lg">{{$message}}</span>
                                          @enderror
                                        </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <label for="" class="">Time Start</label>
                                          <input style="background-color: rgb(52, 52, 52)" class="form-control border-0 text-white p-2 mb-2" style="width: 300px;" type="time" name="timestart" id="timestart" wire:model="timestart">
                                          @error('timestart')
                                            <span class="text-danger text-lg">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="col-md-6">
                                          <label for="" class="">Time End</label>
                                          <input style="background-color: rgb(52, 52, 52)" class="form-control border-0 text-white p-2 mb-2" style="width: 300px;" type="time" name="timeend" id="timeend" wire:model="timeend">
                                          @error('timeend')
                                            <span class="text-danger text-lg">{{$message}}</span>
                                          @enderror
                                        </div>
                                    </div>
                                      </div>
                                </div>

                                <label for="" class="mt-4">Event Details</label>
                                <textarea name="" id="" cols="30" rows="10" style="background-color: rgb(52, 52, 52); width: 1100px; height: 90px;" class="form-control border-0 text-white p-2 mb-2" wire:model='eventdescription'></textarea>
                                @error('eventdescription')
                                <span class="text-danger text-lg">{{$message}}</span>
                                @enderror
                                <button type="submit" class="btn btn-outline-light border-1 border-secondary float-end mt-4 p-3">Send Request</button>
                            </form>

                        </div>
                    </div>
        </div>
    </div>

</div>

<script>
    var timeInputStart = document.getElementById('timestart');
    var timeInputEnd = document.getElementById('timeend');

    timeInputStart.type = 'text';
    timeInputEnd.type = 'text';

    timeInputStart.addEventListener('click', function() {
        this.type = 'time';
        this.focus();
    });

    timeInputEnd.addEventListener('click', function() {
        this.type = 'time';
        this.focus();
    });
</script>


<style>
    .card-left{
       background-color: rgba(29, 29, 29, 0.403);
       transition: 0.5s;
       box-shadow: 3px 3px 0px 0px rgb(31, 31, 31)
   }
</style>










