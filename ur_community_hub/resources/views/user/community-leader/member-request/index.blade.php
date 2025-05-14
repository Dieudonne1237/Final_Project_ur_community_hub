<x-app-layout>
    <div class="p-4 bg-gray-100 rounded-md shadow-sm page-breadcrumb">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">Member Request</h3>
        </div>
    </div>

    <div class="container px-4 py-6 my-6 bg-white rounded-md shadow-md x-auto p">
        <div class="content">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if ($memberRequests->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Phone</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Admin Notes
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Submitted At
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>


                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($memberRequests as $request)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $request->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $request->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $request->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-block px-2 py-1 text-xs font-semibold rounded 
        {{ $request->status == 'approved' ? 'bg-green-100 text-green-800' : ($request->status == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($request->status ?? 'pending') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $request->admin_notes ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $request->created_at->format('M d, Y') }}
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('member-requests.show', $request->id) }}"
                                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                View Details
                                             </a>
                                             
                                            <!-- Approve -->
                                            {{-- <form method="POST"
                                                action="{{ route('member-requests.approve', $request->id) }}">
                                                @csrf
                                                <input type="hidden" name="admin_notes" value="Approved by admin.">
                                                <button type="submit"
                                                    class="px-2 py-1 text-white bg-green-600 rounded hover:bg-green-700">Approve</button>
                                            </form> --}}

                                            <!-- Reject -->
                                            {{-- <form method="POST"
                                                action="{{ route('member-requests.reject', $request->id) }}">
                                                @csrf
                                                <input type="hidden" name="admin_notes" value="Rejected by admin.">
                                                <button type="submit"
                                                    class="px-2 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">Reject</button>
                                            </form> --}}

                                            <!-- Delete -->
                                            {{-- <form method="POST"
                                                action="{{ route('member-requests.destroy', $request->id) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this request?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-2 py-1 text-white bg-red-600 rounded hover:bg-red-700">Delete</button>
                                            </form> --}}

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $memberRequests->links() }}
                </div>
            @else
                <div class="p-4 text-center">
                    <p class="text-gray-500">No membership requests found.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
