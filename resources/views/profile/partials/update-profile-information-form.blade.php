<section class="space-y-6 sm:space-y-8">
    <div>
        <div class="inline-flex items-center gap-2 sm:gap-3 bg-cyan-100 border border-cyan-200 rounded-full px-4 sm:px-5 py-2 sm:py-3 mb-4 sm:mb-6 shadow-sm">
            <div class="w-6 sm:w-8 h-6 sm:h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-xs sm:text-sm">
                <i class="bi bi-person-fill"></i>
            </div>
            <span class="text-cyan-700 text-xs sm:text-sm font-black tracking-wide">Profile Settings</span>
        </div>

        <h2 class="text-2xl sm:text-4xl font-black text-gray-900 leading-tight">
            Profile <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Information</span>
        </h2>
        <p class="mt-3 sm:mt-5 text-gray-500 leading-relaxed text-sm sm:text-lg max-w-3xl font-bold">
            Perbarui informasi profil dan alamat email akun ScholarLink Anda agar tetap aman dan selalu terbaru.
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div class="relative overflow-hidden bg-white border border-gray-100 rounded-lg sm:rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
        <div class="absolute top-0 right-0 w-48 sm:w-72 h-48 sm:h-72 bg-cyan-100 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-48 sm:w-72 h-48 sm:h-72 bg-orange-100 rounded-full blur-3xl opacity-40"></div>

        <div class="relative p-5 sm:p-8 md:p-10">
            <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-5 mb-6 sm:mb-10">
                <div class="w-16 sm:w-20 h-16 sm:h-20 rounded-lg sm:rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-2xl sm:text-4xl shadow-xl shadow-blue-500/20 flex-shrink-0">
                    <i class="bi bi-person-vcard-fill"></i>
                </div>
                <div>
                    <h3 class="text-xl sm:text-3xl font-black text-gray-900 leading-tight">Edit Your Profile</h3>
                    <p class="mt-2 sm:mt-3 text-gray-500 leading-relaxed font-bold max-w-2xl text-xs sm:text-base">
                        Pastikan data profil Anda akurat agar proses pendaftaran dan verifikasi scholarship berjalan lancar.
                    </p>
                </div>
            </div>

            <form method="post"
                action="{{ route('profile.update') }}"
                enctype="multipart/form-data"
                class="space-y-6 sm:space-y-8">                
      
                @csrf
                @method('patch')

                <div>
                    <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Full Name</label>
                    <div class="relative">
                        <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <i class="bi bi-person-fill text-sm sm:text-base"></i>
                        </div>
                        <input id="name" name="name" type="text" value="{{ old('name', Auth::user()->name) }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap" class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-5 text-gray-900 font-bold placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Email Address</label>
                    <div class="relative">
                        <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <i class="bi bi-envelope-fill text-sm sm:text-base"></i>
                        </div>
                        <input id="email" name="email" type="email" value="{{ old('email', Auth::user()->email) }}" required autocomplete="username" placeholder="Masukkan email aktif" class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-5 text-gray-900 font-bold placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                        <div class="mt-4 sm:mt-6 bg-orange-50 border border-orange-200 rounded-lg sm:rounded-3xl p-4 sm:p-6">
                            <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                                <div class="w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-lg sm:text-2xl flex-shrink-0">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-black text-orange-700 text-xs sm:text-lg mb-2">Email Belum Diverifikasi</h4>
                                    <p class="text-orange-600 font-bold text-xs sm:text-sm leading-relaxed">
                                        Silakan verifikasi email Anda untuk mendapatkan akses penuh ke fitur ScholarLink.
                                    </p>

                                    <button form="send-verification" class="mt-3 sm:mt-5 inline-flex items-center gap-2 sm:gap-3 bg-gradient-to-r from-orange-500 to-amber-400 hover:scale-[1.02] transition duration-300 px-4 sm:px-6 py-2 sm:py-4 rounded-lg sm:rounded-2xl font-black text-white shadow-lg shadow-orange-500/20 text-xs sm:text-base">
                                        <i class="bi bi-send-fill"></i> <span class="hidden xs:inline">Kirim Ulang Verifikasi</span><span class="inline xs:hidden">Kirim</span>
                                    </button>

                                    @if (session('status') === 'verification-link-sent')
                                        <div class="mt-3 sm:mt-5 inline-flex items-center gap-2 sm:gap-3 bg-green-100 border border-green-200 text-green-700 px-4 sm:px-5 py-2 sm:py-4 rounded-lg sm:rounded-2xl font-black shadow-sm text-xs sm:text-base">
                                            <i class="bi bi-check-circle-fill"></i> <span class="hidden sm:inline">Link verifikasi berhasil dikirim</span><span class="inline sm:hidden">Terkirim</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div>
                    <x-input-label for="bio" value="Bio" />

                    <textarea id="bio"
                            name="bio"
                            rows="4"
                            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500"
                            placeholder="Ceritakan sedikit tentang diri kamu...">{{ old('bio', $user->profile->bio ?? '') }}</textarea>

                    <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                </div>

                <div>
                    <x-input-label for="universitas" value="Universitas" />

                    <x-text-input id="universitas"
                                name="universitas"
                                type="text"
                                class="mt-1 block w-full"
                                value="{{ old('universitas', $user->profile->universitas ?? '') }}"
                                placeholder="Contoh: Universitas Sumatera Utara" />

                    <x-input-error class="mt-2" :messages="$errors->get('universitas')" />
                </div>

                <div>
                    <x-input-label for="nomor_telepon" value="Nomor Telepon" />

                    <x-text-input id="nomor_telepon"
                                name="nomor_telepon"
                                type="text"
                                class="mt-1 block w-full"
                                value="{{ old('nomor_telepon', $user->profile->nomor_telepon ?? '') }}"
                                placeholder="Contoh: 081234567890" />

                    <x-input-error class="mt-2" :messages="$errors->get('nomor_telepon')" />
                </div>

                <div>
                    <x-input-label for="alamat" value="Alamat" />

                    <textarea id="alamat"
                            name="alamat"
                            rows="3"
                            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500"
                            placeholder="Masukkan alamat kamu...">{{ old('alamat', $user->profile->alamat ?? '') }}</textarea>

                    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-3 text-lg">
                        Foto Profil
                    </label>

                    <input type="file"
                        name="foto_profil"
                        accept="image/*"
                        class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-4">
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-3 text-lg">
                        Foto Sampul
                    </label>

                    <input type="file"
                        name="foto_sampul"
                        accept="image/*"
                        class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-4">
                </div>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-5 pt-4">
                    <button type="submit" class="group relative overflow-hidden inline-flex items-center justify-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-8 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02] active:scale-[0.98]">
                        <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                        <span class="relative flex items-center gap-2">
                            <i class="bi bi-save-fill"></i> Save Changes
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
