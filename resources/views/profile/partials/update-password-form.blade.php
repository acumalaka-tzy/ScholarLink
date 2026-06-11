<section class="space-y-6 sm:space-y-8">
    <div>
        <div class="inline-flex items-center gap-2 sm:gap-3 bg-blue-100 border border-blue-200 rounded-full px-3 sm:px-5 py-2 sm:py-3 mb-3 sm:mb-6 shadow-sm">
            <div class="w-6 sm:w-8 h-6 sm:h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-xs sm:text-sm">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <span class="text-blue-700 text-xs sm:text-sm font-black tracking-wide">Security Settings</span>
        </div>

        <h2 class="text-2xl sm:text-4xl font-black text-gray-900 leading-tight">
            Update <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Password</span>
        </h2>
        <p class="mt-2 sm:mt-5 text-gray-500 leading-relaxed text-xs sm:text-lg max-w-3xl font-bold">
            Gunakan password yang kuat dan aman untuk melindungi akun ScholarLink Anda dari akses yang tidak diinginkan.
        </p>
    </div>

    <div class="relative overflow-hidden bg-white border border-gray-100 rounded-lg sm:rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
        <div class="absolute top-0 left-0 w-full h-1 sm:h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
        <div class="absolute top-0 right-0 w-48 sm:w-72 h-48 sm:h-72 bg-cyan-100 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-48 sm:w-72 h-48 sm:h-72 bg-orange-100 rounded-full blur-3xl opacity-40"></div>

        <div class="relative p-5 sm:p-8 md:p-10">
            <div class="flex flex-col sm:flex-row sm:items-start gap-4 sm:gap-5 mb-6 sm:mb-10">
                <div class="w-16 sm:w-20 h-16 sm:h-20 rounded-lg sm:rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl sm:text-4xl shadow-xl shadow-blue-500/20 flex-shrink-0">
                    <i class="bi bi-key-fill"></i>
                </div>
                <div>
                    <h3 class="text-xl sm:text-3xl font-black text-gray-900 leading-tight">Change Your Password</h3>
                    <p class="mt-2 sm:mt-3 text-gray-500 leading-relaxed font-bold text-xs sm:text-base max-w-2xl">
                        Pastikan password baru memiliki kombinasi huruf, angka, dan simbol agar keamanan akun tetap terjaga.
                    </p>
                </div>
            </div>

            <form method="post" action="{{ route('password.update') }}" class="space-y-5 sm:space-y-8">
                @csrf
                @method('put')

                <div>
                    <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Current Password</label>
                    <div class="relative">
                        <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 text-sm sm:text-base">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                        <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" placeholder="Masukkan password saat ini" class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-5 text-gray-900 font-bold placeholder:text-gray-400 placeholder:text-xs sm:placeholder:text-base focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">New Password</label>
                    <div class="relative">
                        <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 text-sm sm:text-base">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <input id="update_password_password" name="password" type="password" autocomplete="new-password" placeholder="Masukkan password baru" class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-5 text-gray-900 font-bold placeholder:text-gray-400 placeholder:text-xs sm:placeholder:text-base focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 text-sm sm:text-base">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Konfirmasi password baru" class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-5 text-gray-900 font-bold placeholder:text-gray-400 placeholder:text-xs sm:placeholder:text-base focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex flex-col xs:flex-row xs:items-center gap-3 sm:gap-5 pt-4">
                    <button type="submit" class="group relative overflow-hidden inline-flex items-center justify-center gap-2 sm:gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-7 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02] active:scale-[0.98] text-xs sm:text-base w-full xs:w-auto">
                        <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                        <span class="relative flex items-center gap-2">
                            <i class="bi bi-save-fill"></i> <span class="hidden xs:inline">Save Password</span><span class="inline xs:hidden">Simpan</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
