<x-app-layout>
    <div class="p-4 bg-gray-100 rounded-md shadow-sm page-breadcrumb">
        <h3 class="text-lg font-semibold text-gray-700">Manage Communities</h3>
    </div>

    <div class="container px-4 py-6 my-6 bg-white rounded-md shadow-md">
        @if (session('success'))
            <div class="p-3 mb-4 text-white bg-green-500 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border rounded-md shadow-md">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Community User</th>
                    <th class="px-4 py-2">User Email</th>
                    <th class="px-4 py-2">Community Name</th>
                    <th class="px-4 py-2">Community Email</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($communities as $community)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $community->user->name }}</td>
                        <td class="px-4 py-2">{{ $community->user->email }}</td>
                        <td class="px-4 py-2">{{ $community->community_name }}</td>
                        <td class="px-4 py-2">{{ $community->email }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-white rounded-md
                                {{ $community->status == '1' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $community->status == '1' ? 'Active' : 'Pending' }}
                            </span>
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            {{-- View More Button --}}
                            <button
                                data-modal-target="communityModal-{{ $community->id }}"
                                data-modal-toggle="communityModal-{{ $community->id }}"
                                class="px-3 py-1 mb-1 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                                View More
                            </button>

                            {{-- Status Update Form --}}
                            <form action="{{ route('communities.update-status', $community->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PUT')
                                <select name="status" class="px-2 py-1 border rounded-md">
                                    <option value="1" {{ $community->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $community->status == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <button type="submit" class="px-3 py-1 mt-1 text-white bg-blue-600 rounded-md hover:bg-blue-700">Update</button>
                            </form>
                        </td>
                    </tr>

                    {{-- Flowbite Modal --}}
                    <div id="communityModal-{{ $community->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full bg-black/50">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                {{-- Modal Header --}}
                                <div class="flex items-center justify-between p-4 border-b rounded-t">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $community->community_name }}
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="communityModal-{{ $community->id }}">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>

                                {{-- Modal Body --}}
                                <div class="p-6 space-y-4">
                                    @if($community->profile_image)
                                        <img src="{{ $community->profile_image }}" alt="Profile" class="mx-auto h-100 ">
                                    @endif

                                    <p><strong>Email:</strong> {{ $community->email }}</p>
                                    <p><strong>Phone:</strong> {{ $community->phone }}</p>
                                    <p><strong>Location:</strong> {{ $community->location }}</p>
                                    <p><strong>Bio:</strong> {{ $community->bio }}</p>
                                    <p><strong>Description:</strong> {{ $community->description }}</p>

                                    <div class="flex flex-wrap gap-4">
                                        @if($community->facebook_links)
                                            <a href="{{ $community->facebook_links }}" target="_blank" class="flex items-center gap-1 text-blue-800 hover:underline">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        @endif

                                        @if($community->linkedin_links)
                                            <a href="{{ $community->linkedin_links }}" target="_blank" class="flex items-center gap-1 text-blue-800 hover:underline">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        @endif

                                        @if($community->instagram_links)
                                            <a href="{{ $community->instagram_links }}" target="_blank" class="flex items-center gap-1 text-red-600 hover:underline">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        @endif

                                        @if($community->twitter_links)
                                            <a href="{{ $community->twitter_links }}" target="_blank" class="flex items-center gap-1 text-blue-600 hover:underline">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
