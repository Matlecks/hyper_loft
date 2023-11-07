@extends('admin_part.users.users_container')

@section('users_content')
    <div class="admin_part_table_container">
        <table class="table user">
            <thead>
                <tr style="background: #EEF2F7FF;">
                    <th scope="col" style="width: 58px !important; padding-bottom: 1.1%; padding-left: 2%; ">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </th>
                    <th scope="col">
                        <a href="{{ route('sort_users', ['column_name' => 'status', 'sort' => $sort]) }}"
                            class="d-flex justify-content-between" style=" min-width: 250px;">

                            <span class="" id="name">Name</span>
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
                        </a>
                    </th>
                    <th scope="col">
                        <a href="{{ route('sort_users', ['column_name' => 'status', 'sort' => $sort]) }}"
                            class="d-flex justify-content-between" style=" max-width: 150px;">

                            <span class="" id="">Phone</span>
                            <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center">
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
                        </a>
                    </th>
                    <th scope="col">
                        <a href="{{ route('sort_users', ['column_name' => 'status', 'sort' => $sort]) }}"
                            class="d-flex justify-content-between" style=" max-width: 250px;">

                            <span class="" id="">E-mail</span>
                            <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center">
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
                        </a>
                    </th>
                    <th scope="col">
                        <a href="{{ route('sort_users', ['column_name' => 'status', 'sort' => $sort]) }}"
                            class="d-flex justify-content-between" style=" max-width: 150px;">

                            <span class="" id="">Added Date</span>
                            <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center">
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
                        </a>
                    </th>
                    <th scope="col">
                        <a href="{{ route('sort_users', ['column_name' => 'status', 'sort' => $sort]) }}"
                            class="d-flex justify-content-between" style=" max-width: 150px;">

                            <span class="" id="">Status</span>
                            <div class="d-flex flex-wrap ms-3 justify-content-between align-items-center">
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
                        </a>
                    </th>
                    <th scope="col"
                        style="padding-bottom: 1%; padding-left: 1px; padding-right: 5px; max-width: 10px !important;">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </td>
                        <td class="name_column">
                            <div class="img-container">
                                {!! $user->avatar
                                    ? '<img src="' . $user->avatar . '">'
                                    : '<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg><span>' !!}
                            </div>
                            <a href="{{ route('show_user', $id = $user->id) }}">{{ $user->name }}</a>
                        </td>


                        <td class="">{{ $user->phone }}</td>
                        <td class="">{{ $user->email }}</td>
                        <td class="">
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>
                        <td class="">{{ $user->status }}</td>
                        <td class="" style="">
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
                                <li><a class="dropdown-item" href="{{ route('edit_user', $user->id) }}">Edit</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
