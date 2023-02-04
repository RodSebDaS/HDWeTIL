import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

/*import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;
window.Echo = new Echo({
     broadcaster: 'pusher',
     key: import.meta.env.VITE_PUSHER_APP_KEY,
     //wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_CLUSTER}.pusher.com`,
     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
     forceTLS: true
     //wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
     //ssPort: import.meta.env.VITE_PUSHER_PORT ?? 6001,
     //forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'http',
     //enabledTransports: ['ws', 'wss'],
});*/

/*import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
//window.Pusher = require('pusher-js');
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    //wsHost: window.location.hostname,
    //wsPort: 6001,
    forceTLS: false,
    disableStats: true
});
*/
/*window.Echo.private(`posts.{post}`)
    .listen('PostEvent.{post}', (e) => console.log(' Message: ' + e.message));*/

/*window.Echo.private('posts')
    .listen('PostEvent', (e) => {
        console.log(e.post.name);
}); */  

/*window.Echo.private('App.Models.User.{id}')
.notification((notification) => {
    console.log(notification.type);
});*/
