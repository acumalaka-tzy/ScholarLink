<h1>Applications</h1>

@foreach($applications as $application)

    <p>
        {{ $application->user->name }}
        -
        {{ $application->scholarship->nama_beasiswa }}
        -
        {{ $application->status }}
    </p>

@endforeach