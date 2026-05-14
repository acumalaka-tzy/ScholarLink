@extends('provider.provider')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-white mb-2">
        Provider Dashboard
    </h1>

    <p class="text-slate-400">
        Selamat datang di panel provider ScholarLink
    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">
        <h2 class="text-slate-400 text-sm mb-2">
            Total Scholarships
        </h2>

        <p class="text-4xl font-bold text-white">
            {{ \App\Models\Scholarship::where('id_provider', auth()->user()->provider->id_provider)->count() }}
        </p>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">
        <h2 class="text-slate-400 text-sm mb-2">
            Active Scholarships
        </h2>

        <p class="text-4xl font-bold text-emerald-400">
            {{ \App\Models\Scholarship::where('id_provider', auth()->user()->provider->id_provider)->where('status', 'active')->count() }}
        </p>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">
        <h2 class="text-slate-400 text-sm mb-2">
            Total Applications
        </h2>

        <p class="text-4xl font-bold text-indigo-400">
            0
        </p>
    </div>

</div>

@endsection