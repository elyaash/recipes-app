import axios from "axios";

const apiClient = axios.create({
    baseURL: 'http://localhost:8888/api/'
})

export default apiClient
