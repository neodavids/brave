<template>
  <div>
    <h3>Update Role</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="name">Name</label>
        	<input v-model="role.name"  type="text" name="name" value="" class="form-control">
        	<small>{{errors.name_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="role.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<button @click="updateRole()" type="submit" class="btn btn-primary">Submit</button>
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
        role:{
          _method:'PUT',
          name:'',
					users:[],
					
        },
        errors:{
          name_error:'',
					users_error:[],
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/roles/'+this.$route.params.slug,headers).then((response)=>{
    this.role = response.data.data;
  });
},
methods:{
  updateRole:function(){
    var role = new FormData();
    for (let [key, value] of Object.entries(this.role)) {
      role.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/roles/'+this.$route.params.slug,role,{headers:headers}).then((response)=>{
      this.$router.push({name:'role-show',params:{slug:response.data}});
    });
  },
  uploadAnexo($event){
		this.role.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.role.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.role.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.role.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.role.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.role.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.role.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.role.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.role.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.role.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
