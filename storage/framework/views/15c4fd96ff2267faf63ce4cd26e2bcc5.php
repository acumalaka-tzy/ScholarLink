<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-10 px-3 sm:px-6 lg:px-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative overflow-hidden rounded-lg sm:rounded-[2.5rem] bg-gradient-to-r from-blue-600 via-cyan-500 to-orange-400 p-5 sm:p-10 md:p-14 shadow-[0_25px_60px_rgba(59,130,246,0.35)] mb-8 sm:mb-10">
        <div class="absolute top-0 right-0 w-48 sm:w-96 h-48 sm:h-96 bg-white/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6 sm:gap-10">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/20 text-white font-black text-xs sm:text-sm mb-3 sm:mb-6">
                    <div class="w-5 sm:w-6 h-5 sm:h-6 rounded-full bg-white text-blue-600 flex items-center justify-center text-xs">
                        <i class="bi bi-stars"></i>
                    </div>
                    Student Dashboard
                </div>
                <h2 class="text-2xl sm:text-4xl md:text-6xl font-black text-white leading-tight">
                    Selamat Datang, <span class="text-orange-100"><?php echo e(Auth::user()->display_name ?? Auth::user()->name); ?></span>
                </h2>
                <p class="text-blue-50 text-xs sm:text-lg mt-3 sm:mt-6 max-w-2xl leading-relaxed font-bold">
                    Jelajahi peluang beasiswa terbaik dan pantau seluruh aplikasi Anda dalam satu dashboard modern dan profesional.
                </p>
                <div class="flex flex-wrap gap-2 sm:gap-4 mt-5 sm:mt-10">
                    <a href="<?php echo e(route('scholarships.index')); ?>" class="px-4 sm:px-7 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl bg-white text-blue-700 font-black shadow-xl hover:scale-[1.03] transition duration-300 text-xs sm:text-base">
                        <i class="bi bi-search mr-1 sm:mr-2"></i> <span class="hidden xs:inline">Explore Scholarship</span><span class="inline xs:hidden">Cari</span>
                    </a>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="px-4 sm:px-7 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl border border-white/30 bg-white/10 backdrop-blur-xl text-white font-black hover:bg-white/20 transition text-xs sm:text-base">
                        <i class="bi bi-person-fill mr-1 sm:mr-2"></i> <span class="hidden xs:inline">Edit Profile</span><span class="inline xs:hidden">Profile</span>
                    </a>
                </div>
            </div>

            <div class="bg-white/15 backdrop-blur-2xl border border-white/20 rounded-lg sm:rounded-[2rem] p-4 sm:p-8 min-w-[280px] sm:min-w-[320px] shadow-2xl">
                <div class="flex items-center gap-3 sm:gap-5 mb-6 sm:mb-8">
                    <div class="w-14 sm:w-20 h-14 sm:h-20 rounded-2xl sm:rounded-3xl bg-white text-blue-600 flex items-center justify-center text-2xl sm:text-4xl shadow-xl">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-2xl font-black text-white"><?php echo e(Auth::user()->display_name ?? Auth::user()->name); ?></h3>
                        <p class="text-blue-100 font-bold text-xs sm:text-base mt-1"><?php echo e(Auth::user()->email); ?></p>
                    </div>
                </div>
                <div class="space-y-3 sm:space-y-5">
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100 font-bold text-xs sm:text-base">Role</span>
                        <span class="bg-white/20 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-black text-white">Mahasiswa</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100 font-bold text-xs sm:text-base">Status</span>
                        <span class="bg-green-400/20 text-green-100 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-black border border-green-200/20">Active</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6 mb-8 sm:mb-10">
        <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 shadow-xl p-5 sm:p-7 hover:scale-[1.02] transition">
            <div class="flex items-center justify-between mb-4 sm:mb-6">
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-3xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl sm:text-3xl">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <span class="text-xs sm:text-sm font-black text-blue-600 bg-blue-50 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">Scholarships</span>
            </div>
            <p class="text-gray-500 font-bold text-xs sm:text-sm mb-2">Total Beasiswa</p>
            <h2 class="text-3xl sm:text-5xl font-black text-gray-900">1,250</h2>
        </div>

        <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 shadow-xl p-5 sm:p-7 hover:scale-[1.02] transition">
            <div class="flex items-center justify-between mb-4 sm:mb-6">
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-3xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl sm:text-3xl">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <span class="text-xs sm:text-sm font-black text-cyan-600 bg-cyan-50 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">Applications</span>
            </div>
            <p class="text-gray-500 font-bold text-xs sm:text-sm mb-2">Aplikasi Anda</p>
            <h2 class="text-3xl sm:text-5xl font-black text-gray-900">3</h2>
        </div>

        <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 shadow-xl p-5 sm:p-7 hover:scale-[1.02] transition">
            <div class="flex items-center justify-between mb-4 sm:mb-6">
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-3xl bg-green-100 text-green-600 flex items-center justify-center text-2xl sm:text-3xl">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <span class="text-xs sm:text-sm font-black text-green-600 bg-green-50 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">Accepted</span>
            </div>
            <p class="text-gray-500 font-bold text-xs sm:text-sm mb-2">Diterima</p>
            <h2 class="text-3xl sm:text-5xl font-black text-green-600">1</h2>
        </div>

        <div class="bg-gradient-to-br from-blue-600 via-cyan-500 to-orange-400 rounded-lg sm:rounded-[2rem] shadow-[0_20px_50px_rgba(59,130,246,0.3)] p-5 sm:p-7 text-white hover:scale-[1.02] transition">
            <div class="flex items-center justify-between mb-4 sm:mb-6">
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-3xl bg-white/20 flex items-center justify-center text-2xl sm:text-3xl">
                    <i class="bi bi-bar-chart-fill"></i>
                </div>
                <span class="text-xs sm:text-sm font-black bg-white/20 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">Profile</span>
            </div>
            <p class="text-blue-100 font-bold text-xs sm:text-sm mb-2">Profil Kelengkapan</p>
            <h2 class="text-3xl sm:text-5xl font-black">75%</h2>
        </div>
    </div>

    <div class="grid xl:grid-cols-3 gap-6 sm:gap-8">
        <div class="xl:col-span-2 space-y-4 sm:space-y-6">
            <div class="flex flex-col xs:flex-row items-start xs:items-center xs:justify-between flex-wrap gap-3 sm:gap-4">
                <div>
                    <h3 class="text-xl sm:text-3xl font-black text-gray-900">Aplikasi Beasiswa</h3>
                    <p class="text-gray-500 font-bold text-xs sm:text-base mt-1 sm:mt-2">Pantau seluruh progress pengajuan Anda.</p>
                </div>
                <a href="<?php echo e(route('scholarships.index')); ?>" class="px-4 sm:px-6 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black shadow-lg shadow-blue-500/20 hover:scale-[1.02] transition text-xs sm:text-base w-full xs:w-auto text-center xs:text-left">
                    <i class="bi bi-plus-circle-fill mr-1 sm:mr-2"></i> <span class="hidden xs:inline">Apply New</span><span class="inline xs:hidden">Apply</span>
                </a>
            </div>

            <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 p-4 sm:p-8 shadow-xl hover:shadow-2xl transition duration-300">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 sm:gap-8">
                    <div>
                        <div class="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-5">
                            <span class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-5 py-2 sm:py-3 rounded-full bg-green-100 text-green-700 border border-green-200 text-xs sm:text-sm font-black">
                                <i class="bi bi-check-circle-fill"></i> <span class="hidden xs:inline">DITERIMA</span><span class="inline xs:hidden">Terima</span>
                            </span>
                        </div>
                        <h4 class="text-lg sm:text-3xl font-black text-gray-900">Beasiswa Penuh S1 - UI</h4>
                        <p class="text-gray-500 font-bold text-xs sm:text-base mt-2 sm:mt-3">Universitas Indonesia</p>
                    </div>
                    <button class="px-4 sm:px-6 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black shadow-lg shadow-blue-500/20 hover:scale-[1.02] transition text-xs sm:text-base w-full sm:w-auto">
                        <i class="bi bi-eye-fill mr-1 sm:mr-2"></i> <span class="hidden xs:inline">Lihat Detail</span><span class="inline xs:hidden">Lihat</span>
                    </button>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 p-4 sm:p-8 shadow-xl">
                <div class="flex items-center gap-3 sm:gap-5 mb-6 sm:mb-8">
                    <div class="w-14 sm:w-20 h-14 sm:h-20 rounded-lg sm:rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center text-white text-2xl sm:text-4xl shadow-xl shadow-blue-500/20 flex-shrink-0">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div>
                        <h4 class="text-base sm:text-2xl font-black text-gray-900"><?php echo e(Auth::user()->name); ?></h4>
                        <p class="text-gray-500 font-bold text-xs sm:text-base mt-1"><?php echo e(Auth::user()->email); ?></p>
                    </div>
                </div>
                <div class="space-y-3 sm:space-y-5">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 font-bold text-xs sm:text-base">Role</span>
                        <span class="bg-blue-100 text-blue-700 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-black">Mahasiswa</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 font-bold text-xs sm:text-base">Status</span>
                        <span class="bg-green-100 text-green-700 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-black">Active</span>
                    </div>
                </div>
                <a href="<?php echo e(route('profile.edit')); ?>" class="w-full mt-6 sm:mt-8 inline-flex items-center justify-center py-2.5 sm:py-4 rounded-lg sm:rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black hover:scale-[1.02] shadow-xl shadow-blue-500/20 transition duration-300 text-xs sm:text-base gap-2">
                    <i class="bi bi-pencil-square"></i> <span class="hidden xs:inline">Edit Profile</span><span class="inline xs:hidden">Edit</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wl\ScholarLink-main\ScholarLink-main\resources\views/dashboard.blade.php ENDPATH**/ ?>