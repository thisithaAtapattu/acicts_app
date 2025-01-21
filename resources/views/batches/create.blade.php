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

                <h1 class="fs-1 fw-bold has-text-info text-center">Create New Batch</h1>

            </div>




            <form class="row mt-5 ms-md-3" action="{{ asset($schoolClass->id . '/batches') }}" method="POST">
                @csrf



                @error('batch_error')
                    <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                @enderror

                <div class="col-6">



                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">From Date</label>


                        <input class="input is-info  d-grid" type="date" name="from_date"
                            value="{{ old('from_date') }}">


                        <div class="row ">

                            @error('from_date')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>









                </div>


                <div class="col-6">



                    <div class="mb-3">
                        <label for="admission_date" class="form-label">To Date</label>


                        <input class="input is-info d-grid col-12" type="date" name="to_date"
                            value="{{ old('to_date') }}">

                        <div class="row ">

                            @error('to_date')
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

                    <button class="button is-info mt-5 d-grid col-12" onclick="addNewTeacher();">Create Batch</button>


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
                    <th scope="col">From Date</th>
                    <th scope="col">To Date</th>
                    <th scope="col">View Batch</th>


                </tr>
            </thead>
            <tbody id="teacher_loading_area">

                @php
                    $count = 1;
                @endphp

                @foreach ($batches as $batch)
                    <tr>
                        <th scope="row">{{ $count++ }}</td>
                        <td>{{ $batch->from_date }}</td>
                        <td>{{ $batch->to_date }}</td>
                        <td><a class="button is-danger"
                                href="{{ asset($schoolClass->id . '/batches/' . $batch->id . '/edit') }}">View
                                Batch</a></td>

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
