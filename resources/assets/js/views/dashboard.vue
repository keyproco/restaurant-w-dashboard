<template>
  <div>Dashboard</div>
</template>


<script>
export default {
  data() {
    return {};
  },
  props: ["products"],
  methods: {},
  mounted() {},
  created() {
    console.log("dashboard vue.js");
    console.log(this.products);
  },
  updated() {}
};
</script>