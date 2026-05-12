<h1>Applications</h1>

@foreach($applications as $application)

    <div style="margin-bottom: 20px; border:1px solid #ccc; padding:15px;">

        <p>
            <strong>Mahasiswa:</strong>
            {{ $application->user->name }}
        </p>

        <p>
            <strong>Beasiswa:</strong>
            {{ $application->scholarship->nama_beasiswa }}
        </p>

        <p>
            <strong>Status:</strong>

            @if($application->status == 'approved')

                <span style="color:green;">
                    APPROVED
                </span>

            @elseif($application->status == 'rejected')

                <span style="color:red;">
                    REJECTED
                </span>

            @else

                <span style="color:orange;">
                    PENDING
                </span>

            @endif

        </p>

        {{-- Tombol hanya muncul jika status masih pending --}}
        @if($application->status != 'approved')

            <form
                action="{{ route('applications.approve', $application->id_application) }}"
                method="POST"
                style="display:inline;">

                @csrf
                @method('PATCH')

                <button type="submit">
                    Approve
                </button>

            </form>

        @endif


        @if($application->status != 'rejected')

            <form
                action="{{ route('applications.reject', $application->id_application) }}"
                method="POST"
                style="display:inline;">

                @csrf
                @method('PATCH')

                <button type="submit">
                    Reject
                </button>

            </form>

        @endif

    </div>

@endforeach