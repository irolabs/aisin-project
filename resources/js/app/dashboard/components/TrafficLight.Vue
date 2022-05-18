<template>
  <div class="container">
      <div class="row justify-content-center">
        <div class="trafficLight ">
    <Light 
      v-for="(color, i) in colors"
      :key="`${color}-${i}`"
      :color="color"
      :activeLight="activeLight"
      :updateActiveLight="updateActiveLight"
    />
  </div>
  </div>
  </div>
</template>

<script>
import Light from './Lights.vue';
import lightsData from './lights.json';

export default {
  name: "TrafficLight",
  components: {
    Light
  },
  data() {
    return {
      ...lightsData,
      activeLight: 'red'
    }
  },
  methods: {
    updateActiveLight(color) {
      this.activeLight = color;
    }
  }
};
</script>

<style scoped>
  .trafficLight {
    width: 150px;
    border: 1px solid darkgray;
     border-radius: 25px;
    margin: auto;
    background: black;
    display: inline-block;
  }
</style>
