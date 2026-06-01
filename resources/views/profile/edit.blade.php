<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-5">
            <div class="w-16 h-16 rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-xl shadow-blue-500/20">
                <i class="bi bi-person-circle"></i>
            </div>
            <div>
                <h2 class="text-4xl font-black text-gray-900 leading-tight">
                    My <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Profile</span>
                </h2>
                <p class="text-gray-500 font-bold mt-2 text-lg">
                    Kelola informasi akun dan keamanan ScholarLink Anda.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f4f7f9] py-10 px-4 sm:px-6 lg:px-10 overflow-hidden">
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-0 space-y-10">
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">
                
                <div class="xl:col-span-1">
                    <div class="sticky top-28 relative overflow-hidden bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)] p-8">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                        <div class="absolute top-0 right-0 w-72 h-72 bg-cyan-100 rounded-full blur-3xl opacity-40"></div>

                        <div class="relative flex flex-col items-center text-center">
                            <div class="w-36 h-36 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-7xl shadow-2xl shadow-blue-500/20 mb-8">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <h3 class="text-3xl font-black text-gray-900">{{ Auth::user()->name }}</h3>
                            <p class="text-gray-500 font-bold mt-3 break-all">{{ Auth::user()->email }}</p>

                            <div class="mt-8 flex flex-wrap justify-center gap-3">
                                <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-5 py-3 rounded-full text-sm font-black border border-blue-200">
                                    <i class="bi bi-person-fill"></i>
                                    {{ ucfirst(Auth::user()->role ?? 'User') }}
                                </span>
                                <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-5 py-3 rounded-full text-sm font-black border border-green-200">
                                    <i class="bi bi-check-circle-fill"></i> Active
                                </span>
                            </div>

                            <div class="w-full mt-10 space-y-4">
                                <div class="bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 flex items-center justify-between">
                                    <span class="text-gray-500 font-bold">Joined</span>
                                    <span class="text-gray-900 font-black">{{ Auth::user()->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 flex items-center justify-between">
                                    <span class="text-gray-500 font-bold">Email Status</span>
                                    <span class="text-cyan-600 font-black">Verified</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-2 space-y-8">
                    <div class="bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)] overflow-hidden">
                        <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                        <div class="p-4 sm:p-8">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)] overflow-hidden">
                        <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                        <div class="p-4 sm:p-8">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="bg-white border border-red-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(239,68,68,0.08)] overflow-hidden">
                        <div class="h-2 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400"></div>
                        <div class="p-4 sm:p-8">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
