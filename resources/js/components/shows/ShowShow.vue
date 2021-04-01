<template>
  <div>
      <div v-if="show!=null" id="show">
        <div>
          <h3><router-link :to="show.link">{{show.user}}</router-link></h3>

          {{show.created_at}}
          {{show.date}}<hr>
					{{show.show_description}}<hr>
					{{show.studio}}<hr>
					{{show.start_time}}<hr>
					{{show.end_time}}<hr>
					
        <div>
          <router-link :to="'/shows/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteShow(show)" :to="'/shows/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        show : null,
      };
},
created : function(){
  this.fetchShow();
},
methods:{
  fetchShow:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/shows/'+id).then((response)=>{
      this.show = response.data.data;
    });
  },
  deleteShow(show){
    if (confirm('Delete '+show.user)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+show.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'show-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
