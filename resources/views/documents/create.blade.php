<h1>Upload Document</h1>

<form action="{{ route('documents.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <label>Application</label>

    <select name="id_application">

        @foreach($applications as $application)

            <option value="{{ $application->id_application }}">
                Application #{{ $application->id_application }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Jenis Dokumen</label>

    <input type="text"
           name="jenis_dokumen"
           placeholder="CV / Transkrip">

    <br><br>

    <label>File</label>

    <input type="file" name="file">

    <br><br>

    <button type="submit">
        Upload
    </button>

</form>