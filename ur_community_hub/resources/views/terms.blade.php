@extends('layouts.guest.partial.layouts')

@section('content')
<div class="container">
    <div class="pt-4 bg-light">
        <div class="min-vh-100 d-flex flex-column align-items-center">
            <div class="w-100 w-md-75 mt-4 p-4 bg-white shadow-sm rounded">
                {!! $terms ->content !!}
            </div>
        </div>
    </div>
</div>
@endsection
