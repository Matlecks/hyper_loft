{{-- @extends('admin_part.product_container')

@section('table') --}}

{{-- catalog_categories --}}

<tbody>
    @foreach ($products as $product)
        @php
            $productShop = App\Models\ProductShop::where('product_id', $product->id)->get();
            foreach ($productShop as $item) {
                $cost = $item->cost;
                $quantity = $item->quantity;
            }
        @endphp
        <tr>
            <td class="" style="width: 58px !important; padding-top: 2%; padding-left: 2%;">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </td>
            @php
                if (strpos($product->anounce_img, 'http') !== false || strpos($product->anounce_img, 'https') !== false) {
                    $product->anounce_img = $product->anounce_img;
                } else {
                    $product->anounce_img = '/storage/' . $product->anounce_img;
                }
            @endphp
            <td class="d-flex" style="padding-right: 15px;
                    padding-left: 0px;">
                <div class="admin_part_table_img_container">
                    <img class="admin_part_table_img" src="{{ $product->anounce_img }}">
                </div>
                <div class="ms-4">
                    <span
                        style="color: #6C757DFF; font-family: 'Nunito', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px">
                        {{ $product->title }}</span>
                    <div class="d-flex align-items-center justify-content-between w-75 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#FFC35AFF"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#FFC35AFF"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#FFC35AFF"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#FFC35AFF"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#FFC35AFF"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                    </div>
                </div>
            </td>
            <td class="" style="width: 150px; padding-top: 2%;">
                @if (!empty($product->categories->first()->title))
                    {{ $product->categories->first()->title }}
                @endif
            </td>
            <td class="" style="width: 150px; padding-top: 2%;">
                {{ $product->created_at->format('d/m/Y') }}
            </td>
            <td class="" style="width: 99px; padding-top: 2%;">
                {{ $cost }}
            </td>
            <td class="" style="width: 127px; padding-top: 2%;">
                {{ $quantity }}
            </td>
            <td class="" style="width: 102px; padding-top: 2%;">
                @if ($product->deleted_at)
                    Deactive
                @else
                    Active
                @endif
            </td>
            <td class="{{-- btn-group dropstart --}}"
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
                    <li><a class="dropdown-item" href="{{ route('edit_products', $product->id) }}">Edit</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                </ul>
            </td>
        </tr>
    @endforeach
</tbody>

{{-- @endsection --}}
{{-- #B6BBC2 || #6C757DFF --}}
