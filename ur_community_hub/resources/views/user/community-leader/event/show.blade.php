@extends('layouts.guest.partial.layouts')
@section('content')
    <div class="main-content-wrapper">
        <!-- Event details -->
        <div class="event-detail-content">
            <div class="container">
                <div class="row">
                    <div class="mb-4 col-12">
                        <div class="py-3 backto-event font-extrabold text-xl text-blue-800">
                            <a href="{{ route('event-list') }}"  style='color:rgb(16, 35, 206)'>Back to Events</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Left Section -->
                    <div class="mb-4 col-12 col-md-6">
                        <div class="event-detail-top-left">
                            <h1>{{ $event->title }}</h1>
                            <p>{{ $event->description }}</p>
                            <ul>
                                <li>
                                    <p><strong>Date:</strong> {{ date('F j, Y', strtotime($event->event_date)) }}</p>
                                </li>
                                <li>
                                    <p><strong>Location:</strong> {{ $event->location }}</p>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('community.show', $event->community->id) }}" class="justify-between text-decoration-none text-dark d-flex align-items-center">
                                        <div class="gap-5 d-flex align-items-center">
                                            <p class="mb-0"><strong>Community:</strong> {{ $event->community->community_name ?? 'N/A' }}</p>
                                            <i class="fas fa-eye text-primary"></i>
                                        </div>

                                    </a>
                                </li>

                            </ul>

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
                            <div class="mb-2">
                                <span class="badge rounded-pill {{ $statusClass }}">
                                    {{ $status }}
                                </span>
                            </div>

                        </div>
                    </div>

                    <!-- Right Section (Image) -->
                    <div class="mb-4 col-12 col-md-6">
                        <div class="event-detail-top-right">
                            @if ($event->image)
                                <img class="img-fluid" src="{{ asset($event->image) }}" alt="{{ $event->title }}">
                            @else
                                <img class="img-fluid" src="{{ asset('assets/web/images/default-event.jpg') }}"
                                    alt="Default Event Image">
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Community Details -->
                <div class="row">
                    <div class="mb-4 col-12">
                        <div class="event-community-info">
                            <h3>Organized by: {{ $event->community->community_name ?? 'N/A' }}</h3>
                            <p>{{ $event->community->description ?? 'No description available' }}</p>
                            <p><strong>Contact:</strong> {{ $event->community->email ?? 'N/A' }} |
                                {{ $event->community->phone ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media Share -->
                <div class="row">
                    <div class="blogdetail-post-share">
                        <div class="blogdetail-post-left">
                            <p>Share via:</p>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                        target="_blank">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($event->title) }}"
                                        target="_blank">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($event->title . ' - ' . url()->current()) }}"
                                        target="_blank">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
