import axios from "axios";
import {BASE_URL} from "@/api/config.js";

export const BASE_API_URL = `${BASE_URL}/api`;
export const axiosConfig = {
    baseURL: BASE_API_URL,
    headers: {
        'Content-Type': 'application/json',
    }
}

const axiosInstance = axios.create(axiosConfig);
export default axiosInstance;

export const axiosForUploading = axios.create({
    baseURL: BASE_API_URL
})
