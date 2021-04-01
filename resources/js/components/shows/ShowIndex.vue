<template>
  <div v-if="shows.length>0">
      <div v-for="show in shows">
        <router-link :to="show.link">{{show.user}}</router-link>
        {{show.date}}<hr>
							{{show.show_description}}<hr>
							{{show.studio}}<hr>
							{{show.start_time}}<hr>
							{{show.end_time}}<hr>
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        shows :[],
      };
},
created : function(){
  this.fetchShows();
},
methods:{
  fetchShows:function(){
    axios.get(window.location.origin+'/api/shows').then((response)=>{
      this.shows = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
