@extends('admin_part.index')

@section('info_container')
    <div class="admin_part_info_container" style="min-height: 300px; padding: 1.5rem">
        <ul class="add_page_switcher">
            <li class="active" id="element">Shop</li>
            <li id="anounce">Anounce</li>
            <li id="detail">Detail</li>
            <li id="seo">Seo</li>
            <li id="og">Open Graph</li>
        </ul>
        <form action="{{ route('update_shop', $shop->id) }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-lg-9">
                <div class="tab_content" id="element">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Title</label>
                        <input type="text" id="simpleinput" class="form-control" name="title"
                            value="{{ $shop->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Symbolic code</label>
                        <input type="text" id="simpleinput" class="form-control" name="symbolic_code"
                            value="{{ $shop->symbolic_code }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Адрес</label>
                        <input type="text" id="simpleinput" class="form-control" name="adress"
                            value="{{ $shop->adress }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Контактный номер</label>
                        <input type="text" id="simpleinput" class="form-control" name="phone"
                            value="{{ $shop->phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">E-mail</label>
                        <input type="text" id="simpleinput" class="form-control" name="email"
                            value="{{ $shop->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Расписание работы</label>
                        <input type="text" id="simpleinput" class="form-control" name="schedule"
                            value="{{ $shop->schedule }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Варианты оплаты</label>
                        <input type="text" id="simpleinput" class="form-control" name="pay_variables"
                            value="{{ $shop->pay_variables }}">
                    </div>

                </div>
                <div class="tab_content" id="anounce">

                    <!-- File Upload -->
                    <label for="myAwesomeDropzone" class="form-label">Anounce img</label>
                    <br>
                    <div class="dropzone" id="announceImageContainer">
                        <div class="dropzone_img_container">
                            <img class="dropzone_img" id="announcePreviewImage" src="#" alt="Preview Image">
                        </div>
                        <div id="announceImageInfo">
                            <i id="announceFileIcon" class="fas fa-image"></i>
                            <span id="announceFileName"></span>
                        </div>
                        <input name="anounce_img" type="file" accept="image/*" style="display: none">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="example-textarea" class="form-label">Text</label>
                        <textarea class="form-control" id="example-textarea" rows="5" name="anounce_text">{{ $shop->anounce_text }}</textarea>
                    </div>
                    {{--                     <div class="mb-3">
                        <label for="example-select" class="form-label">Category</label>
                        <select class="form-select" multiple id="example-select" name="category[]">
                            @foreach ($selected_categories as $selected_category)
                                <option value="{{ $selected_category->id }}" selected>
                                    {{ $selected_category->title }}
                                </option>
                            @endforeach
                            @foreach ($inactive_categories as $inactive_category)
                                <option value="{{ $inactive_category->id }}">{{ $inactive_category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="example-select" class="form-label">Shop</label>
                        <select class="form-select" multiple id="example-select" name="shop[]">
                            @foreach ($selected_shops as $selected_shop)
                                <option value="{{ $selected_shop->id }}" selected>
                                    {{ $selected_shop->title }}
                                </option>
                            @endforeach
                            @foreach ($inactive_shops as $inactive_shop)
                                <option value="{{ $inactive_shop->id }}">{{ $inactive_shop->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
 --}}
                    <div class="mb-3">
                        <label for="example-color" class="form-label">Color</label>
                        <input class="form-control" id="example-color" type="color" name="color" value="#727cf5">
                    </div>
                </div>
                <div class="tab_content" id="detail" style="display: none;">
                    <!-- File Upload -->
                    <div class="d-flex" style="">
                        <div>
                            <label for="myAwesomeDropzone" class="form-label">Detail img</label>
                            <div class="dropzone" id="detailImageContainer">
                                <div class="dropzone_img_container">
                                    <img class="dropzone_img" id="detailPreviewImage" src="#" alt="Detail Image">
                                </div>
                                <div id="detailImageInfo">
                                    <i id="detailFileIcon" class="fas fa-image"></i>
                                    <span id="detailFileName"></span>
                                </div>
                                <input name="detail_img[]" type="file" accept="image/*" style="display: none"
                                    multiple>
                            </div>
                        </div>
                        <div class="img_cards_container">
                            @if (!empty($shop->detail_img))
                                @foreach ($shop->detail_img as $detail_img)
                                    <div class="admin_part_img_card">
                                        <div class="admin_part_img_card_img_container">
                                            <img src="/storage/{{ $detail_img }}" class="admin_part_img_card_img">
                                        </div>
                                        <div style="padding: 1.5rem;">
                                            <p class="admin_part_img_card_title">{{ $detail_img }}</p>
                                            <button class="admin_part_img_card_img_delete_btn">Delete</button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <input id="imageArray" type="hidden" name="image_array" value="">
                    <div class="mb-3 mt-3">
                        <label for="example-textarea" class="form-label">Detail text</label>
                        <textarea class="form-control" id="example-textarea" rows="5" name="detail_text"></textarea>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="accordion-item admin_part_add_page_publication_info">
                    <h2 class="publication_info_accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-publish" aria-expanded="false" aria-controls="flush-publish">
                            Publish
                        </button>
                    </h2>
                    <div id="flush-publish" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="padding: 12px;">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">ID: {{ $shop->id }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Addet At:
                                    {{ $shop->created_at->format('d.m.Y') }}</label>
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
                </div>
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
@endsection
