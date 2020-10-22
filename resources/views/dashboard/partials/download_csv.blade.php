<section class="mb-4 card">
    <div class="card-body">
        <h4 class="mb-3">Download List of Guests</h4>
        <form action="{{ route('checkin.index') }}" method="get">
            <div class="form-group">
                <label for="timezone">Your timezone:</label>
                <select name="timezone" id="timezone" class="form-control">
                    @foreach($timezones as $timezone)
                        <option value="{{ $timezone }}" @if(auth()->user()->timezone == $timezone) selected @endif>{{ $timezone }}</option>
                    @endforeach
                </select>
            </div>
            <p>Include people who have checked in between the following dates:</p>
            <div class="form-inline mb-3">
                <div class="form-group mr-3">
                    <label for="date-from" class="sr-only">Date From</label>
                    <input type="date" class="form-control" id="date-from" name="from" placeholder="Date From">
                </div>
                <span class="d-none d-md-inline">&mdash;</span>
                <div class="form-group ml-0 ml-sm-3">
                    <label for="date-until" class="sr-only">Date Until</label>
                    <input type="date" class="form-control" id="date-until" name="until" placeholder="Date Until">
                </div>
            </div>
            <button class="btn btn-primary" type="submit"><i class="fas fa-file-csv mr-2"></i>Download CSV</button>
        </form>
    </div>
</section>
