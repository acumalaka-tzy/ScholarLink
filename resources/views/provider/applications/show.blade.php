@extends('provider.provider')

@section('content')
<div class="w-full">
    
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <a href="{{ route('provider.applications.index') }}" class="text-sm font-black text-gray-500 hover:text-blue-600 transition flex items-center gap-2">
            ← Kembali ke Daftar Pelamar
        </a>
        
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Status Saat Ini:</span>

            @if($application->status === 'pending')
                <span class="px-4 py-1.5 text-xs font-black bg-amber-50 text-amber-600 border border-amber-200 rounded-full flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span> Pending Verification
                </span>
            @elseif($application->status === 'approved')
                <span class="px-4 py-1.5 text-xs font-black bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-full flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Approved
                </span>
            @else
                <span class="px-4 py-1.5 text-xs font-black bg-rose-50 text-rose-600 border border-rose-200 rounded-full flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-rose-500"></span> Rejected
                </span>
            @endif
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-600 rounded-2xl text-sm font-bold">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-1 bg-white rounded-3xl p-6 border border-gray-100 flex flex-col items-center text-center shadow-sm h-fit">
            @if($application->user->profile && $application->user->profile->foto_profil)
                <img src="{{ asset('storage/' . $application->user->profile->foto_profil) }}" alt="Profile" class="w-24 h-24 rounded-2xl object-cover shadow-lg shadow-blue-500/20 mb-4">
            @else
                <div class="w-24 h-24 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-2xl flex items-center justify-center text-white text-3xl font-black shadow-lg shadow-blue-500/20 mb-4">
                    {{ strtoupper(substr($application->user->name ?? 'M', 0, 1)) }}
                </div>
            @endif
            
            <h2 class="text-xl font-black text-gray-900">
                {{ $application->user->name ?? 'Nama Pelamar' }}
            </h2>

            <p class="text-sm font-bold text-gray-400 mb-6">
                Pelamar Beasiswa
            </p>
            
            <div class="w-full space-y-4 border-t border-gray-100 pt-6 text-left">
                <div>
                    <label class="text-xs font-black text-gray-400 block uppercase tracking-wider mb-1">
                        Program Beasiswa
                    </label>

                    <span class="text-sm font-extrabold text-blue-600 bg-blue-50 px-3 py-1 rounded-xl block w-fit border border-blue-100">
                        {{ $application->scholarship->nama_beasiswa ?? $application->scholarship->title ?? 'Program Beasiswa' }}
                    </span>
                </div>

                <div>
                    <label class="text-xs font-black text-gray-400 block uppercase tracking-wider mb-1">
                        Universitas
                    </label>

                    <span class="text-sm font-extrabold text-gray-700">
                        {{ $application->user->profile->universitas ?? 'Universitas belum diisi' }}
                    </span>
                </div>

                <div>
                    <label class="text-xs font-black text-gray-400 block uppercase tracking-wider mb-1">
                        Email
                    </label>

                    <span class="text-sm font-extrabold text-gray-700 break-all">
                        {{ $application->user->email ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between gap-4 mb-4">
                    <h3 class="text-lg font-black text-gray-900 flex items-center gap-2">
                        📄 Dokumen Lampiran
                    </h3>

                    <span class="px-4 py-1.5 bg-blue-50 text-blue-600 border border-blue-100 rounded-full text-xs font-black">
                        {{ $application->documents->count() }} Dokumen
                    </span>
                </div>

                @if($application->documents->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($application->documents as $document)
                            <div class="flex items-center justify-between p-4 bg-gray-50/50 rounded-2xl border border-gray-100 hover:border-blue-200 transition">
                                <div class="flex items-center gap-3 min-w-0">
                                    <span class="text-2xl text-blue-500 flex-shrink-0">📎</span>

                                    <div class="min-w-0">
                                        <p class="text-sm font-black text-gray-700 truncate">
                                            {{ $document->jenis_dokumen ?? 'Dokumen Pendukung' }}
                                        </p>

                                        <p class="text-xs font-bold text-gray-400 truncate">
                                            {{ $document->nama_file ?? 'File dokumen' }}
                                        </p>

                                        <p class="text-xs font-bold text-gray-400 mt-1">
                                            Upload:
                                            {{ $document->tanggal_upload ? \Carbon\Carbon::parse($document->tanggal_upload)->format('d M Y H:i:s') : '-' }}
                                        </p>
                                    </div>
                                </div>

                                <a href="{{ asset('storage/' . $document->file_path) }}"
                                   target="_blank"
                                   class="ml-3 px-4 py-1.5 bg-white border border-gray-200 text-gray-700 hover:text-blue-600 hover:border-blue-200 text-xs font-black rounded-xl transition shadow-sm flex-shrink-0">
                                    Buka
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-6 bg-gray-50 border border-dashed border-gray-200 rounded-2xl text-center">
                        <div class="text-4xl mb-3">📂</div>
                        <p class="text-sm font-black text-gray-600">
                            Mahasiswa belum mengupload dokumen.
                        </p>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm">
                <h3 class="text-lg font-black text-gray-900 mb-4 flex items-center gap-2">
                    ✍️ Esai Motivasi & Komitmen
                </h3>

                <div class="text-gray-600 text-sm font-bold leading-relaxed bg-gray-50/50 p-5 rounded-2xl border border-gray-100 whitespace-pre-line">
                    "{{ $application->catatan ?? 'Pelamar tidak menyertakan esai atau catatan tambahan.' }}"
                </div>
            </div>

            @if($application->status === 'approved' && $application->link_wa)
                <div class="bg-emerald-50 border border-emerald-100 rounded-3xl p-6 mt-6">
                    <h3 class="text-sm font-black text-emerald-800 mb-2 flex items-center gap-2">
                        <i class="bi bi-whatsapp"></i> Link Grup WhatsApp
                    </h3>
                    <div class="flex items-center justify-between bg-white rounded-2xl px-4 py-3 border border-emerald-100 shadow-sm">
                        <a href="{{ $application->link_wa }}" target="_blank" class="text-emerald-600 font-bold text-sm hover:underline truncate mr-4">
                            {{ $application->link_wa }}
                        </a>
                        <a href="{{ $application->link_wa }}" target="_blank" class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white font-black text-xs rounded-xl transition flex-shrink-0">
                            Buka
                        </a>
                    </div>
                </div>
            @endif

            @if($application->status === 'pending')
                <div class="bg-gray-50/50 border border-gray-100 rounded-3xl p-4 flex gap-4 justify-end items-center">
                    <p class="text-xs font-bold text-gray-400 mr-auto pl-2 hidden sm:block">
                        Pastikan Anda telah memeriksa semua berkas pelamar.
                    </p>
                    
                    <form method="POST" action="{{ route('provider.applications.reject', $application->id_application) }}">
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="px-6 py-3 bg-white border border-gray-200 hover:bg-rose-50 hover:text-rose-600 text-gray-600 rounded-2xl font-black text-sm transition shadow-sm">
                            Reject
                        </button>
                    </form>
                    
                    <button type="button" onclick="toggleModalWA()" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:opacity-95 text-white font-black text-sm rounded-2xl transition shadow-lg shadow-blue-500/20 flex items-center gap-2">
                        Approve & Kirim WA
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

<div id="modalWA" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white border border-gray-100 rounded-3xl p-6 max-w-md w-full mx-4 shadow-2xl">
        <h3 class="text-xl font-black text-gray-900 mb-2">
            Konfirmasi Lolos
        </h3>

        <p class="text-sm font-bold text-gray-500 mb-6">
            Masukkan link grup WhatsApp agar mahasiswa bisa bergabung.
        </p>

        <form method="POST" action="{{ route('provider.applications.approve', $application->id_application) }}">
            @csrf
            @method('PATCH')

            <input type="url"
                   name="link_wa"
                   required
                   placeholder="https://chat.whatsapp.com/..."
                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl mb-6 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-blue-500">

            <div class="flex gap-3 justify-end">
                <button type="button" onclick="toggleModalWA()" class="px-5 py-2.5 bg-gray-100 text-gray-600 rounded-2xl font-black text-sm">
                    Batal
                </button>

                <button type="submit" class="px-6 py-2.5 bg-emerald-500 text-white rounded-2xl font-black text-sm">
                    Konfirmasi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModalWA() {
        document.getElementById('modalWA').classList.toggle('hidden');
    }
</script>
@endsection