@extends('admin_part.index')

@section('info_container')
    <div class="admin_part_info_container" style="min-height: 300px;">
        <div class="admin_part_info_btns">
            <div class="admin_part_info_btns_left_part">
                {{--                 <a href="{{ route('create_profile') }}" class="admin_part_add_btn text-decoration-none">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                    </span>
                    <span class="ms-3">Add {{ $page_title }}</span>
                </a>
 --}} </div>
            <div class="admin_part_info_btns_right_part">
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

                {{--                 <button type="button"class="admin_part_table_import_export" data-bs-toggle="modal"
                    data-bs-target="#table_import_modal">Import</button>

                <a href="{{ route('products_export') }}" class="admin_part_table_import_export">Export</a>
 --}}
            </div>
        </div>
        {{--         <div class="admin_part_info_paginate_setting_search">
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
 --}} <div class="admin_part_table_container">

            <div class="indexstion_container">
                <p class="text">
                    Setting up reindexing on your site gives you the opportunity to control the search process on your site
                    in the administrative part and in the public part. This page allows you to customize the search engine
                    for your site according to your needs.
                </p>
                <ul class="add_page_switcher mt-5">
                    <li class="" id="public_btn">Indexation public part</li>
                    <li class="" id="admin_btn">Indexation admin part</li>
                </ul>
                <form action="" method="" id="public_form" class="indexation_form">
                    <div class="mb-3">
                        <label for="example-select" class="form-label">Models for indexation</label>
                        <select class="form-select" multiple="" id="example-select" name="identificator">
                            <option value="products">Products</option>
                            <option value="shops">Shops</option>
                            <option value="users">Users</option>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Enable search by tags
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="example-select" class="form-label">Sort results by
                        </label>
                        <select class="form-select" multiple="" id="example-select" name="sort">
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>


                    <button type="submit" class="indexsation_btn">Reindex</button>
                </form>
                <div class="indexation_form_wrapper" id="admin_form">
                    <form action="{{ route('store_setting_search') }}" method="POST" class="indexation_form">
                        @csrf
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Models for indexation</label>
                            <select class="form-select" multiple id="example-select" name="identificator[]">
                                @if (!empty($selected_models_of_admin_settings) || !empty($unselected_models_of_admin_settings))
                                    @foreach ($selected_models_of_admin_settings as $selected_model_of_admin_settings)
                                        <option value="{{ $selected_model_of_admin_settings }}" selected>
                                            {{ $selected_model_of_admin_settings }}</option>
                                    @endforeach
                                    @foreach ($unselected_models_of_admin_settings as $unselected_model_of_admin_settings)
                                        <option value="{{ $selected_model_of_admin_settings }}">
                                            {{ $selected_model_of_admin_settings }}</option>
                                    @endforeach
                                @else
                                    @foreach ($models_for_indexation as $model_for_indexation)
                                        <option value="{{ $model_for_indexation }}">
                                            {{ $model_for_indexation }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                name="tags" {{ $tags ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Enable search by tags
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Sort results by
                            </label>
                            <select class="form-select" multiple="" id="example-select" name="sort">
                                @if (!empty($unselected_sort_values))
                                    <option value="{{ $selected_sort_value }}" selected>{{ $selected_sort_value }}</option>
                                    @foreach ($unselected_sort_values as $unselected_sort_value)
                                        <option value="{{ $unselected_sort_value }}">{{ $unselected_sort_value }}</option>
                                    @endforeach
                                @else
                                    <option value="ascending">Ascending</option>
                                    <option value="descending">Descending</option>
                                @endif
                            </select>
                        </div>


                        <button type="submit" class="indexsation_btn">Save Settings</button>
                    </form>

                    <form class="reindex_form" action="{{ route('reindex_admin_search', $name_reindex_form = 'admin') }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="reindex_btn">Reindex</button>
                    </form>
                </div>
            </div>


        </div>
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
