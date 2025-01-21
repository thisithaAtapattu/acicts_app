@php
    $school = Session::get('school');
@endphp


<x-school-dashboard-header page="up" />



<!-- Update profile section -->

<div class="col-md-6 ">


    <div class="row edu-background-dashboard ms-2">




    </div>

    <div class=" row">




        <div class="offset-md-2 ">

            <div class="row">

                <h1 class="fs-1 fw-bold has-text-info text-center">Update Profile</h1>


            </div>



            <!-- All the details are taken through the session -->

            <div class="row mt-5 ms-md-3">



                <div class="col-12 ">



                    <input class="input is-info mt-5" type="text" placeholder="Name" value="{{ $school->name }}"
                        id="first_name_update">







                </div>



                <div class="col-12">





                    <input class="input is-info mt-5 d-grid" type="text" placeholder="Email" value=""
                        id="email_update">




                </div>


                <div class="col-12">





                    <input class="input is-info mt-5 d-grid" type="text" placeholder="Username" value=""
                        id="username_update">




                </div>



                <div class="col-12">




                    <input class="input is-info mt-5 d-grid" type="text" placeholder="Subject Area" value=""
                        disabled="">




                </div>




                <!-- <div class="col-12">



                                        <input class="input is-info mt-5 d-grid" type="text" placeholder="Grade" value="" disabled>




                                    </div> -->

                <div class="col-12">

                    <button class="button is-info mt-5 d-grid col-12" onclick="update_profile_teacher();">Update
                        Profile</button>


                </div>

            </div>








        </div>








    </div>








</div>




<!-- Update profile section -->





</div>


</div>




</div>








</div>






<x-school-dashboard-footer/>