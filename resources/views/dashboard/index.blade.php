@extends('layout.app', ['title' => 'QR Tracer - Dashboard'])

@section('content')
    <div class="row mt-md-3">
        <div class="col-md-3 d-none d-md-block">
            <p class="lead">Your Business QR Code:</p>
            <img class="img-fluid"
                 src="{{ asset(Utilities::qrCodeImageUrl(route('checkin.create', ['user_uuid' => auth()->user()->uuid]))) }}"
                 alt="QR Code">
        </div>
        <div class="col-md-9 pl-md-4">
            @include('dashboard.partials.download_poster')
            @include('dashboard.partials.download_csv')
            @include('dashboard.partials.privacy')
        </div>
    </div>
@endsection

@section('scripts')
@endsection
