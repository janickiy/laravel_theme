<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Cover Template · Bootstrap v5.3</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    {!! Html::style('/assets/dist/css/bootstrap.min.css') !!}

    <!-- Custom styles for this template -->

    {!! Html::style('/assets/cover.css') !!}

    @yield('css')

</head>
<body class="d-flex h-100 text-center text-bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">Cover</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link fw-bold py-1 px-0 {{ Request::is('/') ? ' active' : '' }}" aria-current="page" href="{{ route('index') }}">Главная</a>
                <a class="nav-link fw-bold py-1 px-0 {{ Request::is('contact') ? ' active' : '' }}" href="{{ route('contact') }}">Контакты</a>
            </nav>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="pull-right form-group">
                        <select id="template" class="selectpicker">
                            <option value="class" {{ Cookie::get('template') == 'class' ? 'selected="selected"':'' }}>Class</option>
                            <option value="cuba" {{ Cookie::get('template') == 'cuba' ? 'selected="selected"':'' }}>Cuba</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <main class="px-3">
        @yield('content')
    </main>

    <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
    </footer>
</div>

{!! Html::script('/assets/js/jquery.min.js') !!}

{!! Html::script('/assets/js/bootstrap.min.js') !!}

@yield('js')

<script>

    $(document).ready(function () {
        $('#template').on('change', function () {
            let Template = $(this).val();

            let request = $.ajax({
                url: '{{ route('change-theme') }}',
                method: "POST",
                data: {
                    template: Template,
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: "json"
            });

            request.done(function (data) {
                if (data.result != null && data.result === true) {
                  //  location.reload();
                }
            });
        });
    });

</script>

</body>
</html>

