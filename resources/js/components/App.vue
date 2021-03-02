<template>
  <p>{{ greeting }}</p>
  <HelloWorld></HelloWorld>
</template>

<script>
import HelloWorld from './HelloWorld';

export default {
    components:{
        HelloWorld
    },
  data() {
    return {
      greeting: "AppComponent! VueJS + Lumen"
    };
  }
};
</script>

<style scoped>
p {
  font-size: 2em;
  text-align: center;
}
</style>
