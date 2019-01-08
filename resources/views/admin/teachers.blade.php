@extends("admin.master")
@section('title','Teachers')

@section('action-button')
    <button type="button"   @click="newTeacher"  class="btn btn-primary">New Teacher</button>
@endsection


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            {{--<th class="text-right">Password</th>--}}
            <th class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(teacher,index) in teachers">
            <td class="text-center">@{{ teacher.id }}</td>
            <td>@{{teacher.first_name }} </td>
            <td>@{{teacher.last_name}}</td>
            <td>@{{teacher.email}}</td>

            <td class="td-actions text-right">
                <button type="button" rel="tooltip" title="Edit account" @click="editTeacher(teacher,index)" class="btn btn-info btn-sm btn-icon">
                    <i class="now-ui-icons users_single-02"></i>
                </button>
                <button type="button" @click="changePassword(teacher.id)" title="Change Password" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                    <i class="now-ui-icons ui-2_settings-90"></i>
                </button>
                <button type="button"  @click="deleteTeacher(index)" title="Delete Record" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>





    {{-----------------------------Teachers Modal Form ----------------------------------}}

    <div class="modal fade" id="teachers-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <form v-on:submit.prevent="submitForm($event)">
                    <div class="modal-header">
                        <h5 class="modal-title" id="teachers-modal-label">@{{ modal.title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" v-bind:class="{'is-invalid':errors.first_name.show}"  v-bind:disabled="addingTeacher" name="first_name" v-model="teacher.first_name" class="form-control" id="first-name"  placeholder="Enter first name">
                                    <small v-if="errors.first_name.show" class="form-text text-danger">@{{errors.first_name.message}}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input v-bind:disabled="addingTeacher"
                                           name="last_name" type="text"
                                           class="form-control" id="last-name"
                                           placeholder="Enter last name"
                                           v-bind:class="{'is-invalid':errors.last_name.show}"
                                           v-model="teacher.last_name"
                                    >
                                    <small v-if="errors.last_name.show" class="form-text text-danger">@{{errors.last_name.message}}</small>

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"
                                           v-model="teacher.email"
                                           v-bind:class="{'is-invalid':errors.email.show}"
                                           v-bind:disabled="addingTeacher" name="email" class="form-control" id="email"  placeholder="Enter email">
                                    <small v-if="errors.email.show" class="form-text text-danger">@{{errors.email.message}}</small>

                                </div>
                            </div>

                            <div class="col-md-6" v-if="newRecord">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password"
                                           v-model="teacher.password"
                                           v-bind:class="{'is-invalid':errors.password.show}"
                                           v-bind:disabled="addingTeacher" name="password" class="form-control" id="password"  placeholder="Enter password">
                                    <small v-if="errors.password.show" class="form-text text-danger">@{{errors.password.message}}</small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button v-bind:disabled="addingTeacher"  type="submit" class="btn btn-primary"><span v-if="addingTeacher" class="fas fa-spin fa-spinner"> </span>@{{ modal.btnText }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-----------------------------End Teachers Modal Form ----------------------------------}}


    {{--------------------------------------Change password modal ----------------------------------}}

    <div class="modal fade" id="password-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <form v-on:submit.prevent="updatePassword($event)">
                    <div class="modal-header">
                        <h5 class="modal-title" id="teachers-modal-label">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cpassword">New Password</label>
                                    <input type="password"
                                           v-model="newPassword.value"
                                           v-bind:class="{'is-invalid':newPassword.showError}"
                                           v-bind:disabled="updatingPassword" name="password" class="form-control" id="cpassword"  placeholder="Enter password">
                                    <small v-if="newPassword.showError" class="form-text text-danger">Please enter password</small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button v-bind:disabled="updatingPassword"  type="submit" class="btn btn-primary"><span v-if="updatingPassword" class="fas fa-spin fa-spinner"> </span>Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{------------------------end of password modal---------------------------}}

@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/apps/admin/teachers.js')}}" ></script>

@endsection
