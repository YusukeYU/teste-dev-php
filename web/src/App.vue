<template>
  <div>
    <MainLayout></MainLayout>
    <router-view />
  </div>
</template>

<script>
import MainLayout from '@/layouts/MainLayout.vue'

export default {
  name: 'App',
  components: {
    MainLayout
  }
}
</script>

<style>
body{
  background-color: #e5e2e6!important;
}
.my-loader{
left: 0;
right: 0;
top: 0;
bottom: 0;
position: fixed;
display: flex;
flex-direction: row;
justify-content: center;
align-items: center;
text-align: center;
width: 100%;
background: rgba(255, 254, 254,0.8);
z-index: 1050;
border: none;
}
</style>
