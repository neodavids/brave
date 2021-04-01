<template>
  <div>
    <h3>Create New Message</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="title">Title</label>
        	<input v-model="message.title"  type="text" name="title" value="" class="form-control">
        	<small>{{errors.title_error}}</small>
        </div>

				<div class="form-group">
        	<label for="body">Body</label>
        	<input v-model="message.body"  type="text" name="body" value="" class="form-control">
        	<small>{{errors.body_error}}</small>
        </div>

				<div class="form-group">
        	<label for="sender">Sender</label>
        	<input v-model="message.sender"  type="text" name="sender" value="" class="form-control">
        	<small>{{errors.sender_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="message.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<button @click="submitMessage()" type="submit" class="btn btn-primary">Submit</button>
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
        message:{
          title:'',
					body:'',
					sender:'',
					users:[],
					
        },
        errors:{
          title_error:'',
					body_error:'',
					sender_error:'',
					users_error:[],
					
        },
      };
},
methods:{
  submitMessage:function(){
    var message = new FormData();
    for (let [key, value] of Object.entries(this.message)) {
      message.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.post(window.location.origin+'/api/messages',message,{headers:headers}).then((response)=>{
      this.$router.push({name:'message-show',params:{id:response.data}});
    });
  },
  uploadAnexo($event){
		this.message.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.message.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.message.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.message.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.message.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.message.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.message.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.message.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.message.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.message.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
