@extends('layout.app', ['title' => 'QR Tracer - Free Service To Record Your Visitors For Contact Tracing Purposes'])

@section('content')
    <h1>Get Started</h1>
    <form action="{{ route('register') }}" method="post">
        <div class="form-group">
            <label for="business_name">Business Name</label>
            <input type="text" required class="form-control" id="business_name" name="business_name" value="{{ old('business_name') }}" autocomplete="organization">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" required class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" required class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" required class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
        @csrf
    </form>
@endsection

@section('scripts')
@endsection
