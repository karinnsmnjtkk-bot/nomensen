<x-filament-widgets::widget>
    <x-filament::card>
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Welcome Administrator</h3>
                <p class="text-gray-600">{{ $user->name ?? 'Admin' }}</p>
                <p class="text-sm text-gray-500">{{ $user->email ?? '' }}</p>
            </div>
            <x-filament::button color="danger" href="{{ route('filament.admin.auth.logout') }}">
                Sign out
            </x-filament::button>
        </div>
    </x-filament::card>
</x-filament-widgets::widget>
