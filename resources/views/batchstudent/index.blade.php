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

                <h1 class="fs-1 fw-bold has-text-info text-center">Update Test Results of
                    {{ $batchStudent->student->first_name . ' ' . $batchStudent->student->last_name }}</h1>

            </div>




            <form class="row mt-5 ms-md-3" action="{{ asset($schoolClass->id . '/batches/' . $batch->id . '/batchstudent/' . $batchStudent->id) }}" method="POST">
                @csrf
                @method('PUT')


                @error('batch_error')
                    <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                @enderror

                <div class="col-6">



                    <div class="mb-3">
                        <div class="select is-info  col-12">
                            <select class="col-12" name="term"
                          >
                                <option value="">Select Term</option>
                                @for ($count = 1; $count <= 3; $count++)
                                    <option value="{{ $count }}" {{ $count == old('term') ? 'selected' : '' }}>
                                        {{ $count }}
                                    </option>
                                @endfor
                            </select>
                        </div>


                        <div class="row ">

                            @error('term')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>












                </div>


                <div class="col-6">



                    <div class="mb-3">
                        <div class="select is-info  col-12">

                            <select class="col-12" name="subject">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ $subject->id == old('subject') ? 'selected' : '' }}>
                                        {{ $subject->name }}


                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="row ">

                            @error('subject')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>












                </div>



               
                <div class="col-12">



                    <div class="mb-3">
                        <input class="input is-info  d-grid" type="number" name="mark"
                        value="{{ old('mark') }}" placeholder="Mark">

                        <div class="row ">

                            @error('mark')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


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
                    <th scope="col">Term</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Mark</th>


                </tr>
            </thead>
            <tbody id="teacher_loading_area">

                @php
                    $count = 1;
                @endphp
                
                @foreach ($results as $result)
                    <tr>
                        <th scope="row">{{ $count++ }}</td>
                        <td>{{ $result->term }}</td>
                        <td>{{ $result->subject->name }}</td>
                        <td>{{ $result->mark }}</td>
            
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
