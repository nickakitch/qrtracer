<section class="mb-4 card">
    <div class="card-body">
        <h4 class="mb-3">Download QR Poster</h4>
        <form action="{{ route('poster.store', ['user_uuid' => auth()->user()->uuid]) }}" method="post">
            <button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-file-download mr-2"></i>Download Poster</button>
            @csrf
        </form>
    </div>
</section>
