<template>
  <div v-if="messages.length>0">
      <div v-for="message in messages">
        <router-link :to="message.link">{{message.title}}</router-link>
        {{message.body}}<hr>
							{{message.sender}}<hr>
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        messages :[],
      };
},
created : function(){
  this.fetchMessages();
},
methods:{
  fetchMessages:function(){
    axios.get(window.location.origin+'/api/messages').then((response)=>{
      this.messages = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
