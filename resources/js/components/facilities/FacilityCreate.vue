<template>
  <div>
    <h3>Create New Facility</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="name">Name</label>
        	<input v-model="facility.name"  type="text" name="name" value="" class="form-control">
        	<small>{{errors.name_error}}</small>
        </div>

				<div class="form-group">
        	<label for="type">Type</label>
        	<input v-model="facility.type"  type="text" name="type" value="" class="form-control">
        	<small>{{errors.type_error}}</small>
        </div>

				<div class="form-group">
        	<label for="description">Description</label>
        	<input v-model="facility.description"  type="text" name="description" value="" class="form-control">
        	<small>{{errors.description_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="facility.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<div class="form-group">
					<label for="shoots">Shoot</label>
					<select v-model="facility.shoots"   name="shoots"  class="form-control"  multiple>
				             <option v-for="shoot in shoots" :value="shoot.id">{{ shoot.name }}</option>
				        </select>
					<small>{{errors.shoots_error}}</small>
				</div>

				<div class="form-group">
					<label for="docs">Doc</label>
					<select v-model="facility.docs"   name="docs"  class="form-control"  multiple>
				             <option v-for="doc in docs" :value="doc.id">{{ doc.title }}</option>
				        </select>
					<small>{{errors.docs_error}}</small>
				</div>

				<div class="form-group">
					<label for="shows">Show</label>
					<select v-model="facility.shows"   name="shows"  class="form-control"  multiple>
				             <option v-for="show in shows" :value="show.id">{{ show.user }}</option>
				        </select>
					<small>{{errors.shows_error}}</small>
				</div>

				<button @click="submitFacility()" type="submit" class="btn btn-primary">Submit</button>
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
				shoots:[],
				docs:[],
				shows:[],
				
        facility:{
          name:'',
					type:'',
					description:'',
					users:[],
					shoots:[],
					docs:[],
					shows:[],
					
        },
        errors:{
          name_error:'',
					type_error:'',
					description_error:'',
					users_error:[],
					shoots_error:[],
					docs_error:[],
					shows_error:[],
					
        },
      };
},
created:function(){
	axios.get(window.location.origin+'/api/shoots').then((response)=>{
		this.shoots = response.data.data;
	});
	axios.get(window.location.origin+'/api/docs').then((response)=>{
		this.docs = response.data.data;
	});
	axios.get(window.location.origin+'/api/shows').then((response)=>{
		this.shows = response.data.data;
	});
	},
methods:{
  submitFacility:function(){
    var facility = new FormData();
    for (let [key, value] of Object.entries(this.facility)) {
      facility.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.post(window.location.origin+'/api/facilities',facility,{headers:headers}).then((response)=>{
      this.$router.push({name:'facility-show',params:{id:response.data}});
    });
  },
  uploadAnexo($event){
		this.facility.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.facility.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.facility.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.facility.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.facility.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.facility.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.facility.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.facility.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.facility.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.facility.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
