<template>
  <div>
    <h3>Update Shoot</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="name">Name</label>
        	<input v-model="shoot.name"  type="text" name="name" value="" class="form-control">
        	<small>{{errors.name_error}}</small>
        </div>

				<div class="form-group">
        	<label for="start_date">Start_date</label>
        	<input v-model="shoot.start_date"  type="date" name="start_date" value="" class="form-control">
        	<small>{{errors.start_date_error}}</small>
        </div>

				<div class="form-group">
        	<label for="end_date">End_date</label>
        	<input v-model="shoot.end_date"  type="date" name="end_date" value="" class="form-control">
        	<small>{{errors.end_date_error}}</small>
        </div>

				<div class="form-group">
        	<label for="status">Status</label>
        	<input v-model="shoot.status"  type="text" name="status" value="" class="form-control">
        	<small>{{errors.status_error}}</small>
        </div>

				<div class="form-group">
        	<label for="producer_1">Producer_1</label>
        	<input v-model="shoot.producer_1"  type="text" name="producer_1" value="" class="form-control">
        	<small>{{errors.producer_1_error}}</small>
        </div>

				<div class="form-group">
        	<label for="producer_2">Producer_2</label>
        	<input v-model="shoot.producer_2"  type="text" name="producer_2" value="" class="form-control">
        	<small>{{errors.producer_2_error}}</small>
        </div>

				<div class="form-group">
        	<label for="producer_3">Producer_3</label>
        	<input v-model="shoot.producer_3"  type="text" name="producer_3" value="" class="form-control">
        	<small>{{errors.producer_3_error}}</small>
        </div>

				<div class="form-group">
        	<label for="producer_4">Producer_4</label>
        	<input v-model="shoot.producer_4"  type="text" name="producer_4" value="" class="form-control">
        	<small>{{errors.producer_4_error}}</small>
        </div>

				<div class="form-group">
        	<label for="description">Description</label>
        	<input v-model="shoot.description"  type="text" name="description" value="" class="form-control">
        	<small>{{errors.description_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="shoot.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<button @click="updateShoot()" type="submit" class="btn btn-primary">Submit</button>
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
        shoot:{
          _method:'PUT',
          name:'',
					start_date:'',
					end_date:'',
					status:'',
					producer_1:'',
					producer_2:'',
					producer_3:'',
					producer_4:'',
					description:'',
					users:[],
					
        },
        errors:{
          name_error:'',
					start_date_error:'',
					end_date_error:'',
					status_error:'',
					producer_1_error:'',
					producer_2_error:'',
					producer_3_error:'',
					producer_4_error:'',
					description_error:'',
					users_error:[],
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/shoots/'+this.$route.params.id,headers).then((response)=>{
    this.shoot = response.data.data;
  });
},
methods:{
  updateShoot:function(){
    var shoot = new FormData();
    for (let [key, value] of Object.entries(this.shoot)) {
      shoot.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/shoots/'+this.$route.params.id,shoot,{headers:headers}).then((response)=>{
      this.$router.push({name:'shoot-show',params:{id:response.data}});
    });
  },
  uploadAnexo($event){
		this.shoot.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.shoot.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.shoot.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.shoot.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.shoot.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.shoot.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.shoot.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.shoot.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.shoot.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.shoot.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
