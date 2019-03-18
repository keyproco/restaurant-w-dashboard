<template>
  <div>Dashboard</div>
</template>


<script>
export default {
  data() {
    return {};
  },
  methods: {},
  mounted() {
    window.Echo.channel("orders").listen("UserConfirmedOrder", e => {
      this.$toast.open({
        message:
          e.order.user.name +
          " commande pour un total de " +
          e.order.total +
          "  €",
        type: "is-success"
      });
      console.log("From Dashboard", e);
    });
  },
  created() {},
  updated() {}
};
</script>