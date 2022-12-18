import {axiosForUploading} from '@/api/Axios';

export default {
    state: {},
    getters: {},
    mutations: {},
    actions: {
        async upload(store, {file}) {
            return await axiosForUploading.post(`/image/upload`, file)
                .then(({data: {data}}) => data)
        },
    },
    namespaced: true,
}
