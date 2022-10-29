<x-navegar-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img class="object-cover w-full h-full"
                            src="{{asset('images/IMG-20220908-WA0018.jpg')}}" alt="img" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Hacer Reservacion</h3>

                            <div class="w-full bg-gray-200 rounded-full">
                                <div
                                    class="w-100 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                    Paso 2</div>
                            </div>

                            <form method="POST" action="{{ route('reservaciones.store.step.two') }}">
                                @csrf
                                <div class="sm:col-span-6 pt-5">
                                    <label for="mesa_id" class="block text-sm font-medium text-gray-700">Mesa</label>
                                    <div class="mt-1">
                                        <select id="mesa_id" name="mesa_id"
                                            class="form-multiselect block w-full mt-1">
                                            @foreach ($mesas as $mesa)
                                                <option value="{{ $mesa->id }}" selected="{{$mesa->id == $reservaciones->mesa_id}}">
                                                    {{ $mesa->nombre }}
                                                    ({{ $mesa->numero_persona }} Personas)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('mesa_id')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-6 p-4 flex justify-between">
                                    <a href="{{ route('reservaciones.step.one') }}"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Volver</a>
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Reservar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-navegar-layout>
