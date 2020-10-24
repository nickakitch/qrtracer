@extends('layout.app', ['title' => 'QR Tracer - Free Service To Record Your Visitors For Contact Tracing Purposes'])

@section('content')
    <section class="col-md-6 offset-md-3">
        <h1>Get Started</h1>
        <form action="{{ route('register') }}" method="post">
            <div class="form-group">
                <label for="business_name">Business Name</label>
                <input type="text" required maxlength="255" class="form-control" id="business_name" name="business_name"
                       value="{{ old('business_name') }}" autocomplete="organization">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" required maxlength="255" class="form-control" id="email" name="email"
                       value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" required maxlength="255" minlength="8" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" required maxlength="255" class="form-control" id="password_confirmation"
                       name="password_confirmation">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" required class="form-check-input" id="disclaimer-checkbox">
                <label class="form-check-label" for="disclaimer-checkbox">I agree to inform people prior to using their contact details for anything other than COVID-19 contact tracing purposes.</label>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
            <input type="hidden" name="timezone" id="timezone">
            @csrf
        </form>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        window.onload = function () {
            document.getElementById('timezone').value = moment.tz.guess()
        }
    </script>
@endsection
