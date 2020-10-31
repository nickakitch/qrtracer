@extends('layout.app', ['title' => 'QR Tracer - Free Service To Record Your Visitors For Contact Tracing Purposes'])

@section('content')
    <section class="jumbotron pb-3 pt-4">
        <h1>Set up contact tracing for your business.</h1>
        <p class="lead">This free and simple to use tool will allow you to easily record every visitor to your business for COVID-19 contact tracing purposes.</p>
        <p>
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Get Started</a>
        </p>
        <p class="small text-muted">
            <i class="fas fa-lock mr-1"></i>
            Information collected (name, phone, and email) is securely encrypted within the database.
        </p>
    </section>
@endsection

@section('scripts')
@endsection
