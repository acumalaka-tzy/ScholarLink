@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-12 px-3 sm:px-6 lg:px-8 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-3xl mx-auto">
        {{-- Back Button --}}
        <div class="mb-4 sm:mb-8">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
                <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                    <i class="bi bi-arrow-left text-sm sm:text-base"></i>
                </span>
                Kembali ke Dashboard
            </a>
        </div>

        <div class="mb-6 sm:mb-10 text-center">
            <div class="inline-flex items-center justify-center w-16 sm:w-24 h-16 sm:h-24 rounded-lg sm:rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white shadow-xl shadow-blue-500/20 mb-4 sm:mb-6">
                <i class="bi bi-mortarboard-fill text-3xl sm:text-5xl"></i>
            </div>
            <h1 class="text-2xl sm:text-5xl font-black text-gray-900 mb-2 sm:mb-4">Apply Scholarship</h1>
            <p class="text-gray-500 text-xs sm:text-lg font-bold">Lengkapi form pengajuan beasiswa dengan benar.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl sm:rounded-[2rem] shadow-2xl overflow-hidden">
            <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>

            <div class="p-5 sm:p-8 md:p-10">
                @if ($errors->any())
                    <div class="mb-6 sm:mb-8 bg-red-50 border border-red-200 rounded-lg sm:rounded-3xl p-4 sm:p-6">
                        <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                            <div class="w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-2xl bg-red-100 text-red-500 flex items-center justify-center text-lg sm:text-2xl flex-shrink-0">
                                <i class="bi bi-exclamation-circle-fill"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-red-700 text-xs sm:text-lg mb-2">Terjadi Kesalahan</h4>
                                <ul class="space-y-1 text-red-600 font-bold text-xs sm:text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('applications.store') }}" method="POST" class="space-y-5 sm:space-y-7">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Pilih Beasiswa</label>
                        <div class="relative">
                            <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-sm sm:text-base">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <select name="id_beasiswa" class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-10 py-2.5 sm:py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
                                <option value="">-- Pilih Beasiswa --</option>
                                @foreach($scholarships as $scholarship)
                                    <option value="{{ $scholarship->id_beasiswa }}" {{ old('id_beasiswa') == $scholarship->id_beasiswa ? 'selected' : '' }}>
                                        {{ $scholarship->nama_beasiswa }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-sm sm:text-base">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('id_beasiswa')" />
                    </div>

                    <div>
                        <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Catatan / Motivasi</label>
                        <div class="relative">
                            <div class="absolute left-3 sm:left-5 top-4 sm:top-6 text-gray-400 pointer-events-none text-sm sm:text-base">
                                <i class="bi bi-chat-left-text-fill"></i>
                            </div>
                            <textarea name="catatan" rows="4 sm:rows-6" placeholder="Tulis alasan mengapa kamu layak mendapatkan beasiswa ini..." class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-4 font-bold text-gray-900 placeholder:text-gray-400 placeholder:text-xs sm:placeholder:text-base resize-none focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">{{ old('catatan') }}</textarea>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('catatan')" />
                    </div>

                    <div class="bg-blue-50 border border-blue-100 rounded-lg sm:rounded-3xl p-4 sm:p-6">
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                            <div class="w-12 sm:w-14 h-12 sm:h-14 rounded-lg sm:rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg sm:text-2xl flex-shrink-0">
                                <i class="bi bi-lightbulb-fill"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-black text-xs sm:text-lg mb-2">Tips Pengajuan</h3>
                                <p class="text-gray-600 text-xs sm:text-sm leading-relaxed font-bold">
                                    Pastikan data dan dokumen kamu sudah lengkap sebelum mengirim application. 
                                    Pengajuan yang lengkap memiliki peluang lebih besar untuk diterima.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                        <a href="{{ route('scholarships.index') }}" class="flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 border border-gray-200 transition text-gray-700 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl font-black text-xs sm:text-base">
                            <i class="bi bi-arrow-left"></i> <span class="hidden xs:inline">Kembali</span>
                        </a>
                        <button type="submit" class="flex items-center justify-center gap-2 flex-1 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 hover:scale-[1.02] transition duration-300 text-white py-2.5 sm:py-4 rounded-lg sm:rounded-2xl font-black shadow-xl shadow-blue-500/20 text-xs sm:text-base">
                            <i class="bi bi-send-fill"></i> <span class="hidden xs:inline">Submit Application</span><span class="inline xs:hidden">Kirim</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
