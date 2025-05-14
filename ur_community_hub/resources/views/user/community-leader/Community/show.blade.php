@extends('layouts.guest.partial.layouts')
@section('content')
    <div class="main-content-wrapper">
        <!-- Community details -->
        <div class="community-detail-content">
            <div class="container">
                <div class="row">
                    <div class="mb-4 col-12">
                        <div class="py-3 backto-event">
                            <a href="{{ route('home') }}">← Back</a>
                        </div>
                    </div>
                </div>

                <!-- Community Profile -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="community-profile">
                            <img src="{{ asset($community->profile_image) }}" alt="{{ $community->community_name }}"
                                class="rounded img-fluid">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2>{{ $community->community_name }}</h2>
                        <p><strong>Email:</strong> {{ $community->email }}</p>
                        <p><strong>Phone:</strong> {{ $community->phone }}</p>
                        <p><strong>Location:</strong> {{ $community->location }}</p>
                        <p><strong>Bio:</strong> {{ $community->bio }}</p>
                        <p>{{ $community->description }}</p>

                        <!-- Membership Request Button -->
                        <button type="button" class="mt-3 btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#membershipRequestModal">
                            Request Membership
                        </button>
                    </div>
                </div>

                <!-- Community Leaders -->
                <div class="mt-4 row">
                    <div class="col-12">
                        <h3>Community Leaders</h3>
                        <div class="pt-4 row">
                            @forelse ($community->leaders as $leader)
                                <div class="col-md-4">
                                    <div class="mb-3 text-center shadow-sm card">
                                        <div class="card-body">
                                            <div class="w-full overflow-hidden rounded">
                                                <img src="{{ asset($leader->profile_image) }}"
                                                    alt="{{ $leader->leader_name }}" class="object-cover w-full h-full"
                                                    style="height: 500px">
                                            </div>
                                            <h5 class="card-title">{{ $leader->leader_name }}</h5>
                                            <p class="card-text"><strong>Position:</strong> {{ $leader->position }}</p>
                                            <p class="card-text"><strong>Email:</strong> {{ $leader->email }}</p>
                                            <p class="card-text"><strong>Phone:</strong> {{ $leader->phone }}</p>
                                            <p class="card-text">{{ $leader->bio }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No leaders available for this community.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Community Events -->
                <div class="mt-4 row">
                    <div class="col-12">
                        <h3>Upcoming Events</h3>
                        <ul class="pt-4 list-group">
                            @forelse ($community->events as $event)
                                <li class="list-group-item">
                                    <a href="{{ route('events.show', $event->id) }}">
                                        {{ $event->title }} - {{ date('F d, Y', strtotime($event->event_date)) }}
                                    </a>
                                </li>
                            @empty
                                <li class="list-group-item">No events available.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="mt-4 row">
                    <div class="col-12">
                        <h3>Follow Us</h3>
                        <ul class="gap-4 py-3 social-links d-flex">
                            @if ($community->facebook_links)
                                <li><a href="{{ $community->facebook_links }}" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                            @endif
                            @if ($community->linkedin_links)
                                <li><a href="{{ $community->linkedin_links }}" target="_blank"><i
                                            class="fa fa-linkedin"></i></a></li>
                            @endif
                            @if ($community->twitter_links)
                                <li><a href="{{ $community->twitter_links }}" target="_blank"><i
                                            class="fa-brands fa-x-twitter"></i></a></li>
                            @endif
                            @if ($community->instagram_links)
                                <li><a href="{{ $community->instagram_links }}" target="_blank"><i
                                            class="fa fa-instagram bg-red-500"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Membership Request Modal -->
    <div class="modal fade" id="membershipRequestModal" tabindex="-1" aria-labelledby="membershipRequestModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="membershipRequestModalLabel">Request Membership to
                        {{ $community->community_name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="membershipRequestForm" action="{{ route('member-request') }}" method="POST">
                        @csrf

                        <input type="hidden" name="community_id"  value="{{ $community->id }}">

                        <div class="justify-between gap-5 d-flex">
                            <div class="w-full mb-3">
                                <label for="name" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <x-input type="text" class="form-control" id="name" name="name" required />
                            </div>
                            <div class="w-full mb-3">
                                <label for="email" class="form-label">Email Address <span
                                        class="text-danger">*</span></label>
                                <x-input type="email" class="form-control" id="email" name="email" required />
                            </div>
                        </div>
                        <div class="justify-between gap-5 d-flex">
                            <div class="w-full mb-3">
                                <label for="phone" class="form-label">Phone Number <span
                                        class="text-danger">*</span></label>
                                <x-input type="text" class="form-control" id="phone" name="phone" required />
                            </div>
                            <div class="w-full mb-3">
                                <label for="year_of_study" class="form-label">Year Of study <span
                                        class="text-danger">*</span></label>
                                <x-input type="number" class="form-control" id="year_of_study" name="year_of_study" />
                            </div>
                            <div class="w-full mb-3">
                                <label for="department" class="form-label">Department<span
                                        class="text-danger">*</span></label>
                                <x-input type="text" class="form-control" id="department" name="department" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="reason" class="form-label">Why do you want to join this community? <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="reason" name="reason" rows="4" required></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <x-input type="checkbox" class="form-check-input" id="termsCheck" name="terms_agreed"
                                required />
                            <label class="form-check-label" for="termsCheck">I agree to the community guidelines and
                                terms</label>
                        </div>
                        <div class="alert alert-info">
                            <small>Your request will be reviewed by the community administrators. You will receive an email
                                notification when your request is processed.</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="membershipRequestForm" class="btn btn-primary">Submit Request</button>
                </div>
            </div>
        </div>
    </div>
@endsection
