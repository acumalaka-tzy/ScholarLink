<section class="space-y-8">
    <div>
        <div class="inline-flex items-center gap-3 bg-red-100 border border-red-200 rounded-full px-5 py-3 mb-6 shadow-sm">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-500 to-rose-500 text-white flex items-center justify-center text-sm">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <span class="text-red-700 text-sm font-black tracking-wide">Danger Zone</span>
        </div>

        <h2 class="text-4xl font-black text-gray-900 leading-tight">
            Delete <span class="bg-gradient-to-r from-red-500 to-rose-500 bg-clip-text text-transparent">Account</span>
        </h2>
        <p class="mt-5 text-gray-500 leading-relaxed text-lg max-w-3xl font-bold">
            Setelah akun dihapus, semua data dan resource akan hilang secara permanen.
            Pastikan Anda sudah menyimpan data penting sebelum melanjutkan.
        </p>
    </div>

    <div class="bg-white border border-red-100 rounded-[2rem] p-8 shadow-[0_20px_60px_rgba(239,68,68,0.08)] relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400"></div>

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
            <div class="flex items-start gap-5">
                <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-br from-red-500 to-rose-500 text-white flex items-center justify-center text-4xl shadow-2xl shadow-red-500/20 flex-shrink-0">
                    <i class="bi bi-trash3-fill"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-gray-900 mb-3">Permanent Account Removal</h3>
                    <p class="text-gray-500 leading-relaxed font-bold max-w-2xl">
                        Menghapus akun berarti semua data, aplikasi scholarship, favorites, dan dokumen akan dihapus permanen dari sistem.
                    </p>
                </div>
            </div>

            <div>
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="group relative overflow-hidden inline-flex items-center gap-3 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400 hover:scale-[1.03] transition duration-300 px-8 py-5 rounded-2xl font-black text-white shadow-[0_15px_50px_rgba(239,68,68,0.3)]">
                    <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                    <span class="relative flex items-center gap-3">
                        <i class="bi bi-trash3-fill text-xl"></i> Delete Account
                    </span>
                </button>
            </div>
        </div>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="relative overflow-hidden bg-white rounded-[2rem]">
            @csrf
            @method('delete')

            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400"></div>

            <div class="p-8 sm:p-10">
                <div class="flex items-start gap-5 mb-8">
                    <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-br from-red-500 to-rose-500 text-white flex items-center justify-center text-4xl shadow-xl shadow-red-500/20 flex-shrink-0">
                        <i class="bi bi-exclamation-octagon-fill"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-gray-900 leading-tight">Confirm Account Deletion</h2>
                        <p class="mt-4 text-gray-500 leading-relaxed font-bold">
                            Tindakan ini tidak dapat dibatalkan. Masukkan password Anda untuk mengonfirmasi penghapusan akun secara permanen.
                        </p>
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 font-black mb-3 text-lg">Password Confirmation</label>
                    <div class="relative">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                        <input id="password" name="password" type="password" placeholder="Masukkan password" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-5 text-gray-900 font-bold placeholder:text-gray-400 focus:outline-none focus:border-red-400 focus:ring-4 focus:ring-red-100 transition">
                    </div>
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-3" />
                </div>

                <div class="flex flex-col sm:flex-row justify-end gap-4">
                    <button type="button" x-on:click="$dispatch('close')" class="px-7 py-4 rounded-2xl bg-gray-100 hover:bg-gray-200 transition text-gray-700 font-black">
                        Cancel
                    </button>
                    
                    <button type="submit" class="group relative overflow-hidden inline-flex items-center justify-center gap-3 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400 hover:scale-[1.02] transition duration-300 px-8 py-4 rounded-2xl font-black text-white shadow-[0_15px_50px_rgba(239,68,68,0.3)]">
                        <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                        <span class="relative flex items-center gap-3">
                            <i class="bi bi-trash3-fill"></i> Permanently Delete
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </x-modal>
</section>
