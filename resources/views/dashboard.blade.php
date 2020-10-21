@extends('layout.app', ['title' => 'QR Tracer - Dashboard'])

@section('content')
    <div class="row mt-md-3">
        <div class="col-md-3 d-none d-md-block">
            <p class="lead">Your Business QR Code:</p>
            <img class="img-fluid"
                 src="{{ asset(Utilities::qrCodeImageUrl(route('checkin.create', ['user_uuid' => auth()->user()->uuid]))) }}"
                 alt="QR Code">
        </div>
        <div class="col-md-9 pl-md-4">
            <section class="mb-4">
                <h3 class="mb-3">Download QR Poster</h3>
                <form action="{{ route('poster.store', ['user_uuid' => auth()->user()->uuid]) }}" method="post">
                    <button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-file-download mr-2"></i>Download</button>
                    @csrf
                </form>
            </section>
            <section class="card">
                <div class="card-body">
                    <h4>Privacy Statement</h4>
                    <form action="{{ route('user.privacy.edit') }}" method="post">
                        <div class="form-group">
                            <label for="privacy_message">Privacy Message <small class="text-muted">(optional)</small></label>
                            <textarea class="form-control" id="privacy_message" name="message"
                                      maxlength="500"
                                      placeholder="Example: We will not use your contact details for marketing purposes."
                                      rows="3" aria-describedby="privacy_message_help">{{ old('message') ?? (auth()->user()->privacy_statement ?? '') }}</textarea>
                            <small id="privacy_message_help" class="form-text text-muted">This message will be displayed when
                                people provide you their contact details.</small>
                        </div>
                        <div class="form-group">
                            <label for="privacy_policy_url">Privacy Policy URL <small
                                    class="text-muted">(optional)</small></label>
                            <input type="url" maxlength="255" class="form-control" id="privacy_policy_url" name="url" value="{{ old('url') ?? (auth()->user()->privacy_url ?? '') }}"
                                   placeholder="https://example.com/privacy">
                        </div>
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
                        @csrf
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
