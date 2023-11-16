<template>
  <img class="logo" alt="Vue logo" src="./assets/otivo-logo.png">
  <AccommodationListing />
</template>

<script>
import AccommodationListing from './components/AccommodationListing.vue';

export default {
  name: 'App',
  components: {
    AccommodationListing
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.logo {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 20px;
}
</style>
