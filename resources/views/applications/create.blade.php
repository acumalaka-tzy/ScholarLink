<h1>Apply Scholarship</h1>

<form action="{{ route('applications.store') }}" method="POST">

    @csrf

    <select name="id_beasiswa">

        @foreach($scholarships as $scholarship)

            <option value="{{ $scholarship->id_beasiswa }}">
                {{ $scholarship->nama_beasiswa }}
            </option>

        @endforeach

    </select>

    <button type="submit">
        Apply
    </button>

</form>