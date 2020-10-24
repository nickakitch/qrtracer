@extends('layout.app', ['title' => 'Forgot Password - QR Tracer'])

@section('content')
    <section class="col-md-6 offset-md-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h1>Password Reset</h1>
        <p>We will send you an email with instructions on how to reset your password.</p>
        <form action="{{ route('password.email') }}" method="post">
            <div class="form-group">
                <label for="email">Your email address</label>
                <input type="email" required value="{{ old('email') }}" class="form-control" id="email" name="email"
                       aria-describedby="email-help">
                <small id="email-help" class="form-text text-muted">This is the email you used when you set up your
                    account.</small>
            </div>
            <button type="submit" class="btn btn-primary">Send Email</button>
            @csrf
        </form>
    </section>
@endsection

@section('scripts')
@endsection
