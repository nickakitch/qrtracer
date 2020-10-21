@extends('layout.app', ['title' => 'QR Tracer - Free Service To Record Your Visitors For Contact Tracing Purposes'])

@section('content')
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="post">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" required class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" required class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        @csrf
    </form>
@endsection

@section('scripts')
@endsection
