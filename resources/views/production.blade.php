<x-layout>


    <body>
        <h1 style="font-size: 3em; font-weight: bold; text-align: center;">Production</h1>
        <div style="display: flex; height: 100vh; padding: 20px;">
            <x-column>
                <h2 style="font-size: m; font-weight: bold; text-align: center;">Projects</h2>
                @foreach ($projects as $project)
                    <x-card>
                        <div>{{ $project->title }} </div>
                        <div>Value: {{ $project->value }}</div>
                        <div>Complexity: {{ $project->complexity }}</div>
                        @if ($project->time_for_completion)
                            <div>Project assigned. Time for completion: {{ $project->time_for_completion }}s</div>
                        @else
                            <div> Project unassigned</div>
                            <div>
                                <form action="/production/{{ $project->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="assign">
                                        Assign to: </label>
                                    {{-- <input type="text" name="assegnato_a'" id="assegnato_a'" required> --}}
                                    <select name="assign" id="assign'" default='' required>
                                        <option></option>
                                        @foreach ($devs as $dev)
                                            <option value="{{ $dev->id }}">
                                                {{ $dev->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        class="px-3 py-1 border border-black-300 rounded-full text-black-300 text-xs uppercase ml-5">Confirm</button>
                                </form>
                            </div>
                        @endif


                    </x-card>
                @endforeach


            </x-column>
            <x-column>
                <h2 style="font-size: m; font-weight: bold; text-align: center;">Developers</h2>
                @foreach ($devs as $dev)
                    <x-card>
                        <div>{{ $dev->name }} </div>
                        <div>Seniority Lv: {{ $dev->seniority_lv }} </div>
                    </x-card>
                @endforeach
            </x-column>
        </div>
    </body>
</x-layout>
