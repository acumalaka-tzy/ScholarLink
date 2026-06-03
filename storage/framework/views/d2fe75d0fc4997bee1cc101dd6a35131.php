<section class="space-y-6 sm:space-y-8">
    <div>
        <div class="inline-flex items-center gap-2 sm:gap-3 bg-red-100 border border-red-200 rounded-full px-3 sm:px-5 py-2 sm:py-3 mb-3 sm:mb-6 shadow-sm">
            <div class="w-6 sm:w-8 h-6 sm:h-8 rounded-full bg-gradient-to-br from-red-500 to-rose-500 text-white flex items-center justify-center text-xs sm:text-sm">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <span class="text-red-700 text-xs sm:text-sm font-black tracking-wide">Danger Zone</span>
        </div>

        <h2 class="text-2xl sm:text-4xl font-black text-gray-900 leading-tight">
            Delete <span class="bg-gradient-to-r from-red-500 to-rose-500 bg-clip-text text-transparent">Account</span>
        </h2>
        <p class="mt-2 sm:mt-5 text-gray-500 leading-relaxed text-xs sm:text-lg max-w-3xl font-bold">
            Setelah akun dihapus, semua data dan resource akan hilang secara permanen.
            Pastikan Anda sudah menyimpan data penting sebelum melanjutkan.
        </p>
    </div>

    <div class="bg-white border border-red-100 rounded-lg sm:rounded-[2rem] p-5 sm:p-8 shadow-[0_20px_60px_rgba(239,68,68,0.08)] relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 sm:h-2 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400"></div>

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 sm:gap-8">
            <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-5">
                <div class="w-14 sm:w-20 h-14 sm:h-20 rounded-lg sm:rounded-[2rem] bg-gradient-to-br from-red-500 to-rose-500 text-white flex items-center justify-center text-2xl sm:text-4xl shadow-2xl shadow-red-500/20 flex-shrink-0">
                    <i class="bi bi-trash3-fill"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-2xl font-black text-gray-900 mb-2 sm:mb-3">Permanent Account Removal</h3>
                    <p class="text-gray-500 leading-relaxed font-bold text-xs sm:text-base max-w-2xl">
                        Menghapus akun berarti semua data, aplikasi scholarship, favorites, dan dokumen akan dihapus permanen dari sistem.
                    </p>
                </div>
            </div>

            <div>
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="group relative overflow-hidden inline-flex items-center justify-center gap-2 sm:gap-3 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400 hover:scale-[1.03] transition duration-300 px-4 sm:px-8 py-2.5 sm:py-5 rounded-lg sm:rounded-2xl font-black text-white shadow-[0_15px_50px_rgba(239,68,68,0.3)] text-xs sm:text-base w-full sm:w-auto">
                    <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                    <span class="relative flex items-center gap-2">
                        <i class="bi bi-trash3-fill text-base sm:text-xl"></i> <span class="hidden xs:inline">Delete Account</span><span class="inline xs:hidden">Hapus</span>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'confirm-user-deletion','show' => $errors->userDeletion->isNotEmpty(),'focusable' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-user-deletion','show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->userDeletion->isNotEmpty()),'focusable' => true]); ?>
        <form method="post" action="<?php echo e(route('profile.destroy')); ?>" class="relative overflow-hidden bg-white rounded-lg sm:rounded-[2rem]">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>

            <div class="absolute top-0 left-0 w-full h-1 sm:h-2 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400"></div>

            <div class="p-5 sm:p-8 md:p-10">
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-5 mb-6 sm:mb-8">
                    <div class="w-14 sm:w-20 h-14 sm:h-20 rounded-lg sm:rounded-[2rem] bg-gradient-to-br from-red-500 to-rose-500 text-white flex items-center justify-center text-2xl sm:text-4xl shadow-xl shadow-red-500/20 flex-shrink-0">
                        <i class="bi bi-exclamation-octagon-fill"></i>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-3xl font-black text-gray-900 leading-tight">Confirm Account Deletion</h2>
                        <p class="mt-2 sm:mt-4 text-gray-500 leading-relaxed font-bold text-xs sm:text-base">
                            Tindakan ini tidak dapat dibatalkan. Masukkan password Anda untuk mengonfirmasi penghapusan akun secara permanen.
                        </p>
                    </div>
                </div>

                <div class="mb-6 sm:mb-8">
                    <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Password Confirmation</label>
                    <div class="relative">
                        <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 text-sm sm:text-base">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                        <input id="password" name="password" type="password" placeholder="Masukkan password" class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-5 text-gray-900 font-bold placeholder:text-gray-400 placeholder:text-xs sm:placeholder:text-base focus:outline-none focus:border-red-400 focus:ring-4 focus:ring-red-100 transition text-xs sm:text-base">
                    </div>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->userDeletion->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->userDeletion->get('password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                </div>

                <div class="flex flex-col xs:flex-row justify-end gap-3 sm:gap-4">
                    <button type="button" x-on:click="$dispatch('close')" class="px-4 sm:px-7 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl bg-gray-100 hover:bg-gray-200 transition text-gray-700 font-black text-xs sm:text-base">
                        Cancel
                    </button>
                    
                    <button type="submit" class="group relative overflow-hidden inline-flex items-center justify-center gap-2 sm:gap-3 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400 hover:scale-[1.02] transition duration-300 px-4 sm:px-8 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl font-black text-white shadow-[0_15px_50px_rgba(239,68,68,0.3)] text-xs sm:text-base w-full xs:w-auto">
                        <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                        <span class="relative flex items-center gap-2">
                            <i class="bi bi-trash3-fill"></i> <span class="hidden xs:inline">Permanently Delete</span><span class="inline xs:hidden">Hapus</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
</section>
<?php /**PATH C:\wl\ScholarLink-main\ScholarLink-main\resources\views/profile/partials/delete-user-form.blade.php ENDPATH**/ ?>