<template>
  <div class='flex flex-column'>
    <label for="nume" class='primary-color'>Shortener</label>
    <input class='border border-gray-800' name="shortener" type="text" id="shortener_input" v-model="shortenerValue">
  </div>
  <button class='btn btn-primary my-2' @click="this.getResults()">Shorten</button>
  <div>
    <div class='primary-color m-2' v-if="this.shortenLink">      
      Shorten: {{ this.shortenLink }}
    </div>
    <div class='secondary-color m-2' v-if="this.originalLink">
      Original: {{ this.originalLink }}
    </div>
  </div>
</template>

<script>

import axios from 'axios'

export default {
  name: 'Shortener',
  data: () => {
        return {
            shortenerValue:"",
            shortenLink:"",
            originalLink:""
        }
    },
  props: {
    api_token:String
  },

  components: {
 
  },
  methods: {
    async getResults() 
    {
      if (this.shortenerValue && this.api_token){
        let link = '/api/shortener?shortener=' + this.shortenerValue;
        link += '&api_token=' + this.api_token

        let getResult  = await axios.get(link)
          .then(response => {
            this.shortenLink = response.data.shorten_link;
            this.originalLink = response.data.original_link;
          })
          .catch(err =>console.error(err));

      }


    },
    
  },
}

</script>

<style lang="scss">
main {
  
  // opacity:0.01;

}
</style>
