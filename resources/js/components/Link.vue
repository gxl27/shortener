<template>
  <div class='flex flex-column'>
    <label for="search" class='primary-color'>Search original link</label>
    <input class='border border-gray-800' name="search" type="text" id="search_input" v-model="searchValue" @keyup="this.changeInput()">
  </div>
  <table>
    <tr>
      <th>        
        <div class='flex flex-column'>
          <label class='pt-9 '>#</label>
        </div>
      </th>
      <th>        
        <div class='flex flex-column'>
          <label  class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('original_link')">Original Link</label>
        </div>
      </th>
      <th>        
        <div class='flex flex-column'>
          <label  class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('shorten_link')">Slug</label>
        </div>
      </th>
      <th>        
        <div class='flex flex-column'>
          <label  class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('link_clicks_count')">Clicks</label>
        </div>
      </th>
      <th>        
        <div class='flex flex-column'>
          <label  class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('description')">Add slug</label>
        </div>
      </th>
    </tr>
    <tr v-for="(link, index) in linksData.data" :key="link.id">
          <td>{{ (linksData.current_page - 1) * linksData.per_page + index + 1 }}</td>
          <td>{{ link.original_link }}</td>
          <td>{{ link.shorten_link }}{{ link.description }}</td>
          <td>{{ link.link_clicks_count }}</td>
          <td>
            <div class='flex'>
              <input class='border border-gray-800' name="description_input" type="text"  v-model="link.description">
              <div @click="this.modifyDescription(link.id, link.description)" class='btn btn-success'>Modify</div>
            </div>
          </td>
    </tr>
  </table>
    <Pagination :data="linksData" @pagination-change-page="getResults" :limit="2">
    <span slot="prev-nav">&lt; Previous</span> <span slot="next-nav">Next &gt;</span>
  </Pagination>

</template>

<script>

import axios from 'axios'
import LaravelVuePagination from 'laravel-vue-pagination';

export default {
  name: 'Link',
  data: () => {
        return {
            searchValue:"",
            order:"",
            orderDirection:"asc",
            linksData: {},
        }
    },
  props: {
    api_token:String
  },

  components: {
     'Pagination': LaravelVuePagination
  },
  methods: {
    async getResults(page = 1) 
    {
      let link = '/api/link?page=' + page;

      if(this.searchValue){
        link += '&search=' + this.searchValue;
      }
      if(this.order){
        link += '&order=' + this.order;
      }
      if(this.orderDirection == 'desc'){
        link += '&orderdirection=' + this.orderDirection;
      }
      let getResult  = await axios.get(link)
          .then(response => {
              this.linksData = response.data;
              
          })
          .catch(err =>console.error(err));
    },

    async changeInput() 
    {
        this.getResults();
    },

    async orderAndChangeInput(newOrder) 
    {
      if(this.order == newOrder && this.orderDirection == 'asc'){
          this.orderDirection = "desc"
      }else{
        this.orderDirection = 'asc'
      }

      this.order = newOrder

      this.getResults();
    },

    async modifyDescription(id, description){
      if (id && this.api_token){
      let link = '/api/link/' + id + '/update'

      let getResult  = await axios.post(link, 
        { api_token: this.api_token,
          id: id,
          description: description
        })
          .then(response => {
            this.getResults();
          })
          .catch(err =>console.error(err));
      }
    }
    
  },
  mounted() {
    this.getResults();
  },
}

</script>

<style lang="scss">
main {
  
  // opacity:0.01;

}
</style>
