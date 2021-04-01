<template>
  <div>
    <h3>Update Issue</h3>
    <hr>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <form v-on:submit.prevent class="form-horizontal" >
              <div class="form-group">
        	<label for="item_name">Item_name</label>
        	<input v-model="issue.item_name"  type="text" name="item_name" value="" class="form-control">
        	<small>{{errors.item_name_error}}</small>
        </div>

				<div class="form-group">
        	<label for="description">Description</label>
        	<input v-model="issue.description"  type="text" name="description" value="" class="form-control">
        	<small>{{errors.description_error}}</small>
        </div>

				<div class="form-group">
        	<label for="date">Date</label>
        	<input v-model="issue.date"  type="date" name="date" value="" class="form-control">
        	<small>{{errors.date_error}}</small>
        </div>

				<div class="form-group">
        	<label for="location">Location</label>
        	<input v-model="issue.location"  type="text" name="location" value="" class="form-control">
        	<small>{{errors.location_error}}</small>
        </div>

				<div class="form-group">
        	<label for="raised_by">Raised_by</label>
        	<input v-model="issue.raised_by"  type="text" name="raised_by" value="" class="form-control">
        	<small>{{errors.raised_by_error}}</small>
        </div>

				<div class="form-group">
        	<label for="department">Department</label>
        	<input v-model="issue.department"  type="text" name="department" value="" class="form-control">
        	<small>{{errors.department_error}}</small>
        </div>

				<div class="form-group">
        	<label for="status">Status</label>
        	<input v-model="issue.status"  type="text" name="status" value="" class="form-control">
        	<small>{{errors.status_error}}</small>
        </div>

				<div class="form-group">
        	<label for="solved_by">Solved_by</label>
        	<input v-model="issue.solved_by"  type="text" name="solved_by" value="" class="form-control">
        	<small>{{errors.solved_by_error}}</small>
        </div>

				<div class="form-group">
        	<label for="action_taken">Action_taken</label>
        	<input v-model="issue.action_taken"  type="text" name="action_taken" value="" class="form-control">
        	<small>{{errors.action_taken_error}}</small>
        </div>

				<div class="form-group">
        	<label for="cause_of_breakdown">Cause_of_breakdown</label>
        	<input v-model="issue.cause_of_breakdown"  type="text" name="cause_of_breakdown" value="" class="form-control">
        	<small>{{errors.cause_of_breakdown_error}}</small>
        </div>

				<div class="form-group">
        	<label for="engineers_comment">Engineers_comment</label>
        	<input v-model="issue.engineers_comment"  type="text" name="engineers_comment" value="" class="form-control">
        	<small>{{errors.engineers_comment_error}}</small>
        </div>

				<div class="form-group">
					<label for="users">User</label>
					<select v-model="issue.users"   name="users"  class="form-control"  multiple>
				             <option v-for="user in users" :value="user.id">{{ user.name }}</option>
				        </select>
					<small>{{errors.users_error}}</small>
				</div>

				<button @click="updateIssue()" type="submit" class="btn btn-primary">Submit</button>
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
        issue:{
          _method:'PUT',
          item_name:'',
					description:'',
					date:'',
					location:'',
					raised_by:'',
					department:'',
					status:'',
					solved_by:'',
					action_taken:'',
					cause_of_breakdown:'',
					engineers_comment:'',
					users:[],
					
        },
        errors:{
          item_name_error:'',
					description_error:'',
					date_error:'',
					location_error:'',
					raised_by_error:'',
					department_error:'',
					status_error:'',
					solved_by_error:'',
					action_taken_error:'',
					cause_of_breakdown_error:'',
					engineers_comment_error:'',
					users_error:[],
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/issues/'+this.$route.params.id,headers).then((response)=>{
    this.issue = response.data.data;
  });
},
methods:{
  updateIssue:function(){
    var issue = new FormData();
    for (let [key, value] of Object.entries(this.issue)) {
      issue.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/issues/'+this.$route.params.id,issue,{headers:headers}).then((response)=>{
      this.$router.push({name:'issue-show',params:{id:response.data}});
    });
  },
  uploadAnexo($event){
		this.issue.anexo = $event.target.files[0];
	},
	uploadFile($event){
		this.issue.file = $event.target.files[0];
	},
	uploadArchivo($event){
		this.issue.archivo = $event.target.files[0];
	},
	uploadConstancia($event){
		this.issue.constancia = $event.target.files[0];
	},
	uploadArchivo($event){
		this.issue.archivo = $event.target.files[0];
	},
	uploadArchivo($event){
		this.issue.archivo = $event.target.files[0];
	},
	uploadNpwp($event){
		this.issue.npwp = $event.target.files[0];
	},
	uploadAkta($event){
		this.issue.akta = $event.target.files[0];
	},
	uploadNib($event){
		this.issue.nib = $event.target.files[0];
	},
	uploadIzin_usaha($event){
		this.issue.izin_usaha = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
