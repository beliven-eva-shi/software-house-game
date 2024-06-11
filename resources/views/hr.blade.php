<x-layout>

    <body>
        <h1 style="font-size: 3em; font-weight: bold; text-align: center;">HR</h1>
        <div style="display: flex; height: 100vh; padding: 20px;">
            <x-column>
                <h2 style="font-size: m; font-weight: bold; text-align: center;">Developers</h2>
                @foreach ($devs as $dev)
                    <x-card>
                        {{ $dev->name }}
                        <form action="/hr/dev/{{ $dev->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-3 py-1 border border-black-300 rounded-full text-black-300 text-xs uppercase ml-5">Hire</button>
                        </form>

                    </x-card>
                @endforeach


            </x-column>
            <x-column>
                <h2 style="font-size: m; font-weight: bold; text-align: center;">Salespeople</h2>
                @foreach ($sales as $sale)
                    <x-card> {{ $sale->name }}
                        <form action="/hr/sales/{{ $sale->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-3 py-1 border border-black-300 rounded-full text-black-300 text-xs uppercase ml-5">Hire</button>
                        </form>
                    </x-card>
                @endforeach

            </x-column>
        </div>
    </body>
</x-layout>
