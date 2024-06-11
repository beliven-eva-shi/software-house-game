<meta http-equiv="refresh" content="1;url=/sales" />
<x-layout>

    <body>
        <h1 style="font-size: 3em; font-weight: bold; text-align: center;">Sales</h1>
        <div style="display: flex; height: 100vh; padding: 20px;">
            <x-column>
                @foreach ($sales as $sale)
                    <x-card>
                        <div>{{ $sale->name }} </div>
                        <div>Seniority Lv: {{ $sale->seniority_lv }}</div>
                        <div>Next project in: {{ $sale->time_new_project }}s </div>
                    </x-card>
                @endforeach
            </x-column>
        </div>
    </body>
</x-layout>
