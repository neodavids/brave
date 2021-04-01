<template>
  <div>
    <h3>Create New Doc</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="title">Title</label>
        	<input v-model="doc.title"  type="text" name="title" value="" class="form-control">
        	<small>{{errors.title_error}}</small>
        </div>

				<div class="form-group">
        	<label for="download_link">Download_link</label>
        	<input v-model="doc.download_link"  type="text" name="download_link" value="" class="form-control">
        	<small>{{errors.download_link_error}}</small>
        </div>

				<div class="form-group">
        	<label for="last_updated">Last_updated</label>
        	<input v-model="doc.last_updated"  type="datetime-local" name="last_updated" value="" class="form-control">
        	<small>{{errors.last_updated_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="doc.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<button @click="submitDoc()" type="submit" class="btn btn-primary">Submit</button>
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
        doc:{
          title:'',
					download_link:'',
					last_updated:'',
					users:[],
					
        },
        errors:{
          title_error:'',
					download_link_error:'',
					last_updated_error:'',
					users_error:[],
					
        },
      };
},
methods:{
  submitDoc:function(){
    var doc = new FormData();
    for (let [key, value] of Object.entries(this.doc)) {
      doc.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.post(window.location.origin+'/api/docs',doc,{headers:headers}).then((response)=>{
      this.$router.push({name:'doc-show',params:{id:response.data}});
    });
  },
  uploadAnexo($event){
		this.doc.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.doc.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.doc.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.doc.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.doc.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.doc.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.doc.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.doc.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.doc.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.doc.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
