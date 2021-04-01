<template>
  <div>
      <div v-if="facility!=null" id="facility">
        <div>
          <h3><router-link :to="facility.link">{{facility.name}}</router-link></h3>

          {{facility.created_at}}
          {{facility.type}}<hr>
					{{facility.description}}<hr>
					
        <div>
          <router-link :to="'/facilities/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteFacility(facility)" :to="'/facilities/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        facility : null,
      };
},
created : function(){
  this.fetchFacility();
},
methods:{
  fetchFacility:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/facilities/'+id).then((response)=>{
      this.facility = response.data.data;
    });
  },
  deleteFacility(facility){
    if (confirm('Delete '+facility.name)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+facility.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'facility-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
