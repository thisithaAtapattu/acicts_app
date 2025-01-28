<!DOCTYPE html>
<html class="default-bg">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ministry of Education | Student Login</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('img/favicons/site.webmanifest')}}">    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /><!-- My Css File -->
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bulma.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />


    <style>
        #PopupModel {
            width: 60%;
        }

        .modal {}

        .vertical-alignment-helper {
            display: table;
            height: 100%;
            width: 100%;
        }

        .vertical-align-center {
            display: table-cell;
            vertical-align: middle;
        }

        .modal-content {
            width: inherit;
            height: inherit;

        }

        @media (max-width: 357px) {

            .remember-me-cont {
                width: 100%;
            }
        }

        @media (max-width: 357px) {

            .remember-me-cont {
                /* width: 100%; */
            }
        }
    </style>


</head>

<body>



    <div class="container-fluid default-bg">

        <div class="row">



            <div class="col-12">


                <div class="row">


                    <div class="col-12 col-md-6 col-lg-6 mt-5 offset-md-3 offset-lg-3 px-sm-5 px-lg-0 ">



                        <div class="row  mt-5">



                            <!-- Login Card Start -->

                            <div class="card ">
                                <div class="card-content text-center"> {{-- Divider --}}

                                    {{ $slot }}




                                </div>{{-- Divider --}}


                            </div>

                            <!-- Login Card End -->
                        </div>

                    </div>





                </div>



            </div>










        </div>


    </div>



    <!-- My Javascript file -->
    <script src="script.js"></script>
    <!-- Sweetalreat Javascript File -->
    <script src="sweetalert.min.js"></script>
    <script src="bootstrap.bundle.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

    <x-message />



</body>









</html>
