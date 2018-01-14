<template>
	    <div class="col-lg-6">
	      <form @submit.prevent="search">
		    <div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">搜索</button>
			      </span>
			      <input type="text" class="form-control" placeholder="请输入你需要搜索的内容" v-model="que.content">
			    </div>
		    </form>
	    </div>
</template>

<script>
export default {

  name: 'Search',

  methods:{
  	  search(){
  	  	    var vm=this;
            window.location.href='/search?q='+vm.que.content;
  	  }
  },

  data () {
    return {
        que:[],
    }
  }
}
</script>

<style lang="css" scoped>
</style>