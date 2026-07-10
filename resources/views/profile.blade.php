@extends('layouts.app')

@section('title', 'Profil Universitas')
@section('meta_description', 'Profil lengkap B University  sejarah, visi misi, dan pimpinan.')

@section('content')
@php
    $aboutImage = null;
    if ($aboutme && $aboutme->image) {
        if (is_array($aboutme->image)) {
            $aboutImage = $aboutme->image[0] ?? null;
        } else {
            $aboutImage = $aboutme->image;
        }
    }
@endphp

{{-- HERO SECTION --}}
<section class="relative overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 text-white">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-white blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-blue-300 blur-3xl"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="text-center">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-blue-100 ring-1 ring-white/20">
                Tentang Kampus
            </span>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                Profil Universitas
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-blue-100">
                Mengenal lebih dekat sejarah, visi misi, dan pimpinan B University.
            </p>
        </div>
    </div>
</section>

{{-- PROFIL SINGKAT --}}
<section class="bg-slate-50 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <div class="grid gap-8 lg:grid-cols-2">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest text-blue-600">Profil Singkat</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Tentang B University</h2>

                    <p class="mt-5 leading-8 text-slate-600">
                        {{ $aboutme->content ?? 'Profil singkat universitas belum tersedia. Silakan lengkapi data melalui CMS.' }}
                    </p>

                    <div class="mt-6">
                        <a href="{{ route('profile') }}"
                           class="inline-flex rounded-xl bg-blue-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-800">
                            Baca Profil Lengkap
                        </a>
                    </div>
                </div>

                @if($aboutImage)
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('storage/' . $aboutImage) }}"
                             alt="B University"
                             class="h-80 w-full max-w-md rounded-3xl object-cover shadow-lg">
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section class="bg-blue-950 py-20 text-white">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div>
            <p class="text-sm font-semibold uppercase tracking-widest text-blue-200">Arah Kampus</p>
            <h2 class="mt-3 text-3xl font-bold sm:text-4xl">Visi dan Misi</h2>
            <p class="mt-4 text-blue-100">
                Komitmen B University dalam penyelenggaraan pendidikan tinggi.
            </p>
        </div>

        <div class="grid gap-6">
            <div class="rounded-3xl bg-white/10 p-6 ring-1 ring-white/15">
                <h3 class="text-xl font-bold">Visi</h3>
                <div class="mt-4 leading-8 text-blue-50 [&_ol]:list-decimal [&_ol]:pl-5 [&_p]:mb-3 [&_ul]:list-disc [&_ul]:pl-5">
                    @if($visimisi)
                        {!! $visimisi->visi !!}
                    @else
                        <p>Data visi belum tersedia.</p>
                    @endif
                </div>
            </div>

            <div class="rounded-3xl bg-white/10 p-6 ring-1 ring-white/15">
                <h3 class="text-xl font-bold">Misi</h3>
                <div class="mt-4 leading-8 text-blue-50 [&_ol]:list-decimal [&_ol]:pl-5 [&_p]:mb-3 [&_ul]:list-disc [&_ul]:pl-5">
                    @if($visimisi)
                        {!! $visimisi->misi !!}
                    @else
                        <p>Data misi belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PIMPINAN --}}
<section class="bg-slate-50 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="text-sm font-semibold uppercase tracking-widest text-blue-600">Pimpinan</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900 sm:text-4xl">Pimpinan Universitas</h2>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($rektors as $rektor)
                <div class="rounded-3xl bg-white p-6 text-center shadow-sm ring-1 ring-slate-200">
                    @if($rektor->image)
                        <img src="{{ asset('storage/' . $rektor->image) }}"
                             alt="{{ $rektor->nama }}"
                             class="mx-auto h-28 w-28 rounded-full object-cover ring-4 ring-blue-100">
                    @else
                        <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-gradient-to-br from-blue-100 to-blue-200 text-2xl font-black text-blue-700">
                            {{ substr($rektor->nama, 0, 2) }}
                        </div>
                    @endif

                    <h3 class="mt-4 text-lg font-bold text-slate-900">{{ $rektor->nama }}</h3>
                    <p class="mt-2 rounded-full bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-700">
                        {{ $rektor->jabatan }}
                    </p>
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 p-10 text-center text-slate-500">
                    Data pimpinan belum tersedia.
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection