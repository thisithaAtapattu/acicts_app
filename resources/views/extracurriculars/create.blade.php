@php
    $school = Session::get('school');
@endphp


<x-school-dashboard-header page="em" />



<!-- Update profile section -->
<!-- Update profile section -->

<div class="col-md-6 ">


    <div class="row edu-background-dashboard ms-2">




    </div>

    <div class=" row">




        <div class="offset-md-2 ">

            <div class="row">

                <h1 class="fs-1 fw-bold has-text-info text-center">Add New Extracurricular Activity</h1>




            </div>



            <form class="row mt-5 ms-md-3" action="{{ asset('/extracurriculars') }}" method="POST">

                @csrf

                <dic class="row">


                </dic>

                @error('class_error')
                    <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                @enderror

                <div class="col-12 ">





                    <input class="input is-info mt-5" type="text" placeholder="Name" name="name"
                        value="{{ old('name') }}">



                    @error('name')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror



                </div>


                <div class="col-12 mt-5">
                    <div class="select is-info  col-12">
                        <select class="col-12" name="extracurricular_type">
                            <option value="">Select Extracurricular Type</option>
                            <option value="1" {{ old('extracurricular_type') == 1 ? 'selected' : '' }}>Sport
                            </option>
                            <option value="2" {{ old('extracurricular_type') == 2 ? 'selected' : '' }}>Club
                            </option>

                        </select>
                    </div>
                    @error('extracurricular_type')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-6 mt-5">
                    <div class="select is-info  col-12">
                        <select class="col-12" name="from_grade">
                            <option value="">Select From Grade</option>
                            @for ($count = 1; $count <= 13; $count++)
                                <option value="{{ $count }}" {{ old('from_grade') == $count ? 'selected' : '' }}>
                                    {{ $count }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    @error('from_grade')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror
                </div>


                <div class="col-6 mt-5">
                    <div class="select is-info  col-12">
                        <select class="col-12" name="to_grade">
                            <option value="">Select To Grade</option>
                            @for ($count = 1; $count <= 13; $count++)
                                <option value="{{ $count }}" {{ old('to_grade') == $count ? 'selected' : '' }}>
                                    {{ $count }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    @error('to_grade')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror
                </div>


                <div class="col-12 mt-5">






                    <div class="select is-info  col-12">


                        <select class="col-12" name="teacher">
                            <option value="">Select Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ old('teacher') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->nic_no . ' - ' . $teacher->first_name . ' ' . $teacher->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    @error('teacher')
                        <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                    @enderror









                </div>




                <div class="col-12">

                    <button class="button is-info mt-5 d-grid col-12">Add
                        Activity</button>


                </div>

            </form>








        </div>








    </div>








</div>

<!-- Teachers section -->

<div class="col-md-4 mt-5  ">

    <form class="row px-3 " method="GET" action="{{ asset('schools/extracurricular-management') }}">



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
                    <th scope="col">Extracurricular Name</th>
                    <th scope="col">Extracurricular Type</th>
                    <th scope="col">From Grade</th>
                    <th scope="col">To Grade</th>
                    <th scope="col">Extracurricular Teacher</th>


                </tr>
            </thead>
            <tbody id="teacher_loading_area">

                @php
                    $count = 1;
                @endphp

                @foreach ($extracurriculars as $extracurricular)
                    <tr>
                        <th scope="row">{{ $count++ }}</td>
                        <td>{{ $extracurricular->activity->name }}</td>
                        <td>{{ $extracurricularTypes[$extracurricular->activity->type] }}</td>



                        <form action="{{ asset('extracurriculars/' . $extracurricular->extracurricularId) }}" method="POST"
                            id="form_ee_{{ $extracurricular->extracurricularId }}" onsubmit="event.preventDefault();">
                            @method('PUT')
                            @csrf
                            <td>

                                <div class="select is-info  col-12">
                                    <select class="col-12" name="from_grade" onchange="confirmFormWithSelctor('form_ee_{{ $extracurricular->extracurricularId }}','Are you sure that you want to change the from grade of this extracurricular?',this);">
                                        <option value="">Select From Grade</option>
                                        @for ($count = 1; $count <= 13; $count++)
                                            <option value="{{ $count }}"
                                                {{ $extracurricular->from_grade == $count ? 'selected' : '' }}>
                                                {{ $count }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
    
                            </td>
    
    
    
                            <td>
                                <div class="select is-info  col-12">
                                    <select class="col-12" name="to_grade" onchange="confirmFormWithSelctor('form_ee_{{ $extracurricular->extracurricularId }}','Are you sure that you want to change the to grade of this extracurricular?',this);">
                                        <option value="">Select To Grade</option>
                                        @for ($count = 1; $count <= 13; $count++)
                                            <option value="{{ $count }}"
                                                {{ $extracurricular->to_grade == $count ? 'selected' : '' }}>
                                                {{ $count }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </td>
    
                            <td>
                                <div class="select is-info  col-6">
    
                                    <select class="col-12" name="teacher"
                                        onchange="confirmFormWithSelctor('form_ee_{{ $extracurricular->extracurricularId }}','Are you sure that you want to change the teacher of this extracurricular?',this);">
                                        <option value="">Select Teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ $extracurricular->teacher->id == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->nic_no . ' - ' . $teacher->first_name . ' ' . $teacher->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
    

                        </form>
                    

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
