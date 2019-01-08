import Vue from 'vue';
import axios from 'axios';
import Toast from '../../../lib/Toast';



const $ = window.jQuery;

const http = new axios.create({
    baseURL: document.querySelector("meta[name='app-url']").content+"/api/admin/",
    // validateStatus:false,
    headers: {
        'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").content
    }
});



let vm = new Vue({
    el:"#app",
    data:{
        teachers:[],
        newRecord:true,
        currentIndex:null,
        teacher:{
            first_name:"",
            last_name:"",
            email:"",
            password:""
        },

        errors:{
            first_name:{
                show:false,
                message:''
            },
            last_name:{
                show:false,
                message:''
            },
            email:{
                show:false,
                message:''
            },
            password:{
                show:false,
                message:''
            }
        },
        modal:{
            title:"New Teacher",
            btnText:"Add Teacher"
        },

        addingTeacher:false,
        updatingPassword:false,

        newPassword:{
            value:'',
            showError:false,
        }
    },

    methods:{

        submitForm(event){
            if(this.newRecord){
                this.addTeacher(event);
            }else {
                this.updateTeacher(event);
            }
        },
        addTeacher(event){
            this.addingTeacher = true;
            this.clearErrors();
            let data = new FormData(event.target);
            http.post('teachers',data).then(
                (res)=>{
                    this.teachers.unshift(res.data);
                    this.resetFormFields();
                    $('#teachers-modal').modal('hide');
                    Toast.success("Teacher was successfully added");
                },
                (err)=>{
                    if(err.response.status === 422){
                        let errors = err.response.data.errors;
                        Object.keys(errors).forEach((error)=>{
                            this.errors[error].show = true;
                            this.errors[error].message = errors[error][0];
                        });

                    }else {
                        Toast.error("Something went wrong please try again");
                    }
                }
            ).finally((res)=>{
                this.addingTeacher = false;
            });

        },




        getTeachers(){
            http.get("teachers").then((res)=>{
                this.teachers.push(...res.data);
            })
        },

        newTeacher(){
            this.newRecord = true;
            this.resetFormFields();

            this.modal = {
                title:"New Teacher",
                btnText:"Add Teacher"
            };

            $("#teachers-modal").modal("show")
        },


        deleteTeacher(index){
            if(confirm("Do you want to delete student")){
                let teacher = this.teachers[index];
                http.delete("teachers/"+teacher.id)
                    .then((res)=>{
                            Toast.success("Record deleted successfully");
                            this.teachers.splice(index,1);
                        },
                        (err)=>{
                            Toast.error("Oops something went wrong");
                        })
            }
        },

        updateTeacher(event){
            this.addingTeacher = true;
            this.clearErrors();
            let data = new FormData(event.target);
            data.append("_method","PATCH");
            http.post('teachers/'+this.teacher.id,data).then(
                (res)=>{
                    // this.teachers.unshift(res.data);
                    // this.resetFormFields();
                    // $('#teachers-modal').modal('hide');


                    this.$set(this.teachers,this.currentIndex,res.data);
                    Toast.success("Teacher was successfully updated");
                },
                (err)=>{
                    if(err.response.status === 422){
                        let errors = err.response.data.errors;
                        Object.keys(errors).forEach((error)=>{
                            this.errors[error].show = true;
                            this.errors[error].message = errors[error][0];
                        });

                    }else {
                        Toast.error("Something went wrong please try again");
                    }
                }
            ).finally((res)=>{
                this.addingTeacher = false;
            });
        },


        editTeacher(teacher,index){
            this.currentIndex = index;
            this.teacher = {...teacher};
            this.newRecord = false;

            this.modal = {
                title:"Edit Teacher",
                btnText:"Update Teacher"
            };

            $("#teachers-modal").modal("show")



        },


        changePassword(id){
            $("#password-modal").modal("show");
            this.newPassword.value = '';
            this.currentId = id;
        },

        updatePassword(event){
            if(this.newPassword.value===''){
                this.newPassword.showError = true;
            }else {
                this.newPassword.showError = false;
                this.updatingPassword = true;
                http.post("teachers/change_password/"+this.currentId,{password:this.newPassword.value})
                    .then((res)=>{
                            Toast.success("Password Updated successfully")
                        },
                        (err)=>{
                            Toast.error("Oops something wrong password was not updated")
                        })
                    .finally(()=>{
                        this.updatingPassword = false;
                    })
            }
        },

        resetFormFields(){
            Object.keys(this.teacher).forEach((key)=>{
                this.teacher[key] = '';
            });
        },

        clearErrors(){
            Object.keys(this.errors).forEach((err)=>{
                this.errors[err].message = '';
                this.errors[err].show = false;
            });
        }


    },

    mounted() {
        this.getTeachers();
        // alert('over y')
    }

});








