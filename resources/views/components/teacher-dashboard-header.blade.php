@props(['page'])
@php
    $teacher = Session::get('teacher');
@endphp

<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ministry of Education</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('img/favicons/site.webmanifest')}}">


    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /><!-- My Css File -->
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="{{ asset('css/bulma.css') }}" />

    <style>
        <x-dashboard-css/>
    </style>


</head>

<body>



    <div class="container-fluid ">



        <div class="row">

            <div class="col-12">




                <div class="row">

                    <div class="col-md-4 pb-5" style="background-color: hsl(0, 0%, 96%)	;">

                        <!-- Profile section with logout -->

                        <div class="row ">









                            <div class="col-12 d-flex flex-column align-items-center mt-2">





                                <div class="row ">

                                    <!-- Shows the default profile picture -->
                                    <img src="{{ asset('img/628298_anonym_avatar_default_head_person_icon.svg') }}"
                                        class=" rounded-circle" id="img_pro_prev" style="width: 150px;height: 130px;" />


                                </div>




                            </div>













                            <div class="col-6 offset-3 mt-2">

                                <div class="row">

                                    <input type="file" id="profile_pic" class="d-none" />



                                    {{-- <label class="button is-info d-grid" for="profile_pic"
                        onclick="previewProfileTeacher();" id="profile_pic_selector_button">Upload
                        Profile Picture</label> --}}









                                </div>


                            </div>






                        </div>



                        <div class="row">


                            <div class="col-12 text-center">


                                <div class="row">

                                    <p class=" fw-bold" id="name_viewer">
                                        {{ $teacher->first_name . ' ' . $teacher->last_name }}</p>




                                    <div>

                                        <h6 class=" fw-bold has-text-link	" style="font-size:10px;">TEACHER</h6>


                                    </div>







                                </div>




                            </div>


                            <div class="col-12">

                                <div class="row">

                                    <div class="col-5 offset-4 mt-1">


                                        <form class="row" action="{{ asset('/teachers/logout') }}" method="POST">

                                            @csrf

                                            <button class="btn btn-danger col-10">Log
                                                out</button>

                                        </form>



                                    </div>





                                </div>



                            </div>





                        </div>

                        <!-- Profile section with logout -->


                        <hr class="col-12 bg-dark" />

                        <!-- Navigation section -->

                        <div class="row px-5">











                            <a class="col-12  set-border-dash pt-2 pb-2 mt-1"
                                href="{{ asset('teachers/class-management') }}">


                                <div class="row">

                                    <p
                                        class=" fw-bold {{ $page == 'cm' ? 'has-text-info' : 'has-text-grey-lighter' }}">
                                        <i class="bi bi-list-ol"></i> Class Management
                                    </p>












                                </div>




                            </a>


                            <a class="col-12  set-border-dash pt-2 pb-2 mt-1"
                                href="{{ asset('teachers/extracurricular-management') }}">


                                <div class="row">

                                    <p
                                        class=" fw-bold {{ $page == 'em' ? 'has-text-info' : 'has-text-grey-lighter' }}">
                                        <i class="bi bi-bicycle"></i> Extracurricular Management
                                    </p>












                                </div>




                            </a>










                        </div>

                        <!-- Navigation section -->




                    </div>
