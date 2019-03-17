<template>
  <div>Mes commandes</div>
</template>


<script>
export default {
  data() {
    return {};
  },
  methods: {},
  mounted() {},
  created() {
    axios
      .get("/order")
      .then(r => console.log(r))
      .catch(r => console.log(r));
  },
  updated() {}
};
</script>