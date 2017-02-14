
// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// Vue.extend(), or just a component options object.
// We'll talk about nested routes later.
 Vue.component('post', {

    template : '#post-list-template',
     data :  function() {
    return {
        posts : '',
        nameFilter: '',
        catFilter: '',
        cats : '',
        showFilter: false,
        filterBtnOpen : true,
        filterBtnClose: false,
        post: '',
        show: ''
    }},
 	created: function() {
		this.fetchData();
        this.fetchCat();
	},
   
	
	methods: {
		fetchData: function() {
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', apiURL)
			xhr.onload = function() {
				self.posts = JSON.parse(xhr.responseText);
				console.log(self.posts[0].link);
			}
			xhr.send()
		},
        fetchCat: function() {
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', catApiURL)
			xhr.onload = function() {
				self.cats = JSON.parse(xhr.responseText);
				console.log(self.cats[0]);
			}
			xhr.send()
		},
        openFilter : function(){
            this.showFilter = true;
            this.filterBtnOpen = false;
            this.filterBtnClose = true;
        },
          closeFilter : function(){
            this.showFilter = false;
             this.filterBtnOpen = true;
            this.filterBtnClose = false;
        },
        getThePost : function(id){
            var posts= this.posts;
            this.show = true;
            function filterPosts(el){
                return el.id ==id;
               
            }
            this.post = posts.filter(filterPosts);
            console.log(this.post);
        }, 
        closePost: function(){
               this.show = false;
        }
	},
     computed: {
     postsF: function () {
      var self = this;
     return self.posts.filter(function (post) {
      return post.title.rendered.indexOf(self.nameFilter) !== -1;
    })
  }
},
   
});
Vue.component('single', {
    template : '#single',
     data :  function() {
    return {
        posts : '',
        nameFilter: '',
        catFilter: '',
        cats : '',
        showFilter: false,
        filterBtnOpen : true,
        filterBtnClose: false,
        post: '',
        show: '',
     
    }},
 	created: function() {
		this.fetchData();
       
	},
    methods: {
		fetchData: function() {
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', postURL + this.$route.params.postID + '?_embed') 
			xhr.onload = function() {
				self.post = JSON.parse(xhr.responseText);
				console.log(self.post);
			}
			xhr.send()
		},
    },

   
});
Vue.component('foo', {
    template : '#foo',
    
});
const routes = [
  { path: '/', component:  Vue.component('post')   },
   { path: '/foo', component:  Vue.component('foo')   },
   { path: '/post/:postID', name: 'single', component: Vue.component('single') },
];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
  routes // short for routes: routes
});
var postURL = 'http://localhost/preloader/wp-json/wp/v2/posts/';
var apiURL = 'http://localhost/preloader/wp-json/wp/v2/posts/?_embed';
var catApiURL = 'http://localhost/preloader/wp-json/wp/v2/categories';
// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
const app = new Vue({
    el: '#app',
     data: {
    key: null,
  },
  router,
   data: {},
  ready: function() {},
  methods: {}


});
