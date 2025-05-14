<x-app-layout>
    <div class="p-4 bg-gray-100 rounded-md shadow-sm page-breadcrumb">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">WELCOME {{ Auth::user()->name }}</h3>
        </div>
    </div>

    <div class="container px-4 py-6 my-6 bg-white rounded-md shadow-md">
        <div class="content">
            @if (session('success'))
                <div class="p-3 mb-4 text-white bg-green-500 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ $terms ? route('terms.update', $terms->id) : route('terms.store') }}" method="POST">
                @csrf
                @if ($terms)
                    @method('PUT')
                @endif
                <textarea name="content" id="content" class="w-full p-2 border rounded-md">{{ $terms->content ?? '' }}</textarea>
                <button type="submit" class="px-4 py-2 mt-3 text-white bg-blue-600 rounded-md">
                    {{ $terms ? 'Update' : 'Save' }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
