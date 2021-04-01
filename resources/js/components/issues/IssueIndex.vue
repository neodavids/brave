<template>
  <div v-if="issues.length>0">
      <div v-for="issue in issues">
        <router-link :to="issue.link">{{issue.item_name}}</router-link>
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
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        issues :[],
      };
},
created : function(){
  this.fetchIssues();
},
methods:{
  fetchIssues:function(){
    axios.get(window.location.origin+'/api/issues').then((response)=>{
      this.issues = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
