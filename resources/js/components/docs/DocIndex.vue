<template>
  <div v-if="docs.length>0">
      <div v-for="doc in docs">
        <router-link :to="doc.link">{{doc.title}}</router-link>
        {{doc.download_link}}<hr>
							{{doc.last_updated}}<hr>
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        docs :[],
      };
},
created : function(){
  this.fetchDocs();
},
methods:{
  fetchDocs:function(){
    axios.get(window.location.origin+'/api/docs').then((response)=>{
      this.docs = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
