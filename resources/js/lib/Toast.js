import NativeToast from 'native-toast';

export default class  {

    static warning(message){
        NativeToast({
            message: message,
            position: 'south',
            type: 'warning',
            timeout: 2000
        });
    }


    static success(message){
        NativeToast({
            message: message,
            position: 'south',
            type: 'success',
            timeout: 2000
        });
    }



    static error(message){
        NativeToast({
            message: message,
            position: 'south',
            type: 'error',
            timeout: 2000
        });
    }



    static info(message){
        NativeToast({
            message: message,
            position: 'south',
            type: 'warning',
            timeout: 2000
        });
    }


}
