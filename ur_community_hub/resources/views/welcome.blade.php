@extends('layouts.guest.partial.layouts')
@section('content')
    <!-- main content wrapper -->

    <div class="main-content-wrapper" style="margin-top: 0; padding-top: 0;">
        <!-- Semi Fullscreen Banner Section -->
        <div class="position-relative w-100" style="height: 80vh; overflow: hidden;">

            <!-- Carousel Background -->
            <div id="bannerCarousel" class="carousel slide position-absolute top-0 start-0 w-100 h-130 z-0"
                data-bs-ride="carousel">
                <div class="carousel-inner h-100">
                    <div class="carousel-item active h-100">
                        <img src="{{ asset('assets/images/UR-1.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                            alt="Banner 1">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('assets/images/UR-2.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                            alt="Banner 2">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('assets/images/UR-3.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                            alt="Banner 3">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('assets/images/UR-4.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                            alt="Banner 4">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('assets/images/UR-5.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                            alt="Banner 5">
                    </div>
                </div>
            </div>

            <!-- Dark overlay for better contrast -->
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>

            <!-- Centered Banner Content -->
            <div class="position-relative z-2 d-flex align-items-center justify-content-center text-center h-100">
                <<style>
                    .btn-sky {
                        background-color: #ffffff;
                        color: #000000;
                        border: none;
                        transition: background-color 0.3s ease, color 0.3s ease;
                    }
                
                    .btn-sky:hover {
                        background-color: #073168; /* Bootstrap's sky blue */
                        color: #ffffff;
                    }
                </style>
                
                <div class="px-3">
                    <h1 style="color: #ffffff; font-size: 48px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: 700;">
                        Connecting and Empowering the University of Rwanda Community
                    </h1>
                    <h4 style="color: #f1f1f1; font-size: 22px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;" class="mt-3">
                        UR Community Hub is your go-to platform for collaboration, networking, and resource
                        sharing among students, staff, and alumni.
                    </h4>
                    {{-- <a href="#community-events" class="btn btn-sky mt-4 px-4 py-2">Explore More</a> --}}
                </div>
                
            </div>
        </div>
    </div>


    @php
        $communities = App\Models\CommunityProfile::where('status', 1)->withCount('events')->get();
        $communitiesNumber = App\Models\CommunityProfile::where('status', 1)->count();
    @endphp>
    <div class="container my-5 bg-blue-800" id="community">
        <h2 class="mb-4 text-center mb-4 bg-blue-800 text-2xl font-semibold">Available Associations/Clubs
            <strong>({{ $communitiesNumber }})</strong>
        </h2>

        <!-- Swiper Wrapper -->
        <div class="swiper mySwiper ">
            <div class="pb-5 swiper-wrapper">

                @foreach ($communities as $community)
                    <div class="swiper-slide">
                        <div class="shadow-sm card h-50">
                            <a href="{{ route('community.show', $community->id) }}">
                                <!-- Community Image -->
                                <div class="w-full h-64 overflow-hidden rounded">
                                    @if ($community->profile_image)
                                        <img src="{{ $community->profile_image }}" alt="{{ $community->community_name }}"
                                            class="object-cover w-full h-full">
                                    @else
                                        <div class="py-5 text-center bg-light">
                                            <i class="fas fa-users fa-3x text-secondary"></i>
                                        </div>
                                    @endif
                                </div>


                                <!-- Community Details -->
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $community->community_name }}</h5>
                                    <p class="card-text flex-grow-1">{{ Str::limit($community->bio, 100, '...') }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $community->location }}</small>
                                    </p>
                                    <p class="card-text"><strong>Events:</strong> {{ $community->events_count }}</p>
                                </div>
                            </a>

                            <!-- Social Links -->
                            <div class="bg-white card-footer">
                                <div class="d-flex justify-content-around">
                                    @if ($community->facebook_links)
                                        <a href="{{ $community->facebook_links }}" target="_blank" class="text-primary">
                                            <i class="fab fa-facebook fa-2x"></i>
                                        </a>
                                    @endif
                                    @if ($community->linkedin_links)
                                        <a href="{{ $community->linkedin_links }}" target="_blank" class="text-info">
                                            <i class="fab fa-linkedin fa-2x"></i>
                                        </a>
                                    @endif
                                    @if ($community->instagram_links)
                                        <a href="{{ $community->instagram_links }}" target="_blank" class="text-danger">
                                            <i class="fab fa-instagram fa-2x"></i>
                                        </a>
                                    @endif
                                    @if ($community->twitter_links)
                                        <a href="{{ $community->twitter_links }}" target="_blank" class="text-primary">
                                            <i class="fab fa-twitter fa-2x"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>



    <!-- Community Event Section -->
    @php
        $events = \App\Models\Event::latest()->take(4)->get();
        $eventsCount = \App\Models\Event::count();
    @endphp
    <div class="section function" id="community-events">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="section-heading-wrapper">
                        <h2 class="mb-4 bg-blue-800 text-2xl font-semibold">Associations/Clubs Events
                            <strong>({{ $eventsCount }})</strong>
                        </h2>
                        <h2 class="mb-3 text-gray-800 text-xl font-bold">Latest Events from Your Association or Club
                        </h2>
                        <p>Explore events organized by your community and get involved.</p>
                    </div>
                </div>
            </div>
            <div class="text-end p-3">
                <a href="{{ route('event-list') }}" class="btn btn-outline-primary fw-semibold fs-5">
                    Event List →
                </a>
            </div>
            
        </div>

        <div class="container">

            @if ($events->isEmpty())
                <p class="text-center text-gray-500">No upcoming events in your Association/Club.</p>
            @else
                @foreach ($events as $index => $event)
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

                    <div class="about-timeline-item">
                        <div class="about-timeline-line"></div>
                        <div class="about-timeline-dot"></div>
                        <div class="row">
                            @if ($index % 2 == 0)
                                <!-- Image on Left -->
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <div class="w-full h-64 overflow-hidden rounded">
                                        <img class="img-fluid"
                                            src="{{ asset($event->image ?? 'assets/web/images/default-event.jpg') }}"
                                            alt="{{ $event->title }}" class="object-cover w-full h-full">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <div class="about-timeline-info">
                                        <h3>{{ $event->title }}</h3>
                                        <p>{{ $event->description }}</p>
                                        <p><strong>Date:</strong>
                                            {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                                        <p><strong>Location:</strong> {{ $event->location }}</p>
                                        <p><strong>Community:</strong> {{ $community->community_name ?? 'N/A' }}</p>
                                        <p><strong>Slug:</strong> {{ $event->slug }}</p>
                                        <div class="py-3 mb-2">
                                            <span class="badge p-2 rounded-pill {{ $statusClass }}">
                                                {{ $status }}
                                            </span>
                                        </div>
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i> View Event
                                        </a>
                                    </div>
                                </div>
                            @else
                                <!-- Image on Right -->
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <div class="about-timeline-info">
                                        <h3>{{ $event->title }}</h3>
                                        <p>{{ $event->description }}</p>
                                        <p><strong>Date:</strong>
                                            {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                                        <p><strong>Location:</strong> {{ $event->location }}</p>
                                        <p><strong>Community:</strong> {{ $community->community_name ?? 'N/A' }}</p>
                                        <p><strong>Slug:</strong> {{ $event->slug }}</p>
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i> View Event
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <div class="about-timeline">
                                        <img class="img-fluid"
                                            src="{{ asset($event->image ?? 'assets/web/images/default-event.jpg') }}"
                                            alt="{{ $event->title }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- @include('layouts.guest.software.software') --}}

    @include('layouts.guest.section.contact')
    </div>
@endsection
