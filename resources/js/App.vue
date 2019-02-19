<template>
  <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link to="/product/all" class="nav-link">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/product/create" class="nav-link">Create Items</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/posts" class="nav-link">Posts</router-link>
        </li>
      </ul>
    </nav><br />
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>

    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>

    export default{

      
    }
</script>