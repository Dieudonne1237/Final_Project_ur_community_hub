<x-app-layout>
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                <i class="mr-2 fa fa-building"></i> Community Registration Request Details
            </h3>
            <a href="{{ route('community-requests.index') }}"
                class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <i class="mr-2 fa fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
        <!-- Request Details -->
        <div
            class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm lg:col-span-2 dark:bg-gray-800 dark:border-gray-700">
            <h4 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Request Information</h4>

            <div class="mb-6">
                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
                @if ($request->status == 'approved')
                    <span
                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                        Approved
                    </span>
                @elseif($request->status == 'rejected')
                    <span
                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                        Rejected
                    </span>
                @else
                    <span
                        class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                        Pending
                    </span>
                @endif
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="mb-4">
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Requester Name</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ $request->name }}</p>
                </div>

                <div class="mb-4">
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Email</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ $request->email }}</p>
                </div>

                <div class="mb-4">
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Phone Number</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ $request->phone }}</p>
                </div>

                <div class="mb-4">
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Community Name</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ $request->community_name }}</p>
                </div>
                

                <div class="mb-4 md:col-span-2">
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Date Submitted</p>
                    <p class="text-base text-gray-900 dark:text-white">
                        {{ $request->created_at->format('F d, Y H:i:s') }}</p>
                </div>

                @if ($request->admin_notes)
                    <div class="mb-4 md:col-span-2">
                        <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Admin Notes</p>
                        <p class="text-base text-gray-900 dark:text-white">{{ $request->admin_notes }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Actions Panel -->
        <!-- Actions Panel -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <h4 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Actions</h4>

            @if ($request->status == 'pending')
                <!-- Approve Form -->
                <form action="{{ route('community-requests.approve', $request->id) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="approve_notes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Admin Notes
                            (Optional)</label>
                        <textarea id="approve_notes" name="admin_notes" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                            placeholder="Add any notes for approval"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <i class="mr-2 fa fa-check"></i> Approve Request
                    </button>
                </form>

                <!-- Reject Form -->
                <form action="{{ route('community-requests.reject', $request->id) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="reject_notes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rejection Reason
                            (Optional)</label>
                        <textarea id="reject_notes" name="admin_notes" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="Provide a reason for rejection"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <i class="mr-2 fa fa-times"></i> Reject Request
                    </button>
                </form>

                <!-- Delete Form -->
                {{-- <form action="{{ url('/community-staff/community-requests/' . $request->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this request?');">

                    @csrf
                    @method('DELETE')
                    <div class="mb-4">
                        <label for="delete_notes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason for Deletion
                            (Optional)</label>
                        <textarea id="delete_notes" name="admin_notes" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="Enter reason for deleting this request"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500">
                        <i class="mr-2 fa fa-trash"></i> Delete Request
                    </button>
                </form> --}}
            @else
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-700 dark:text-blue-300"
                    role="alert">
                    <span class="font-medium">Request Status:</span> This request has already been
                    <strong>{{ ucfirst($request->status) }}</strong>.
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
