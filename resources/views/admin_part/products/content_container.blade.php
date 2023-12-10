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

                <button type="button"class="admin_part_table_import_export" data-bs-toggle="modal"
                    data-bs-target="#table_import_modal">Import</button>

                <a href="{{ route('products_export') }}" class="admin_part_table_import_export">Export</a>
            </div>
        </div>
        <div class="admin_part_info_paginate_setting_search">
            <form action="{{ route('set_pagination', $page = 'products') }}" method="POST"
                class="admin_part_info_paginate_setting_left_part">
                @csrf
                <span>Display</span>
                <div class="d-flex">
                    <select class="admin_part_info_paginate_setting_select" name="pagination">
                        <option value="5" {{ Cache::get('products_pagination') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ Cache::get('products_pagination') == 10 ? 'selected' : '' }}>10</option>
                        <option value="50" {{ Cache::get('products_pagination') == 50 ? 'selected' : '' }}>50</option>
                        <option value="all" {{ Cache::get('products_pagination') == 'all' ? 'selected' : '' }}>All
                        </option>
                    </select>
                    <button class="set_paginate_btn" type="submit">SET</button>
                </div>
                <span>{{ strtolower($page_title) }}s</span>

            </form>

            <div class="admin_part_info_paginate_setting_right_part">
                <span>Search:</span>
                <form action="{{ route('search') }}" method="POST" class="search_form">
                    @csrf
                    <div class="dropdown">
                        <input type="text" class="admin_part_info_search">
                        <div class="dropdown-menu search_results_container"></div>
                    </div>
                </form>
            </div>
            <script>
                // Получение формы и элементов формы
                var form = document.querySelector('.search_form');
                var search_key = form.querySelector('.admin_part_info_search');
                var search_key_value = form.querySelector('.admin_part_info_search').value;
                var button = form.querySelector('button');
                var _token = form.querySelector('input[name="_token"]').value;
                var result_container = form.querySelector('.dropdown-menu.search_results_container');

                // Обработчик события отправки формы
                search_key.addEventListener('keyup', function(e) {
                    e.preventDefault(); // Отменяем стандартное поведение формы
                    $.ajax({
                        url: 'http://hyperloft/admin/search/search',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            search_key: search_key_value,
                            _token: _token,
                        },
                        success: function(response) {
                            if (response.success) {
                                result_container.style.display = 'block';
                                result_container.innerHTML = response.html;
                            }
                        }
                    });
                });

                // Обработчик события клика на документе
                document.addEventListener('click', function(e) {
                    if (!result_container.contains(e.target)) {
                        result_container.style.display = 'none';
                    }
                });
            </script>
        </div>

        <div class="admin_part_table_container">
            <table class="table table-hover">
                <thead>
                    <tr style="background: #EEF2F7FF;">
                        <th scope="col" style="width: 58px !important; padding-top: 2%; padding-left: 2%; ">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th scope="col">
                            <form action="{{ route('sort_products') }}" method="POST"
                                class="d-flex justify-content-between" style="margin-bottom: 11px;">
                                @csrf
                                <span class="" id="title">Product</span>
                                <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center"
                                    style="width: 15px;">
                                    <span class="w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="#B6BBC2"
                                            class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                                        </svg>
                                    </span>
                                    <span class="w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="#B6BBC2"
                                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                        </svg>
                                    </span>
                                </div>
                            </form>
                        </th>
                        <th scope="col">
                            <form action="{{ route('sort_products') }}" method="POST"
                                class="d-flex justify-content-between" style="margin-bottom: 10px; max-width: 150px;">
                                @csrf
                                <span class="" id="category">Category</span>
                                <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center">
                                    <span class="w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="#B6BBC2"
                                            class="bi bi-caret-up-fill" viewBox="0 0 16 16">
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
                        <th scope="col">
                            <form action="{{ route('sort_products') }}" method="POST"
                                class="d-flex justify-content-between" style="margin-bottom: 10px; max-width: 150px;">
                                @csrf
                                <span class="" id="created_at">Added Date</span>
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
                        <th scope="col">
                            <form action="{{ route('sort_products') }}" method="POST"
                                class="d-flex justify-content-between" style="margin-bottom: 10px; max-width: 150px;">
                                @csrf
                                <span class="" id="cost">Price</span>
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
                        <th scope="col">
                            <form action="{{ route('sort_products') }}" method="POST"
                                class="d-flex justify-content-between" style="margin-bottom: 10px; max-width: 150px;">
                                @csrf
                                <span class="" id="quantity">Quantity</span>
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
                        <th scope="col">
                            <form action="{{ route('sort_products') }}" method="POST"
                                class="d-flex justify-content-between" style="margin-bottom: 10px; max-width: 150px;">
                                @csrf
                                <span class="" id="status">Status</span>
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
                        <th scope="col"
                            style="padding-bottom: 1%; padding-left: 1px; padding-right: 5px; max-width: 10px !important;">
                        </th>
                    </tr>
                </thead>
                @include('admin_part.products.product_table')
            </table>
        </div>
        {{ $products->links() }}

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
        aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="admin_part_modal-header" style="border: none;">
                    <h1 class="admin_part_modal-title fs-5" id="staticBackdropLabel">TABLE IMPORT SETTINGS MODAL</h1>
                    <p>
                        In this window you have the opportunity to configure the import of the product table. According to
                        your needs. </p>
                </div>
                <form class="import_modal_form" action="{{-- {{ route('products_import') }} --}}" method="POST"
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
