@extends('layout.app', ['title' => 'Checkin - ' . $business->business_name, 'no_nav' => true])

@section('content')
    <section class="text-center">
        <h1>{{ $business->business_name }}</h1>
        <p>We record your attendance for COVID-19 contact tracing purposes.</p>
        <p>Please provide your contact details so we can get in touch with you if required.</p>
        <form action="{{ route('checkin.store', ['user_uuid' => $business->uuid]) }}" class="text-left" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input required type="text" maxlength="255" class="form-control" id="name" name="name" value="{{ old('name') }}" autocomplete="name">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" maxlength="255" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="tel">
            </div>
            <div class="separator my-3">OR</div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" maxlength="255" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="email">
            </div>
            <button class="btn btn-primary btn-lg btn-block mt-4" type="submit">Complete</button>
            @csrf
        </form>
    </section>
@endsection
