
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
window.axios = require('axios');
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

Vue.component('navbar',require('./components/Navbar.vue').default);
Vue.component('login',require('./components/auth/Login.vue').default);
Vue.component('register',require('./components/auth/Register.vue').default);
Vue.component('app',require('./components/App.vue').default);
Vue.component('profile',require('./components/Profile.vue').default);
Vue.component('role-index',require('./components/roles/RoleIndex.vue').default);
Vue.component('role-create',require('./components/roles/RoleCreate.vue').default);
Vue.component('role-show',require('./components/roles/RoleShow.vue').default);
Vue.component('role-edit',require('./components/roles/RoleEdit.vue').default);
Vue.component('booking-index',require('./components/bookings/BookingIndex.vue').default);
Vue.component('booking-create',require('./components/bookings/BookingCreate.vue').default);
Vue.component('booking-show',require('./components/bookings/BookingShow.vue').default);
Vue.component('booking-edit',require('./components/bookings/BookingEdit.vue').default);
Vue.component('issue-index',require('./components/issues/IssueIndex.vue').default);
Vue.component('issue-create',require('./components/issues/IssueCreate.vue').default);
Vue.component('issue-show',require('./components/issues/IssueShow.vue').default);
Vue.component('issue-edit',require('./components/issues/IssueEdit.vue').default);
Vue.component('shoot-index',require('./components/shoots/ShootIndex.vue').default);
Vue.component('shoot-create',require('./components/shoots/ShootCreate.vue').default);
Vue.component('shoot-show',require('./components/shoots/ShootShow.vue').default);
Vue.component('shoot-edit',require('./components/shoots/ShootEdit.vue').default);
Vue.component('doc-index',require('./components/docs/DocIndex.vue').default);
Vue.component('doc-create',require('./components/docs/DocCreate.vue').default);
Vue.component('doc-show',require('./components/docs/DocShow.vue').default);
Vue.component('doc-edit',require('./components/docs/DocEdit.vue').default);
Vue.component('show-index',require('./components/shows/ShowIndex.vue').default);
Vue.component('show-create',require('./components/shows/ShowCreate.vue').default);
Vue.component('show-show',require('./components/shows/ShowShow.vue').default);
Vue.component('show-edit',require('./components/shows/ShowEdit.vue').default);
Vue.component('message-index',require('./components/messages/MessageIndex.vue').default);
Vue.component('message-create',require('./components/messages/MessageCreate.vue').default);
Vue.component('message-show',require('./components/messages/MessageShow.vue').default);
Vue.component('message-edit',require('./components/messages/MessageEdit.vue').default);
Vue.component('department-index',require('./components/departments/DepartmentIndex.vue').default);
Vue.component('department-create',require('./components/departments/DepartmentCreate.vue').default);
Vue.component('department-show',require('./components/departments/DepartmentShow.vue').default);
Vue.component('department-edit',require('./components/departments/DepartmentEdit.vue').default);
Vue.component('facility-index',require('./components/facilities/FacilityIndex.vue').default);
Vue.component('facility-create',require('./components/facilities/FacilityCreate.vue').default);
Vue.component('facility-show',require('./components/facilities/FacilityShow.vue').default);
Vue.component('facility-edit',require('./components/facilities/FacilityEdit.vue').default);

let routes = [
    {path: '/login',name : 'login', component : require('./components/auth/Login.vue').default},
    {path: '/register',name : 'register', component : require('./components/auth/Register.vue').default},
    {path: '/profile',name : 'profile', component : require('./components/Profile.vue').default,meta:{requiresAuth:true}},
    {path: '/roles',name: 'role-index', component : require('./components/roles/RoleIndex.vue').default},
		{path: '/roles/create',name : 'role-create', component : require('./components/roles/RoleCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/roles/:slug',name : 'role-show', component : require('./components/roles/RoleShow.vue').default},
		{path: '/roles/:slug/edit',name : 'role-edit',component : require('./components/roles/RoleEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/bookings',name: 'booking-index', component : require('./components/bookings/BookingIndex.vue').default},
		{path: '/bookings/create',name : 'booking-create', component : require('./components/bookings/BookingCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/bookings/:id',name : 'booking-show', component : require('./components/bookings/BookingShow.vue').default},
		{path: '/bookings/:id/edit',name : 'booking-edit',component : require('./components/bookings/BookingEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/issues',name: 'issue-index', component : require('./components/issues/IssueIndex.vue').default},
		{path: '/issues/create',name : 'issue-create', component : require('./components/issues/IssueCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/issues/:id',name : 'issue-show', component : require('./components/issues/IssueShow.vue').default},
		{path: '/issues/:id/edit',name : 'issue-edit',component : require('./components/issues/IssueEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/shoots',name: 'shoot-index', component : require('./components/shoots/ShootIndex.vue').default},
		{path: '/shoots/create',name : 'shoot-create', component : require('./components/shoots/ShootCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/shoots/:id',name : 'shoot-show', component : require('./components/shoots/ShootShow.vue').default},
		{path: '/shoots/:id/edit',name : 'shoot-edit',component : require('./components/shoots/ShootEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/docs',name: 'doc-index', component : require('./components/docs/DocIndex.vue').default},
		{path: '/docs/create',name : 'doc-create', component : require('./components/docs/DocCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/docs/:id',name : 'doc-show', component : require('./components/docs/DocShow.vue').default},
		{path: '/docs/:id/edit',name : 'doc-edit',component : require('./components/docs/DocEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/shows',name: 'show-index', component : require('./components/shows/ShowIndex.vue').default},
		{path: '/shows/create',name : 'show-create', component : require('./components/shows/ShowCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/shows/:id',name : 'show-show', component : require('./components/shows/ShowShow.vue').default},
		{path: '/shows/:id/edit',name : 'show-edit',component : require('./components/shows/ShowEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/messages',name: 'message-index', component : require('./components/messages/MessageIndex.vue').default},
		{path: '/messages/create',name : 'message-create', component : require('./components/messages/MessageCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/messages/:id',name : 'message-show', component : require('./components/messages/MessageShow.vue').default},
		{path: '/messages/:id/edit',name : 'message-edit',component : require('./components/messages/MessageEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/departments',name: 'department-index', component : require('./components/departments/DepartmentIndex.vue').default},
		{path: '/departments/create',name : 'department-create', component : require('./components/departments/DepartmentCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/departments/:id',name : 'department-show', component : require('./components/departments/DepartmentShow.vue').default},
		{path: '/departments/:id/edit',name : 'department-edit',component : require('./components/departments/DepartmentEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/facilities',name: 'facility-index', component : require('./components/facilities/FacilityIndex.vue').default},
		{path: '/facilities/create',name : 'facility-create', component : require('./components/facilities/FacilityCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/facilities/:id',name : 'facility-show', component : require('./components/facilities/FacilityShow.vue').default},
		{path: '/facilities/:id/edit',name : 'facility-edit',component : require('./components/facilities/FacilityEdit.vue').default,meta:{requiresAuth:true}},
];

const router = new VueRouter({
  routes
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth)
    if (localStorage.getItem('loggedin')=='true') {
      next()
    }else {
      next({ name: 'login' })
    }
  else
    if (to.name=='login' || to.name=='register') {
      if (localStorage.getItem('loggedin')=='true') {
        next({name:'profile'})
      }else {
        next()
      }
    }else {
      next()
    }
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
