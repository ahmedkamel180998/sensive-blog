<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sensive Blog - @yield('title')</title>
    <link rel="icon" href="{{ asset('assets') }}/img/Favicon.png" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/linericon/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <style>
        .container {
            max-width: 1400px !important;
            /* or your desired width */
            width: 95% !important;
            margin-left: auto !important;
            margin-right: auto !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        .container {
            max-width: 1400px !important;
            /* Increase from Bootstrap's default 1140px */
        }

        /* Or modify different breakpoints */
        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1400px;
                /* Modified from 1140px */
            }
        }
    </style>
</head>
