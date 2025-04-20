<template>
  
    
    <Navbar />

   
      <router-view />
  
    <Footer></Footer>
 
   
  </template>

<script setup>
import { onMounted } from 'vue' 
import { loadStyle, loadScript } from '../utils/loadExternal'
import Navbar from '@/views/Navbar.vue'
import Footer from '@/views/Footer.vue'


onMounted(async () => {

  await loadStyle('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css')

  
  





 await loadStyle('../assets/frontend/css/bootstrap.css')
 


 await loadStyle('../assets/frontend/css/style.css')
 await loadStyle('../assets/frontend/css/font-awesome.css')
 await loadStyle('../assets/frontend/css/owl.carousel.css')
 await loadStyle('../assets/frontend/css/flexslider.css')
 await loadStyle('../assets/frontend/css/fancySelect.css')
 await loadStyle('../assets/frontend/css/responsive.css')


 await loadScript('https://maps.googleapis.com/maps/api/js?sensor=false')
  await loadScript('../assets/frontend/js/jquery-2.1.0.min.js')
  window.$ = window.jQuery = window.jQuery || $;
  await loadScript('../assets/frontend/js/bootstrap.min.js')
  await loadScript('../assets/frontend/js/jquery.scrollTo.js')
  await loadScript('../assets/frontend/js/jquery.nav.js')
  await loadScript('../assets/frontend/js/jquery.flexslider.js')
  await loadScript('../assets/frontend/js/jquery.accordion.js')
  await loadScript('../assets/frontend/js/jquery.placeholder.js')
  await loadScript('../assets/frontend/js/jquery.fitvids.js')
  await loadScript('../assets/frontend/js/gmap3.js')
  await loadScript('../assets/frontend/js/fancySelect.js')
  await loadScript('../assets/frontend/js/owl.carousel.min.js')
  
  await loadScript('../assets/frontend/js/main.js')
 










})

</script>
