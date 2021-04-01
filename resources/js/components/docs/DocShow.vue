<template>
  <div>
      <div v-if="doc!=null" id="doc">
        <div>
          <h3><router-link :to="doc.link">{{doc.title}}</router-link></h3>

          {{doc.created_at}}
          {{doc.download_link}}<hr>
					{{doc.last_updated}}<hr>
					
        <div>
          <router-link :to="'/docs/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteDoc(doc)" :to="'/docs/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        doc : null,
      };
},
created : function(){
  this.fetchDoc();
},
methods:{
  fetchDoc:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/docs/'+id).then((response)=>{
      this.doc = response.data.data;
    });
  },
  deleteDoc(doc){
    if (confirm('Delete '+doc.title)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+doc.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'doc-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
