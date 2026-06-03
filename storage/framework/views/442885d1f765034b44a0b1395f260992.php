<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center justify-between gap-5">
            <div class="flex items-center gap-3 sm:gap-5">
                <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center justify-center w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-[2rem] bg-white hover:bg-gray-100 transition border border-gray-200 text-gray-600 hover:text-gray-900">
                    <i class="bi bi-arrow-left text-lg sm:text-2xl"></i>
                </a>
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-xl sm:text-3xl shadow-xl shadow-blue-500/20">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div>
                    <h2 class="text-2xl sm:text-4xl font-black text-gray-900 leading-tight">
                        My <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Profile</span>
                    </h2>
                    <p class="text-gray-500 font-bold mt-1 sm:mt-2 text-xs sm:text-lg">
                        Kelola informasi akun dan keamanan ScholarLink Anda.
                    </p>
                </div>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="min-h-screen bg-[#f4f7f9] py-8 sm:py-10 px-3 sm:px-6 lg:px-10 overflow-hidden">
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-0 space-y-6 sm:space-y-10">
            
            <div class="mb-4 sm:mb-8">
                <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
                    <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                        <i class="bi bi-arrow-left text-sm sm:text-base"></i>
                    </span>
                    Kembali ke Dashboard
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8 items-start">
                
                <div class="lg:col-span-1">
                    <div class="sticky top-20 sm:top-28 relative overflow-hidden bg-white border border-gray-100 rounded-xl sm:rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)] p-5 sm:p-8">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                        <div class="absolute top-0 right-0 w-48 sm:w-72 h-48 sm:h-72 bg-cyan-100 rounded-full blur-3xl opacity-40"></div>

                        <div class="relative flex flex-col items-center text-center">
                            <div class="w-24 sm:w-36 h-24 sm:h-36 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-4xl sm:text-7xl shadow-2xl shadow-blue-500/20 mb-4 sm:mb-8">
                                <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                            </div>

                            <h3 class="text-xl sm:text-3xl font-black text-gray-900 truncate max-w-xs"><?php echo e(Auth::user()->name); ?></h3>
                            <p class="text-gray-500 font-bold mt-2 sm:mt-3 break-all text-xs sm:text-base"><?php echo e(Auth::user()->email); ?></p>

                            <div class="mt-6 sm:mt-8 flex flex-wrap justify-center gap-2 sm:gap-3">
                                <span class="inline-flex items-center gap-1 sm:gap-2 bg-blue-100 text-blue-700 px-3 sm:px-5 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-black border border-blue-200">
                                    <i class="bi bi-person-fill text-xs sm:text-sm"></i>
                                    <span class="hidden xs:inline"><?php echo e(ucfirst(Auth::user()->role ?? 'User')); ?></span>
                                </span>
                                <span class="inline-flex items-center gap-1 sm:gap-2 bg-green-100 text-green-700 px-3 sm:px-5 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-black border border-green-200">
                                    <i class="bi bi-check-circle-fill text-xs sm:text-sm"></i>
                                    <span class="hidden xs:inline">Active</span>
                                </span>
                            </div>

                            <div class="w-full mt-8 sm:mt-10 space-y-3 sm:space-y-4">
                                <div class="bg-gray-50 border border-gray-100 rounded-lg sm:rounded-2xl px-4 sm:px-5 py-3 sm:py-4 flex items-center justify-between text-xs sm:text-base">
                                    <span class="text-gray-500 font-bold">Joined</span>
                                    <span class="text-gray-900 font-black truncate"><?php echo e(Auth::user()->tanggal_daftar ? Auth::user()->tanggal_daftar->format('d M Y') : 'N/A'); ?></span>
                                </div>
                                <div class="bg-gray-50 border border-gray-100 rounded-lg sm:rounded-2xl px-4 sm:px-5 py-3 sm:py-4 flex items-center justify-between text-xs sm:text-base">
                                    <span class="text-gray-500 font-bold">Email Status</span>
                                    <span class="text-cyan-600 font-black">Verified</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6 sm:space-y-8">
                    <div class="bg-white border border-gray-100 rounded-xl sm:rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)] overflow-hidden">
                        <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                        <div class="p-4 sm:p-6 md:p-8">
                            <?php echo $__env->make('profile.partials.update-profile-information-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-xl sm:rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)] overflow-hidden">
                        <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                        <div class="p-4 sm:p-6 md:p-8">
                            <?php echo $__env->make('profile.partials.update-password-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    <div class="bg-white border border-red-100 rounded-xl sm:rounded-[2.5rem] shadow-[0_25px_80px_rgba(239,68,68,0.08)] overflow-hidden">
                        <div class="h-2 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400"></div>
                        <div class="p-4 sm:p-6 md:p-8">
                            <?php echo $__env->make('profile.partials.delete-user-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\wl\ScholarLink-main\ScholarLink-main\resources\views/profile/edit.blade.php ENDPATH**/ ?>