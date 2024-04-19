import axios from "axios"

const db =  axios.create({
    baseURL: process.env.VUE_APP_BACKEND_URL,
    headers: {
        "Content-type": "application/json"
    }
});

function login(data){
    return db.post("auth/login", data)
}

function register(data){
    return db.post("auth/register", data)
}

function forgotPassword(data){
    return db.post("auth/login", data)
}

export default {login, register, forgotPassword}