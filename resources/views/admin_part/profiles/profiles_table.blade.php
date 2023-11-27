{{-- @extends('admin_part.product_container')

@section('table') --}}

{{-- catalog_categories --}}

<tbody>
    @foreach ($profiles as $profile)
        {{-- @php
            $productShop = App\Models\ProductShop::where('product_id', $product->id)->get();
            foreach ($productShop as $item) {
                $cost = $item->cost;
                $quantity = $item->quantity;
            }
        @endphp --}}
        <tr>
            <td class="" style="width: 58px !important; padding-top: 2%; padding-left: 2%;">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </td>
            <td class="" style="padding-right: 15px;
                    padding-left: 0px;">
                {{ $profile->name }}
            </td>
            <td class="" style="width: 150px; padding-top: 2%;">
                {{ $profile->created_at->format('d/m/Y') }}
            </td>
            <td class="" style="width: 150px; padding-top: 2%;">
                {{ $profile->created_at->format('d/m/Y') }}
            </td>
            <td class=""
                style="padding-top: 2%; padding-left: 1px; padding-right: 5px; max-width: 10px !important;">
                <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    style="border: none;background: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6C757DFF"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
                        </path>
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('create_profile_with_file', $profile->id) }}">Edit</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                    <li><form action="{{ route('products_import', $profile->id) }}" method="POST">@csrf<button type="submit">asdsadsadsad</button></form></li>
                </ul>

            </td>
        </tr>
    @endforeach
</tbody>

{{-- @endsection --}}
{{-- #B6BBC2 || #6C757DFF --}}
