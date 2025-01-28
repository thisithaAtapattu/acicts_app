<!DOCTYPE html>
<html class="default-bg">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ministry of Education | Student Login</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /><!-- My Css File -->
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bulma.css') }}">


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
            /*/To center vertically*/
            display: table-cell;
            vertical-align: middle;
        }

        .modal-content {
            /*Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it*/
            width: inherit;
            height: inherit;
            /*To center horizontally*/

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


                    <div class="col-12 col-md-6 col-lg-4 mt-5 offset-md-3 offset-lg-4 px-sm-5 px-lg-0 ">



                        <div class="row  mt-5">





                            <div class="card ">
                                <div class="card-content text-center">



                                    <img src="{{ asset('img/education-illustration.svg') }}" class="col-7">
                                    <h1 class="title mt-2">TEACHER LOGIN</h1>



                                    <div class="row  text-start">


                                        @error('email')
                                            <p class="text-danger  fw-bold fs-6 ">{{ $message }}</p>
                                        @enderror

                                        @error('password')
                                            <p class="text-danger  fw-bold fs-6 ">{{ $message }}</p>
                                        @enderror

                                        @error('not_found')
                                            <p class="text-danger  fw-bold fs-6 ">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <form class="content col-12  mt-3" action="{{ asset('teachers/authenticate') }}"
                                        method="POST">
                                        @csrf
                                        <div class="field">
                                            <p class="control has-icons-left has-icons-right">
                                                <input class="input" type="email" placeholder="Email Address"
                                                    name="email" value="{{ old('email') }}" />
                                                <span class="icon is-small is-left">
                                                    <i class="bi bi-at"></i> </span>

                                            </p>
                                        </div>

                                        <div class="row">

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="field">
                                                        <p class="control has-icons-left">
                                                            <input class="input" type="password" placeholder="Password"
                                                                name="password" value="{{ old('password') }}" />
                                                            <span class="icon is-small is-left">
                                                                <i class="bi bi-lock-fill"></i>
                                                            </span>
                                                        </p>


                                                    </div>
                                                </div>


                                            </div>





                                            {{-- <div class="col-12">
                                            <div class="row">

                                                <div class="remember-me-cont col-6 d-inline">
                                                    <div class="form-check">


                                                        <input class="form-check-input " type="checkbox" value=""
                                                            id="remember" />

                                                        <label class="form-check-label  me-5 col-12" for="remember">
                                                            Remember me &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        </label>

                                                    </div>

                                                </div>

                                            </div>


                                        </div> --}}




                                            <div class="col-12 mt-5">




                                                <button class="button is-danger d-grid col-12 fw-bold"
                                                    type="submit">Log
                                                    in</button>

                                            </div>

                                    </form>


                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" style="z-index: 10000;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pay Enrollment Fee of $1.39</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-danger fw-bold" id="payment_message_viewer">You're using the 1 month
                                        free trial version. Make a payment to keep your account activated throughout
                                        your new grade.</p>

                                    <div id="paypal-button-container" class="mt-5">




                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="studentLogInFinal();"
                                        id="log_continue">Continue Login</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </div>










        </div>


    </div>

    <script
        src="https://www.paypal.com/sdk/js?client-id=AWSzsonWWyjl0I0oGYFkaXn_Pb7hTOEbVHtdlRqD2kldNYIaUUX6jina6wJNioo2dmQtOdCm-bCii6h7&currency=USD">
    </script>

    <!-- My Javascript file -->
    <script src="script.js"></script>
    <!-- Sweetalreat Javascript File -->
    <script src="sweetalert.min.js"></script>
    <script src="bootstrap.bundle.js"></script>







</body>









</html>
