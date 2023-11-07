@extends('admin_part.index')

@section('info_container')
    <div class="admin_part_info_container" style="min-height: 300px;">
        <div class="admin_part_info_btns">
            <div class="admin_part_info_btns_left_part">
                <a href="{{ route('create_product_page') }}" class="admin_part_add_btn text-decoration-none">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                    </span>
                    <span class="ms-3">Add {{ $page_title }}</span>
                </a>
            </div>
            <div class="admin_part_info_btns_right_part">
                <button type="button" class="admin_part_table_settings_btn" data-bs-toggle="modal"
                    data-bs-target="#table_filter_modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-funnel" viewBox="0 0 16 16">
                        <path
                            d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                    </svg>
                </button>

                <button class="admin_part_table_import_export">Import</button>
                <button class="admin_part_table_import_export">Export</button>
            </div>
        </div>
        <div class="admin_part_info_paginate_setting_search">
            <div class="admin_part_info_paginate_setting_left_part">
                <span>Display</span>
                <select class="admin_part_info_paginate_setting_select">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                    <option>All</option>
                </select>
                <span>{{ strtolower($page_title) }}s</span>
            </div>
            <div class="admin_part_info_paginate_setting_right_part">
                <span>Search:</span>
                <input type="text" class="admin_part_info_search">
            </div>
        </div>


            @yield('users_content'){{-- ('admin_part.users.users_list') --}}


    </div>

    {{-- Modals --}}
    {{-- modal filters --}}
    <div class="modal fade admin_part_modal_table_settings" id="table_filter_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="admin_part_modal-header" style="border: none;">
                    <h1 class="admin_part_modal-title fs-5" id="staticBackdropLabel">TABLE FILTER MODAL</h1>
                    <p>
                        In this modal window, you have the opportunity to configure filtering in the table according to your
                        needs.
                    </p>
                </div>
                <form action="{{ route('filter_product_table') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label class="form-check-label d-flex justify-content-between" for="firstCheckbox">
                                    <table>
                                        <tr>
                                            <td class="col-3">
                                                Shops
                                            </td>
                                            <td class="col-9">
                                                <select class="admin_part_add_column_select d-flex flex-column"
                                                    name="shop">
                                                    <option class="w-100 d-flex justify-content-start">
                                                        All
                                                    </option>
                                                    {{-- @foreach ($shops as $shop)
                                                        <option class="w-100 d-flex justify-content-start">
                                                            {{ $shop->title }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="form-check-label d-flex justify-content-between" for="firstCheckbox">
                                    <table>
                                        <tr>
                                            <td>Category</td>
                                            <td class="col-9">
                                                <select class="admin_part_add_column_select d-flex flex-column"
                                                    name="category">
                                                    <option class="w-100 d-flex justify-content-start">
                                                        All </option>
                                                    {{-- @foreach ($all_categories as $category)
                                                        <option class="w-100 d-flex justify-content-start">
                                                            {{ $category->title }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="form-check-label d-flex justify-content-between" for="firstCheckbox">
                                    <table>
                                        <tr>
                                            <td>Status</td>
                                            <td class="col-9">
                                                <select class="admin_part_add_column_select d-flex flex-column"
                                                    name="status">
                                                    <option class="w-100 d-flex justify-content-start">All</option>
                                                    <option class="w-100 d-flex justify-content-start">Active</option>
                                                    <option class="w-100 d-flex justify-content-start">Deactive</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="form-check-label d-flex justify-content-between" for="firstCheckbox">
                                    <table>
                                        <tr>
                                            <td class="col-3" style="width: 25%;">Quantity</td>
                                            <td class="col-9">
                                                <input type="range" class="form-range" id="quantity" name="quantity">
                                            </td>
                                        </tr>
                                    </table>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="form-check-label d-flex justify-content-between" for="firstCheckbox">
                                    <table>
                                        <tr>
                                            <td class="col-3" style="width: 25%;">Date</td>
                                            <td class="d-flex">
                                                <div class="form-control" style="text-align: start;">
                                                    <label for="date_from" class="form-label ms-1"
                                                        style="color: rgba(108, 117, 125, 0.65); font-family: Nunito,
                                                        sans-serif; font-size: 13px; font-weight: 400; text-align:
                                                        start;">Date
                                                        from</label>
                                                    <input id="date_from" type="date" name="date_from"
                                                        style="border: none;">
                                                </div>
                                                <div class="form-control" style="text-align: start;">
                                                    <label for="date_to" class="form-label ms-1"
                                                        style="color: rgba(108, 117, 125, 0.65); font-family: Nunito,
                                                        sans-serif; font-size: 13px; font-weight: 400; text-align:
                                                        start;">Date
                                                        to</label>
                                                    <input id="date_to" type="date" name="date_to"
                                                        style="border: none;">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="admin_part_modal-footer">
                        <button type="submit" class="admin_part_add_btn" style="margin: 0px;">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
