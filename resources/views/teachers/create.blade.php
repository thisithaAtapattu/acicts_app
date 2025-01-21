 @php
     $school = Session::get('school');
 @endphp



 <x-school-dashboard-header page="tm" />



 <!-- Update profile section -->
 <!-- Update profile section -->

 <div class="col-md-6 ">


     <div class="row edu-background-dashboard ms-2">




     </div>

     <div class=" row">




         <div class="offset-md-2 ">

             <div class="row">

                 <h1 class="fs-1 fw-bold has-text-info text-center">Add New Teacher</h1>
                 <img src="Ellipsis-6.3s-200px (1).svg" id="send_verification_loader" style="height:60px;" class="d-none"
                     id="teachers_loader" />

             </div>



             <form class="row mt-5 ms-md-3" action="{{ asset('/teachers') }}" method="POST">
                 @csrf

                 <div class="col-6 ">



                     <input class="input is-info mt-5" type="text" placeholder="First Name" name="first_name"
                         value="{{ old('first_name') }}">





                     <div class="row ">

                         @error('first_name')
                             <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                         @enderror

                     </div>



                 </div>

                 <div class="col-6 ">



                     <input class="input is-info mt-5" type="text" placeholder="Last Name" name="last_name"
                         value="{{ old('last_name') }}">



                     <div class="row ">

                         @error('last_name')
                             <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                         @enderror

                     </div>






                 </div>

                 <div class="col-12">





                     <input class="input is-info mt-5 d-grid" type="text" placeholder="NIC No" name="nic_no"
                         value="{{ old('nic_no') }}">


                     <div class="row ">

                         @error('nic_no')
                             <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                         @enderror

                     </div>



                 </div>

                 <div class="col-12">





                     <input class="input is-info mt-5 d-grid" type="text" placeholder="Email" name="email"
                         value="{{ old('email') }}">


                     <div class="row ">

                         @error('email')
                             <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                         @enderror

                     </div>



                 </div>

                 <div class="col-12">





                     <input class="input is-info mt-5 d-grid" type="text" placeholder="Contact No" name="contact_no"
                         value="{{ old('contact_no') }}">


                     <div class="row ">

                         @error('contact_no')
                             <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                         @enderror

                     </div>



                 </div>



                 <div class="col-6 ">



                     <input class="input is-info mt-5" type="password" placeholder="Password" name="password">




                     <div class="row ">

                         @error('password')
                             <p class="text-danger  fs-6 fw-bold">{{ $message }}</p>
                         @enderror

                     </div>





                 </div>

                 <div class="col-6 ">



                     <input class="input is-info mt-5" type="password" placeholder="Confirm Password"
                         name="confirm_password">






                     <div class="row ">

                         @error('confirm_password')
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
                         Teacher</button>


                 </div>

             </form>








         </div>








     </div>








 </div>

 <!-- Teachers section -->

 <div class="col-md-4 mt-5  ">

     <form class="row px-3 " method="GET" action="{{ asset('schools/teacher-management') }}">



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
                     <th scope="col">NIC</th>

                     <th scope="col">Email</th>
                     <th scope="col">Contact No</th>


                     {{-- <th scope="col">Class</th> --}}
                     <th scope="col">Update Details</th>


                     <th scope="col">Current Status</th>
                     <th scope="col">Change Status</th>
                 </tr>
             </thead>
             <tbody id="teacher_loading_area">

                 @php
                     $count = 1;
                 @endphp

                 @foreach ($teachers as $teacher)
                     <tr>
                         <th scope="row">{{ $count++ }}</th>
                         {{-- 
                         <form class="row mt-5 ms-md-3" action="{{ asset('/teachers/' . $teacher->id) }}"
                             method="POST">
                             @csrf
                             @method('PUT') --}}



                         <td>


                             <input class="input is-warning " type="text" placeholder="First Name"
                                 id="first_name_{{ $teacher->teacherId }}" value="{{ $teacher->first_name }}">
                         </td>
                         <td><input class="input is-warning " type="text" placeholder="Last Name"
                                 id="last_name_{{ $teacher->teacherId }}" value="{{ $teacher->last_name }}"></td>
                         <td><input class="input is-warning " type="text" placeholder="NIC No"
                                 id="nic_no_{{ $teacher->teacherId }}" value="{{ $teacher->nic_no }}"></td>
                         <td><input class="input is-warning " type="text" placeholder="Email"
                                 id="email_{{ $teacher->teacherId }}" value="{{ $teacher->email }}"></td>
                         <td><input class="input is-warning " type="text" placeholder="Contact No"
                                 id="contact_no_{{ $teacher->teacherId }}" value="{{ $teacher->contact_no }}"></td>

                         {{-- <td>
                             <div class="select is-warning d-grid">
                                 <select id="school_class_{{ $teacher->teacherId }}">
                                     <option value="0">Select Class</option>
                                     @foreach ($schoolClasses as $schoolClass)
                                         <option value="{{ $schoolClass->id }}"
                                             {{ $teacher->schoolClass->id == $schoolClass->id ? 'selected' : '' }}>
                                             {{ $schoolClass->grade . ' ' . $schoolClass->name }}
                                         </option>
                                     @endforeach


                                 </select>
                             </div>
                         </td> --}}

                         <td><button class="button is-warning" data-bs-toggle="modal"
                                 onclick="updateTeacher({{ $teacher->teacherId }});">Update</button></td>
                         {{-- 
                         </form> --}}



                         <td>{{ $teacher->status == 1 ? 'Active' : 'Inactive' }}</td>
                         <td>
                             @if ($teacher->status == 1)
                                 <form action="{{ asset('teachers/block/' . $teacher->teacherId) }}" method="POST"
                                     id="form_te_{{ $teacher->teacherId }}" onsubmit="event.preventDefault();">
                                     @method('PUT')
                                     @csrf

                                     <button class="button is-danger" type="submit"
                                         onclick=" confirmation('form_te_{{ $teacher->teacherId }}','Are you sure that you want to block this teacher?');">Block</button>
                                 </form>
                             @else
                                 <form action="{{ asset('teachers/unblock/' . $teacher->teacherId) }}" method="POST"
                                     id="form_te_{{ $teacher->teacherId }}" onsubmit="event.preventDefault();">
                                     @method('PUT')
                                     @csrf

                                     <button class="button is-success" type="submit"
                                         onclick=" confirmation('form_te_{{ $teacher->teacherId }}','Are you sure that you want to unblock this teacher?');">Unblock</button>
                                 </form>
                             @endif



                         </td>



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




 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
     integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
 </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
     integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
 </script>

 <script src="https://code.jquery.com/jquery-3.1.1.min.js"
     integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> <!-- JQuery js file -->
 <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> <!-- JQuery js file -->
 <script src="{{ asset('js/sweetalert.min.js') }}"></script><!-- SweetAlert js file -->
 <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

 <script src="{{ asset('js/script.js') }}"></script> <!-- My js file -->



 <script>
     function updateTeacher(teacherId) {


         let firstName = document.getElementById("first_name_" + teacherId);
         let lastName = document.getElementById("last_name_" + teacherId);
         let nicNo = document.getElementById("nic_no_" + teacherId);
         let email = document.getElementById("email_" + teacherId);
         let contactNo = document.getElementById("contact_no_" + teacherId);
         let password = document.getElementById("password_" + teacherId);





         if (firstName.value.length == 0) {


             Toastify({
                 text: "The first name field is required.",
                 className: "info",
                 style: {
                     background: "#f14668",
                 }
             }).showToast();


         } else if (lastName.value.length == 0) {


             Toastify({
                 text: "The last name field is required.",
                 className: "info",
                 style: {
                     background: "#f14668",
                 }
             }).showToast();


         } else if (nicNo.value.length == 0) {


             Toastify({
                 text: "The nic no field is required.",
                 className: "info",
                 style: {
                     background: "#f14668",
                 }
             }).showToast();


         } else if (!(
                 /^(([5,6,7,8,9]{1})([0-9]{1})([0,1,2,3,5,6,7,8]{1})([0-9]{6})([v|V|x|X]))|(([1,2]{1})([0,9]{1})([0-9]{2})([0,1,2,3,5,6,7,8]{1})([0-9]{7}))/i
             ).test(nicNo.value)) {


             Toastify({
                 text: "The nic no field format is invalid.",
                 className: "info",
                 style: {
                     background: "#f14668",
                 }
             }).showToast();

         } else if (email.value.length == 0) {


             Toastify({
                 text: "The email field is required.",
                 className: "info",
                 style: {
                     background: "#f14668",
                 }
             }).showToast();


         } else if (!(/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/).test(email.value)) {


             Toastify({
                 text: "The email field must be a valid email address.",
                 className: "info",
                 style: {
                     background: "#f14668",
                 }
             }).showToast();


         } else if (contactNo.value.length == 0) {


             Toastify({
                 text: "The contact no field is required.",
                 className: "info",
                 style: {
                     background: "#f14668",
                 }
             }).showToast();


         } else if (contactNo.value.length > 12) {


             Toastify({
                 text: "The contact no field must not be greater than 12 characters.",
                 className: "info",
                 style: {
                     background: "#f14668",
                 }
             }).showToast();


         } else {


             const fromData = new URLSearchParams();
             fromData.append("_token", "<?= csrf_token() ?>");

             fromData.append('first_name', firstName.value);
             fromData.append('last_name', lastName.value);
             fromData.append('nic_no', nicNo.value);
             fromData.append('email', email.value);
             fromData.append('contact_no', contactNo.value);


             fetch("{{ asset('/teachers/') }}/" + teacherId, {
                 method: 'PUT',
                 headers: {
                     'Content-Type': 'application/x-www-form-urlencoded'
                 },
                 body: fromData
             }).then(response => {

                 if (response.status != 200) {
                     Toastify({
                         text: "An error has occured!",
                         className: "info",
                         style: {
                             background: "#f14668",
                         }
                     }).showToast();

                 }

                 return response.text();
             }).then(respText => {


                 if (respText == 1) {
                     Toastify({
                         text: "The updates have been recorded!",
                         className: "info",
                         style: {
                             background: "#48c78e",
                         }
                     }).showToast();

                 } else {

                     Toastify({
                         text: "Check the entered details!",
                         className: "info",
                         style: {
                             background: "#f14668",
                         }
                     }).showToast();
                 }

                 //  window.location.reload();

             });


         }







     }
 </script>

 <x-success-message />

 </body>









 </html>
