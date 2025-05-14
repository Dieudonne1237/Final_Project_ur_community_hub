<x-app-layout>
    <div class="p-4 bg-gray-100 rounded-md shadow-sm page-breadcrumb">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">WELCOME {{ Auth::user()->name }}</h3>
        </div>
    </div>
    <div class="container px-4 py-6 my-6 bg-white rounded-md shadow-md x-auto p">
        <div class="content">
            @livewire('community.community-crud-livewire')
        </div>
    </div>
</x-app-layout>
