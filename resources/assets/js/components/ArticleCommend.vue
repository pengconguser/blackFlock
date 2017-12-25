<template>
	<div class="list-group">
            <a href="javascript:;" class="list-group-item active">
              <h4 class="list-group-item-heading">点的比较多的小博客啦～</h4>
              <p class="list-group-item-text">主要是点的比较多的</p>
            </a>
            <div v-for="article in articles">
	            <a :href="'/article/'+article.id" class="list-group-item">
	              <h4 class="list-group-item-heading">{{ article.title }}</h4>
	              <p class="list-group-item-text">{{ article.description }}</p>
	            </a>
           </div>
     </div>
</template>

<script>
export default {

  name: 'ArticleCommend',

  created(){
  	 this.fetchData();
  },

  methods:{
  	 fetchData(){
         var api='/api/article/commend';
         var vm=this;
         window.axios.get(api).then(function(response){
         	  vm.articles=response.data;
         });
  	 }
  },

  data () {
    return {
          articles:[],
    }
  }
}
</script>

<style lang="css" scoped>
</style>