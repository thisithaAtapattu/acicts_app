@php
    $school = Session::get('school');
@endphp


<x-teacher-dashboard-header page="" />



<!-- Update profile section -->
<!-- Update profile section -->

<div class="col-md-6 ">


    <div class="row edu-background-dashboard ms-2">




    </div>

    <div class=" row">




        <div class="offset-md-2 ">

            <div class="row">

                <h1 class="fs-1 fw-bold has-text-info text-center">Add students to {{ $extracurricular->activity->name }}
                </h1>

            </div>




            <form class="row mt-5 ms-md-3"
                action="{{ asset('/extracurriculars/' . $extracurricular->id . '/extracurricularstudents') }}"
                method="POST">
                @csrf


                @error('batch_error')
                    <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                @enderror

                <div class="col-12">



                    <div class="mb-3">


                        <input class="input is-info  d-grid" type="text" name="admission_no"
                            value="{{ old('admission_no') }}" placeholder="Admission No">


                        <div class="row ">

                            @error('admission_no')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>









                </div>









                <div class="col-12">

                    <button class="button is-info mt-5 d-grid col-12">Add Student</button>


                </div>

            </form>








        </div>








    </div>






</div>





<div class="col-12 mt-3">
    <div class="row overflow-scroll">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Admission No</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">View Achivement Details</th>


                </tr>
            </thead>
            <tbody id="teacher_loading_area">

                @php
                    $count = 1;
                @endphp

                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $count++ }}</td>
                        <td>{{ $student->student->first_name . ' ' . $student->student->last_name }}</td>
                        <td>{{ $student->student->admission_no }}</td>
                        <td>{{ $student->student->dob }}</td>
                        <td><a class="button is-danger"
                                href="{{ asset('teachers/students/'.$student->studentId.'/achievements/create') }}">View</a>
                        </td>

                    </tr>
                @endforeach



            </tbody>
        </table>

        {{-- {{ $classes->links() }} --}}



    </div>




</div>





</div>








<!-- Update profile section -->





</div>


</div>




</div>








</div>






<x-teacher-dashboard-footer />
