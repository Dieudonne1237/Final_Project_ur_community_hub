<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('user.community-leader.event.index');
    }

    public function list()
    {
        $events = Event::with('community')->latest()->paginate(6);
        return view('user.community-leader.event.list', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('user.community-leader.event.show', compact('event'));
    }
}
