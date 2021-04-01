<template>
  <div>
      <div v-if="shoot!=null" id="shoot">
        <div>
          <h3><router-link :to="shoot.link">{{shoot.name}}</router-link></h3>

          {{shoot.created_at}}
          {{shoot.start_date}}<hr>
					{{shoot.end_date}}<hr>
					{{shoot.status}}<hr>
					{{shoot.producer_1}}<hr>
					{{shoot.producer_2}}<hr>
					{{shoot.producer_3}}<hr>
					{{shoot.producer_4}}<hr>
					{{shoot.description}}<hr>
					
        <div>
          <router-link :to="'/shoots/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteShoot(shoot)" :to="'/shoots/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        shoot : null,
      };
},
created : function(){
  this.fetchShoot();
},
methods:{
  fetchShoot:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/shoots/'+id).then((response)=>{
      this.shoot = response.data.data;
    });
  },
  deleteShoot(shoot){
    if (confirm('Delete '+shoot.name)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+shoot.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'shoot-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
