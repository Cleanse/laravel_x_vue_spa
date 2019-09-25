import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    display(params) {
        return client.get('products/display', params);
    },
    featured(product, data) {
        return client.post(`products/featured/${product}`, data);
    },
    all(params) {
        return client.get('products', params);
    },
    create(data) {
        return client.post('products', data);
    },
    find(id) {
        return client.get(`products/${id}`);
    },
    update(id, data) {
        return client.put(`products/${id}`, data);
    },
    delete(id) {
        return client.delete(`products/${id}`);
    },
};