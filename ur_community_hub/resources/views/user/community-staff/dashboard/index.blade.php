<x-app-layout>
    <!-- Add a div that covers the entire content area with the blue/white background -->
    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white">
        <!-- Header section with blue background -->
        <div class="p-4 bg-blue-600 rounded-md shadow-sm page-breadcrumb">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white">
                    <i class="fa fa-tachometer"></i> WELCOME {{ Auth::user()->name }} Dashboard
                </h3>
            </div>
        </div>

        <!-- Main content with white background -->
        <div class="container px-4 py-6 mx-auto my-6 bg-white rounded-md shadow-md border border-blue-100">
            <!-- Dashboard stats section -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @php
                    $totalUsers = \App\Models\User::count();
                    $totalCommunities = \App\Models\CommunityProfile::count();
                    $totalEvents = \App\Models\Event::count();
                @endphp
                @if ($totalUsers)
                    <!-- Total Users -->
                    <div class="p-4 text-white bg-blue-500 rounded-md shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-bold">Total Users</h4>
                                <p class="text-2xl font-semibold">{{ $totalUsers }}</p>
                            </div>
                            <i class="text-4xl fa fa-users"></i>
                        </div>
                    </div>
                @endif
                @if ($totalCommunities)
                    <!-- Total Communities -->
                    <div class="p-4 text-white bg-blue-700 rounded-md shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-bold">Total Communities</h4>
                                <p class="text-2xl font-semibold">{{ $totalCommunities }}</p>
                            </div>
                            <i class="text-4xl fa fa-building"></i>
                        </div>
                    </div>
                @endif
                @if ($totalEvents)
                    <!-- Total Events -->
                    <div class="p-4 text-white bg-blue-600 rounded-md shadow-lg">
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
            <!-- Recent Events Table -->
            @if ($recentEvents->isNotEmpty())
                <div class="p-4 mt-8 bg-white rounded-md shadow-md border border-blue-200">
                    <h3 class="mb-4 text-xl font-semibold"><i class="fa fa-calendar"></i> Recent Events</h3>
                    <table class="w-full border border-collapse border-blue-200">
                        <thead>
                            <tr class="bg-blue-50">
                                <th class="p-2 border border-blue-200 ">Title</th>
                                <th class="p-2 border border-blue-200 ">Date</th>
                                <th class="p-2 border border-blue-200 ">Location</th>
                                <th class="p-2 border border-blue-200 ">Status</th>
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
        </div>
    </div>
</x-app-layout>