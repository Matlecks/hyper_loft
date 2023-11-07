{{-- @extends('admin_part.product_container')

@section('table') --}}

            {{-- catalog_categories --}}
            <tbody>
                @foreach ($shops as $shop)
                    <tr>
                        <td class="" style="width: 58px !important; padding-top: 2%; padding-left: 2%;">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </td>
                        <td class="d-flex" style="padding-right: 15px;
                    padding-left: 0px;">
                            <div class="admin_part_table_img_container">
                                <img class="admin_part_table_img" src="{{ $shop->img }}">
                            </div>
                            <div class="ms-4">
                                <span
                                    style="color: #6C757DFF; font-family: 'Nunito', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px">
                                    {{ $shop->title }}</span>
                                <div class="d-flex align-items-center justify-content-between w-75 mt-1">

                                </div>
                            </div>
                        </td>
                        <td class="" style="width: 150px; padding-top: 2%;">Город
                        </td>
                        <td class="" style="width: 150px; padding-top: 2%;">
                            {{ $shop->created_at->format('d/m/Y') }}
                        </td>
                        <td class="" style="width: 102px; padding-top: 2%;">
                            @if ($shop->deleted_at)
                                Deactive
                            @else
                                Active
                            @endif
                        </td>
                        <td class=""
                            style="padding-top: 2%; padding-left: 1px; padding-right: 5px; max-width: 10px !important;">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6C757DFF"
                                    class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
{{-- @endsection --}}
