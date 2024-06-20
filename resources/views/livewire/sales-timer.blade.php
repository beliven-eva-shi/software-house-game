<div wire:poll>
    @foreach ($sales as $sale)
        <x-card>
            <div>{{ $sale->name }} </div>
            <div>Seniority Lv: {{ $sale->seniority_lv }}</div>
            <div>Next project in: {{ $sale->time_new_project }}s </div>
        </x-card>
    @endforeach
</div>
