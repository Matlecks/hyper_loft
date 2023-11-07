<ul id="accordion_nav">
    @foreach ($admin_menu_points as $admin_menu_point)
        <li class="accordion-item">
            <div class="d-flex justify-content-between align-items-center" id="heading_{{ $admin_menu_point->simbol_code }}"
                data-bs-toggle="collapse" data-bs-target="#collapse_{{ $admin_menu_point->simbol_code }}" aria-expanded="true"
                aria-controls="collapse_{{ $admin_menu_point->simbol_code }}">
                <div class="d-flex justify-content-start">
                    <span class="me-3">
                        {!! $admin_menu_point->img !!}
                    </span>
                    <span>{{ $admin_menu_point->title }}</span>
                </div>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span>
            </div>

            <ul id="collapse_{{ $admin_menu_point->simbol_code }}" class="accordion-collapse collapse"
                aria-labelledby="heading_{{ $admin_menu_point->simbol_code }}" data-bs-parent="#accordion_nav">
                @php
                    $sub_menu_points = App\Models\Admin_Menu::where('parent_id', '=', $admin_menu_point->id)->get();
                @endphp
                @foreach ($sub_menu_points as $sub_menu_point)
                    <a href="{{ $sub_menu_point->link }}" style="text-decoration: none;"><li>{{ $sub_menu_point->title }}</li></a>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
