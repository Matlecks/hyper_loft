@extends('admin_part.index')

@section('info_container')
    <div class="admin_part_info_container" style="min-height: 300px; padding: 1.5rem">
        <ul class="add_page_switcher">
            <li class="active" id="anounce">Anounce</li>
            <li id="detail">Detail</li>
            <li id="seo">Seo</li>
            <li id="og">Open Graph</li>
        </ul>
        <form action="{{ route('update_product', $user->id) }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-lg-9">
                <div class="tab_content" id="anounce">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Title</label>
                        <input type="text" id="simpleinput" class="form-control" name="title"
                            value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Full Name</label>
                        <input type="text" id="simpleinput" class="form-control" name="title"
                            value="{{ $user->full_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Symbolic code</label>
                        <input type="text" id="simpleinput" class="form-control" name="symbolic_code"
                            value="{{ $user->symbolic_code }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">E-mail</label>
                        <input type="text" id="simpleinput" class="form-control" name="title"
                            value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Phone</label>
                        <input type="text" id="simpleinput" class="form-control" name="title"
                            value="{{ $user->phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Job</label>
                        <input type="text" id="simpleinput" class="form-control" name="title"
                            value="{{ $user->job }}">
                    </div>

                    <!-- File Upload -->
                    <label for="myAwesomeDropzone" class="form-label">Avatar</label>
                    <br>
                    <div class="dropzone" id="announceImageContainer">
                        <div class="dropzone_img_container">
                            <img class="dropzone_img" id="announcePreviewImage" src="#" alt="Avatar">
                        </div>
                        <div id="announceImageInfo">
                            <i id="announceFileIcon" class="fas fa-image"></i>
                            <span id="announceFileName"></span>
                        </div>
                        <input name="anounce_img" type="file" accept="image/*" style="display: none">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="example-textarea" class="form-label">Description</label>
                        <textarea class="form-control" id="example-textarea" rows="5" name="anounce_text">{{ $user->description }}</textarea>
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
                                <input name="detail_img[]" type="file" accept="image/*" style="display: none" multiple>
                            </div>
                        </div>
                        <div class="img_cards_container">
                            {{-- @foreach ($user->detail_img as $detail_img) --}}
                            <div class="admin_part_img_card">
                                <div class="admin_part_img_card_img_container">
                                    <img src="/storage/{{ $user->avatar }}" class="admin_part_img_card_img">
                                </div>
                                <div style="padding: 1.5rem;">
                                    <p class="admin_part_img_card_title">{{ $user->avatar }}</p>
                                    <button class="admin_part_img_card_img_delete_btn">Delete</button>
                                </div>
                            </div>
                            {{-- @endforeach --}}
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
                                <label for="simpleinput" class="form-label">ID: {{ $user->id }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Addet At:
                                    {{ $user->created_at->format('d.m.Y') }}</label>
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
    </div>
@endsection
