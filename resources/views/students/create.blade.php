@php
    $school = Session::get('school');
@endphp



<x-school-dashboard-header page="sm" />



<!-- Update profile section -->
<!-- Update profile section -->

<div class="col-md-6 ">


    <div class="row edu-background-dashboard ms-2">




    </div>

    <div class=" row">




        <div class="offset-md-2 ">

            <div class="row">

                <h1 class="fs-1 fw-bold has-text-info text-center">Add New Student</h1>
                <img src="Ellipsis-6.3s-200px (1).svg" id="send_verification_loader" style="height:60px;" class="d-none"
                    id="teachers_loader" />

            </div>



            <form class="row mt-5 ms-md-3" action="{{ asset('/students') }}" method="POST">
                @csrf





                <div class="col-6 ">




                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>

                        <input class="input is-info " type="text" placeholder="First Name" name="first_name"
                            id="first_name" value="{{ old('first_name') }}">

                        <div class="row ">

                            @error('first_name')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>







                </div>

                <div class="col-6 ">

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>


                        <input class="input is-info " type="text" placeholder="Last Name" name="last_name"
                            id="last_name" value="{{ old('last_name') }}">

                        <div class="row ">

                            @error('last_name')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>











                </div>



                <div class="col-12">



                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>


                        <input class="input is-info  d-grid" type="date" placeholder="Date of Birth"
                            name="date_of_birth" value="{{ old('date_of_birth') }}">


                        <div class="row ">

                            @error('date_of_birth')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>









                </div>


                <div class="col-6">



                    <div class="mb-3">
                        <label for="admission_date" class="form-label">Entered Date</label>


                        <input class="input is-info d-grid col-12" type="date" placeholder="Entered Date"
                            name="entered_date" value="{{ old('entered_date') }}">

                        <div class="row ">

                            @error('entered_date')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>






                </div>

                <div class="col-6">



                    <label for="admission_date" class="form-label">Admission No</label>


                    <input class="input is-info d-grid" type="text" placeholder="Admission No" name="admission_no"
                        value="{{ old('admission_no') }}">


                    <div class="row ">

                        @error('admission_no')
                            <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                        @enderror

                    </div>



                </div>









                {{-- <div class="col-12 overflow-scroll">



                <div class="select is-info mt-5 d-grid">
                    <select name="school_class">
                        <option value="">Select Class</option>
                        @foreach ($schoolClasses as $schoolClass)
                            <option value="{{ $schoolClass->id }}"
                                {{ old('school_class') == $schoolClass->id ? 'selected' : '' }}>
                                {{ $schoolClass->grade . ' ' . $schoolClass->name }}
                            </option>
                        @endforeach


                    </select>
                </div>



                <div class="row ">

                    @error('school_class')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror

                </div>







            </div> --}}





                <div class="col-12">

                    <button class="button is-info mt-5 d-grid col-12" onclick="addNewTeacher();">Add New
                        Student</button>


                </div>

            </form>








        </div>








    </div>








</div>

<!-- Teachers section -->

<div class="col-md-4 mt-5  ">

    <form class="row px-3 " method="GET" action="{{ asset('schools/student-management') }}">



        <div class="col-8">
            <div class="row">
                <input type="text" class="form-control col-8 d-in" placeholder="Search..." name="value"
                    value="{{ request('value') == null ? '' : request('value') }}" />
            </div>

        </div>


        <div class=" col-4  ">
            <div class="row ms-1">
                <button class="btn btn-success col-12"><i class="bi bi-search"></i></button>

            </div>

        </div>

    </form>

</div>



<div class="col-12 mt-3">
    <div class="row overflow-scroll">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>

                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>

                    <th scope="col">Entered Date</th>
                    <th scope="col">Admission No</th>
                    <th scope="col">Update</th>


                </tr>
            </thead>
            <tbody id="teacher_loading_area">

                @php
                    $count = 1;
                @endphp

                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>

                        <form class="row mt-5 ms-md-3" action="{{ asset('/students/' . $student->id) }}"
                            method="POST"  onsubmit="event.preventDefault();" id="form_se_{{ $student->id }}">
                            @csrf
                            @method('PUT')



                            <td>


                                <input class="input is-warning " type="text" placeholder="First Name"
                                     value="{{ old('first_name')==null ? $student->first_name : old('first_name')}}" name="first_name">
                            </td>
                            <td><input class="input is-warning " type="text" placeholder="Last Name"
                                   value="{{old('last_name')==null ? $student->last_name : old('last_name')}}" name="last_name"></td>
                            <td><input class="input is-warning " type="date" 
                                    value="{{old('date_of_birth')==null ? $student->dob : old('date_of_birth')}}" name="date_of_birth"></td>
                            <td><input class="input is-warning " type="date" 
                                   value="{{ old('entered_date')==null ? $student->entered_date : old('entered_date')}}" name="entered_date"></td>
                            <td><input class="input is-warning " type="text" placeholder="Admission No"
                                    value="{{ old('admission_no')==null ? $student->admission_no : old('admission_no')}}" name="admission_no"></td>




                                    <td><button class="button is-warning" data-bs-toggle="modal"
                                        onclick=" confirmation('form_se_{{ $student->id }}','Are you sure that you want to update the details this student?');">Update</button></td>

                    </tr>
                @endforeach
            </tbody>
        </table>




    </div>




</div>













<!-- Update profile section -->





</div>


</div>




</div>







</div>




<x-school-dashboard-footer/>