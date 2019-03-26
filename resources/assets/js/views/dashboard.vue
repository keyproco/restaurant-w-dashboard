<template>
  <div>
    Dashboard
    <div class="tile is-ancestor">
      <div class="tile is-horizontal is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child notification is-aqua-gradient">
              <p class="title is-5 has-text-light">Recette du jour</p>
              <p class="subtitle is-1 has-text-light has-text-centered">{{totalSales}} EUR</p>
            </article>
          </div>
        </div>
        <div class="tile is-parent">
          <article class="tile is-child notification is-rose-gradient">
            <p class="title is-5 has-text-light">Nombre de commandes du jour</p>
            <p
              class="subtitle has-text-light is-1 has-text-light has-text-centered"
            >{{ stats.ordersNumber}}</p>
          </article>
        </div>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-orangina e">
          <div class="content">
            <p class="title is-5 has-text-light">Nombre d'utilisateurs</p>
            <p class="subtitle has-text-light is-1 has-text-light has-text-centered">1k</p>
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
            <Order
              @changeStatus="setNewStatus"
              :key="order.id"
              v-for="order in orders"
              :id="order.id"
              :total="order.total"
              :status="order.status"
              :products="order.products"
              :adress="order.adress"
              :user="order.user"
            />
          </div>
        </div>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-white">
          <div class="content">
            <p class="title">Graphe avec ChartJs</p>
            <p class="subtitle">CA par Jour/Semaine/Mois</p>
            <div class="content"></div>
          </div>
        </article>
      </div>
    </div>
    <div class="tile is-ancestor">
      <div class="tile is-vertical is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <!-- <article class="tile is-child notification is-white">
              <p class="title">Vertical...</p>
              <p class="subtitle">Top tile</p>
            </article>
            <article class="tile is-child notification is-white">
              <p class="title">Graphe avec ChartJs</p>
              <p class="subtitle">CA par Jour/Semaine/Mois</p>
            </article>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Numee from "numeral";
import Order from "../components/board-orders";
export default {
  components: { Order },
  data() {
    return {
      orders: [],
      status: "pending",
      stats: {
        todaySales: 0
      }
    };
  },
  computed: {
    totalSales() {
      return Numee(this.stats.todaySales).format("0,00.00");
    }
  },
  methods: {
    setNewStatus(e) {
      console.log("set the new status", e.status);
      return this.orders.filter(order => {
        if (order.id == e.id) {
          order.status = e.status;
          axios
            .put("/status/" + order.id, { status: e.status })
            .then(status => console.log(status));
        }
      });
    }
  },
  mounted() {
    axios.get("/admin/stats/").then(e => {
      console.log(e.data);
      this.orders = e.data.orders.filter(order => order.status != 0);
      this.stats.todaySales = e.data.todaySales;
      this.stats.ordersNumber = e.data.ordersNumber;
    });

    window.Echo.channel("orders").listen("UserConfirmedOrder", e => {
      console.log("OrderPusher", e);
      this.orders.unshift(e.order);
      this.stats.ordersNumber++;
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
  created() {
    console.log("after", this.orders);
  },
  updated() {
    console.log(this.orders);
  }
};
</script>



<style scoped>
.is-rose-gradient {
  background: #f857a6;
  background: -webkit-linear-gradient(to right, #f857a6, #ff5858);
  background: linear-gradient(to right, #f857a6, #ff5858);
}
.is-aqua-gradient {
  background: #ff512f; /* fallback for old browsers */
  background: -webkit-linear-gradient(
    to right,
    #dd2476,
    #ff512f
  ); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(
    to right,
    #dd2476,
    #ff512f
  ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.is-orangina {
  background: #ec008c; /* fallback for old browsers */
  background: -webkit-linear-gradient(
    to right,
    #fc6767,
    #ec008c
  ); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(
    to right,
    #fc6767,
    #ec008c
  ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>
