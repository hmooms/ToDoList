
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

document.getElementById('sort').onclick = function(){sortList()};

function sortList(){
 
    var selectedList = document.getElementById("select-list").value;
    var selectedTask = document.getElementById("select-task").value;
    var parent = document.getElementById('list'+ selectedList);
    var toSort = parent.children;

    toSort = Array.prototype.slice.call(toSort, 0);
    // console.log(toSort, toSort[0].id.split('-')[0], toSort[1].id.split('-')[0], toSort[2].id.split('-')[0], toSort[3].id);


    toSort.sort(function(a, b) {
        var s1 = +a.id.split('-')[0];
        var s2 = +b.id.split('-')[0];
        var m1 = a.id.split('-')[1];
        var m2 = b.id.split('-')[1];

        if(selectedTask == "status"){
            if (s1 - s2 != 0) 
                return s1 - s2;
            else
                return m1 - m2;
        } else {
            if(m1 - m2 != 0){
                return m1 - m2;
            }
            else {
                return s1 - s2;
            }
        }   
    });

    parent.innerHTML = "";

    for(var i = 0, l = toSort.length; i < l; i++) {
        parent.appendChild(toSort[i]);
    }

    console.log(toSort, toSort[0].id.split('-')[1], selectedTask);
}
