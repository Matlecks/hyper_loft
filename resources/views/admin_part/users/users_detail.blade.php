{{-- @extends('admin_part.users.users_container')

@section('users_content')
@endsection --}}
@extends('admin_part.index')

@section('info_container')
    <div class="user_container">
        <div class="user_main_block">
            <div class="left_part">
                <div class="first_part">
                    <div class="img_container">
                        <img src="https://coderthemes.com/hyper/saas/assets/images/users/avatar-2.jpg">
                    </div>
                </div>
                <div class="second_part">
                    <div class="main_info">
                        <p class="title">
                            {{ $user->name }}
                        </p>
                        <p class="text  ">
                            {{ $user->job }}
                        </p>
                    </div>
                    <div class="second_info">
                        <div>
                            <p class="title">
                                Role
                            </p>
                            <p class="text">
                                Content Manager
                            </p>
                        </div>
                        <div>
                            <p class="title">
                                Created At
                            </p>
                            <p class="text">
                                {{ $user->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="theard_part">
                <a href="{{ route('edit_user', $id = $user->id ) }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </span>
                    <span>Edit User</span>
                </a>
            </div>
        </div>
    </div>

    <div class="user_other_info_container">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">USER INFORMATION</h4>
                    <p class="text">
                        {{ $user->description }}
                    </p>

                    <hr>

                    <div class="text-start">
                        <p class="text-muted"><strong>Full Name :</strong> <span
                                class="ms-2">{{ $user->full_name }}</span>
                        </p>

                        <p class="text-muted"><strong>Mobile :</strong><span class="ms-2">{{ $user->phone }}</span></p>

                        <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ $user->email }}</span></p>

                        <p class="text-muted"><strong>Location :</strong> <span class="ms-2">USA</span></p>

                        <p class="text-muted"><strong>Languages :</strong>
                            <span class="ms-2"> English, German, Spanish </span>
                        </p>
                        <p class="text-muted mb-0" id="tooltip-container"><strong>Elsewhere :</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="phone_container">
                <p>
                    <span>Main Phone: </span><span>{{ $user->phone }}</span>
                </p>
            </div>
            <div class="messages_container">
                <p class="header-title mb-3">MESSAGES</p>
                @foreach ($mails as $mail)
                    <div class="line">
                        <div>
                            <div class="img-container">
                                @php
                                    $user = App\Models\User::find($mail->user_id);
                                    echo $user->avatar ? '<img src="' . $user->avatar . '">' : '<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg></span>';
                                @endphp
                            </div>
                        </div>
                        <div class="content">
                            <div>
                                <p class="title">{{ $mail->title }}</p>
                                <p class="text">{{ $mail->message }}</p>
                            </div>
                        </div>
                        <div>
                            <a class="link" href="">Reply</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-xl-8 ps-4">
            <div class="graphic_container">
                <p class="header-title mb-3">ORDERS & REVENUE</p>
                <div class=""></div>
            </div>
            <div class="statistic_container">
                <div class="stat_block">
                    <div class="top_part">
                        <div class="left_part">
                            <p class="title">Orders</p>
                            <p class="text">1,587</p>
                        </div>
                        <div class="right_part">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#DEE0E2"
                                class="bi bi-cart2" viewBox="0 0 16 16">
                                <path
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="bottom_part">
                        <span class="discount">+11%</span><span class="text">From previous period</span>
                    </div>
                </div>

                <div class="stat_block">
                    <div class="top_part">
                        <div class="left_part">
                            <p class="title">Revenue</p>
                            <p class="text">$46,782</p>
                        </div>
                        <div class="right_part">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#DEE0E2"
                                class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                <path
                                    d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                <path
                                    d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                            </svg>
                        </div>
                    </div>
                    <div class="bottom_part">
                        <span class="discount">-29%</span><span class="text">From previous period</span>
                    </div>
                </div>

                <div class="stat_block">
                    <div class="top_part">
                        <div class="left_part">
                            <p class="title">Product Sold</p>
                            <p class="text">1,890</p>
                        </div>
                        <div class="right_part">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#DEE0E2"
                                class="bi bi-shop" viewBox="0 0 16 16">
                                <path
                                    d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                            </svg>
                        </div>
                    </div>
                    <div class="bottom_part">
                        <span class="discount">+89%</span><span class="text">From previous period</span>
                    </div>
                </div>
            </div>
            <div class="products_container">
                <p class="header-title">MY PRODUCTS</p>
                <table class="table table_products">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Shop</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            @php
                                $productShop = App\Models\ProductShop::where('product_id', $product->id)->get();
                                foreach ($productShop as $item) {
                                    $cost = $item->cost;
                                    $quantity = $item->quantity;
                                }
                            @endphp
                            <tr>
                                <td scope="row">{{ $product->title }}</td>
                                <td>{{ $cost }}</td>
                                <td>{{ $quantity }}</td>
                                <td>{{ $productShop }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
