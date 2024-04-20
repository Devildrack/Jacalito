<x-navegar-layout>
    <section class="px-2 m-4 py-24 bg-slate-800 md:px-0">
        <div class="py-12 opacity-75 bg-no-repeat bg-cover bg-im2 md:px-0">
            <div class="container w-full px-5 py-6 mx-auto">
                <div class="grid lg:grid-cols-4 gap-y-6">
                    @foreach ($menus as $menu)
                        <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg bg-red-600">
                            <img class="w-full h-48" src="{{ Storage::url($menu->imagen) }}" alt="Image" />
                            <div class="px-6 py-4">
                                <h4 class="mb-3 text-xl font-semibold tracking-tight text-yellow-300 uppercase">
                                    {{ $menu->nombre }}</h4>
                                <p class="leading-normal text-white">{{ $menu->descripcion }}.</p>
                            </div>
                            <div class="flex items-center justify-between p-4">
                                <span class="text-xl text-yellow-300">${{ $menu->precio }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-navegar-layout>
