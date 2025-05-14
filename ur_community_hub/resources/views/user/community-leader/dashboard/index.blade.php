<x-app-layout>
    <div class="p-4 bg-gray-100 rounded-md shadow-sm page-breadcrumb">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">
                <i class="fa fa-tachometer"></i> WELCOME {{ Auth::user()->name }} Dashboard
            </h3>
        </div>
    </div>

    <div class="container px-4 py-6 mx-auto my-6 bg-white rounded-md shadow-md">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @php
                $totalEvents = \App\Models\Event::count();
            @endphp
            @if ($totalEvents)
                <!-- Total Events -->
                <div class="p-4 text-white bg-yellow-500 rounded-md shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-bold">Total Events</h4>
                            <p class="text-2xl font-semibold">{{ $totalEvents }}</p>
                        </div>
                        <i class="text-4xl fa fa-calendar"></i>
                    </div>
                </div>
            @endif
        </div>

        @php
            $recentEvents = \App\Models\Event::latest()->limit(5)->get();
        @endphp
        @if ($recentEvents->isNotEmpty())
            <!-- Recent Events Table -->
            <div class="p-4 mt-8 bg-white rounded-md shadow-md">
                <h3 class="mb-4 text-xl font-semibold"><i class="fa fa-calendar"></i> Recent Events</h3>
                <table class="w-full border border-collapse border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2 border">Title</th>
                            <th class="p-2 border">Date</th>
                            <th class="p-2 border">Location</th>
                            <th class="p-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentEvents as $event)
                                @php
                                    // Parse event datetime with time included
                                    $eventDateTime = \Carbon\Carbon::parse($event->event_date);
                                    $eventStartTime = $eventDateTime->copy();
                                    
                                    // If event has start_time and end_time fields, use those
                                    if (isset($event->start_time) && isset($event->end_time)) {
                                        $eventStartTime = \Carbon\Carbon::parse($event->event_date . ' ' . $event->start_time);
                                        $eventEndTime = \Carbon\Carbon::parse($event->event_date . ' ' . $event->end_time);
                                    } else {
                                        // Assuming default duration is 1 hour if no specific times
                                        $eventEndTime = $eventStartTime->copy()->addHour();
                                    }
                                    
                                    $now = \Carbon\Carbon::now();
                                    
                                    // Determine status based on current time
                                    if ($now->lt($eventStartTime)) {
                                        $dynamicStatus = 'Upcoming';
                                        $statusClass = 'text-blue-700 bg-blue-100';
                                    } elseif ($now->gte($eventStartTime) && $now->lte($eventEndTime)) {
                                        $dynamicStatus = 'Ongoing';
                                        $statusClass = 'text-green-700 bg-green-100';
                                    } else {
                                        $dynamicStatus = 'Ended';
                                        $statusClass = 'text-red-700 bg-red-100';
                                    }
                                @endphp
                                <tr class="border border-blue-200 hover:bg-blue-50">
                                    <td class="p-2 border border-blue-200">{{ $event->title }}</td>
                                    <td class="p-2 border border-blue-200">
                                        {{ $eventDateTime->format('Y-m-d') }}
                                        @if (isset($event->start_time))
                                            <br><span class="text-sm text-gray-600">
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
                                                @if (isset($event->end_time))
                                                    - {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                                @endif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-2 border border-blue-200">{{ $event->location }}</td>
                                    <td class="p-2 font-semibold text-center border border-blue-200">
                                        <span class="px-2 py-1 rounded {{ $statusClass }}">{{ $dynamicStatus }}</span>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <!-- Quick Actions -->
        <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-3">
            <a href="{{ route('event-profile') }}"
                class="flex items-center justify-center p-4 text-white bg-blue-500 rounded-md shadow-md font-bold">
                <i class="mr-2 text-3xl fa fa-plus-circle"></i> Create Event
            </a>
            <a href="{{ route('profile.show') }}"
                class="flex items-center justify-center p-4 text-white bg-green-500 rounded-md shadow-md font-bold">
                <i class="mr-2 text-3xl fa fa-user-circle"></i> Edit Profile
            </a>
        </div>
    </div>
</x-app-layout>