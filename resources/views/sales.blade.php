{{-- <meta http-equiv="refresh" content="10;url=/sales" /> --}}
<x-layout>
    @livewireStyles
    <livewire:assets />

    <body>
        <h1 style="font-size: 3em; font-weight: bold; text-align: center;">Sales</h1>
        <div style="display: flex; height: 100vh; padding: 20px;">
            <x-column>
                <livewire:sales-timer />
            </x-column>
        </div>
        @livewireScripts
    </body>
</x-layout>
