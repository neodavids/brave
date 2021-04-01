<template>
  <div v-if="bookings.length>0">
      <div v-for="booking in bookings">
        <router-link :to="booking.link">{{booking.user}}</router-link>
        {{booking.date}}<hr>
							{{booking.start_time}}<hr>
							{{booking.end_time}}<hr>
							{{booking.meeting_description}}<hr>
							{{booking.facility}}<hr>
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        bookings :[],
      };
},
created : function(){
  this.fetchBookings();
},
methods:{
  fetchBookings:function(){
    axios.get(window.location.origin+'/api/bookings').then((response)=>{
      this.bookings = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
