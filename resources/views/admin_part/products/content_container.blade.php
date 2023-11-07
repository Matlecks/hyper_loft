@extends('admin_part.index')

@section('info_container')
    <div class="admin_part_info_container" style="min-height: 300px;">
        <div class="admin_part_info_btns">
            <div class="admin_part_info_btns_left_part">
                <a href="{{ route('create_product') }}" class="admin_part_add_btn text-decoration-none">
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
                <button type="button" class="admin_part_table_settings_btn" data-bs-toggle="modal"
                    data-bs-target="#table_settings_modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-gear" viewBox="0 0 16 16">
                        <path
                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                        <path
                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                    </svg>
                </button>

                <button type="button"class="admin_part_table_import_export" data-bs-toggle="modal"
                    data-bs-target="#table_import_modal">Import</button>

                <a href="{{ route('products_export') }}" class="admin_part_table_import_export">Export</a>
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

        @if ($page_title == 'Product')
            <div class="admin_part_table_container">
                <table class="table table-hover">
                    <thead>
                        <tr style="background: #EEF2F7FF;">
                            <th scope="col" style="width: 58px !important; padding-top: 2%; padding-left: 2%; ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </th>
                            @foreach ($columns as $column)
                                @if ($column->column_name == 'title')
                                    <th scope="col">
                                        <form action="{{ route('sort_products') }}" method="POST"
                                            class="d-flex justify-content-between" style="margin-bottom: 11px;">
                                            @csrf
                                            <span class="" id="title">{{ $column->alter_name }}</span>
                                            <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center"
                                                style="width: 15px;">
                                                <span class="w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                        fill="#B6BBC2" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                                                    </svg>
                                                </span>
                                                <span class="w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                        fill="#B6BBC2" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </form>
                                    </th>
                                @else
                                    <th scope="col">
                                        <form action="{{ route('sort_products') }}" method="POST"
                                            class="d-flex justify-content-between"
                                            style="margin-bottom: 10px; max-width: 150px;">
                                            @csrf
                                            <span class=""
                                                id="{{ $column->column_name }}">{{ $column->alter_name }}</span>
                                            <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center">
                                                <span class="w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                        fill="#B6BBC2" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                                                    </svg>
                                                </span>
                                                <span class="w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                        fill="#B6BBC2" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </form>
                                    </th>
                                @endif
                            @endforeach
                            <th scope="col"
                                style="padding-bottom: 1%; padding-left: 1px; padding-right: 5px; max-width: 10px !important;">
                            </th>
                        </tr>
                    </thead>
                    @include('admin_part.products.product_table')
                </table>
            </div>
        @elseif($page_title == 'Shop')
            <div class="admin_part_table_container">
                <table class="table table-hover">
                    <thead>
                        <tr style="background: #EEF2F7FF;">
                            <th scope="col" style="width: 58px !important; padding-top: 2%; padding-left: 2%; ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </th>
                            @foreach ($columns as $column)
                                @if ($column->column_name == 'title')
                                    <th scope="col">
                                        <form action="{{ route('sort_shop_table') }}" method="POST"
                                            class="d-flex justify-content-between"
                                            style="padding-bottom: 2%; margin-bottom: 0px;">
                                            @csrf
                                            <span class=""
                                                id="{{ $column->column_name }}">{{ $column->alter_name }}</span>
                                            <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center"
                                                style="width: 15px;">
                                                <span class="w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                        fill="#6C757DFF" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                                                    </svg>
                                                </span>
                                                <span class="w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                        fill="#6C757DFF" class="bi bi-caret-down-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </form>
                                    </th>
                                @else
                                    <th scope="col">
                                        <form action="{{ route('sort_shop_table') }}" method="POST"
                                            class="d-flex justify-content-between"
                                            style="padding-bottom: 8%; margin-bottom: 0px; max-width: 150px;">
                                            <span class=""
                                                id="{{ $column->column_name }}">{{ $column->alter_name }}</span>
                                            <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center">
                                                <span class="w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                        fill="#6C757DFF" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                                                    </svg>
                                                </span>
                                                <span class="w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                        fill="#6C757DFF" class="bi bi-caret-down-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </form>
                                    </th>
                                @endif
                            @endforeach
                            <th scope="col"
                                style="padding-bottom: 1%; padding-left: 1px; padding-right: 5px; max-width: 10px !important;">
                            </th>
                        </tr>
                    </thead>
                    @include('admin_part.tables.shop_table')
                </table>
            </div>
        @endif
    </div>

    {{-- Modals --}}
    {{-- modal settings --}}
    <div class="modal fade admin_part_modal_table_settings" id="table_settings_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="admin_part_modal-header" style="border: none;">
                    <h1 class="admin_part_modal-title fs-5" id="staticBackdropLabel">TABLE SETTINGS MODAL</h1>
                    <p>
                        In this modal window, you have the opportunity to customize the display of columns in the table
                        according to your needs. Please note that the first and last columns are required.
                    </p>
                </div>
                <form action="{{ route('update_product_table_settings', $table_name) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <ul class="list-group">
                            @foreach ($columns as $column)
                                <li class="list-group-item">
                                    <label class="form-check-label d-flex justify-content-between" for="firstCheckbox">
                                        <table>
                                            <tr>
                                                <td>
                                                    <input class="form-check-input me-1" type="checkbox"
                                                        value="{{ $column->column_checkbox }}"
                                                        name="checkbox_{{ $column->column_name }}"
                                                        @if ($column->column_checkbox == 'true') checked @endif>
                                                </td>
                                                <td><input type="text"
                                                        name="column_altername_{{ $column->column_name }}"
                                                        value="{{ $column->alter_name }}"
                                                        style="border: none; outline: none;
                                                        ">
                                                </td>
                                                <td><input type="text" name="column_name_{{ $column->column_name }}"
                                                        style="border: none;  width: 100px;"
                                                        value="{{ $column->column_name }}" disabled></td>
                                                <td><input type="text" name="column_sort_{{ $column->column_name }}"
                                                        class="admin_part_modal_sort_input" value="{{ $column->sort }}">
                                                </td>
                                            </tr>
                                            {{-- @endif --}}
                                        </table>
                                    </label>
                                </li>
                            @endforeach

                        </ul>
                        <div class="admin_part_add_column">
                            <table>
                                <tr>
                                    <td>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="#0D6EFD" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                            </svg>
                                        </span>
                                    </td>
                                    <td>
                                        <span style="color: #000">Add column</span>
                                    </td>
                                    <td>
                                        <select class="admin_part_add_column_select">
                                            @foreach ($inactive_columns as $inactive_column)
                                                <option>{{ $inactive_column }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="column_sort_{{ $column->column_name }}"
                                            class="admin_part_modal_sort_input" value="{{ $column->sort }}">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="admin_part_modal-footer">
                        <button type="submit" class="admin_part_add_btn" style="margin: 0px;">Save</button>
                    </div>
                </form>
                <form action="{{ route('update_to_default_product_table_settings', $table_name) }}" method="POST">
                    @csrf
                    <button type="submit" class="admin_part_default_settings_btn">Update to Default Settings</button>
                </form>
            </div>
        </div>
    </div>
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
                <form action="{{ route('filter_products') }}" method="POST">
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
                                                    @foreach ($shops as $shop)
                                                        <option class="w-100 d-flex justify-content-start">
                                                            {{ $shop->title }}
                                                        </option>
                                                    @endforeach
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
                                                    @foreach ($all_categories as $category)
                                                        <option class="w-100 d-flex justify-content-start">
                                                            {{ $category->title }}
                                                        </option>
                                                    @endforeach
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

    {{-- modal import --}}
    <div class="modal fade admin_part_modal_table_settings" id="table_import_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" {{-- style="display: block;" --}} aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="admin_part_modal-header" style="border: none;">
                    <h1 class="admin_part_modal-title fs-5" id="staticBackdropLabel">TABLE IMPORT SETTINGS MODAL</h1>
                    <p>
                        In this window you have the opportunity to configure the import of the product table. According to
                        your needs. </p>
                </div>
                <form class="import_modal_form" action="{{ route('products_import') }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    {{-- Выбор профиля --}}
                    <div class="d-flex">
                        <div class="w-50">
                            <label for="formFile" class="form-label">Import Profile</label>
                            <select class="form-select" aria-label="Default select example" name="profile">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="w-50 d-flex align-items-end justify-content-end">
                            <button type="" class="admin_part_add_btn w-50 "
                                style="height: 37px; margin-bottom: 5px">New Profile</button>
                        </div>
                    </div>
                    {{-- Файл импорта --}}
                    <div class="mb-3 mt-3">
                        <label for="formFile" class="form-label">Import File</label>
                        <input class="form-control" type="file" id="formFile" name="file">
                    </div>
                    {{-- Выбор уникального идентификатора --}}
                    <div class="mt-3">
                        <label for="formFile" class="form-label">Identificator</label>
                        <select class="form-select" aria-label="Default select example" name="identificator">
                            <option selected>Open this select menu</option>
                            @foreach ($identificators as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-body">


                    </div>
                    <div class="admin_part_modal-footer">
                        <button type="submit" class="admin_part_add_btn" style="margin: 0px;">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
