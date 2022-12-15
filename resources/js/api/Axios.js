import axios from "axios";
export const BASE_API_URL = 'http://localhost:808/api';
export const axiosConfig = {
    baseURL: BASE_API_URL,
    headers: {
        'Content-Type': 'application/json',
    }
}

const axiosInstance = axios.create(axiosConfig);
export default axiosInstance;
