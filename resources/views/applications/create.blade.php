@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-3xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-10 text-center">

            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-500/20 border border-blue-400/20 mb-5">

                <span class="text-4xl">
                    🎓
                </span>

            </div>

            <h1 class="text-4xl font-extrabold text-white mb-3">
                Apply Scholarship
            </h1>

            <p class="text-slate-300 text-lg">
                Lengkapi form pengajuan beasiswa dengan benar.
            </p>

        </div>

        {{-- CARD --}}
        <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl overflow-hidden">

            {{-- TOP BAR --}}
            <div class="h-2 bg-gradient-to-r from-blue-500 via-cyan-400 to-purple-500"></div>

            <div class="p-8 sm:p-10">

                {{-- ERROR --}}
                @if ($errors->any())

                    <div class="mb-8 bg-red-500/10 border border-red-400/20 rounded-2xl p-5">

                        <div class="flex items-center gap-3 mb-3">

                            <span class="text-2xl">
                                ⚠️
                            </span>

                            <h2 class="text-red-300 font-bold text-lg">
                                Terjadi Kesalahan
                            </h2>

                        </div>

                        <ul class="space-y-2 text-red-200 text-sm">

                            @foreach ($errors->all() as $error)

                                <li>
                                    • {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                {{-- FORM --}}
                <form action="{{ route('applications.store') }}"
                      method="POST"
                      class="space-y-7">

                    @csrf

                    {{-- SCHOLARSHIP --}}
                    <div>

                        <label class="block text-white font-semibold mb-3 text-lg">
                            Pilih Beasiswa
                        </label>

                        <select name="id_beasiswa"
                                class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">

                            <option value="" class="text-black">
                                -- Pilih Beasiswa --
                            </option>

                            @foreach($scholarships as $scholarship)

                                <option value="{{ $scholarship->id_beasiswa }}"
                                        class="text-black">

                                    {{ $scholarship->nama_beasiswa }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- NOTES --}}
                    <div>

                        <label class="block text-white font-semibold mb-3 text-lg">
                            Catatan / Motivasi
                        </label>

                        <textarea name="catatan"
                                  rows="5"
                                  placeholder="Tulis alasan mengapa kamu layak mendapatkan beasiswa ini..."
                                  class="w-full bg-white/10 border border-white/10 text-white placeholder-slate-400 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 focus:outline-none transition resize-none"></textarea>

                    </div>

                    {{-- INFO BOX --}}
                    <div class="bg-blue-500/10 border border-blue-400/20 rounded-2xl p-5">

                        <div class="flex gap-4">

                            <div class="text-3xl">
                                💡
                            </div>

                            <div>

                                <h3 class="text-white font-bold mb-1">
                                    Tips Pengajuan
                                </h3>

                                <p class="text-slate-300 text-sm leading-relaxed">
                                    Pastikan data dan dokumen kamu sudah lengkap sebelum mengirim application.
                                    Pengajuan yang lengkap memiliki peluang lebih besar untuk diterima.
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">

                        <a href="{{ route('scholarships.index') }}"
                           class="flex-1 text-center bg-white/10 hover:bg-white/20 border border-white/10 transition text-white py-4 rounded-2xl font-semibold">

                            ← Kembali

                        </a>

                        <button type="submit"
                                class="flex-1 bg-gradient-to-r from-blue-600 to-cyan-500 hover:scale-[1.02] transition duration-300 text-white py-4 rounded-2xl font-bold shadow-xl">

                            🚀 Submit Application

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection