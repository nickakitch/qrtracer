@extends('layout.app', ['title' => 'QR Tracer - Dashboard'])

@section('content')
    <div class="row mt-md-3">
        <div class="col-md-3 d-none d-md-block">
            <p class="lead">Your Business QR Code:</p>
            <img class="img-fluid" src="{{ asset(Utilities::qrCodeImageUrl(route('checkin.create', ['user_uuid' => auth()->user()->uuid]))) }}" alt="QR Code">
        </div>
        <div class="col-md-9 pl-md-4">
            <h3>Download Check-in QR Poster</h3>
            <form action="{{ route('poster.store', ['user_uuid' => auth()->user()->uuid]) }}" method="post">
                <div class="form-group">
                    <label for="privacy_message">Privacy Message <small class="text-muted">(optional)</small></label>
                    <textarea class="form-control" id="privacy_message" name="privacy_message" placeholder="Example: We will not use your contact details for marketing purposes." rows="3" aria-describedby="privacy_message_help"></textarea>
                    <small id="privacy_message_help" class="form-text text-muted">This message will be displayed when people provide you their contact details.</small>
                </div>
                <div class="form-group">
                    <label for="privacy_policy_url">Privacy Policy URL <small class="text-muted">(optional)</small></label>
                    <input type="url" class="form-control" id="privacy_policy_url" placeholder="https://example.com/privacy">
                </div>
                <button class="btn btn-primary" type="submit"><i class="fas fa-file-download mr-2"></i>Download</button>
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
