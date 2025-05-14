<div class="min-h-screen px-4 py-10 bg-gradient-to-b from-gray-50 to-gray-100 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <!-- Header Section with improved styling -->
        <div class="mb-16 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block text-green-600">Community Management</span>
            </h1>
            <p class="max-w-xl mx-auto mt-5 text-xl text-gray-500">
                Manage your professional communities and leadership teams in one centralized dashboard.
            </p>
        </div>

        <!-- Action Buttons with improved layout and animation -->
        <div class="flex flex-wrap items-center justify-center gap-4 mb-12">
            @auth

                @if (auth()->user()->communityProfile)
                    <button
                        class="relative inline-flex items-center px-8 py-4 overflow-hidden text-white transition-all duration-300 bg-green-600 rounded-lg shadow-lg group hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        data-modal-target="add-leader-modal-modal" data-modal-toggle="add-leader-modal-modal">
                        <span
                            class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 ease-out transform translate-x-12 bg-white rotate-12 opacity-10 group-hover:-translate-x-40"></span>
                        <i class="mr-2 fas fa-user-plus"></i> Add Community Leader
                    </button>
                @else
                    <button data-modal-target="add-community-modal" data-modal-toggle="add-community-modal"
                        class="relative inline-flex items-center px-8 py-4 overflow-hidden text-white transition-all duration-300 bg-blue-600 rounded-lg shadow-lg group hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <span
                            class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 ease-out transform translate-x-12 bg-white rotate-12 opacity-10 group-hover:-translate-x-40"></span>
                        <i class="mr-2 fas fa-plus-circle"></i> Create Community
                    </button>
                @endif
            @endauth
        </div>

        <!-- Communities Section with card improvements -->
        <div class="mb-16">
            <h2 class="mb-6 text-2xl font-bold text-gray-900 sm:text-3xl">
                <i class="mr-2 text-blue-800 fas fa-users"></i> Your Communities
            </h2>
            <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($communities as $community)
                    <div
                        class="relative overflow-hidden transition-all duration-300 bg-white shadow-md group rounded-xl hover:-translate-y-1 hover:shadow-xl">

                        <div class="relative pb-48 overflow-hidden">
                            <img class="absolute inset-0 object-center h-full transition-transform duration-300 group-hover:scale-105"
                                src="{{ $community->profile_image }}" alt="{{ $community->community_name }}"
                                onerror="this.src='https://via.placeholder.com/400x200?text=Community'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-70">
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-2">
                                    <h1 class="text-2xl font-bold uppercase">{{ $community->community_status }}</h1>
                                    <h3 class="text-2xl font-bold text-blue-800">
                                        {{ $community->community_name }}</h3>
                                <p class="flex items-center text-gray-700">
                                    <i class="w-5 h-5 mr-3 text-green-500 fas fa-envelope"></i> {{ $community->email }}
                                </p>
                                @if ($community->phone)
                                    <p class="flex items-center text-gray-700">
                                        <i class="w-5 h-5 mr-3 text-green-500 fas fa-phone"></i> {{ $community->phone }}
                                    </p>
                                @endif
                                @if ($community->location)
                                    <p class="flex items-center text-gray-700">
                                        <i class="w-5 h-5 mr-3 text-green-500 fas fa-map-marker-alt"></i>
                                        {{ $community->location }}
                                    </p>
                                @endif
                            </div>

                            @if ($community->bio)
                                <div class="mt-4">
                                    <p class="text-sm text-gray-600 line-clamp-3">{{ $community->bio }}</p>
                                </div>
                            @endif

                            <div class="flex gap-3 mt-6">
                                @if ($community->facebook_links)
                                    <a href="{{ $community->facebook_links }}" target="_blank"
                                        class="p-2 text-blue-800 transition-colors bg-gray-100 rounded-full hover:bg-blue-600 hover:text-white">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @endif
                                @if ($community->linkedin_links)
                                    <a href="{{ $community->linkedin_links }}" target="_blank"
                                        class="p-2 text-blue-800 transition-colors bg-gray-100 rounded-full hover:bg-blue-800 hover:text-white">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                @endif
                                @if ($community->instagram_links)
                                    <a href="{{ $community->instagram_links }}" target="_blank"
                                        class="p-2 text-pink-600 transition-colors bg-gray-100 rounded-full hover:bg-pink-600 hover:text-white">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                                @if ($community->twitter_links)
                                    <a href="{{ $community->twitter_links }}" target="_blank"
                                        class="p-2 text-blue-800 transition-colors bg-gray-100 rounded-full hover:bg-blue-400 hover:text-white">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                            </div>

                            <div class="flex gap-3 mt-6">
                            <button wire:click="edit({{ $community->id }})" data-modal-target="edit-community-modal"
                                data-modal-toggle="edit-community-modal"
                                class="p-2 text-blue-800">
                                <i class="fas fa-edit"></i>Edit
                            </button>
                            <button wire:click="delete({{ $community->id }})"
                                class="p-2 text-red-600">
                                <i class="fas fa-trash-alt"></i>Delete
                            </button>
                        </div>
                        </div>
                    </div>
                @empty
                    <div class="p-12 text-center bg-white shadow-sm col-span-full rounded-xl">
                        <div class="flex items-center justify-center w-24 h-24 mx-auto mb-6 bg-blue-100 rounded-full">
                            <i class="text-4xl text-blue-800 fas fa-building"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">No communities found</h3>
                        <p class="mt-2 text-gray-500">Get started by creating your first community.</p>
                        <button data-modal-target="add-community-modal" data-modal-toggle="add-community-modal"
                            class="inline-flex items-center px-6 py-3 mt-6 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <i class="mr-2 fas fa-plus-circle"></i> Create Community
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
        @if (auth()->user()->communityProfile)
            <!-- Leaders Section with improved cards -->
            <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl">
                <div class="px-6 py-6 bg-gradient-to-r from-green-600 to-green-800 sm:px-8">
                    <h2 class="flex items-center text-2xl font-bold text-white sm:text-3xl">
                        <i class="mr-3 fas fa-user-tie"></i> Community Leaders
                    </h2>
                    <p class="max-w-2xl mt-2 text-sm text-green-100">
                        Leadership team members and representatives
                    </p>
                </div>
                <div class="grid gap-6 px-1 py-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:p-8">
                    @forelse ($leaders as $leader)
                        <div
                            class="overflow-hidden transition-all duration-300 bg-white shadow-md group rounded-xl hover:-translate-y-1 hover:shadow-xl">
                            <div class="p-6 ">
                                <div class="flex gap-5 py-4 transition-opacity ">
                                    <button wire:click="editLeader({{ $leader->id }})"
                                        data-modal-target="edit-leader-modal" data-modal-toggle="edit-leader-modal"
                                        class="p-2 text-blue-800 bg-gray-100 rounded-full shadow-sm hover:bg-blue-600 hover:text-white">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="deleteLeader({{ $leader->id }})"
                                        class="p-2 text-red-600 bg-gray-100 rounded-full shadow-sm hover:bg-red-600 hover:text-white">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>

                                <div class="flex flex-col pt-2 sm:flex-row sm:items-start sm:space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="mb-4 h-28 w-38 sm:mb-0">
                                            <img class="object-cover w-full h-full ring-2 ring-green-500 ring-offset-2"
                                                src="{{ $leader->profile_image }}" alt="{{ $leader->leader_name }}"
                                                onerror="this.src='https://via.placeholder.com/112?text=Leader'">
                                            @if ($leader->position)
                                                <div
                                                    class="absolute px-2 py-2 text-xs font-medium text-green-800 bg-green-100 rounded-lg -right-1 -top-1">
                                                    {{ $leader->position }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-1 pt-5 sm:text-left">
                                        <h3 class="text-xl font-bold text-gray-900">{{ $leader->leader_name }}</h3>
                                        <div class="mt-2 space-y-1">
                                            <p class="flex text-sm text-gray-700 sm:justify-start">
                                                <i class="mr-2 text-green-500 fas fa-envelope"></i>
                                                {{ $leader->email }}
                                            </p>

                                            @if ($leader->phone)
                                                <p class="flex text-sm text-gray-700 sm:justify-start">
                                                    <i class="mr-2 text-green-500 fas fa-phone"></i>
                                                    {{ $leader->phone }}
                                                </p>
                                            @endif
                                        </div>

                                        @if ($leader->bio)
                                            <div class="mt-3">
                                                <p class="text-sm text-gray-600 line-clamp-3">{{ $leader->bio }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center bg-white col-span-full rounded-xl">
                            <div
                                class="flex items-center justify-center w-24 h-24 mx-auto mb-6 bg-green-100 rounded-full">
                                <i class="text-4xl text-green-500 fas fa-user-plus"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900">No leaders found</h3>
                            <p class="mt-2 text-gray-500">Add leadership team members to your community.</p>
                            <button data-modal-target="add-leader-modal-modal"
                                data-modal-toggle="add-leader-modal-modal"
                                class="inline-flex items-center px-6 py-3 mt-6 text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <i class="mr-2 fas fa-user-plus"></i> Add Leader
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
        @endif
    </div>

    @include('livewire.community.add-community-modal')
    @include('livewire.community.edit-community-modal')
    @include('livewire.community.add-leader-modal-modal')

    <!-- Improved toast notification with animation -->
    <div x-data="{ show: false, message: '' }"
        x-on:show-success-message.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
        x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="fixed z-50 flex items-center px-6 py-3 text-white bg-green-600 rounded-lg shadow-2xl bottom-4 right-4">
        <i class="mr-2 text-lg fas fa-check-circle"></i>
        <span x-text="message"></span>
    </div>
</div>
