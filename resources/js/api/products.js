import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    find(id) {
        return client.get(`products/${id}`);
    }
};