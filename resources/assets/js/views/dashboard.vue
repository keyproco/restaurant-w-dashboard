<template>
  <div>Dashboard
    <div class="tile is-ancestor">
      <div class="tile is-horizontal is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child notification is-white">
              <p class="title is-5">Recette du jour</p>
              <p class="subtitle">{{stats.todaySales}}</p>
            </article>
          </div>
        </div>
        <div class="tile is-parent">
          <article class="tile is-child notification is-white">
            <p class="title is-5">Nombre de commandes</p>
            <p class="subtitle">Aligned with the right tile</p>
            <div class="content">
              <!-- Content -->
            </div>
          </article>
        </div>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-white">
          <div class="content">
            <p class="title is-5">Tall tile</p>
            <p class="subtitle">With even more content</p>
            <div class="content">
              <!-- Content -->
            </div>
          </div>
        </article>
      </div>
    </div>

    <!-- qfqfsqsfqsfqsf -->
    <div class="tile is-ancestor">
      <div class="tile is-vertical is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <Orders :orders="orders"/>
          </div>
        </div>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-white">
          <div class="content">
            <p class="title">Tall tile</p>
            <p class="subtitle">With even more content</p>
            <div class="content"></div>
          </div>
        </article>
      </div>
    </div>
    <div class="tile is-ancestor">
      <div class="tile is-vertical is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child notification is-white">
              <p class="title">Vertical...</p>
              <p class="subtitle">Top tile</p>
            </article>
            <article class="tile is-child notification is-white">
              <p class="title">...tiles</p>
              <p class="subtitle">Bottom tile</p>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Orders from "../components/board-orders";
export default {
  components: { Orders },
  data() {
    return {
      orders: [],
      status: "pending",
      stats: {
        todaySales: 0
      }
    };
  },
  methods: {},
  mounted() {
    axios.get("/admin/stats/").then(e => {
      console.log(e.data);
      this.orders = e.data.orders;
      this.stats.todaySales = e.data.todaySales;
    });

    window.Echo.channel("orders").listen("UserConfirmedOrder", e => {
      this.stats.todaySales =
        parseInt(e.order.total) + parseInt(this.stats.todaySales);
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