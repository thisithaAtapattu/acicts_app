<!DOCTYPE html>
<html class="default-bg">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ministry of Education | Student Login</title>
    <link rel="icon" href="{{ asset('img/1200px-Emblem_of_Sri_Lanka.svg.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

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
                                <div class="card-content text-center">  {{-- Divider --}}

                                    <div class="col-12 mt-sm-2 text-start">
                                        <a class="button is-danger fw-bold" href="{{ asset('schools/login') }}">School
                                            Log In</a>

                                    </div>


                                    <h1 class="title mt-2">SCHOOL REGISTRATION</h1>

                                    @error('address')
                                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                                    @enderror

                                    <div class="content col-12  mt-3">
                                        <form class="row" action="{{ asset('schools') }}" method="POST">
                                            @csrf

                                            <div class="col-md-12 mt-4 ">

                                                <div class="row  ">
                                                    <div class="field  ">
                                                        <p class="control has-icons-left has-icons-right">
                                                            <input class="input" type="text"
                                                                placeholder="School Name" name="name"
                                                                value="{{ old('name') }}" />
                                                            <span class="icon is-small is-left">
                                                                <i class="bi bi-fonts"></i>
                                                            </span>

                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row  text-start">

                                                    @error('name')
                                                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                                                    @enderror

                                                </div>

                                            </div>



                                            <div class="col-md-6  mt-4 ">

                                                <div class="row">

                                                    <div class="field  ">
                                                        <p class="control has-icons-left has-icons-right">
                                                            <input class="input" type="text"
                                                                placeholder="School Contact No" name="contact_no"
                                                                value="{{ old('contact_no') }}" />
                                                            <span class="icon is-small is-left">
                                                                <i class="bi bi-telephone"></i> </span>

                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row  text-start">

                                                    @error('contact_no')
                                                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                                                    @enderror



                                                </div>

                                            </div>


                                            <div class=" col-md-6   mt-4 ">

                                                <div class="row">

                                                    <div class="field  ">
                                                        <p class="control has-icons-left has-icons-right">
                                                            <input class="input" type="email"
                                                                placeholder="School Email Address" name="email"
                                                                value="{{ old('email') }}" />
                                                            <span class="icon is-small is-left">
                                                                <i class="bi bi-at"></i> </span>

                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row  text-start">

                                                    @error('email')
                                                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                                                    @enderror

                                                </div>

                                            </div>


                                            <div class="col-md-6 mt-4">

                                                <div class="row ">
                                                    <div class="field  ">
                                                        <p class="control has-icons-left has-icons-right">
                                                            <input class="input" type="text"
                                                                placeholder="Postal Address line 1"
                                                                name="postal_address_line_1"
                                                                value="{{ old('postal_address_line_1') }}" />
                                                            <span class="icon is-small is-left">
                                                                <i class="bi bi-envelope"></i> </span>

                                                        </p>
                                                    </div>
                                                </div>


                                                <div class="row  text-start">

                                                    @error('postal_address_line_1')
                                                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                                                    @enderror



                                                </div>
                                            </div>


                                            <div class="col-md-6 mt-4">

                                                <div class="row">

                                                    <div class="field  ">
                                                        <p class="control has-icons-left has-icons-right">
                                                            <input class="input" type="text"
                                                                placeholder="Postal Address line 2"
                                                                name="postal_address_line_2"
                                                                value="{{ old('postal_address_line_2') }}" />
                                                            <span class="icon is-small is-left">
                                                                <i class="bi bi-envelope"></i> </span>

                                                        </p>
                                                    </div>
                                                </div>


                                                <div class="row  text-start">


                                                    @error('postal_address_line_2')
                                                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                                                    @enderror



                                                </div>
                                            </div>

                                            <div class=" col-md-12 mt-4">



                                                <div class="select col-12">


                                                    <select class="col-12" name="district">
                                                        <option value="">Select School District</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}" {{ old('district') == $district->id ? 'selected' : '' }}>
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="row  text-start">
                                                    @error('district')
                                                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                                                    @enderror





                                                </div>


                                            </div>



                                            <div class=" mt-4">
                                                <div class="row ">

                                                    <div class="field">
                                                        <p class="control has-icons-left">
                                                            <input class="input" type="password"
                                                                placeholder="Password" name="password"
                                                                value="{{ old('password') }}" />
                                                            <span class="icon is-small is-left">
                                                                <i class="bi bi-lock"></i>
                                                            </span>
                                                        </p>


                                                    </div>
                                                </div>



                                                <div class="row  text-start">

                                                    @error('password')
                                                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-5 offset-md-4">


                                                <div class="row mt-5 ">
                                                    <div class="col-12 ms-md-1">

                                                        <div class="row">

                                                            <button class="button is-link d-grid col-12 fw-bold "
                                                                onclick="logInStudent();">Register</button>

                                                        </div>
                                                    </div>

                                                </div>



                                            </div>

                                        </form>








                                    </div>
                                          

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
