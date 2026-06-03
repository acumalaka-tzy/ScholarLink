@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-10 px-3 sm:px-6 lg:px-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    {{-- Back Button --}}
    <div class="mb-4 sm:mb-8">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
            <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                <i class="bi bi-arrow-left text-sm sm:text-base"></i>
            </span>
            Kembali ke Dashboard
        </a>
    </div>

    {{-- Success Notification Alert --}}
    @if(session('success'))
        <div id="success-alert" class="mb-6 sm:mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg sm:rounded-2xl p-4 sm:p-6 shadow-lg animate-bounce-in">
            <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                <div class="w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-xl sm:text-2xl flex-shrink-0">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-black text-green-700 text-sm sm:text-lg mb-1">Aplikasi Berhasil Dikirim! 🎉</h4>
                    <p class="text-green-600 font-bold text-xs sm:text-base mb-3">{{ session('success') }}</p>
                    <div class="flex flex-wrap gap-2">
                        <div class="inline-flex items-center gap-2 bg-white border border-green-200 rounded-lg px-3 py-2 text-xs sm:text-sm font-bold text-green-700">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Cek status aplikasi Anda di bawah</span>
                        </div>
                    </div>
                </div>
                <button onclick="document.getElementById('success-alert').remove()" class="text-green-400 hover:text-green-600 transition text-lg sm:text-xl flex-shrink-0">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast('✨ Aplikasi beasiswa berhasil dikirim ke penyedia dan admin! Pantau status di bawah.', 'success', 5000);
            });
        </script>
    @endif

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 sm:gap-5 mb-8 sm:mb-10">
        <div>
            <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-xs sm:text-sm mb-3 sm:mb-4 border border-orange-200">
                <div class="w-5 sm:w-6 h-5 sm:h-6 rounded-full bg-orange-500 text-white flex items-center justify-center text-xs">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                My Applications
            </div>

            <div class="flex items-center gap-3 sm:gap-5">
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-2xl sm:text-3xl shadow-lg shadow-blue-500/20">
                    <i class="bi bi-journal-check"></i>
                </div>
                <div>
                    <h1 class="text-xl sm:text-4xl font-black text-gray-900">My Applications</h1>
                    <p class="text-gray-500 font-bold mt-1 sm:mt-2 text-xs sm:text-lg">Pantau status pengajuan beasiswa kamu secara realtime.</p>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-100 rounded-lg sm:rounded-[2rem] px-4 sm:px-7 py-4 sm:py-5 shadow-xl">
            <p class="text-gray-500 text-xs sm:text-sm font-bold mb-2">Total Applications</p>
            <div class="flex items-center gap-3 sm:gap-4">
                <div class="w-10 sm:w-14 h-10 sm:h-14 rounded-lg sm:rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg sm:text-2xl">
                    <i class="bi bi-file-earmark-check-fill"></i>
                </div>
                <h2 class="text-2xl sm:text-4xl font-black text-gray-900">{{ $applications->count() }}</h2>
            </div>
        </div>
    </div>

    @if($applications->count() == 0)
        <div class="bg-white border border-gray-100 rounded-lg sm:rounded-[2rem] p-8 sm:p-16 text-center shadow-2xl">
            <div class="w-20 sm:w-28 h-20 sm:h-28 mx-auto rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-4xl sm:text-5xl mb-6 sm:mb-8">
                <i class="bi bi-inbox-fill"></i>
            </div>
            <h2 class="text-2xl sm:text-4xl font-black text-gray-900 mb-2 sm:mb-4">Belum Ada Application</h2>
            <p class="text-gray-500 font-bold text-xs sm:text-lg mb-6 sm:mb-10">Kamu belum mengajukan beasiswa apapun.</p>
            <a href="{{ route('scholarships.index') }}" class="inline-flex items-center gap-2 sm:gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 transition px-4 sm:px-8 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl text-white font-black shadow-xl shadow-blue-500/20 hover:scale-[1.02] text-xs sm:text-base">
                <i class="bi bi-search"></i> <span class="hidden xs:inline">Cari Beasiswa</span><span class="inline xs:hidden">Cari</span>
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($applications as $application)
                <div class="group bg-white border border-gray-100 rounded-[2rem] p-8 shadow-2xl hover:scale-[1.02] transition duration-300 overflow-hidden relative">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>

                    <div class="flex items-start justify-between gap-4 mb-7">
                        <div class="flex items-start gap-4">
                            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20 flex-shrink-0">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-black text-gray-900 mb-2">{{ $application->scholarship->nama_beasiswa }}</h2>
                                <p class="text-gray-500 font-bold line-clamp-2">{{ $application->scholarship->deskripsi }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5 mb-8">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-3 text-gray-500 font-bold">
                                <div class="w-10 h-10 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                Mahasiswa
                            </div>
                            <span class="font-black text-gray-900 text-right">{{ $application->user->name }}</span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-3 text-gray-500 font-bold">
                                <div class="w-10 h-10 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center">
                                    <i class="bi bi-buildings-fill"></i>
                                </div>
                                Provider
                            </div>
                            <span class="font-black text-gray-900 text-right">{{ $application->scholarship->provider->nama_instansi ?? '-' }}</span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-3 text-gray-500 font-bold">
                                <div class="w-10 h-10 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center">
                                    <i class="bi bi-calendar-event-fill"></i>
                                </div>
                                Tanggal Apply
                            </div>
                            <span class="font-black text-gray-900 text-right">
                                {{ \Carbon\Carbon::parse($application->tanggal_apply)->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-8">
                        @if($application->status == 'pending')
                            <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200 text-sm font-black">
                                <i class="bi bi-hourglass-split"></i> Pending
                            </span>
                        @elseif($application->status == 'approved')
                            <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-green-100 text-green-700 border border-green-200 text-sm font-black">
                                <i class="bi bi-check-circle-fill"></i> Approved
                            </span>
                        @elseif($application->status == 'rejected')
                            <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-red-100 text-red-700 border border-red-200 text-sm font-black">
                                <i class="bi bi-x-circle-fill"></i> Rejected
                            </span>
                        @endif
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('applications.show', $application->id_application) }}" class="flex-1 min-w-[150px] text-center bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 transition text-white py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20">
                            <i class="bi bi-eye-fill mr-2"></i> Detail
                        </a>

                        @if($application->status == 'pending')
                            <form action="{{ route('applications.destroy', $application->id_application) }}" method="POST" class="flex-1 min-w-[150px]">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Batalkan application ini?')" class="w-full bg-red-100 hover:bg-red-200 transition text-red-700 py-4 rounded-2xl font-black border border-red-200">
                                    <i class="bi bi-trash-fill mr-2"></i> Cancel
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
