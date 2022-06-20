<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Jambasangsang\Flash\Facades\LaravelFlash;

class EventController extends Controller
{

    public function index()
    {
        Gate::authorize('view_events');
        return view(
            'jambasangsang.backend.events.index',
            [
                'events' => Event::get()
            ]
        );
    }


    public function create()
    {
        Gate::authorize('add_events');
        return view('jambasangsang.backend.events.create');
    }

    public function store(StoreEventRequest $request)
    {
        Gate::authorize('add_events');

        $event = Event::create($request->validated());
        $event->image  = uploadOrUpdateFile($request, $event->image, \constPath::EventImage);
        $event->save();
        LaravelFlash::withSuccess('Event Created Successfully');
        return redirect()->route('events.index');
    }


    public function show($slug)
    {
        Gate::authorize('view_events');
        $event = Event::whereSlug($slug)->firstOrFail();
        $event->update(['is_read' => 'yes']);
        return view('jambasangsang.backend.events.show', ['event' => $event]);
    }


    public function edit(Event $event)
    {
        Gate::authorize('edit_events');
        return view('jambasangsang.backend.events.edit', compact('event'));
    }


    public function update(UpdateEventRequest $request, Event $event)
    {
        Gate::authorize('edit_events');

        $event->update($request->validated());
        $event->image  = uploadOrUpdateFile($request, $event->image, \constPath::EventImage);
        $event->save();
        LaravelFlash::withSuccess('Event Updated Successfully');
        return redirect()->route('events.index');
    }


    public function destroy(Event $event)
    {
        Gate::authorize('delete_events');
    }
}
