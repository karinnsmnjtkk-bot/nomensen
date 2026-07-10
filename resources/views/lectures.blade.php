@extends('layouts.app')

@section('title', 'Dosen')
@section('meta_description', 'Daftar dosen B University.')

@section('content')

{{-- HERO SECTION --}}
<section class="relative overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 text-white">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-white blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-blue-300 blur-3xl"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="text-center">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-blue-100 ring-1 ring-white/20">
                Akademik
            </span>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                Dosen Universitas
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-blue-100">
                Daftar dosen pengajar yang berdedikasi dalam mencerdaskan mahasiswa.
            </p>
        </div>
    </div>
</section>

{{-- DAFTAR DOSEN --}}
<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($lectures as $lecture)
                <div class="rounded-3xl border border-slate-200 bg-white p-6 text-center shadow-sm ring-1 ring-slate-200">
                    @if($lecture->image)
                        <img src="{{ asset('storage/' . $lecture->image) }}"
                             alt="{{ $lecture->nama }}"
                             class="mx-auto h-28 w-28 rounded-full object-cover ring-4 ring-blue-100">
                    @else
                        <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-gradient-to-br from-blue-100 to-blue-200 text-2xl font-black text-blue-700">
                            {{ substr($lecture->nama, 0, 2) }}
                        </div>
                    @endif

                    <h3 class="mt-4 text-lg font-bold text-slate-900">{{ $lecture->nama }}</h3>
                    <p class="mt-2 text-sm text-slate-600">{{ $lecture->nidn ?? '-' }}</p>
                    <p class="mt-1 text-sm text-slate-500">{{ $lecture->jabatan ?? '-' }}</p>
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 p-10 text-center text-slate-500">
                    Data dosen belum tersedia.
                </div>
            @endforelse
        </div>

        @if($lectures->hasPages())
            <div class="mt-10">
                {{ $lectures->links() }}
            </div>
        @endif
    </div>
</section>

@endsection