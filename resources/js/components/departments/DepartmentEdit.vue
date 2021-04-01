<template>
  <div>
    <h3>Update Department</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="name">Name</label>
        	<input v-model="department.name"  type="text" name="name" value="" class="form-control">
        	<small>{{errors.name_error}}</small>
        </div>

				<div class="form-group">
        	<label for="head_of_department">Head_of_department</label>
        	<input v-model="department.head_of_department"  type="text" name="head_of_department" value="" class="form-control">
        	<small>{{errors.head_of_department_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="department.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<div class="form-group">
					<label for="issues">Issue</label>
					<select v-model="department.issues"   name="issues"  class="form-control"  multiple>
				             <option v-for="issue in issues" :value="issue.id">{{ issue.item_name }}</option>
				        </select>
					<small>{{errors.issues_error}}</small>
				</div>

				<div class="form-group">
					<label for="shows">Show</label>
					<select v-model="department.shows"   name="shows"  class="form-control"  multiple>
				             <option v-for="show in shows" :value="show.id">{{ show.user }}</option>
				        </select>
					<small>{{errors.shows_error}}</small>
				</div>

				<div class="form-group">
					<label for="messages">Message</label>
					<select v-model="department.messages"   name="messages"  class="form-control"  multiple>
				             <option v-for="message in messages" :value="message.id">{{ message.title }}</option>
				        </select>
					<small>{{errors.messages_error}}</small>
				</div>

				<button @click="updateDepartment()" type="submit" class="btn btn-primary">Submit</button>
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
				issues:[],
				shows:[],
				messages:[],
				
        department:{
          _method:'PUT',
          name:'',
					head_of_department:'',
					users:[],
					issues:[],
					shows:[],
					messages:[],
					
        },
        errors:{
          name_error:'',
					head_of_department_error:'',
					users_error:[],
					issues_error:[],
					shows_error:[],
					messages_error:[],
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/departments/'+this.$route.params.id,headers).then((response)=>{
    this.department = response.data.data;
  });
	axios.get(window.location.origin+'/api/issues').then((response)=>{
		this.issues = response.data.data;
	});
	axios.get(window.location.origin+'/api/shows').then((response)=>{
		this.shows = response.data.data;
	});
	axios.get(window.location.origin+'/api/messages').then((response)=>{
		this.messages = response.data.data;
	});
	
},
methods:{
  updateDepartment:function(){
    var department = new FormData();
    for (let [key, value] of Object.entries(this.department)) {
      department.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/departments/'+this.$route.params.id,department,{headers:headers}).then((response)=>{
      this.$router.push({name:'department-show',params:{id:response.data}});
    });
  },
  uploadAnexo($event){
		this.department.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.department.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.department.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.department.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.department.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.department.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.department.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.department.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.department.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.department.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
