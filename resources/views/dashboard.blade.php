<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos Electronicos') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bienvenido a Mi E-Commerce') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl font-semibold mb-4">{{ __('Nuestras Ofertas Destacadas') }}</h1>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Producto 1 -->
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                <img src="/images/producto1.jpg" alt="Producto 1"
                                    class="max-w-content h-20 object-contain max-w-content ">
                                <h2 class="text-xl font-semibold mt-2">Play Station</h2>
                                <p class="text-gray-600">Play Station 5 de Sony.</p>
                                <div class="mt-4">
                                    <span class="text-2xl font-semibold">$499.99</span>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-full float-right">
                                        Comprar
                                    </button>
                                </div>
                            </div>

                            <!-- Producto 2 -->
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                <img src="/images/producto2.jpg" alt="Producto 2"
                                    class="max-w-content h-20 object-contain max-w-content ">
                                <h2 class="text-xl font-semibold mt-2">iPhone 15 Pro Max</h2>
                                <p class="text-gray-600">Descripción del iPhone 15 Pro Max.</p>
                                <div class="mt-4">
                                    <span class="text-2xl font-semibold">$1299.99</span>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-full float-right">
                                        Comprar
                                    </button>
                                </div>
                            </div>


                            <!-- Producto 3 -->
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                <img src="/images/producto3.jpg" alt="Producto 3"
                                    class="w-full h-20 object-cover">
                                <h2 class="text-xl font-semibold mt-2">Asus Vivo 15"</h2>
                                <p class="text-gray-600">Laptop Asus Vivo core i5.</p>
                                <div class="mt-4">
                                    <span class="text-2xl font-semibold">$500</span>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-full float-right">
                                        Comprar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-guest-layout>
</x-app-layout>