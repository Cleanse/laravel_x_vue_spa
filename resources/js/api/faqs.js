import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    all(params) {
        return client.get('users', params);
    }
};