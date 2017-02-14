<?php
/*
 * Template Name: Template Vue
 */
?>
<?php get_header('vue'); ?>

<div id="app">
  
  <router-view :key="$route.path"></router-view>
  
</div>
<script type="text/x-template"  id="post-list-template">
<div class="wr1">
  <div class="div">
        <section class="hero">
            <div class="banner">
                
            </div>
            <div class="btn-container">
                <a @click="openFilter" class="open" v-if="filterBtnOpen">Open Filters</a>
                <a @click="closeFilter" class="cl" v-if="filterBtnClose">Close Filters</a>
            </div>
    <div class="filters" v-if="showFilter">
        <h4>filter by name</h4>
        <input type="text" name="query" v-model="nameFilter">
        <!--<h4>filter by category</h4>
          <input type="radio" value="">
            <label>All</label>
        <div class="radio-wrap" v-for="cat in cats">
            <input type="radio" :value="cat.id" v-model="catFilter">
            <label>{{cat.name}}</label>
        </div>-->
    </div>
    </section>
<div class="wr">

   <div class="post-wrapper">
<!--| filterBy(posts,catFilter, 'categories' )-->
     <article class="post" v-for="post in filterBy(posts,nameFilter, 'title.rendered' ) ">
      <a href="#" @click="getThePost(post.id)">
    <img :src="post._embedded['wp:featuredmedia'][0].media_details.sizes['large'].source_url" />
	</a>
	<h2 class="post-title" >
        {{post.title.rendered}}
    </h2>
    <ul class="categories" >
        <!--<li class="category"  v-html="post._embedded['wp:term'][0][0].name">-->
        <li class="category-item"  v-html="category.name" v-for="category in post.cats">
       </li>
    </ul>
	</article>
    
   </div>
</div>

  </div>
  <div class="overlay" v-if="show"></div>
  <div class="single-preview" v-if="show">
<h2 >{{post[0].title.rendered}}</h2>
  <img :src="post[0]._embedded['wp:featuredmedia'][0].media_details.sizes['large'].source_url" />
  <div v-html="post[0].excerpt.rendered"></div>
  <!--<a href="#" v-link="{name: 'single', params: {postID : post[0].id}}" class="post-read-more">Read More</a>-->
 <router-link v-if="post[0]" :to="{name: 'single', params: {postID : post[0].id}}" class="read-more">
   Read More
 </router-link>
  <a href="#" class="post-nav prev" v-if="post[0].prev_post" @click="getThePost(post[0].prev_post)"> < </a>
  <a href="#" class="post-nav next" v-if="post[0].next_post" @click="getThePost(post[0].next_post)"> > </a>
  <button class="cls-btn" @click="closePost">&#215;</button>
  </div>
   </div>
</script>
<template  id="single">
  
<div class="post-single">
 <section class="hero">
            <div class="banner">
                
            </div>
            <div class="btn-container">
 <router-link v-if="post.prev_post" :to="{name: 'single', params: {postID : post.prev_post}}" class="prev-post-link">Prev Post</router-link>
 <router-link :to="{ path: '/' }" class="read-more">Home</router-link>
 <router-link v-if="post.next_post" :to="{name: 'single', params: {postID : post.next_post}}" class="next-post-link">Next Post</router-link>
            </div>
    
    </section>
     
    
    <div class="post-content">

        <h1 v-if="post">{{post.title.rendered}}</h1>
      <img v-if="post" :src="post._embedded['wp:featuredmedia'][0].media_details.sizes['large'].source_url" />
     <div class="ecx" v-if="post" v-html="post.content.rendered"></div>
     </div>
</div>
</template>
<template  id="foo">
  
<div>
    <router-link :to="{ path: '/' }" >Home</router-link>
<h1>dfdsf</h1>

</div>
</template>
<?php get_footer('vue'); ?>