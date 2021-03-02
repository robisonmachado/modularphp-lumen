<template>
  <p class="text-center">{{ greeting }}</p>
  <HelloWorld></HelloWorld>
</template>

<script lang="ts">
import HelloWorld from './HelloWorld.vue';
import { defineComponent } from 'vue'

export default defineComponent({
  components:{
        HelloWorld
    },
  data() {
    return {
      greeting: "AppComponent! VueJS + Lumen",
      count: 0
    }
  },
  mounted() {
    const result = this.count+10
  }
})



</script>

<style scoped>


</style>
