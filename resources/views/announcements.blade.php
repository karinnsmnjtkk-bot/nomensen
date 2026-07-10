@extends('layouts.app')

@section('title', 'Pengumuman')
@section('meta_description', 'Pengumuman terbaru dari B University.')

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
                Informasi Kampus
            </span>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                Pengumuman Terbaru
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-blue-100">
                Dapatkan informasi penting seputar akademik, kegiatan, dan pengumuman resmi B University.
            </p>
        </div>
    </div>
</section>

{{-- DAFTAR PENGUMUMAN --}}
<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-4">
            @forelse($announcements as $announcement)
                <article class="rounded-2xl border border-slate-200 p-6 transition hover:border-blue-200 hover:bg-blue-50/40">
                    <div class="flex flex-wrap gap-2 text-xs text-slate-500">
                        <span>{{ $announcement->created_at?->format('d M Y') }}</span>
                        <span>•</span>
                        <span>{{ $announcement->user?->name ?? 'Admin' }}</span>
                    </div>

                    <h2 class="mt-2 text-xl font-bold text-slate-900">{{ $announcement->title }}</h2>

                    <p class="mt-3 text-slate-600">
                        {{ \Illuminate\Support\Str::limit(strip_tags($announcement->content), 150) }}
                    </p>

                    <details class="mt-4 rounded-xl bg-slate-50 p-4">
                        <summary class="cursor-pointer text-sm font-bold text-blue-700 hover:text-blue-900">
                            Baca pengumuman lengkap
                        </summary>

                        <div class="mt-4 leading-8 text-slate-700 [&_a]:text-blue-700 [&_ol]:list-decimal [&_ol]:pl-5 [&_p]:mb-4 [&_strong]:font-semibold [&_ul]:list-disc [&_ul]:pl-5">
                            {!! $announcement->content !!}
                        </div>
                    </details>
                </article>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 p-10 text-center text-slate-500">
                    Belum ada pengumuman.
                </div>
            @endforelse
        </div>

        @if($announcements->hasPages())
            <div class="mt-10">
                {{ $announcements->links() }}
            </div>
        @endif
    </div>
</section>

@endsection