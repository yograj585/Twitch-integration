/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue').default;
 
 // Import Pusher
 import Pusher from 'pusher-js';
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 // Initialize Pusher with the key and cluster from your .env or configuration
 const pusher = new Pusher('your-pusher-key', {
     cluster: 'your-cluster',
     encrypted: true
 });
 
 // Subscribe to a channel and bind to an event
 const channel = pusher.subscribe('chat');
 
 // Bind the event to a Vue method or data property
 channel.bind('MessageSent', function(data) {
     console.log(data.message);  // This will log the message received via WebSocket
     // You can also trigger a Vue method or update Vue data here
     // For example, you could add the message to a Vue component's data array
     app.addMessage(data.message);
 });
 
 // Create a fresh Vue instance
 const app = new Vue({
     el: '#app',
     data: {
         messages: []  // Store the messages here
     },
     methods: {
         addMessage(message) {
             this.messages.push(message);
         }
     }
 });
 