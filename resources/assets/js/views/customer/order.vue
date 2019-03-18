<template>
  <div class="columns">
    <div class="column">
      <div style="background-color: white">Ma commande</div>
      <div>
        <section>
          <b-table :data="basket.products" :columns="columns"></b-table>
        </section>
        <section>
          <p>Total à payer : {{ basket.total}}</p>
        </section>
        <a
          @click="confirmOrder(basket.products[0].pivot.orders_id)"
          class="button"
        >Confirmer la commande</a>
      </div>
    </div>
    <div class="column">
      <div style="background-color: white">Adresse</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      basket: {},
      columns: [
        {
          field: "name",
          label: "Produit"
        },
        {
          field: "pivot.quantity",
          label: "quantité"
        },
        {
          field: "price",
          label: "Prix",
          centered: true
        }
      ]
    };
  },
  methods: {
    confirmOrder: function(orderId) {
      axios
        .put(`/order/${orderId}`)
        .then(r => console.log(r))
        .catch(e => console.log(e));
    }
  },
  mounted() {},
  created() {
    this.basket = this.$route.params.basket;
    console.log("Confirmer", this.basket);
  },
  updated() {}
};
</script>