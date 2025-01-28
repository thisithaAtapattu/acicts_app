<x-teacher-dashboard-header page="" />



<!-- Update profile section -->
<!-- Update profile section -->

<div class="col-md-6 ">


    <div class="row edu-background-dashboard ms-2">




    </div>

    <div class=" row">




        <div class="offset-md-2 ">

            <div class="row">

                <h1 class="fs-1 fw-bold has-text-info text-center">Update Achievement Details of
                    {{ $student->student->first_name . ' ' . $student->student->last_name }}</h1>


                @error('achievement_error')
                    <p class="text-danger  fs-6 fw-bold text-center">{{ $message }}</p>
                @enderror


            </div>




            <form class="row mt-5 ms-md-3" action="{{ asset('students/' . $student->id . '/achivements') }}" method="POST">
                @csrf





                <div class="col-6">



                    <div class="mb-3">
                        <input class="input is-info  d-grid" type="text" name="event" value="{{ old('event') }}"
                            placeholder="Event">

                        <div class="row ">

                            @error('event')
                                <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>












                </div>


                <div class="col-6">



                    <div class="mb-3">
                        <input class="input is-info  d-grid" type="number" name="place" value="{{ old('place') }}"
                            placeholder="Place" min="1">

                        <div class="row ">

                            @error('place')
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

                    <button class="button is-info mt-5 d-grid col-12">Add Achievement</button>


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
                    <th scope="col">Event</th>
                    <th scope="col">Place</th>


                </tr>
            </thead>
            <tbody >

                @php
                    $count = 1;
                @endphp

                @foreach ($achievements as $achievement)
                    <tr>
                        <th scope="row">{{ $count++ }}</td>
                        <td>{{ $achievement->event->name }}</td>
                        <td>{{ $achievement->place }}</td>
            
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
