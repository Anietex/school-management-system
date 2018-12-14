@extends("admin.master")
@section('title','Students')

@section('action-button')
    <button type="button"  data-toggle="modal" data-target="#students-modal" class="btn btn-primary">New Student</button>
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
        <tr>
            <td class="text-center">1</td>
            <td>Andrew </td>
            <td>Mike</td>
            <td>Develop</td>
            <td>Male</td>
            <td>SSS1</td>
            <td class="text-right">&euro; 99,225</td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
                    <i class="now-ui-icons users_single-02"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                    <i class="now-ui-icons ui-2_settings-90"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
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
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="students-modal-label">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" class="form-control" id="first-name"  placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middle-name">Middle Name</label>
                                    <input type="text" class="form-control" id="middle-name"  placeholder="Enter middle name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" class="form-control" id="last-name"  placeholder="Enter last name">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Gender</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option disabled selected>Select gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>






                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="blood-group">Blood group</label>
                                    <input type="text" class="form-control" id="blood-group"  placeholder="Enter blood group">
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="class">Grade/Class</label>
                                    <input type="text" class="form-control" id="email"  placeholder="Enter class">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Religion</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option disabled selected>Select religion</option>
                                        <option>Christian</option>
                                        <option>Islam</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email"  placeholder="Enter email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone-no">Phone No.</label>
                                    <input type="tel" class="form-control" id="phone-no"  placeholder="Enter phone no">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Residential Address</label>
                                    <input type="text" class="form-control" id="address"  placeholder="Enter address">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" id="nationality"  placeholder="Enter nationality">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nationality">State</label>
                                    <input type="text" class="form-control" id="state"  placeholder="Enter state">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nationality">LGA</label>
                                    <input type="text" class="form-control" id="state"  placeholder="Enter LGA">
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"  placeholder="Enter password">
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Teacher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-----------------------------End Teachers Modal Form ----------------------------------}}






@endsection
