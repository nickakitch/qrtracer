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
