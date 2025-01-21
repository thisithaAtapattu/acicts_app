@php
    $school = Session::get('school');
@endphp


<x-school-dashboard-header page="cm" />



<!-- Update profile section -->
<!-- Update profile section -->

<div class="col-md-6 ">


    <div class="row edu-background-dashboard ms-2">




    </div>

    <div class=" row">




        <div class="offset-md-2 ">

            <div class="row">

                <h1 class="fs-1 fw-bold has-text-info text-center">Add New Class</h1>




            </div>



            <form class="row mt-5 ms-md-3" action="{{ asset('/classes') }}" method="POST">

                @csrf

                <dic class="row">


                </dic>

                @error('class_error')
                    <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                @enderror


                <div class="col-6 mt-5">






                    <div class="select is-info  col-12">


                        <select class="col-12" name="grade">
                            <option value="">Select Grade</option>
                            @for ($count = 1; $count <= 13; $count++)
                                <option value="{{ $count }}" {{ old('grade') == $count ? 'selected' : '' }}>
                                    {{ $count }}
                                </option>
                            @endfor
                        </select>
                    </div>



                    @error('grade')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror









                </div>

                <div class="col-6 mt-5">





                    <input class="input is-info " type="text" placeholder="Name" name="name"
                        value="{{ old('name') }}">



                    @error('name')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror



                </div>

                <div class="col-12 mt-5">






                    <div class="select is-info  col-12">


                        <select class="col-12" name="teacher_id">
                            <option value="">Select Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->nic_no . ' - ' . $teacher->first_name . ' ' . $teacher->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    @error('teacher_id')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror









                </div>






                <div class="col-12">

                    <button class="button is-info mt-5 d-grid col-12" onclick="addNewTeacher();">Add
                        Class</button>


                </div>

            </form>








        </div>








    </div>








</div>

<!-- Teachers section -->

<div class="col-md-4 mt-5  ">

    <form class="row px-3 " method="GET" action="{{ asset('schools/class-management') }}">



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



</div>


<div class="col-12 mt-3">
    <div class="row overflow-scroll">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Class Grade</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Class Teacher</th>


                </tr>
            </thead>
            <tbody id="teacher_loading_area">

                @php
                    $count = 1;
                @endphp

                @foreach ($classes as $class)
                    <tr>
                        <th scope="row">{{ $count++ }}</td>
                        <td>{{ $class->grade }}</td>
                        <td>{{ $class->name }}</td>

                        <td>

                            <form action="{{ asset('classes/' . $class->classId) }}" method="POST"
                                id="form_te_{{ $class->classId }}" onsubmit="event.preventDefault();">
                                @method('PUT')
                                @csrf


                                <div class="select is-info  col-6">

                                    <select class="col-12" name="teacher_id"
                                        onchange="confirmFormWithSelctor('form_te_{{ $class->classId }}','Are you sure that you want to change the teacher of this class?',this);">
                                        <option value="">Select Teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ $class->teacher->id == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->nic_no . ' - ' . $teacher->first_name . ' ' . $teacher->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>

                        </td>

                    </tr>
                @endforeach



            </tbody>
        </table>

        {{-- {{ $classes->links() }} --}}



    </div>




</div>







<!-- Update profile section -->





</div>


</div>




</div>








</div>






<x-school-dashboard-footer />
