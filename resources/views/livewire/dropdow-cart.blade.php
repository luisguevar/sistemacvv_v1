<div class="">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <x-jet-dropdown width="96">
        <x-slot name="trigger" >
            <span class="relative inline-block text-white" >
                <x-cart color="white" size="30" />

                @if (Cart::count())
                      <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{Cart::count()}}</span>
                      
                @else
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                @endif
                
                
            </span>
            
        </x-slot>

        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200" >
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{$item->name}}</h1>
                            <div class="flex">
                                <p>Cant: {{$item->qty}}</p>
                               {{--  si el parametro esta definido lo imprime, sino lo ignora --}}
                                @isset($item->options['color']) 
                                <p class="mx-2">- Color: {{$item->options['color']}}</p>
                                @endisset

                                @isset($item->options['size']) 
                                <p class="mx-2">- Talla: {{$item->options['size']}}</p>
                                @endisset

                            </div>
                            <p>Precio: {{$item->price}}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">El carrito está vacio</p>
                    </li>
                @endforelse
            </ul>
           
            @if (Cart::count())
                <div class="p-2">
                    <p> <span class="text-lg font-bold mt-2 mb-3">Total:</span>  S/ {{Cart::subtotal()}}</p>
                
                <x-button-enlace href="{{route('shopping-cart')}}" class="w-full mt-2">
                    Ir al carrito de compras
                </x-button-enlace>
                
                </div>
             
            @endif
        </x-slot>
    </x-jet-dropdown>
</div>
