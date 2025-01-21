@php
    $school = Session::get('school');
@endphp


<x-teacher-dashboard-header page="cm" />



<!-- Update profile section -->
<!-- Update profile section -->

<div class="col-md-6 ">


    <div class="row edu-background-dashboard ms-2">




    </div>

    <div class=" row">




        <div class="offset-md-2 ">



        

            <div class="col-12 mt-3">
                <div class="row overflow-scroll">
            
            
                    <table class="table col-12">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Class Grade</th>
                                <th scope="col">Class Name</th>
                                <th scope="col">Manage Class</th>

            
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

                                    <td><a class="button is-link" href="{{asset('teachers/classes/'.$class->id )}}">Manage Class</a></td>

            {{-- 
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
            
                                    </td> --}}
            
                                </tr>
                            @endforeach
            
            
            
                        </tbody>
                    </table>
            
                    {{-- {{ $classes->links() }} --}}
            
            
            
                </div>
            
            
            
            
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






<x-teacher-dashboard-footer />
