<x-app-layout>
    <div class="p-4 mb-4 bg-white rounded shadow">
        <h2 class="mb-4 text-xl font-bold">Membership Request Details</h2>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <strong>Full Name:</strong>
                <p>{{ $request->name }}</p>
            </div>
            <div>
                <strong>Email:</strong>
                <p>{{ $request->email }}</p>
            </div>
            <div>
                <strong>Phone:</strong>
                <p>{{ $request->phone }}</p>
            </div>
            <div>
                <strong>Year of Study:</strong>
                <p>{{ $request->year_of_study ?? '-' }}</p>
            </div>
            <div>
                <strong>Department:</strong>
                <p>{{ $request->department ?? '-' }}</p>
            </div>
            <div class="col-span-2">
                <strong>Reason for Joining:</strong>
                <p>{{ $request->reason }}</p>
            </div>
            <div>
                <strong>Status:</strong>
                <p>{{ ucfirst($request->status) }}</p>
            </div>
            <div>
                <strong>Submitted On:</strong>
                <p>{{ $request->created_at->format('F d, Y') }}</p>
            </div>
        </div>

        <div class="mt-6 flex flex-wrap gap-3">
            <!-- Approve Button -->
            <form action="{{ route('member-requests.approve', $request->id) }}" method="POST">
                @csrf
                <input type="hidden" name="admin_notes" value="Approved after review.">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <i class="fas fa-check mr-2"></i> Approve
                </button>
            </form>

            <!-- Reject Button -->
            <form action="{{ route('member-requests.reject', $request->id) }}" method="POST">
                @csrf
                <input type="hidden" name="admin_notes" value="Rejected after review.">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <i class="fas fa-times mr-2"></i> Reject
                </button>
            </form>

            <!-- Delete Button -->
            <form action="{{ route('member-requests.destroy', $request->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this request?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-700 bg-white border border-red-600 rounded-md hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <i class="fas fa-trash-alt mr-2"></i> Delete
                </button>
            </form>
        </div>


        <a href="{{ route('member-requests.index') }}"
            class="inline-flex items-center mt-6 px-4 py-2 text-sm font-semibold text-blue-600 border border-blue-600 rounded-md 
               hover:bg-blue-700 hover:text-white transition-colors duration-200 ease-in-out">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>



    </div>
</x-app-layout>
