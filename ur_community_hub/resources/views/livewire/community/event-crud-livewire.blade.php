<div>
    @if (auth()->user()->communityProfile->status == 1)
        <!-- Add Event Button -->
        <button wire:click="showCreateForm" data-modal-target="event-modal" data-modal-toggle="event-modal"
            class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
            Add Event
        </button>
    @endif


    <!-- Event List -->
    <div class="mt-6">
        <h2 class="mb-4 text-2xl font-semibold">Event List</h2>

        @php
            $communityProfile = auth()->user()->communityProfile;
            $events = $communityProfile ? $communityProfile->events : collect();
            $today = now()->startOfDay();
        @endphp

        @if ($events->count() > 0)
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($events as $event)
                    @php
                        $eventDate = \Carbon\Carbon::parse($event->event_date)->startOfDay();

                        if ($eventDate->lt($today)) {
                            $status = 'Ended';
                            $statusClass = 'bg-red-200 text-gray-800';
                        } elseif ($eventDate->eq($today)) {
                            $status = 'Ongoing';
                            $statusClass = 'bg-green-500 text-white';
                        } else {
                            $status = 'Upcoming';
                            $statusClass = 'bg-blue-800 text-white';
                        }
                    @endphp
                    <div class="p-6 transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
                        <!-- Event Image -->
                        <div class="relative h-48 mb-4">
                            @if ($event->image)
                                <img src="{{ $event->image }}" alt="{{ $event->title }}"
                                    class="h-full rounded-lg ">
                            @else
                                <div
                                    class="flex items-center justify-center w-full h-full text-gray-500 bg-gray-200 rounded-lg">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Event Details -->
                        <h3 class="mb-2 text-xl font-semibold">{{ $event->title }}</h3>
                        <p class="mb-2 text-sm text-gray-600">{{ $event->description }}</p>
                        <p class="mb-2 text-sm text-gray-600"><strong>Date:</strong> {{ $event->event_date }}</p>
                        <p class="mb-2 text-sm text-gray-600"><strong>Location:</strong> {{ $event->location }}</p>
                        <div class="flex justify-start mb-2">
                            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $statusClass }}">
                                {{ $status }}
                            </span>
                        </div>
                        <!-- Edit and Delete Buttons -->
                        <div class="flex items-center justify-end mt-4 space-x-2">
                            <button wire:click="edit({{ $event->id }})" data-modal-target="event-modal"
                                data-modal-toggle="event-modal"
                                class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</button>
                            <button wire:click="confirmDelete({{ $event->id }})" data-modal-target="delete-modal"
                                data-modal-toggle="delete-modal"
                                class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-6 text-center bg-white rounded-lg shadow">
                <p class="text-gray-600">No events found for your community.</p>
            </div>
        @endif
    </div>

    <!-- Add/Edit Event Modal -->
    <div wire:ignore.self id="event-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full p-4">
            <!-- Modal Content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $isEdit ? 'Edit Event' : 'Add Event' }}
                    </h3>
                    <button type="button" wire:click="resetForm"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="event-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="p-4 space-y-4 md:p-5">
                    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                        <!-- Title -->
                        <div class="py-2">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" wire:model="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            @error('title')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="py-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea wire:model="description" id="description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                            @error('description')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Event Date -->
                        <div class="py-2">
                            <label for="event_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Date</label>
                            <input type="datetime-local" wire:model="event_date" id="event_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            @error('event_date')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div class="py-2">
                            <label for="location"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <input type="text" wire:model="location" id="location"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            @error('location')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="py-2">
                            <label for="image"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                            <input type="file" wire:model="image" id="image"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            @error('image')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                            <div style="display: none">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="w-20 h-20 mt-2 rounded-lg">
                                @elseif ($event->image ?? false)
                                    <img src="{{ $event->image }}" class="w-20 h-20 mt-2 rounded-lg">
                                @endif
                            </div>
                        </div>

                        <!-- Status -->
                        <div style="display: none">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select wire:model="status" id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="upcoming">Upcoming</option>
                                <option value="ongoing">Ongoing</option>
                                <option value="completed">Completed</option>
                            </select>
                            @error('status')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Modal Footer -->
                        <div class="flex items-center justify-end py-6 space-x-4">
                            <!-- Cancel Button in Modal -->
                            <button type="button" wire:click="resetForm"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                data-modal-hide="event-modal">
                                Cancel
                            </button>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ $isEdit ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div wire:ignore.self id="delete-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full p-4">
            <!-- Modal Content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Delete Event
                    </h3>
                    <button type="button" wire:click="resetForm"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="delete-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="p-4 md:p-5">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">Are you sure you want to delete this event?</p>
                    <div class="flex items-center justify-end space-x-4">
                        <button type="button" wire:click="resetForm"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                            data-modal-hide="delete-modal">Cancel</button>
                        <button type="button" wire:click="delete"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
