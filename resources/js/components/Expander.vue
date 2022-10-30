<template>
  <div class='flex flex-column'>
    <label for="nume" class='primary-color'>Expander</label>
    <input class='border border-gray-800' name="expander" type="text" id="expander_input" v-model="expanderValue">
  </div>
  <button class='btn btn-primary my-2' @click="this.getResults()">Expand</button>
  <div class='primary-color'>
    <span> {{ expanderResponse }}</span>
  </div>
</template>

<script>

import axios from 'axios'

export default {
  name: 'Expander',
  data: () => {
        return {
            expanderValue:"",
            expanderResponse:"",
        }
    },
  components: {
 
  },
  methods: {
    async getResults() 
    {
      let link = '/api/expander?expander=' + this.expanderValue;

      let getResult  = await axios.get(link)
          .then(response => {
              this.expanderResponse = response.data;
          })
          .catch(err =>console.error(err));
    },
  }
}

</script>

<style lang="scss">
main {
  
  // opacity:0.01;

}
</style>
