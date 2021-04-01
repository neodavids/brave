<template>
  <div v-if="facilities.length>0">
      <div v-for="facility in facilities">
        <router-link :to="facility.link">{{facility.name}}</router-link>
        {{facility.type}}<hr>
							{{facility.description}}<hr>
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        facilities :[],
      };
},
created : function(){
  this.fetchFacilities();
},
methods:{
  fetchFacilities:function(){
    axios.get(window.location.origin+'/api/facilities').then((response)=>{
      this.facilities = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
