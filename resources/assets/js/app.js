
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
// Vue.config.devtools = process.env.NODE_ENV === 'development';
// Vue.config.devtools = true
// Vue.config.productionTip = false;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// window.slick = require('slick-carousel');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	message: 'Hello Vue!',
    	errors: [],
    	contact_form: {
    		'name' : '',
    		'email': '',
    		'phone': '',
    		'message': '',
    	}
    },
    methods: {
    	checkForm: function(e){

    		if (this.contact_form.name && this.contact_form.email && this.contact_form.phone && this.contact_form.message) {
		        return true;
		      }
		      this.errors = [];

		      if (!this.contact_form.name) {
		        this.errors.push('Name required.');
		      }
		      if (!this.contact_form.email) {
		        this.errors.push('email required.');
		      }
		      if (!this.contact_form.phone) {
		        this.errors.push('phone required.');
		      }
		      if (!this.contact_form.messasge) {
		        this.errors.push('messasge required.');
		      }

		      e.preventDefault();
    	}
    }
});
