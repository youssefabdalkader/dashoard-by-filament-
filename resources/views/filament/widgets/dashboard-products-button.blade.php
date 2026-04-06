<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-center gap-8">




            {{-- الزرار --}}
            <x-filament::button
                tag="a"
                href="{{ route('products.index') }}"
            >
                Go to Products website
            </x-filament::button>

        </div>
    </x-filament::section>
</x-filament-widgets::widget>
