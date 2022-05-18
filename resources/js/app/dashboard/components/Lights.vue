<template>
  <div
    class="light"
    :class="{ active: activeLight === color }"
    :style="cssVars"
    @click="updateActiveLight(color)"
  >
  </div>
</template>

<script>
export default {
  name: 'Light',
  props: {
    color: {
      type: String,
      required: true
    },
    activeLight: {
      type: String,
      required: true
    },
    updateActiveLight: {
      type: Function,
      required: true
    }
  },
  computed: {
    cssVars() {
      return {
        '--bg-color': this.color
      }
    }
  }
}
</script>

<style scoped>
  .light {
    height: 100px;
    width: 100px;
    border-radius: 100%;
    margin: auto;
    margin-top: 20px;
    margin-bottom: 20px;
    background: darkslategrey;
  }

  .active {
    background: var(--bg-color);
  }
</style>
