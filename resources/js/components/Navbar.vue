<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <router-link class="navbar-brand" to="//">
            /app/name
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
  <router-link class="nav-link" to="/roles">Role</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/bookings">Booking</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/issues">Issue</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/shoots">Shoot</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/docs">Doc</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/shows">Show</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/messages">Message</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/departments">Department</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/facilities">Facility</router-link>
</li>
		
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <div v-if="loggedIn==false">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/login"></router-link>
                    </li>
                    <li class="nav-item">
                        
                    </li>
                </div>
			<div v-if="loggedIn">
                    <li class="nav-item dropdown">
                        <router-link id="navbarDropdown" class="nav-link dropdown-toggle" to="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             <span class="caret"></span>
                        </router-link>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <li class="nav-item">
  <router-link class="nav-link" to="/roles/create">Add Role</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/bookings/create">Add Booking</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/issues/create">Add Issue</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/shoots/create">Add Shoot</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/docs/create">Add Doc</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/shows/create">Add Show</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/messages/create">Add Message</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/departments/create">Add Department</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/facilities/create">Add Facility</router-link>
</li>
		

                            <router-link class="dropdown-item" to="/logout"
                               >
                                
                            </router-link>

                            <form v-on:submit.prevent id="logout-form" action="/logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>
  </div>
</template>

<script>
export default {
  props:{
    user:{type:Object},
    loggedIn:{type:Boolean,default:false}
  },
  methods:{
    logout(){
      this.$emit('loggedOut');
    }
  }
}
</script>

<style lang="css" scoped>
</style>
