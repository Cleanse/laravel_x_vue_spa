import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    display(params) {
        return client.get('product-types/display', params);
    },
    all(params) {
        return client.get('product-types', params);
    },
    create(data) {
        return client.post('product-types', data);
    },
    find(id) {
        return client.get(`product-types/${id}`);
    },
    update(id, data) {
        return client.put(`product-types/${id}`, data);
    },
    delete(id) {
        return client.delete(`product-types/${id}`);
    },
};