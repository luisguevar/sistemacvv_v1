<x-app-layout>
    <div class="conteiner py-8">
        {{-- GRID DE 2 COLUMNAS --}}
        <div class="grid grid-cols-2 gap-6">
            {{-- SLIDER --}}
            <div class="">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            {{-- INFORMACIÓN DEL PROD Y ENVIO --}}
            <div>
                <h1 class="text-lg font-bold text-trueGray-700 ">{{ $product->name }}</h1>
                <div class="flex">
                    <p class=" font-semibold text-trueGray-700 ">Marca: <a
                            class="underline capitalize cursor-pointer hover:text-blue-500"
                            href="">{{ $product->brand->name }}</a></p>
                    <p class=" text-trueGray-700 mx-6"> 5 <i class="fas fa-star text-sm text-yellow-400"></i> </p>
                    <p class=" text-blue-500 underline ml-6 cursor-pointer hover:text-blue-700">20 reseñas</p>
                </div>
                
                <p class="text-2xl font-semibold text-trueGray-700 my-4"> S/ {{ $product->price }}</p>
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-green-400">
                            <i class="fas fa-truck text-sm"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-bold text-green-400">Se hace envios a todos el Perú</p>
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>

                @if ($product->subcategory->size) {{-- si size es 'true' --}}
                    @livewire('add-cart-item-size', ['product' => $product])
                
                @elseif ($product->subcategory->color) {{-- si color es 'true' --}}
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif
            </div>


        </div>
    </div>

    {{-- SCRIPT NECESARIO PARA EL SLIDER --}}
    @push('script')
        <script>
            $(document).ready(function() { //Para que se ejecute luego de que la pagina cargue
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
