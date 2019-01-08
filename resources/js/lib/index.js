import axios from "axios";
import Toast from './Toast';
import FormValidator from "./FormValidtor"

const http = new axios.create({
    baseURL: document.querySelector("meta[name='app-url']").content+"/api/",
    // validateStatus:false,
    headers: {
        'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").content
    }
});

const $ = window.jQuery;



export {http,Toast,FormValidator,$}