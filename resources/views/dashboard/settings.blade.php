@extends('layout.app', ['title' => 'QR Tracer - Dashboard'])

@section('content')
    <section class="col-md-6 offset-md-3">
        <h1 class="mb-4">Account Settings</h1>
        <section class="card mb-4">
            <div class="card-body">
                <h3>Update Information</h3>
                <form action="{{ route('settings.save') }}" method="post">
                    <div class="form-group">
                        <label for="business_name">Business Name</label>
                        <input type="text" required maxlength="255" class="form-control" id="business_name" name="business_name"
                               value="{{ $user->business_name }}" autocomplete="organization">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" required maxlength="255" class="form-control" id="email" name="email"
                               value="{{ $user->email }}">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
                    @csrf
                </form>
            </div>
        </section>
        <section class="card">
            <div class="card-body">
                <h3>Update Password</h3>
                <form action="{{ route('settings.update_password') }}" method="post">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" required autocomplete="none" maxlength="255" minlength="8" class="form-control" id="current_password" name="current_password">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" required maxlength="255" minlength="8" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" required maxlength="255" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
                    @csrf
                </form>
            </div>
        </section>
    </section>
@endsection

@section('scripts')
@endsection
