@extends('layouts.base')

@section('content')

<div>
    <h1 class="text-4xl font-extrabold text-gray-900">Catalogue</h1>
    <div class="catalogue_filter">
        <div class="flex flex-wrap items-center sm:space-x-4 space-y-2 sm:space-y-0">
            <form action="{{ route('catalogue.index') }}" method="GET" class="flex flex-wrap sm:flex-nowrap sm:items-center sm:space-x-2 space-y-2 sm:space-y-0">
                <input type="text" name="search" value="{{ $search ?? '' }}" class="border rounded px-3 py-2 w-full sm:w-auto"
                    placeholder="Search...">
            </form>

            <script>
                function resetFiltersExcept(selectedElement) {
                    const form = selectedElement.form;
                    const elements = form.elements;

                    for (let i = 0; i < elements.length; i++) {
                        if (elements[i] !== selectedElement && elements[i].tagName === 'SELECT' && elements[i].name !== 'type' && elements[i].name !== 'material') {
                            elements[i].selectedIndex = 0;
                        }
                    }

                    form.submit();
                }
            </script>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-8">
        <div class="container">
            @foreach($products as $product)
                <a class="filterDiv {{ $product->type }}" href="{{ route('catalogue.show', $product->id) }}">
                    <div class="bg-white shadow p-4 rounded">
                        <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-32 object-cover">
                        <div class="font-bold text-lg">{{ $product->name }}</div>
                        <div class="text-gray-700">{{ $product->description }}</div>
                        {{-- <a href="{{ route('cart.add', $product->id)}}">Add to Cart</a> --}}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <div class="bg-white text-black p-4 rounded">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>

@endsection