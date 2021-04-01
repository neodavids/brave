<template>
  <div>
    <h3>Update Booking</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="user">User</label>
        	<input v-model="booking.user"  type="text" name="user" value="" class="form-control">
        	<small>{{errors.user_error}}</small>
        </div>

				<div class="form-group">
        	<label for="date">Date</label>
        	<input v-model="booking.date"  type="date" name="date" value="" class="form-control">
        	<small>{{errors.date_error}}</small>
        </div>

				<div class="form-group">
        	<label for="start_time">Start_time</label>
        	<input v-model="booking.start_time"  type="time" name="start_time" value="" class="form-control">
        	<small>{{errors.start_time_error}}</small>
        </div>

				<div class="form-group">
        	<label for="end_time">End_time</label>
        	<input v-model="booking.end_time"  type="text" name="end_time" value="" class="form-control">
        	<small>{{errors.end_time_error}}</small>
        </div>

				<div class="form-group">
        	<label for="meeting_description">Meeting_description</label>
        	<input v-model="booking.meeting_description"  type="text" name="meeting_description" value="" class="form-control">
        	<small>{{errors.meeting_description_error}}</small>
        </div>

				<div class="form-group">
        	<label for="facility">Facility</label>
        	<input v-model="booking.facility"  type="text" name="facility" value="" class="form-control">
        	<small>{{errors.facility_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="booking.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<div class="form-group">
					<label for="facilities">Facility</label>
					<select v-model="booking.facilities"   name="facilities"  class="form-control"  multiple>
				             <option v-for="facility in facilities" :value="facility.id">{{ facility.name }}</option>
				        </select>
					<small>{{errors.facilities_error}}</small>
				</div>

				<button @click="updateBooking()" type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
				facilities:[],
				
        booking:{
          _method:'PUT',
          user:'',
					date:'',
					start_time:'',
					end_time:'',
					meeting_description:'',
					facility:'',
					users:[],
					facilities:[],
					
        },
        errors:{
          user_error:'',
					date_error:'',
					start_time_error:'',
					end_time_error:'',
					meeting_description_error:'',
					facility_error:'',
					users_error:[],
					facilities_error:[],
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/bookings/'+this.$route.params.id,headers).then((response)=>{
    this.booking = response.data.data;
  });
	axios.get(window.location.origin+'/api/facilities').then((response)=>{
		this.facilities = response.data.data;
	});
	
},
methods:{
  updateBooking:function(){
    var booking = new FormData();
    for (let [key, value] of Object.entries(this.booking)) {
      booking.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/bookings/'+this.$route.params.id,booking,{headers:headers}).then((response)=>{
      this.$router.push({name:'booking-show',params:{id:response.data}});
    });
  },
  uploadAnexo($event){
		this.booking.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.booking.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.booking.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.booking.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.booking.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.booking.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.booking.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.booking.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.booking.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.booking.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
