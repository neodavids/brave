<template>
  <div>
      <div v-if="booking!=null" id="booking">
        <div>
          <h3><router-link :to="booking.link">{{booking.user}}</router-link></h3>

          {{booking.created_at}}
          {{booking.date}}<hr>
					{{booking.start_time}}<hr>
					{{booking.end_time}}<hr>
					{{booking.meeting_description}}<hr>
					{{booking.facility}}<hr>
					
        <div>
          <router-link :to="'/bookings/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteBooking(booking)" :to="'/bookings/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        booking : null,
      };
},
created : function(){
  this.fetchBooking();
},
methods:{
  fetchBooking:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/bookings/'+id).then((response)=>{
      this.booking = response.data.data;
    });
  },
  deleteBooking(booking){
    if (confirm('Delete '+booking.user)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+booking.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'booking-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
