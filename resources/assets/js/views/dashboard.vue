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

    window.Echo.channel("orders").listen("UserConfirmedOrder", e => {
      console.log("event dispatched!", e);
      this.$toast.open({
        message:
          e.order.user.name +
          " commande pour un total de " +
          e.order.total +
          "  €",
        type: "is-success"
      });
    });
  },
  updated() {}
};
</script>