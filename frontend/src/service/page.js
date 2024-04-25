import axios from "axios"

const db =  axios.create({
    baseURL: process.env.VUE_APP_BACKEND_URL,
    headers: {
        'Content-Type': 'application/json; charset=UTF-8'
    }
});

export default {

    ping(){
        return db.get("page/ping")
    },

    home(){
        return db.get("page/home")
    }

}