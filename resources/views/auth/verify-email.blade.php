@extends('layout.app', ['title' => 'Verify Your Email - QR Tracer'])

@section('content')
    <section class="col-md-6 offset-md-3">
        @if (session('status'))
            <div class="alert alert-primary" role="alert">
                {{ (session('status') === 'verification-link-sent') ? "We've sent another email." : "" }}
            </div>
        @endif
        <h1>Please verify your email address.</h1>
        <p class="lead">We have sent a message to the email you provided, please click the link in this message to verify your email address.</p>
        <hr>
        <h4>No email?</h4>
        <p>Please check your spam/junk folder.</p>
        <form action="{{ route('verification.send') }}" method="post">
            <button type="submit" class="btn btn-primary">Resend Verification Email</button>
            @csrf
        </form>
    </section>
@endsection

@section('scripts')
@endsection
