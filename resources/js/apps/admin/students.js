import Vue from "vue";
import {http,Toast, FormValidator,$} from "../../lib";

Vue.directive("pad-number",function (el,binding) {
    console.log(binding);
});

new Vue({
    el:"#app",
    data:{
        student:{
            id:"",
            first_name:"",
            middle_name:"",
            last_name:"",
            gender:"",
            blood_group:"",
            grade:"",
            religion:"",
            email:"",
            phone_no:"",
            address:"",
            nationality:"",
            state:"",
            lga:"",
            password:"",

        },
        modal:{
            title:"",
            btnText:""
        },

        students:[],

        newRecord:true,
        sendingRequest:false,

    },


    methods:{

        getStudents(){
            http.get("admin/students")
                .then((res)=>{
                    this.students.push(...res.data);
                })
        },

        createNewStudent(){
            this.clearInput();
            this.newRecord = true;
            this.modal.title = "New Student";
            this.modal.btnText = "Add Student";
            $("#students-modal").modal("show");
        },

        editStudent(student,index){
            this.currentIndex = index;
            this.newRecord = false;
            this.modal.title = "Edit Student";
            this.modal.btnText = "Update Student";
            this.student = {...student}
            $("#students-modal").modal("show");

        },

        submitForm(event){
            if(event.target.checkValidity()){

                if(this.newRecord)
                    this.addStudent();
                else
                    this.updateStudent();

            }
        },

        showDetails(student){
            this.student = {...student}
            $("#details-modal").modal("show")
        },


        addStudent(){
            this.sendingRequest = true;
            console.log(this.student);
            http.post("admin/students",this.student)
                .then((res)=>{
                    this.students.push(res.data.student);
                    this.clearInput();
                    $("#students-modal").modal("hide");
                    Toast.success("Student Added Successfully");
                },()=>{
                    Toast.error("Oops something went wrong");
                })
                .finally(()=>{
                    this.sendingRequest = false;
                });
        },

        updateStudent(){
            this.sendingRequest = true;
            console.log(this.student);
            http.post("admin/students/"+this.student.id,{...this.student,_method:"PATCH"})
                .then((res)=>{
                    this.$set(this.students,this.currentIndex,res.data.student);
                    Toast.success("Student record updated was Successfully");
                },()=>{
                    Toast.error("Oops something went wrong");
                })
                .finally(()=>{
                    this.sendingRequest = false;
                });

        },

        deleteRecord(index){
            if(confirm("Do you want to delete student")){
                let student = this.students[index];
                http.delete("admin/students/"+student.id)
                    .then((res)=>{
                            Toast.success("Record deleted successfully")
                            this.students.splice(index,1);
                        },
                        (err)=>{
                            Toast.error("Oops something went wrong");
                        })
            }
        },

        clearInput(){
            Object.keys(this.student).forEach((key)=>{
                this.student[key] = '';
            })
        },

        getRegNo(id){
            let reg = String(id);
            return reg.padStart(4,"0")

        }



    },

    mounted(){
        FormValidator.init();
        this.getStudents();
    }

});