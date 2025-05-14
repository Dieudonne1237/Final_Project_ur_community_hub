<?php

namespace App\Livewire\Community;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
class EventCrudLivewire extends Component
{
    use WithFileUploads;

    public $events, $event_id, $title, $description, $event_date, $location, $image, $status;
    public $showForm = false;
    public $isEdit = false;
    public $confirmingDelete = false;
    public $deleteId = null;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'event_date' => 'required|date|after:now',
        'location' => 'nullable|string|max:255',
        'image' => 'nullable|image|max:10240',
    ];


    public function render()
    {
        return view('livewire.community.event-crud-livewire');
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->showForm = true;
    }

    public function store()
    {
        $this->validate();
        $imagePath = $this->image ? $this->image->store('events', 'public') : null;
        $fullImageUrl = $imagePath ? asset('storage/' . $imagePath) : null;
        Event::create([
            'community_id' => Auth::user()->communityProfile->id,
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'event_date' => $this->event_date,
            'location' => $this->location,
            'image' => $fullImageUrl,
        ]);

        $this->dispatch('show-success-message', message: 'Event created successfully.');
        $this->resetForm();
        $this->dispatch('close-modal'); // Close the modal
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $this->event_id = $event->id;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->event_date = $event->event_date;
        $this->location = $event->location;
        $this->showForm = true;
        $this->isEdit = true;
        $this->dispatch('open-modal'); // Open the modal
    }

    public function update()
    {
        $this->validate();
        $formattedEventDate = Carbon::parse($this->event_date)->format('d-m-y-H-i');
        $event = Event::findOrFail($this->event_id);
        $imagePath = $event->image;

        if ($this->image) {
            $imagePath = $this->image->store('events', 'public');
            $fullImageUrl = asset('storage/' . $imagePath);
        }


        $event->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'event_date' => $this->event_date,
            'location' => $this->location,
            'image' => $fullImageUrl ?? $event->image,
        ]);

        $this->dispatch('show-success-message', message: 'Event updated successfully.');
        $this->resetForm();
        $this->dispatch('close-modal'); // Close the modal
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->deleteId = $id;
        $this->dispatch('open-delete-modal'); // Open the delete confirmation modal
    }

    public function delete()
    {
        Event::findOrFail($this->deleteId)->delete();
        $this->dispatch('show-success-message', message: 'Event deleted successfully.');
        $this->confirmingDelete = false;
        $this->deleteId = null;
        $this->dispatch('close-delete-modal'); // Close the delete confirmation modal
    }

    // Ensure this method is public
    public function resetForm()
    {
        $this->reset([
            'title', 'description', 'event_date', 'location', 'image', 'status', 'event_id', 'showForm', 'isEdit'
        ]);
    }
}
