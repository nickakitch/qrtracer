@extends('layout.app', ['title' => 'Forgot Password - QR Tracer'])

@section('content')
    <section class="col-md-6 offset-md-3">
        <h1>Password Reset</h1>
        <p>Please enter a new password below.</p>
        <form action="{{ route('password.update') }}" method="post">
            <div class="form-group">
                <label for="email">Your email address</label>
                <input type="email" required value="{{ old('email') }}" class="form-control" id="email" name="email"
                       aria-describedby="email-help">
                <small id="email-help" class="form-text text-muted">This is the email you used when you set up your
                    account.</small>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" required maxlength="255" minlength="8" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" required maxlength="255" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            @csrf
        </form>
    </section>
@endsection

@section('scripts')
@endsection
