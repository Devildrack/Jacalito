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
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Hacer una Reservacion</h3>

                            <div class="w-full bg-gray-200 rounded-full">
                                <div
                                    class="w-40 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                    Paso 1</div>
                            </div>

                            <form method="POST" action="{{route('reservaciones.store.step.one')}}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="nombre_completo" class="block text-sm font-medium text-gray-700"> Nombre Completo
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="nombre_completo" name="nombre_completo"
                                            value="{{ $reservaciones->nombre_completo ?? ''}}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('nombre_completo')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="email" class="block text-sm font-medium text-gray-700"> Correo </label>
                                    <div class="mt-1">
                                        <input type="email" id="email" name="email"
                                            value="{{ $reservaciones->email ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('email')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="numero_telefonico" class="block text-sm font-medium text-gray-700"> Numero Telefonico
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="numero_telefonico" name="numero_telefonico"
                                            value="{{ $reservaciones->numero_telefonico ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('numero_telefonico')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="fecha_reservacion" class="block text-sm font-medium text-gray-700"> Fecha de Reservación
                                    </label>
                                    <div class="mt-1">
                                        <input type="datetime-local" id="fecha_reservacion" name="fecha_reservacion"
                                            min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                            max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                            value="{{ $reservaciones ? $reservaciones->fecha_reservacion->format('Y-m-d\TH:i:s') : '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    <span class="text-xs">Por Favor elija un horario entre las 08:00 a.m y las 06:00 p.m</span>
                                    @error('fecha_reservacion')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="numero_persona" class="block text-sm font-medium text-gray-700"> Numero de Personas
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="numero_persona" name="numero_persona"
                                            value="{{ $reservaciones->numero_persona ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('numero_persona')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-6 p-4 flex justify-end">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Siguiente</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-navegar-layout>
