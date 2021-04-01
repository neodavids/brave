<template>
  <div v-if="shoots.length>0">
      <div v-for="shoot in shoots">
        <router-link :to="shoot.link">{{shoot.name}}</router-link>
        {{shoot.start_date}}<hr>
							{{shoot.end_date}}<hr>
							{{shoot.status}}<hr>
							{{shoot.producer_1}}<hr>
							{{shoot.producer_2}}<hr>
							{{shoot.producer_3}}<hr>
							{{shoot.producer_4}}<hr>
							{{shoot.description}}<hr>
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        shoots :[],
      };
},
created : function(){
  this.fetchShoots();
},
methods:{
  fetchShoots:function(){
    axios.get(window.location.origin+'/api/shoots').then((response)=>{
      this.shoots = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
