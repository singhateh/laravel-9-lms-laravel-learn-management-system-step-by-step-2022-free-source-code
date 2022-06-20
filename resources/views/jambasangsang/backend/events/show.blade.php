@extends('layouts.backend.master')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card text-left">
                <img class="card-img-top" src="{{ $event->image() }}" alt="" width="1080" height="400">
                <div class="card-body">
                    <h4 class="card-title"> {!! $event->title !!}</h4>
                    <p class="card-text">
                        {!! $event->content !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-left">
                <div class="card-body">
                    <label for="">Date</label>
                    <p class="card-text">
                        {{ $event->date->format('d M Y ') }}
                    </p>
                    <label for=""><i class="fa fa-clock-o" aria-hidden="true"></i> Start Time</label>
                    <p class="card-text">
                        {{ $event->date->format('d M Y ') }}
                    </p>
                    <label for=""><i class="fa fa-clock-o" aria-hidden="true"></i> End Time</label>
                    <p class="card-text">
                        {{ $event->date->format('d M Y ') }}
                    </p>
                    <label for=""><i class="fa fa-address-book" aria-hidden="true"></i> Address</label>
                    <p class="card-text">
                        {{ $event->address }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
