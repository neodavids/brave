<template>
  <div>
      <div v-if="issue!=null" id="issue">
        <div>
          <h3><router-link :to="issue.link">{{issue.item_name}}</router-link></h3>

          {{issue.created_at}}
          {{issue.description}}<hr>
					{{issue.date}}<hr>
					{{issue.location}}<hr>
					{{issue.raised_by}}<hr>
					{{issue.department}}<hr>
					{{issue.status}}<hr>
					{{issue.solved_by}}<hr>
					{{issue.action_taken}}<hr>
					{{issue.cause_of_breakdown}}<hr>
					{{issue.engineers_comment}}<hr>
					
        <div>
          <router-link :to="'/issues/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteIssue(issue)" :to="'/issues/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        issue : null,
      };
},
created : function(){
  this.fetchIssue();
},
methods:{
  fetchIssue:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/issues/'+id).then((response)=>{
      this.issue = response.data.data;
    });
  },
  deleteIssue(issue){
    if (confirm('Delete '+issue.item_name)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+issue.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'issue-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
