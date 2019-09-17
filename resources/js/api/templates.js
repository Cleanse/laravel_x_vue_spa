import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    display(params) {
        return client.get('templates/display', params);
    },
    featured(productTemplate, data) {
        return client.post(`templates/upload/${productTemplate}`, data);
    },
    all(params) {
        return client.get('templates', params);
    },
    create(data) {
        return client.post('templates', data);
    },
    find(id) {
        return client.get(`templates/${id}`);
    },
    update(id, data) {
        return client.put(`templates/${id}`, data);
    },
    delete(id) {
        return client.delete(`templates/${id}`);
    },
};