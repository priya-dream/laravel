/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
  var modalBtn=document.querySelector('.modal-btn');
	    var modalBg=document.querySelector('.modal-bg');
      var modalClose=document.querySelector('.close-admin');
        modalBtn.addEventListener('click',function(){               
          modalBg.classList.add('bg-active');
        });
        modalClose.addEventListener('click',function(){
          modalBg.classList.remove('bg-active');
        });


var readMore=document.querySelector('.read-more');
var topText = document.querySelector('.card-sub');
readMore.addEventListener('click',function(){
	topText.classList.add('show-more');
	if(readMore.innerText==='Read More-->'){
                        readMore.innerText='Read less';}
                  else{
                        readMore.innerText='Read More-->';}
            })
});

$(".read-more").on('click',function(){
      $(this).parent().toggleclass("show-more");
     });

function stoppedTyping(){
        if(document.getElementById('advance_level').value==="Not Necessary") { 
            document.getElementById('stream').disabled = true; 
        } else { 
            document.getElementById('stream').disabled = false;
        }
    } 
	
	
	
require('./bootstrap');

window.Vue = require('vue');



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

const app = new Vue({
    el: '#app',
});
