

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-12 px-3 sm:px-6 lg:px-8 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-3xl mx-auto">
        
        <div class="mb-4 sm:mb-8">
            <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
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
                <?php if($errors->any()): ?>
                    <div class="mb-6 sm:mb-8 bg-red-50 border border-red-200 rounded-lg sm:rounded-3xl p-4 sm:p-6">
                        <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                            <div class="w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-2xl bg-red-100 text-red-500 flex items-center justify-center text-lg sm:text-2xl flex-shrink-0">
                                <i class="bi bi-exclamation-circle-fill"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-red-700 text-xs sm:text-lg mb-2">Terjadi Kesalahan</h4>
                                <ul class="space-y-1 text-red-600 font-bold text-xs sm:text-sm">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>• <?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('applications.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-5 sm:space-y-7">
                    <?php echo csrf_field(); ?>

                    <div>
                        <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Pilih Beasiswa</label>
                        <div class="relative">
                            <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-sm sm:text-base">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <select name="id_beasiswa" class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-10 py-2.5 sm:py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
                                <option value="">-- Pilih Beasiswa --</option>
                                <?php $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($scholarship->id_beasiswa); ?>" <?php echo e(old('id_beasiswa') == $scholarship->id_beasiswa ? 'selected' : ''); ?>>
                                        <?php echo e($scholarship->nama_beasiswa); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-sm sm:text-base">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['class' => 'mt-2','messages' => $errors->get('id_beasiswa')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('id_beasiswa'))]); ?>
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

                    <div>
                        <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Catatan / Motivasi</label>
                        <div class="relative">
                            <div class="absolute left-3 sm:left-5 top-4 sm:top-6 text-gray-400 pointer-events-none text-sm sm:text-base">
                                <i class="bi bi-chat-left-text-fill"></i>
                            </div>
                            <textarea name="catatan" rows="4 sm:rows-6" placeholder="Tulis alasan mengapa kamu layak mendapatkan beasiswa ini..." class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-4 font-bold text-gray-900 placeholder:text-gray-400 placeholder:text-xs sm:placeholder:text-base resize-none focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base"><?php echo e(old('catatan')); ?></textarea>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['class' => 'mt-2','messages' => $errors->get('catatan')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('catatan'))]); ?>
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

                    
                    <div class="border-t border-gray-200 pt-5 sm:pt-7">
                        <div class="mb-4 sm:mb-6">
                            <div class="flex items-center gap-2 sm:gap-3 mb-2">
                                <div class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-base sm:text-xl flex-shrink-0">
                                    <i class="bi bi-file-earmark-arrow-up-fill"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-700 font-black text-xs sm:text-lg">Upload Dokumen Pendukung</h3>
                                    <p class="text-gray-500 text-xs sm:text-sm font-bold">Tambahkan dokumen yang dibutuhkan untuk aplikasi</p>
                                </div>
                            </div>
                        </div>

                        <div id="documents-container" class="space-y-4 sm:space-y-6 mb-4">
                            
                        </div>

                        <button type="button" onclick="addDocumentField()" class="flex items-center gap-2 text-purple-600 hover:text-purple-700 font-black text-xs sm:text-base hover:underline transition">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Dokumen
                        </button>
                    </div>

                    <div class="bg-blue-50 border border-blue-100 rounded-lg sm:rounded-3xl p-4 sm:p-6">
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                            <div class="w-12 sm:w-14 h-12 sm:h-14 rounded-lg sm:rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg sm:text-2xl flex-shrink-0">
                                <i class="bi bi-lightbulb-fill"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-black text-xs sm:text-lg mb-2">Tips Pengajuan</h3>
                                <ul class="text-gray-600 text-xs sm:text-sm leading-relaxed font-bold space-y-1">
                                    <li>• Upload dokumen dalam format PDF, DOC, DOCX, atau gambar (JPG, JPEG, PNG)</li>
                                    <li>• Ukuran file maksimal 5MB per dokumen</li>
                                    <li>• Dokumen harus jelas dan mudah dibaca</li>
                                    <li>• Pastikan data dan dokumen kamu sudah lengkap sebelum mengirim</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                        <a href="<?php echo e(route('scholarships.index')); ?>" class="flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 border border-gray-200 transition text-gray-700 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl font-black text-xs sm:text-base">
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

<script>
let documentCount = 0;

function addDocumentField() {
    const container = document.getElementById('documents-container');
    const id = documentCount++;

    const documentHTML = `
        <div class="document-entry bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-gray-200 rounded-lg sm:rounded-2xl p-4 sm:p-6 relative" id="document-${id}">
            <button type="button" onclick="removeDocumentField(${id})" class="absolute top-2 sm:top-4 right-2 sm:right-4 w-7 sm:w-9 h-7 sm:h-9 rounded-lg bg-red-100 text-red-500 hover:bg-red-200 flex items-center justify-center transition font-bold">
                <i class="bi bi-x-lg text-sm sm:text-base"></i>
            </button>

            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-black mb-2 text-xs sm:text-base">Jenis Dokumen</label>
                    <input type="text" name="documents[${id}][jenis_dokumen]" placeholder="Contoh: Ijazah, Transkrip Nilai, KTP" class="w-full bg-white border-2 border-gray-200 rounded-lg sm:rounded-2xl px-3 sm:px-5 py-2 sm:py-3 font-bold text-gray-900 placeholder:text-gray-400 placeholder:text-xs sm:placeholder:text-base focus:outline-none focus:border-purple-500 focus:ring-4 focus:ring-purple-100 transition text-xs sm:text-base" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-2 text-xs sm:text-base">Upload File</label>
                    <div class="relative">
                        <input type="file" name="documents[${id}][file]" class="hidden" id="file-input-${id}" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" onchange="updateFileName(${id})" required>
                        <label for="file-input-${id}" class="flex items-center justify-center gap-2 sm:gap-3 bg-white border-2 border-dashed border-purple-300 rounded-lg sm:rounded-2xl px-4 sm:px-6 py-4 sm:py-6 cursor-pointer hover:border-purple-500 hover:bg-purple-50 transition group">
                            <div class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center group-hover:scale-110 transition">
                                <i class="bi bi-cloud-arrow-up-fill text-base sm:text-lg"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-purple-600 font-black text-xs sm:text-base group-hover:text-purple-700">Klik atau drag file</p>
                                <p class="text-gray-500 text-xs font-bold">PDF, DOC, DOCX, JPG (Max 5MB)</p>
                            </div>
                        </label>
                        <p class="mt-2 text-xs sm:text-sm text-gray-500 font-bold file-name-${id}"></p>
                    </div>
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', documentHTML);
}

function removeDocumentField(id) {
    const element = document.getElementById(`document-${id}`);
    if (element) {
        element.style.opacity = '0';
        element.style.transform = 'scale(0.95)';
        setTimeout(() => {
            element.remove();
        }, 300);
    }
}

function updateFileName(id) {
    const fileInput = document.getElementById(`file-input-${id}`);
    const fileNameDisplay = document.querySelector(`.file-name-${id}`);
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
        fileNameDisplay.textContent = `✓ ${file.name} (${sizeMB} MB)`;
        fileNameDisplay.classList.add('text-green-600');
    }
}

// Allow drag and drop
document.addEventListener('dragover', (e) => {
    e.preventDefault();
    e.stopPropagation();
});

document.addEventListener('drop', (e) => {
    e.preventDefault();
    e.stopPropagation();
});
</script>

<style>
.document-entry {
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wl\ScholarLink-main\ScholarLink-main\resources\views/applications/create.blade.php ENDPATH**/ ?>