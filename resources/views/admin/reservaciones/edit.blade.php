<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    Crear Reservacion
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservaciones.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Volver a Reservaciones</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.reservaciones.update', $reservacione->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="nombre_completo" class="block text-sm font-medium text-gray-700"> Nombre
                            </label>
                            <div class="mt-1">
                                <input type="text" id="nombre_completo" name="nombre_completo"
                                    value="{{ $reservacione->nombre_completo }}"
                                    class="text-black block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('nombre_completo') border-red-400 @enderror" />
                            </div>
                            @error('nombre_completo')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Correo Electronico
                            </label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email" value="{{ $reservacione->email }}"
                                    class="text-black block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-400 @enderror" />
                            </div>
                            @error('email')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="numero_telefonico" class="block text-sm font-medium text-gray-700"> Numero
                                Telefonico </label>
                            <div class="mt-1">
                                <input type="tel" id="numero_telefonico" name="numero_telefonico"
                                    value="{{ $reservacione->numero_telefonico }}"
                                    class="text-black block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('numero_telefonico') border-red-400 @enderror" />
                            </div>
                            @error('numero_telefonico')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="fecha_reservacion" class="block text-sm font-medium text-gray-700"> Fecha de
                                Reservacion </label>
                            <div class="mt-1">
                                <input type="datetime-local" id="fecha_reservacion" name="fecha_reservacion"
                                    value="{{ $reservacione->fecha_reservacion }}"
                                    class="text-black block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('fecha_reservacion') border-red-400 @enderror" />
                            </div>
                            @error('fecha_reservacion')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="numero_persona" class="block text-sm font-medium text-gray-700"> Numero de Personas
                            </label>
                            <div class="mt-1">
                                <input type="number" id="numero_persona" name="numero_persona"
                                    value="{{ $reservacione->numero_persona }}"
                                    class="text-black block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('numero_persona') border-red-400 @enderror" />
                            </div>
                            @error('numero_persona')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="mesa_id" class="block text-sm font-medium text-gray-700">Mesa</label>
                            <div class="mt-1">
                                <select id="mesa_id" name="mesa_id"
                                    class="text-black form-multiselect mt-1 shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('mesa_id') border-red-400 @enderror">
                                    @foreach ($mesas as $mesa)
                                        <option value="{{ $mesa->id }}" selected="{{$mesa->id == $reservacione->mesa_id}}">{{ $mesa->nombre }}
                                            ({{ $mesa->numero_persona }} Personas)</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('mesa_id')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-6 p-4">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Actualizar</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

            </div>

        </div>
    </div>
</x-admin-layout>
