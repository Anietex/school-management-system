@extends("admin.master")
@section('title','Students')

@section('action-button')
    <button type="button"  data-toggle="modal" data-target="#class-modal" class="btn btn-primary">New Class</button>
@endsection


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Class name</th>


            <th class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-center">1</td>
            <td>SSS1</td>

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





    {{-----------------------------Classes Modal Form ----------------------------------}}

    <div class="modal fade" id="class-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content ">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="students-modal-label">Add Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="class-name">Class name</label>
                                    <input type="text" class="form-control" id="first-name"  placeholder="Enter class name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Class</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-----------------------------End classes Modal Form ----------------------------------}}






@endsection
