@extends('layout.app', ['title' => 'QR Tracer - Free Service To Record Your Visitors For Contact Tracing Purposes'])

@section('content')
    <section class="col-md-6 offset-md-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" required maxlength="255" class="form-control" id="email" value="{{ old('email') }}"
                       name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" required maxlength="255" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary mr-3">Login</button>
            <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Password?</a>
            @csrf
        </form>
    </section>
@endsection

@section('scripts')
@endsection
