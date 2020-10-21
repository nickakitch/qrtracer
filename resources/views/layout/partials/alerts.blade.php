@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::get('alert-' . $msg))
        <div class="alert alert-{{ $msg }} page-alert fade show">
            <div class="container">
                {{ session('alert-' . $msg) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
@endforeach

@if ($errors->any())
    <div class="alert alert-danger page-alert fade show">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Error submitting form:</strong>
            <ul class="list-unstyled mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
