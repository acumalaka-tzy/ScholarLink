@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-3xl mx-auto">
        <div class="mb-10 text-center">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white shadow-xl shadow-blue-500/20 mb-6">
                <i class="bi bi-mortarboard-fill text-5xl"></i>
            </div>
            <h1 class="text-5xl font-black text-gray-900 mb-4">Apply Scholarship</h1>
            <p class="text-gray-500 text-lg font-bold">Lengkapi form pengajuan beasiswa dengan benar.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-[2rem] shadow-2xl overflow-hidden">
            <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>

            <div class="p-8 sm:p-10">
                @if ($errors->any())
                    <div class="mb-8 bg-red-50 border border-red-200 rounded-3xl p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-500 flex items-center justify-center text-2xl flex-shrink-0">
                                <i class="bi bi-exclamation-circle-fill"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-red-700 text-lg mb-2">Terjadi Kesalahan</h4>
                                <ul class="space-y-1 text-red-600 font-bold text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('applications.store') }}" method="POST" class="space-y-7">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Pilih Beasiswa</label>
                        <div class="relative">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <select name="id_beasiswa" class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-12 py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                                <option value="">-- Pilih Beasiswa --</option>
                                @foreach($scholarships as $scholarship)
                                    <option value="{{ $scholarship->id_beasiswa }}" {{ old('id_beasiswa') == $scholarship->id_beasiswa ? 'selected' : '' }}>
                                        {{ $scholarship->nama_beasiswa }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Catatan / Motivasi</label>
                        <div class="relative">
                            <div class="absolute left-5 top-6 text-gray-400 pointer-events-none">
                                <i class="bi bi-chat-left-text-fill"></i>
                            </div>
                            <textarea name="catatan" rows="6" placeholder="Tulis alasan mengapa kamu layak mendapatkan beasiswa ini..." class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 resize-none focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">{{ old('catatan') }}</textarea>
                        </div>
                    </div>

                    <div class="bg-blue-50 border border-blue-100 rounded-3xl p-6">
                        <div class="flex gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl flex-shrink-0">
                                <i class="bi bi-gradient bi-lightbulb-fill"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-black text-lg mb-2">Tips Pengajuan</h3>
                                <p class="text-gray-600 text-sm leading-relaxed font-bold">
                                    Pastikan data dan dokumen kamu sudah lengkap sebelum mengirim application. 
                                    Pengajuan yang lengkap memiliki peluang lebih besar untuk diterima.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ route('scholarships.index') }}" class="flex-1 text-center bg-gray-100 hover:bg-gray-200 border border-gray-200 transition text-gray-700 py-4 rounded-2xl font-black">
                            <i class="bi bi-arrow-left mr-2"></i> Kembali
                        </a>
                        <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 hover:scale-[1.02] transition duration-300 text-white py-4 rounded-2xl font-black shadow-xl shadow-blue-500/20">
                            <i class="bi bi-send-fill mr-2"></i> Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
