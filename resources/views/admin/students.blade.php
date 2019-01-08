@extends("admin.master")
@section('title','Students')

@section('action-button')
    <button type="button" @click="createNewStudent"  class="btn btn-primary">New Student</button>
@endsection


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Reg No</th>
            {{--<th class="text-right">Password</th>--}}
            <th class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(student,index) in students">
            <td class="text-center">@{{ index+1 }}</td>
            <td>@{{ student.first_name }} </td>
            <td>@{{ student.middle_name }}</td>
            <td>@{{ student.last_name }}</td>
            <td>@{{ student.gender }}</td>
            <td>@{{ student.grade }}</td>
            <td class="text-right">@{{ getRegNo(student.id) }}</td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" @click="showDetails(student)" title="View Details" class="btn btn-info btn-sm btn-icon">
                    <i class="now-ui-icons education_paper"></i>
                </button>
                <button type="button" rel="tooltip" @click="editStudent(student,index)" title="Edit" class="btn btn-info btn-sm btn-icon">
                    <i class="now-ui-icons users_single-02"></i>
                </button>
                <button type="button"  rel="tooltip" title="Change Password" class="btn btn-success btn-sm btn-icon">
                    <i class="now-ui-icons ui-2_settings-90"></i>
                </button>
                <button type="button" title="Delete"  @click="deleteRecord(index)" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>





    {{-----------------------------Students Modal Form ----------------------------------}}

    <div class="modal fade" id="students-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <form @submit.prevent="submitForm($event)" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="students-modal-label">@{{ modal.title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input v-model="student.first_name" type="text" class="form-control" id="first-name"  placeholder="Enter first name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middle-name">Middle Name</label>
                                    <input v-model="student.middle_name" type="text" class="form-control" id="middle-name"  placeholder="Enter middle name" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" v-model="student.last_name" class="form-control" id="last-name"  placeholder="Enter last name" required>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select v-model="student.gender" class="form-control" id="gender" required>
                                        <option disabled selected value="">Select gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="blood-group">Blood group</label>
                                    <input v-model="student.blood_group" type="text" class="form-control" id="blood-group"  placeholder="Enter blood group" required>
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="class">Grade/Class</label>
                                    <input v-model="student.grade" type="text" class="form-control" id="class"  placeholder="Enter class" required>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="religion">Religion</label>
                                    <select v-model="student.religion" class="form-control" id="religion" required>
                                        <option disabled selected value="">Select religion</option>
                                        <option>Christian</option>
                                        <option>Islam</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input v-model="student.email" type="email" class="form-control" id="email"  placeholder="Enter email" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone-no">Phone No.</label>
                                    <input v-model="student.phone_no" type="tel" class="form-control" id="phone-no"  placeholder="Enter phone no" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Residential Address</label>
                                    <input v-model="student.address" type="text" class="form-control" id="address"  placeholder="Enter address" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nationality">Nationality</label>
                                    <input v-model="student.nationality" type="text" class="form-control" id="nationality"  placeholder="Enter nationality" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input v-model="student.state" type="text" class="form-control" id="state"  placeholder="Enter state" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lga">LGA</label>
                                    <input v-model="student.lga" type="text" class="form-control" id="lga"  placeholder="Enter LGA" required>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input  v-model="student.password" type="password" class="form-control" id="password"  placeholder="Enter password" required>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">@{{ modal.btnText }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-----------------------------End Students  Modal Form ----------------------------------}}




{{-----------------------------------Student details Modal Start---------------------------------}}
    <div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>@{{ student.first_name+" "+student.middle_name+" "+student.last_name }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>@{{ student.gender }}</td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>@{{ student.blood_group }}</td>
                        </tr>
                        <tr>
                            <th>Grade/Class</th>
                            <td>@{{ student.grade }}</td>
                        </tr>
                        <tr>
                            <th>Religion</th>
                            <td>@{{ student.religion }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>@{{ student.email }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>@{{ student.phone_no }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>@{{ student.address }}</td>
                        </tr>
                        <tr>
                            <th>Nationality</th>
                            <td>@{{ student.nationality }}</td>
                        </tr>

                        <tr>
                            <th>LGA</th>
                            <td>@{{ student.lga }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
{{--------------------------------Details modal ends--------------------------}}



@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/apps/admin/students.js')}}" ></script>
@endsection

