<x-filament-widgets::widget>
    <x-filament::card>
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">filament v{{ \Filament\Filament::VERSION }}</h3>
                <p class="text-gray-600">Admin Panel Dashboard</p>
            </div>
            <div class="flex gap-2">
                <x-filament::button href="https://filamentphp.com/docs" target="_blank">
                    Documentation
                </x-filament::button>
                <x-filament::button href="https://github.com/filamentphp/filament" target="_blank">
                    GitHub
                </x-filament::button>
            </div>
        </div>
    </x-filament::card>
</x-filament-widgets::widget>
