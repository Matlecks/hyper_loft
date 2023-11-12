@extends('admin_part.index')

@section('info_container')
    <div class="admin_part_info_container" style="min-height: 300px; padding: 1.5rem">
        <ul class="add_page_switcher">
            <li class="active" id="Settings">Settings</li>
        </ul>
        @if (!empty($profile))
            <form action="{{ route('update_profile', $id = $profile->id) }}" method="POST" enctype="multipart/form-data"
                class="row">
            @else
                <form action="{{ route('store_profile') }}" method="POST" enctype="multipart/form-data" class="row">
        @endif
        @csrf
        <div class="col-lg-9">
            <div class="tab_content" id="Settings">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Name</label>
                    @if (!empty($profile))
                        <input type="text" id="simpleinput" class="form-control" name="title"
                            value="{{ $profile->name }}">
                    @else
                        <input type="text" id="simpleinput" class="form-control" name="title">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Import file</label>
                    @if (!empty($profile))
                        <input class="form-control" type="file" id="import_file" name="file"
                            value="{{ $profile->file }}">
                    @else
                        <input class="form-control" type="file" id="import_file" name="file">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">Tables</label>
                    @csrf
                    <select class="form-select" id="example-select" name="tables">
                        @if (!empty($profile))
                            <option value="{{ $table }}" selected>{{ $table }}</option>
                            @foreach ($tables as $table)
                                <option value="{{ $table }}">{{ $table }}</option>
                            @endforeach
                        @else
                            @foreach ($tables as $table)
                                <option value="{{ $table }}">{{ $table }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">Unical Identificator</label>
                    <select class="form-select" multiple id="example-select" name="identificator">
                        @if (!empty($profile))
                            <option value="{{ $column }}" selected>{{ $column }}</option>
                            @foreach ($columns as $column)
                                <option value="{{ $column }}">{{ $column }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                @if (!empty($excel_strings))
                    <div class="mb-3 import_table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    @foreach ($excel_strings[0] as $key => $headers)
                                        <th scope="col">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>{{ $headers }}</span>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#import_settings_{{ $key }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($excel_strings as $key => $strings)
                                    @if ($key != 0)
                                        <tr>
                                            @foreach ($strings as $value)
                                                <th><span>{{ $value }}</span></th>
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            {{-- <script>
                    var importFile_input = document.querySelector('#import_file');

                    var file = importFile_input.files[0];

                    let reader = new FileReader();

                    reader.readAsText(file);

                    reader.onload = function() {
                        alert(reader.result);
                    };

                    reader.onerror = function() {
                        alert(reader.error);
                    };


                    importFile_input.addEventListener("input", function(event) {
                        $.ajax({
                            url: "{{ route('get_file_content') }}",
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                tableName: tableName,
                                _token: _token,
                            },
                            success: function(response) {
                                if (response.success) {
                                    var selectIdentificator = document.querySelector(
                                        'select[name="identificator"]');
                                    selectIdentificator.innerHTML = response.columns;
                                }
                            }
                        });
                    });
                </script> --}}
            <div class="mb-3">
                @if (!empty($profile))
                    <button type="submit" class="admin_part_add_btn">Complete settings & Start Import</button>
                @else
                    <button type="submit" class="admin_part_add_btn">Next step</button>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            {{-- <div class="accordion-item admin_part_add_page_publication_info">
                <h2 class="publication_info_accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-publish" aria-expanded="false" aria-controls="flush-publish">
                        Publish
                    </button>
                </h2>
                <div id="flush-publish" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" style="padding: 12px;">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">ID: 1</label>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Addet At: 11.11.2023</label>
                        </div>
                        <div class="mb-3">
                            <label for="example-date" class="form-label">Start of publication
                            </label>
                            <input class="form-control" id="example-date" type="date" name="date">
                        </div>

                        <div class="mb-3">
                            <label for="example-date" class="form-label">End of publication
                            </label>
                            <input class="form-control" id="example-date" type="date" name="date">
                        </div>
                    </div>
                </div>
                <div class="publication_info_accordion-footer">
                    <button type="button" class="admin_part_delete_btn">Delete</button>
                    <button type="submit" class="admin_part_add_btn">Submit</button>
                </div>
            </div> --}}
        </div>









        @if (!empty($excel_strings))
            @foreach ($excel_strings[0] as $key => $headers)
                {{-- show --}}
                <div class="modal fade admin_part_modal_table_settings " id="import_settings_{{ $key }}"
                    tabindex="-1" aria-labelledby="exampleModalLabel" {{-- style="display: block;" --}} aria-modal="true"
                    role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="admin_part_modal-header" style="border: none;">
                                <h1 class="admin_part_modal-title fs-5" id="staticBackdropLabel">IMPORT SETTINGS MODAL
                                </h1>
                                <p>
                                    In this modal window you have the opportunity to customize the Excel import as you
                                    wish.
                                </p>
                            </div>
                            <div class="admin_part_modal_content">
                                <label class="form-check-label d-flex justify-content-between" for="firstCheckbox">
                                    DB column name</label>
                                <input hidden="true" name="column_header_{{ $key }}"
                                    value="{{ $headers }}">
                                <select class="admin_part_add_column_select d-flex flex-column"
                                    name="column_name_{{ $key }}">
                                    @foreach ($columns_orig as $column)
                                        <option class="w-100 d-flex justify-content-start" value="{{ $column }}">
                                            {{ $column }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="admin_part_modal-footer">
                                <button class="admin_part_add_btn" type="button" data-bs-dismiss="modal"
                                    aria-label="Close" style="margin: 0px;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        </form>
    </div>



















    </form>
    {{--  <form method="post" action="http://example.com/"> --}}

    {{-- </form> --}}
    {{-- <script>
            function readfiles(files) {
                for (var i = 0; i < files.length; i++) {
                    document.getElementById('fileDragName').value = files[i].name
                    document.getElementById('fileDragSize').value = files[i].size
                    document.getElementById('fileDragType').value = files[i].type
                    reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('fileDragData').value = event.target.result;
                    }
                    reader.readAsDataURL(files[i]);
                }
            }
            var holder = document.getElementById('holder');
            holder.ondragover = function() {
                this.className = 'hover';
                return false;
            };
            holder.ondragend = function() {
                this.className = '';
                return false;
            };
            holder.ondrop = function(e) {
                this.className = '';
                e.preventDefault();
                readfiles(e.dataTransfer.files);
            }
        </script> --}}
    </div>






    <script>
        // Получаем элемент select по имени 'tables'
        var selectTables = document.querySelector('select[name="tables"]');

        var options = selectTables.querySelectorAll('option');
        var _token = document.querySelector('input[name="_token"]').value;

        // Добавляем слушатель события клика на select
        options.forEach(function(option) {
            option.addEventListener('click', function() {
                // Получаем значение (value) выбранного option
                var tableName = option.value;

                // Здесь можно выполнить дополнительные действия при клике на каждый option

                // Создаем AJAX запрос
                $.ajax({
                    url: "{{ route('get_columns') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        tableName: tableName,
                        _token: _token,
                    },
                    success: function(response) {
                        if (response.success) {
                            // Находим select с именем 'identificator' в success-ответе и добавляем полученный HTML
                            var selectIdentificator = document.querySelector(
                                'select[name="identificator"]');
                            selectIdentificator.innerHTML = response.columns;
                        }
                    }
                });
            });
        });
    </script>
@endsection
