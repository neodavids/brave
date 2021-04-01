<template>
  <div>
      <div v-if="message!=null" id="message">
        <div>
          <h3><router-link :to="message.link">{{message.title}}</router-link></h3>

          {{message.created_at}}
          {{message.body}}<hr>
					{{message.sender}}<hr>
					
        <div>
          <router-link :to="'/messages/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteMessage(message)" :to="'/messages/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        message : null,
      };
},
created : function(){
  this.fetchMessage();
},
methods:{
  fetchMessage:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/messages/'+id).then((response)=>{
      this.message = response.data.data;
    });
  },
  deleteMessage(message){
    if (confirm('Delete '+message.title)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+message.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'message-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
