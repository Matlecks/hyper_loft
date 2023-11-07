<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="/css/admin_part.css" rel="stylesheet">


    {{-- Шрифты --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800&display=swap"
        rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>HYPER</title>
    {{-- Добавляет css в зависимости от страницы, на которой находишься --}}
    <link rel="stylesheet" href="/assets/css/common.css">

    @php
        $currentUrl = $_SERVER['REQUEST_URI'];
        $urlParts = explode('/', $currentUrl);
        if (isset($urlParts[2])) {
            $page = $urlParts[2];
            echo '<link rel="stylesheet" href="/assets/css/pages/' . $page . '/' . $page . '.css">';
        }
    @endphp
</head>

<body style="margin: 0px">
    <div class="d-flex" style="height: fit-content;">
        <div class="left_menu_navigation">
            <div class="admin_part_logo_container">
                <img src="/storage/logo.png" class="admin_part_logo">
            </div>
            @include('admin_part.menu')
        </div>
        <div class="work_area_container">
            @include('admin_part.header')
            @include('admin_part.title_breadcrumps')
            @include('admin_part.body')
            {{-- @include("admin_part.info_container") --}}
        </div>
    </div>
    <script src="/js/table_sort.js"></script>
    <script src="/js/table_settings_modal.js"></script>
    <script src="/js/add_edit_page.js"></script>
    {{-- Добавляет js в зависимости от страницы, на которой находишься --}}
    @php
        if (isset($urlParts[2])) {
            $page = $urlParts[2];
            echo '<script src="/assets/js/pages/' . $page . '/' . $page . '.js"></script>';
        }
    @endphp
</body>

</html>
