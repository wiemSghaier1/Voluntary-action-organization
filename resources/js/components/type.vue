<template>




<div >
    <ul class="list-group list-group-flush" >
      <li class="list-group-item " v-for="type in types.data" :key="type.type">
        <span class="badge badge-secondary badge-pill">14</span>
      <!--  <router-link   class="text-secondary" :to=" '/events/${type.type}' "> <strong> {{type.type}} </strong></router-link> 
       -->
        <router-link class="text-muted" :to="{ name: 'evpartype', params: { type: type.type }}"> <strong  > {{type.type}} </strong></router-link>
      </li>
    </ul>
    
  </div>


</template>

<script>
    export default {
       data() {return {types:{}}  },
       created() {this.getType();},
       methods :{ getType(){
         axios.get('/api/types')
              .then(response => {console.log(response.data);
                this.types =response.data})
              .catch(err =>console.log(err));
       }}
    }


</script>
