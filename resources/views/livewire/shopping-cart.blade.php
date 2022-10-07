<div class="conteiner py-8">
    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
        <h1 class="text-lg font-semibold mb-6">CARRITO DE COMPRAS</h1>

        @if (Cart::count())
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>

                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th></th>

                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>


                            {{-- Descripcion del producto --}}
                            <td>
                                <div class="flex">

                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">
                                    <div>
                                        <p class="font-bold">{{ $item->name }}</p>
                                        @if ($item->options->color)
                                            <span>
                                                Color: {{ $item->options->color }}
                                            </span>
                                        @endif

                                        @if ($item->options->size)
                                            <span>
                                                - Talla: {{ $item->options->size }}
                                            </span>
                                        @endif
                                    </div>

                                </div>
                            </td>

                            {{-- Precio del producto --}}
                            <td class="text-center">
                                <span>
                                    S/ {{ $item->price }}
                                </span>

                            </td>

                            {{-- Cantidad del producto --}}
                            <td class="text-center">
                                <div class="flex justify-center">
                                    {{--  {{$item->rowId}} --}}
                                    @if ($item->options->size)
                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                    @elseif ($item->options->color)
                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                    @else
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif
                                </div>
                            </td>

                            {{-- Total producto --}}
                            <td class="text-center">
                                S/ {{ $item->price * $item->qty }}
                            </td>

                            {{-- Botes de basura --}}
                            <td>
                                <a class="ml-6 cursor-pointer hover:text-blue-500 m-2" 
                                wire:click="delete('{{$item->rowId}}')"
                                wire:loading.class="text-blue-500"
                                wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <x-jet-button class="mt-5 px-16" wire:click="destroy"> {{-- Metodo limpiar --}}
                Vaciar Carrito
            </x-jet-button>
        @else
            <div class="flex flex-col items-center">
                <x-cart></x-cart>
                <p class="text-lg text-gray-700 mt-4">Tu carrito está vacío</p>
                <x-button-enlace href="/" class="mt-4 px-10">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif

    </section>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total: </span>
                        S/ {{Cart::subTotal()}}
                    </p>
                </div>
                <div>
                    <x-button-enlace href="{{route('orders.create')}}">
                        Continuar
                    </x-button-enlace>
                </div>
            </div>
        </div>
        
    @endif
</div>
