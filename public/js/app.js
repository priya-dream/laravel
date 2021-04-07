/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 function apply(){
	 alert ('Application is submitted succesfully');
 }
	var loginBtn=document.querySelector('.login-btn');
	var myLogin=document.querySelector('.my-login');
    var modalClose=document.querySelector('.close-admin');
    if(modalBtn){
        loginBtn.addEventListener('click',function(){               
          myLogin.classList.add('bg-active');
        });}
	
    var modalBtn=document.querySelector('.modal-btn');
	var modalBg=document.querySelector('.modal-bg');
    var modalClose=document.querySelector('.close-admin');
	if(modalBtn){
        modalBtn.addEventListener('click',function(){               
          modalBg.classList.add('bg-active');
	});}
	if(modalBg){
        modalClose.addEventListener('click',function(){
          modalBg.classList.remove('bg-active');
	});}
		
	var i=0;
	function read(){
		if(!i){
			document.getElementById("card-sub").style.height="450px";
			document.getElementById("more-text").style.display="inline";
			document.getElementById("more-text").style.color="#fff";
			document.getElementById("read-more").innerHTML="Read less";
			i=1;
		}
		else{
			document.getElementById("card-sub").style.height="170px";
			document.getElementById("more-text").style.display="none";
			document.getElementById("read-more").innerHTML="Read More-->";
			i=0;
		}
	}


function stoppedTyping(){
        if(document.getElementById('advance_level').value==="Not Necessary") { 
            document.getElementById('stream').disabled = true; 
        } else { 
            document.getElementById('stream').disabled = false;
        }
    } 
	
	
	
// require('./bootstrap');

// window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
    // el: '#app',
// });
