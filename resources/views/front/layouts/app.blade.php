<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="ZimboDelights is a premier food destination for the zimbos in diaspora.">
  <meta name="keywords" content="ZimboDelights is a premier food destination for the zimbos in diaspora.">
  <meta name="author" content="ZimboDelights">
  <link rel="icon" href="{{ asset('static/svg/app.svg') }}" type="image/x-icon" />
  <title>Grocery from Home - ZimboDelights</title>
  <link rel="icon" href="{{ asset('static/svg/app.svg') }}" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{ asset('static/svg/app.svg') }}">
  <meta name="theme-color" content="#ff4c3b" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="ZimboDelights">
  <meta name="msapplication-TileImage" content="{{ asset('static/svg/app.svg') }}">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!--Google font-->
  <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> -->

  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{ asset('static/css/vendors/bootstrap.css') }}">

  <!-- slick css -->
  <link rel="stylesheet" href="{{ asset('static/css/vendors/slick-theme.css') }}">
  <link rel="stylesheet" href="{{ asset('static/css/vendors/slick.css') }}">

  <!-- iconly css -->
  <link rel="stylesheet" href="{{ asset('static/css/vendors/iconly.css') }}">

  <!-- Theme css -->
  <link rel="stylesheet" href="{{ asset('static/css/style.css') }}">
</head>

<body>
  @if(request()->routeIs('home'))
  <!-- loader strat -->
  <div class="loader">
      <span></span>
      <span></span>
  </div>
  <!-- loader end -->
  @endif
    @yield('content')

    <!-- latest jquery-->
    <script src="{{ asset('static/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('static/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Slick js-->
    <script src="{{ asset('static/js/slick.js') }}"></script>

    <!-- Slick js-->
    <script src="{{ asset('static/js/homescreen-popup.js') }}"></script>



    <!-- offcanvas modal js -->
    <script src="{{ asset('static/js/offcanvas-popup.js') }}"></script>

    <!-- script js -->
    <script src="{{ asset('static/js/script.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script type="text/javascript">

            $(".update-cart").click(function (e) {
               e.preventDefault();

               var ele = $(this);

                $.ajax({
                   url: '{{ url('update-cart') }}',
                   method: "patch",
                   data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("div").find(".quantityf").val()},
                   success: function (response) {
                       window.location.reload();
                   }
                });
            });

            $(".remove-from-cart").click(function (e) {
                e.preventDefault();

                var ele = $(this);

                if(confirm("Are you sure")) {
                    $.ajax({
                        url: '{{ url('remove-from-cart') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });

        </script>

  </body>

  </html>
