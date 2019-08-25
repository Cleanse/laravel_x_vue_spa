import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    display(params) {
        return client.get('faqs/display', params);
    },
    all(params) {
        return client.get('faqs', params);
    },
    create(data) {
        return client.post('faqs', data);
    },
    find(id) {
        return client.get(`faqs/${id}`);
    },
    update(id, data) {
        return client.put(`faqs/${id}`, data);
    },
    delete(id) {
        return client.delete(`faqs/${id}`);
    },
};