
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
    	errors: {
    		name: true,
    		email: true,
    		validEmail: true,
    		phone: true,
    		message: true,
    		visibility: false,
    	},
    	success: false,
    	contact_form: {
    		'name' : '',
    		'email': '',
    		'phone': '',
    		'message': '',
    	},
    	reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
    },
    methods: {
    	checkForm: function(e){
    			console.log('ola');

		      if (this.contact_form.name != '') {
		        this.errors.name = false;
		      }
		      else{
		      	this.errors.name = true;
		      }
		      if (this.contact_form.email != '') {
		        this.errors.email = false;
		      }else{
		      	this.errors.email = true;
		      }
		      if((this.contact_form.email != '') && this.reg.test(this.contact_form.email)){
		      	this.errors.validEmail = false;
		      }
		      else{
		      	this.errors.validEmail = true;
		      }
		      if (this.contact_form.phone != '') {
		        this.errors.phone = false;
		      }else{
		      	this.errors.phone = true;
		      }
		      if (this.contact_form.message != '') {
		        this.errors.message = false;
		      }
		      else{
		      	this.errors.message = true;
		      }
		      if(this.errors.name || this.errors.email || this.errors.validEmail || this.errors.phone || this.errors.message){
		      	this.errors.visibility = true;
		      }
		      else {
		      	this.errors.visibility = false;
		      	this.success = true;
		      }
		      e.preventDefault();
    	},
    }
});
