<?php

namespace App\Http\Livewire\MusicBand;

use Livewire\Component;
use App\Models\Musicband;
use App\Models\Booking as Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Booking extends Component
{

    public $selectedMusicBarId;
    public $musicband;
    public $selectedMusicBand;

    public $eventname, $eventlocation, $eventdescription, $timestart, $timeend, $eventdate;

    public function sendRequest(){
       $this->validate([
        'eventname' => 'required|max:255',
        'eventlocation' => 'required|max:255',
        'eventdescription' => 'required|max:1000',
        'eventdate' => 'required',
        'timestart' => 'required',
        'timeend' => 'required|after:timestart',
       ]);

        $book = new Book();
        $book->user_id = Auth::id();
        $book->eventname = $this->eventname;
        $book->eventlocation = $this->eventlocation;
        $book->eventdate = $this->eventdate;
        $book->eventdescription = $this->eventdescription;
        $book->timestart = $this->timestart;
        $book->timeend = $this->timeend;
        $this->musicband = Musicband::findOrFail($this->selectedMusicBand['id']);

        $book->musicband_id = $this->musicband->id;

        $book->save();

        session()->flash('message', 'Your booking request has been sent!');

        $this->reset(['eventname', 'eventlocation', 'eventdescription', 'timestart', 'timeend']);

    }

    public function show($id, $musicband)
    {
        $musicband = Musicband::findOrFail($id);
        return view('music-band.booking', ['musicband' => $musicband]);
    }


    public function mount($id)
    {

        $this->selectedMusicBand = Musicband::find($id);

        $this->emit('musicBandSelected', $this->selectedMusicBand);
    }


    public function render()
    {
        $selectedMusicBand = Musicband::find($this->selectedMusicBarId);
        $bookings = $selectedMusicBand ? $selectedMusicBand->bookings : [];

        return view('livewire.music-band.booking', [
        'bookings' => $bookings,
        'selectedMusicBand' => $selectedMusicBand,
        ])->extends('layouts.app');
    }

    public function booking($id, $musicband)
    {
        return view('components.booking', [
            'musicband' => $musicband,
            'booking_id' => $id,
        ]);
    }
}

