<h1>Documents</h1>

@foreach($documents as $document)

    <p>
        {{ $document->jenis_dokumen }}
        -
        <a href="{{ asset('storage/' . $document->file_path) }}"
           target="_blank">

            Lihat File

        </a>
    </p>

@endforeach