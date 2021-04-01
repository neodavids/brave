<template>
  <div>
    <h3>Create New Show</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="user">User</label>
        	<input v-model="show.user"  type="text" name="user" value="" class="form-control">
        	<small>{{errors.user_error}}</small>
        </div>

				<div class="form-group">
        	<label for="date">Date</label>
        	<input v-model="show.date"  type="date" name="date" value="" class="form-control">
        	<small>{{errors.date_error}}</small>
        </div>

				<div class="form-group">
        	<label for="show_description">Show_description</label>
        	<input v-model="show.show_description"  type="text" name="show_description" value="" class="form-control">
        	<small>{{errors.show_description_error}}</small>
        </div>

				<div class="form-group">
        	<label for="studio">Studio</label>
        	<input v-model="show.studio"  type="text" name="studio" value="" class="form-control">
        	<small>{{errors.studio_error}}</small>
        </div>

				<div class="form-group">
        	<label for="start_time">Start_time</label>
        	<input v-model="show.start_time"  type="time" name="start_time" value="" class="form-control">
        	<small>{{errors.start_time_error}}</small>
        </div>

				<div class="form-group">
        	<label for="end_time">End_time</label>
        	<input v-model="show.end_time"  type="time" name="end_time" value="" class="form-control">
        	<small>{{errors.end_time_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="show.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<button @click="submitShow()" type="submit" class="btn btn-primary">Submit</button>
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
        show:{
          user:'',
					date:'',
					show_description:'',
					studio:'',
					start_time:'',
					end_time:'',
					users:[],
					
        },
        errors:{
          user_error:'',
					date_error:'',
					show_description_error:'',
					studio_error:'',
					start_time_error:'',
					end_time_error:'',
					users_error:[],
					
        },
      };
},
methods:{
  submitShow:function(){
    var show = new FormData();
    for (let [key, value] of Object.entries(this.show)) {
      show.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.post(window.location.origin+'/api/shows',show,{headers:headers}).then((response)=>{
      this.$router.push({name:'show-show',params:{id:response.data}});
    });
  },
  uploadAnexo($event){
		this.show.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.show.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.show.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.show.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.show.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.show.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.show.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.show.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.show.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.show.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
