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
                    Editar Menu
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Volver a Menu</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="nombre" class="block text-sm font-medium text-gray-700"> Nombre </label>
                            <div class="mt-1">
                                <input type="text" id="nombre" name="nombre" value="{{$menu->nombre}}"
                                    class="text-black block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('nombre') border-red-400 @enderror" />
                            </div>
                            @error('nombre')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="imagen" class="block text-sm font-medium text-gray-700"> Imagen </label>
                            <div>
                                <img class="w-32 h-32" src="{{Storage::url($menu->imagen)}}">
                            </div>
                            <div class="mt-1">
                                <input type="file" id="imagen" name="imagen"
                                    class="text-black block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('imagen') border-red-400 @enderror" />
                            </div>
                            @error('imagen')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
                            <div class="mt-1">
                                <textarea id="descripcion" rows="3" name="descripcion"
                                    class="text-black shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('descripcion') border-red-400 @enderror">
                                    {{$menu->descripcion}}
                                </textarea>
                            </div>
                            @error('descripcion')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Categorias</label>
                            <div class="mt-1">
                                <select id="categorias" name="categorias[]"
                                    class="text-black shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('descripcion') border-red-400 @enderror" multiple>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" selected="{{$menu->categorias->contains($categoria)}}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('descripcion')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="precio" class="block text-sm font-medium text-gray-700"> Precio </label>
                            <div class="mt-1">
                                <input type="number" min="0.00" max="10000.00" step="0.01" id="precio" name="precio" value="{{$menu->precio}}"
                                    class="text-black block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('nombre') border-red-400 @enderror" />
                            </div>
                            @error('nombre')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-6 p-4">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

            </div>

        </div>
    </div>
</x-admin-layout>