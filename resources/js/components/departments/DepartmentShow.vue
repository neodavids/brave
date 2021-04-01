<template>
  <div>
      <div v-if="department!=null" id="department">
        <div>
          <h3><router-link :to="department.link">{{department.name}}</router-link></h3>

          {{department.created_at}}
          {{department.head_of_department}}<hr>
					
        <div>
          <router-link :to="'/departments/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteDepartment(department)" :to="'/departments/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        department : null,
      };
},
created : function(){
  this.fetchDepartment();
},
methods:{
  fetchDepartment:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/departments/'+id).then((response)=>{
      this.department = response.data.data;
    });
  },
  deleteDepartment(department){
    if (confirm('Delete '+department.name)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+department.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'department-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
