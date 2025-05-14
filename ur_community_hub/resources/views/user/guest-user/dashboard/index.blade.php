<x-app-layout>
    <!-- Header with Flowbite styling -->
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                <i class="mr-2 fa fa-tachometer"></i> WELCOME {{ Auth::user()->name }} Dashboard
            </h3>
        </div>
    </div>

    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <!-- Register Community Button or Status Display -->
        <div class="mt-4 text-center">
            @php
                $pendingRequest = \App\Models\CommunityRegistrationRequest::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->first();
            @endphp

            @if ($pendingRequest)
                <div class="flex items-center">
                    <i class="mr-2 fa fa-info-circle"></i>
                    <span>
                        Your request to register <strong>{{ $pendingRequest->community_name }}</strong> is
                        <strong>{{ ucfirst($pendingRequest->status) }}</strong>
                        @if ($pendingRequest->status == 'pending')
                            . We will review it and get back to you soon.
                        @elseif($pendingRequest->status == 'rejected')
                            . Please contact the administrator for more details.
                        @elseif($pendingRequest->status == 'approved')
                            . You can now manage your community.
                        @endif
                    </span>
                </div>
        </div>
    @else
        <button data-modal-target="registerCommunityModal" data-modal-toggle="registerCommunityModal"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="mr-2 fa fa-plus-circle"></i> Request to Register Your Community
        </button>
        @endif
    </div>

    <!-- Modal for Community Registration -->
    <div id="registerCommunityModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Request to Register Your Community
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="registerCommunityModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form id="registerCommunityForm" action="{{ route('community.register.request') }}" method="POST">
                        @csrf

                        <!-- Name Field (Auto-filled) -->
                        <div class="mb-4">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                Name</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white cursor-not-allowed"
                                value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <!-- Email Field (Auto-filled) -->
                        <div class="mb-4">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                Email</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white cursor-not-allowed"
                                value="{{ Auth::user()->email }}" readonly>
                        </div>

                        <!-- Phone Number Field -->
                        <div class="mb-4">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Enter your phone number" required>
                        </div>

                        <!-- Community Name Field -->
                        <div class="mb-4">
                            <label for="community_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Community
                                Name</label>
                            <input type="text" id="community_name" name="community_name"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Enter community name" required>
                        </div>

                        <!-- Notes Field -->
                        <div class="mb-4">
                            <label for="notes"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
                            <textarea id="notes" name="notes" rows="4"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Additional information about your community"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit
                            Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $upcomingEvents = \App\Models\Event::where('event_date', '>=', date('Y-m-d'))
            ->orderBy('event_date', 'asc')
            ->limit(5)
            ->get();
    @endphp

    @if ($upcomingEvents->isNotEmpty())
        <!-- Upcoming Events -->
        <div class="mt-8">
            <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                <i class="mr-2 fa fa-calendar"></i> Upcoming Events
            </h3>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Title</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Location</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($upcomingEvents as $event)
                            @php
                                $today = now()->startOfDay();
                                $eventDate = \Carbon\Carbon::parse($event->event_date)->startOfDay();

                                if ($eventDate->lt($today)) {
                                    $status = 'Ended';
                                    $statusClass = 'bg-danger text-white';
                                } elseif ($eventDate->eq($today)) {
                                    $status = 'Ongoing';
                                    $statusClass = 'bg-success text-white';
                                } else {
                                    $status = 'Upcoming';
                                    $statusClass = 'bg-primary text-white';
                                }
                            @endphp
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $event->title }}
                                </td>
                                <td class="px-6 py-4">{{ $event->event_date }}</td>
                                <td class="px-6 py-4">{{ $event->location }}</td>
                                <td class="px-6 py-4">
                                    @if ($event->status == 'active')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                            Active
                                        </span>
                                    @elseif($event->status == 'pending')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                            Pending
                                        </span>
                                    @else
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-800">
                                            {{ ucfirst($event->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('events.show', $event->id) }}"
                                        class="font-medium text-blue-800 dark:text-blue-800 hover:underline">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- All Communities -->
    @php
        $communities = \App\Models\CommunityProfile::where('status', 1)->withCount('events')->get();
    @endphp
    @if ($communities->isNotEmpty())
        <div class="mt-8">
            <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                <i class="mr-2 fa fa-building"></i> All Communities
            </h3>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($communities as $community)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        @if ($community->profile_image)
                            <div class="h-48 overflow-hidden rounded-t-lg">
                                <img src="{{ $community->profile_image }}" alt="{{ $community->name }}"
                                    class="object-cover w-full h-full">
                            </div>
                        @else
                            <div
                                class="flex items-center justify-center h-48 bg-gray-100 rounded-t-lg dark:bg-gray-700">
                                <i class="text-5xl text-gray-400 fa fa-building dark:text-gray-500"></i>
                            </div>
                        @endif
                        <div class="p-5">
                            <h4 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $community->name }}
                            </h4>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2">
                                {{ $community->description }}
                            </p>
                            <div class="flex items-center mb-3 text-sm text-gray-500 dark:text-gray-400">
                                <i class="mr-2 fa fa-map-marker"></i>
                                <span>{{ $community->location }}</span>
                            </div>

                            <div class="flex items-center mb-3 text-sm text-gray-500 dark:text-gray-400">
                                <p class="card-text"><strong>Events:</strong> {{ $community->events_count }}</p>
                            </div>
                            <a href="{{ route('community.show', $community->id) }}"
                                class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                View Community
                                <i class="ml-2 fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    <!-- Quick Actions -->
    <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3">
        <a href="{{ route('profile.show') }}"
            class="inline-flex items-center justify-center p-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
            <i class="w-6 h-6 mr-3 fa fa-user-circle"></i>
            <span class="w-full">Edit Profile</span>
            <i class="w-4 h-4 ml-2 fa fa-arrow-right"></i>
        </a>
    </div>
    </div>
</x-app-layout>
