@extends('layout.app', ['title' => 'QR Tracer - Free Service To Record Your Visitors For Contact Tracing Purposes'])

@section('content')
    <section class="jumbotron">
        <h1>Set up contact tracing for your business.</h1>
        <p class="lead">This free and simple to use tool will allow you to easily record every visitor to your business for COVID-19 contact tracing purposes.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Get Started</a>
    </section>
@endsection

@section('scripts')
@endsection
