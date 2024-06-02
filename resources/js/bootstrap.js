import 'bootstrap';
import router from './route';
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axiosAuth = axios.create();
axiosAuth.interceptors.request.use((config) => {
    if(localStorage.getItem('token')) {
        config.headers.authorization = `Bearer ${localStorage.getItem('token')}`;
    }
    return config;
}, error => {
    return error;
});

axiosAuth.interceptors.response.use(config => {
    if(localStorage.getItem('token')) {
        config.headers.authorization = `Bearer ${localStorage.getItem('token')}`;
    }
    return config;
}, error => {
    if (error.response.data.message == 'Token has expired') {
        return axios.post('api/auth/refresh', {}, {
            headers: {
                'authorization': `Bearer ${localStorage.getItem('token')}`,
            }
        })
        .then( data => {
            // localStorage.setItem('token', data.data.access_token);
            // error.config.headers.authorization = `Bearer ${data.data.access_token}`;
            // return axiosAuth.request(error.config);

        });
    }
    return error;
    // else {
    //     router.push({ path: '/login' });
    // }
});
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
