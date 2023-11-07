@extends('admin_part.index')

@section('info_container')
    <div class="admin_part_info_container" style="min-height: 300px; display:flex;">
        <div class="admin_part_mail_menu">
            <button type="button" class="admin_part_compose_btn" data-bs-toggle="modal"
                data-bs-target="#compose_modal">Compose</button>

            <ul class="">
                <li class="">
                    <a href="{{ route('filter_mail', $status = 'inbox') }}"
                        class="{{ $cur_stat === $status ? 'active' : '' }}">
                        <div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-inbox" viewBox="0 0 16 16">
                                    <path
                                        d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
                                </svg>
                            </span>
                            <span>
                                Inbox
                            </span>
                        </div>
                        @if (!empty($counts[$status]))
                            <span class="count {{ $cur_stat === $status ? 'active' : '' }}">
                                {{ $counts[$status] }}
                            </span>
                        @endif

                    </a>
                </li> {{-- Входящие --}}
                <li class="">
                    <a href="{{ route('filter_mail', $status = 'outbox') }}"
                        class="{{ $cur_stat === $status ? 'active' : '' }}">
                        <div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-send" viewBox="0 0 16 16">
                                    <path
                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg>
                            </span>
                            <span>
                                Outbox
                            </span>
                        </div>
                        @if (!empty($counts[$status]))
                            <span class="count {{ $cur_stat === $status ? 'active' : '' }}">
                                {{ $counts[$status] }}
                            </span>
                        @endif

                    </a>
                </li> {{-- Исходящие --}}
                <li class="">
                    <a href="{{ route('filter_mail', $status = 'starred') }}"
                        class="{{ $cur_stat === $status ? 'active' : '' }}">
                        <div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star" viewBox="0 0 16 16">
                                    <path
                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                </svg>
                            </span>
                            <span>
                                Starred
                            </span>
                        </div>
                        @if (!empty($counts[$status]))
                            <span class="count {{ $cur_stat === $status ? 'active' : '' }}">
                                {{ $counts[$status] }}
                            </span>
                        @endif

                    </a>
                </li> {{-- Избранные --}}
                <li class="">
                    <a href="{{ route('filter_mail', $status = 'spam') }}"
                        class="{{ $cur_stat === $status ? 'active' : '' }}">
                        <div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                    <path
                                        d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                    <path
                                        d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                </svg>
                            </span>
                            <span>
                                Spam
                            </span>
                        </div>
                        @if (!empty($counts[$status]))
                            <span class="count {{ $cur_stat === $status ? 'active' : '' }}">
                                {{ $counts[$status] }}
                            </span>
                        @endif

                    </a>
                </li> {{-- Спам --}}
                <li class="">
                    <a href="{{ route('filter_mail', $status = 'trash') }}"
                        class="{{ $cur_stat === $status ? 'active' : '' }}">
                        <div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            </span>
                            <span>
                                Trash
                            </span>
                        </div>
                        @if (!empty($counts[$status]))
                            <span class="count {{ $cur_stat === $status ? 'active' : '' }}">
                                {{ $counts[$status] }}
                            </span>
                        @endif

                    </a>
                </li> {{-- Корзина --}}
                <li class="">
                    <a href="{{ route('filter_mail', $status = 'draft') }}"
                        class="{{ $cur_stat === $status ? 'active' : '' }}">
                        <div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                            <span>
                                Draft
                            </span>
                        </div>
                        @if (!empty($counts[$status]))
                            <span class="count {{ $cur_stat === $status ? 'active' : '' }}">
                                {{ $counts[$status] }}
                            </span>
                        @endif

                    </a>
                </li> {{-- Черновики --}}
            </ul>

            <p
                style="color: #6C757D;font-size: 12.24px; font-weight: 700;
            line-height: 13.4667px; margin-top: 50px;">
                LABELS</p>
            <ul class="labels">
                <li class=""><a href="{{ route('filter_mail', $status = 'read') }}" class=""><span style="background: #39AFD1;"></span>Read</a></li> {{-- Зареганные пользователи --}}
                <li class=""><a href="{{ route('filter_mail', $status = 'unread') }}" class=""><span style="background: #FFC35A;"></span>Unread</a></li> {{-- Зареганные пользователи --}}
                <li class=""><a href="{{ route('filter_mail', $status = 'social') }}" class=""><span style="background: #0ACF97;"></span>Social</a></li> {{-- Зареганные пользователи --}}
                <li class=""><a href="{{ route('filter_mail', $status = 'promotions') }}" class=""><span style="background: #727CF5;"></span>Promotions</a></li> {{-- Зареганные пользователи --}}
                <li class=""><a href="{{ route('filter_mail', $status = 'updates') }}" class=""><span style="background: #FA5C7C;"></span>Updates</a></li> {{-- Зареганные пользователи --}}
                <li class=""><a href="{{ route('filter_mail', $status = 'forums') }}" class=""><span style="background: #6C757D;"></span>Forums</a></li> {{-- Зареганные пользователи --}}
            </ul>
        </div>
        <div class="admin_part_mail_right_part">
            <form action="{{ route('update_mails') }}" method="POST" class="admin_part_mail_btns_group">
                @csrf
                <input type="hidden" name="letters_id" value="">
                <input type="hidden" name="action" value="">
                <div class="d-flex justify-content-center group">
                    <button type="submit" class="admin_part_mail_btn" id="spam">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                            class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
                            <path
                                d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </button>
                    <button type="submit" class="admin_part_mail_btn" id="trash">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                            class="bi bi-trash2-fill" viewBox="0 0 16 16">
                            <path
                                d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                        </svg>
                    </button>
                </div>
                <div class="admin_part_mail_btn">
                    <div class="d-flex align-items-center h-100" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                            class="bi bi-folder-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                        </svg>
                    </div>
                    <ul class="dropdown-menu">
                        <span style="padding-left: 10px;">Move to:</span>
                        <li><button class="dropdown-item" type="submit" id="inbox" href="#">Inbox</button></li>
                        <li><button class="dropdown-item" type="submit" id="outbox" href="#">Outbox</button></li>
                        <li><button class="dropdown-item" type="submit" id="starred" href="#">Starred</button></li>
                        <li><button class="dropdown-item" type="submit" id="spam" href="#">Spam</button></li>
                        <li><button class="dropdown-item" type="submit" id="trash" href="#">Trash</button></li>
                        <li><button class="dropdown-item" type="submit" id="draft" href="#">Draft</button></li>
                    </ul>
                </div>
                <div class="admin_part_mail_btn dropdown">
                    <div class="d-flex align-items-center h-100" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                            class="bi bi-tags-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            <path
                                d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z" />
                        </svg>
                    </div>
                    <ul class="dropdown-menu">
                        <span style="padding-left: 10px;">Label as:</span>
                        <li><button class="dropdown-item" type="submit" id="read" href="#">Read</button></li>
                        <li><button class="dropdown-item" type="submit" id="unread" href="#">Unread</button></li>
                        <li><button class="dropdown-item" type="submit" id="social" href="#">Social</button></li>
                        <li><button class="dropdown-item" type="submit" id="promotions" href="#">Promotions</button></li>
                        <li><button class="dropdown-item" type="submit" id="updates" href="#">Updates</button></li>
                        <li><button class="dropdown-item" type="submit" id="forums" href="#">Forums</button></li>
                    </ul>
                </div>
                {{-- <div class="admin_part_mail_btn">
                    <div class="" data-bs-toggle="dropdown" aria-expanded="false">More</div>
                    <ul class="dropdown-menu">
                        <span style="padding-left: 10px;">More Options:</span>
                        <li><a class="dropdown-item" href="#">Mask as Unread</a></li>
                        <li><a class="dropdown-item" href="#">Add to Tasks</a></li>
                        <li><a class="dropdown-item" href="#">Mute</a></li>
                    </ul>
                </div> --}}
            </form>
            @yield('mail_container')
        </div>
    </div>
    {{-- Compose Modal --}}
    <div class="modal fade admin_part_modal_table_settings" id="compose_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="compose_modal-header" style="border: none; background: #727CF5;">
                    <span class="compose_modal-title fs-5" id="staticBackdropLabel">New Message</span>
                </div>
                <form action="{{ route('create_mail') }}" method="POST" class="compose_modal-form">
                    @csrf
                    {{-- <input type="hidden" name="_token" value="z3IvPWZNunWAs3yhfE4KmuXEDw3EXl3M9TUor7wF"> --}}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">To</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Example@email.com" name="to">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Your subject" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message">Write something..</textarea>
                        </div>
                    </div>
                    <div class="admin_part_modal-footer" style="justify-content: start; gap: 8px;">
                        <button type="submit" class="compose_modal-send-btn" style="margin: 0px;">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path
                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg>
                            </span>
                            <span class="ms-2">Send Message</span>
                        </button>
                        <button type="submit" class="compose_modal-cancel-btn" style="margin: 0px;">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/update_mail_massive.js"></script>
@endsection


{{--  --}}
