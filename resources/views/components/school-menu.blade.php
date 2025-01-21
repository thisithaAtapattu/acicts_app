@php
    $school = Session::get('school');
@endphp
@props(["page"])
<div class="row ">









    <div class="col-12 d-flex flex-column align-items-center mt-2">





        <div class="row ">

            <!-- Shows the default profile picture -->
            <img src="{{ asset('img/schools/6771575_building_education_school_university_icon.svg') }}"
                class=" " id="img_pro_prev" style="width: 150px;height: 130px;" />


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

            <p class=" fw-bold" id="name_viewer">{{ $school->name }}</p>




            <div>

                <h6 class=" fw-bold has-text-link	" style="font-size:10px;">SCHOOL</h6>


            </div>







        </div>




    </div>


    <div class="col-12">

        <div class="row">

            <div class="col-5 offset-4 mt-1">


                <form class="row" action="{{ asset('/schools/logout') }}" method="POST">

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


    <a class="col-12 set-border-dash pt-2 pb-2" href="{{ asset('schools/dashboard') }}">


        <div class="row">

            <p
                class=" fw-bold  {{ $page == 'up' ? 'has-text-info' : 'has-text-grey-lighter' }}">
                <i class="bi bi-person-circle"></i> Update Profile
            </p>












        </div>




    </a>



    <a class="col-12  set-border-dash pt-2 pb-2 mt-1"
        href="{{ asset('schools/teacher-management') }}">


        <div class="row">

            <p
                class=" fw-bold {{ $page == 'tm' ? 'has-text-info' : 'has-text-grey-lighter' }}">
                <i class="bi bi-person-workspace"></i> Teacher
                Management
            </p>












        </div>




    </a>




    <a class="col-12  set-border-dash pt-2 pb-2 mt-1"
        href="{{ asset('schools/class-management') }}">


        <div class="row">

            <p
                class=" fw-bold {{ $page == 'cm' ? 'has-text-info' : 'has-text-grey-lighter' }}">
                <i class="bi bi-list-ol"></i> Class Management
            </p>












        </div>




    </a>

    <a class="col-12  set-border-dash pt-2 pb-2 mt-1"
        href="{{ asset('schools/extracurricular-management') }}">


        <div class="row">

            <p
                class=" fw-bold {{ $page == 'em' ? 'has-text-info' : 'has-text-grey-lighter' }}">
                <i class="bi bi-bicycle"></i> Extracurricular Management
            </p>












        </div>




    </a>



    <div class="col-12  set-border-dash pt-2 pb-2 mt-1" onclick="goToAddLessonNotes();">


        <div class="row">

            <p
                class=" fw-bold {{ $page == 'aln' ? 'has-text-info' : 'has-text-grey-lighter' }}">
                <i class="bi bi-book"></i></i> Add Lesson
                Notes
            </p>












        </div>




    </div>






    <div class="col-12  set-border-dash pt-2 pb-2 mt-1" onclick="goToAddAssignments();">


        <div class="row">

            <p
                class=" fw-bold {{ $page == 'aa' ? 'has-text-info' : 'has-text-grey-lighter' }}">
                <i class="bi bi-newspaper"></i> Add
                Assignments
            </p>












        </div>




    </div>









</div>