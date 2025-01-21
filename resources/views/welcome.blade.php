<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ministry of Education</title>
    <link rel="icon" href="img/1200px-Emblem_of_Sri_Lanka.svg.png">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /><!-- My Css File -->
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">

    <style>
        .gov-logo {
            height: 80px;
            background-image: url("http://localhost:8000/img/1200px-Emblem_of_Sri_Lanka.svg.png");
            background-repeat: no-repeat;
            background-size: contain;
        }

        .edu-background {
            height: 400px;
            background-image: url("http://localhost:8000/img/education-illustration.svg");
            background-repeat: no-repeat;
            background-size: contain;
        }

        @media (min-width: 768px) {
            .edu-background {
                height: 500px;
            }
        }
    </style>


</head>

<body>



    <div class="container-fluid ">

        <div class="row">

            <!-- Logo & Image Start -->

            <div class="col-md-6">

                <!-- Government Logo Start -->


                <div class="row">

                    <div class="col-md-5">


                        <div class="row mt-5">



                            <div class="col-2 col-sm-1 col-md-3 offset-5 offset-md-3 gov-logo ">








                            </div>







                        </div>





                    </div>









                </div>


                <!-- Government Logo End -->



                <!-- Image Start -->



                <div class="row">

                    <div class="col-md-12">


                        <div class="row mt-5 ps-2 pe-2 ps-md-2 pe-md-2">



                            <div class="offset-md-1 ms-sm-5 edu-background ">




                            </div>







                        </div>





                    </div>









                </div>

                <!-- Image End -->




            </div>

            <!-- Logo & Image End -->


            <!-- Actor Selector Start -->


            <div class="col-md-5 bg-dark offset-md-1  pt-5">





                <div class="row mt-5 offset-2">

                    <div class="col-12  fs-1">


                        <a class="link_hov text-white" href="{{ asset('schools/login') }}" target="_blank"><i
                                class="bi bi-eye text-danger"></i>&nbsp;School</a>


                    </div>


                    <div class="col-12  fs-1 mt-5">


                        <a class="link_hov text-white" target="_blank" href="{{ asset('teachers/login') }}"><i
                                class="bi bi-eye text-danger"></i>&nbsp;Teacher</a>


                    </div>







                </div>



            </div>

            <!-- Actor Selector End -->



        </div>



    </div>




</body>









</html>
