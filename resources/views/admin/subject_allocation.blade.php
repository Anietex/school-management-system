@extends("admin.master")
@section('title','Subject Allocation')

@section('action-button')
    <button type="button"  data-toggle="modal" data-target="#session-modal" class="btn btn-primary">New Allocation</button>
@endsection


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Session</th>
            <th>Teacher</th>
            <th>Class</th>
            <th>Day</th>
            <th>Time</th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-center">1</td>
            <td>First Term 2019</td>
            <td>John Doe</td>
            <td>JSS1</td>
            <td>Monday</td>
            <td>12:45 am</td>

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





    {{-----------------------------Allocation Modal Form ----------------------------------}}

    <div class="modal fade" id="session-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content ">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="students-modal-label">New Allocation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="term">session</label>
                                    <select class="form-control" id="term">
                                        <option disabled selected>select session</option>
                                        <option>First Term</option>
                                        <option>Second Term</option>
                                        <option>Third Term</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="teacher">Teacher</label>
                                    <select class="form-control" id="teacher">
                                        <option disabled selected>select Teacher</option>
                                        <option>First Term</option>
                                        <option>Second Term</option>
                                        <option>Third Term</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="class">Class</label>
                                    <select class="form-control" id="class">
                                        <option disabled selected>select Class</option>
                                        <option>First Term</option>
                                        <option>Second Term</option>
                                        <option>Third Term</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="day">Day</label>
                                    <select class="form-control" id="day">
                                        <option disabled selected>select Day</option>
                                        <option>First Term</option>
                                        <option>Second Term</option>
                                        <option>Third Term</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="time" class="form-control" id="time">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Allocation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-----------------------------End allocation Modal Form ----------------------------------}}
@endsection
