<template>
  <div v-if="departments.length>0">
      <div v-for="department in departments">
        <router-link :to="department.link">{{department.name}}</router-link>
        {{department.head_of_department}}<hr>
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        departments :[],
      };
},
created : function(){
  this.fetchDepartments();
},
methods:{
  fetchDepartments:function(){
    axios.get(window.location.origin+'/api/departments').then((response)=>{
      this.departments = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
