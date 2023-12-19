<template>
  <ul class="nav nav-pills">
  

  <li class="nav-item">
    <RouterLink class="nav-link" to="/Login">Sign In</RouterLink>
  </li>
  
</ul>
  <div>
    <router-view></router-view>
  </div>
</template>
<script setup>
import { RouterLink } from 'vue-router';

</script>