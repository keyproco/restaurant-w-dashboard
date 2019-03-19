<template>
  <div class="columns">
    <div class="column">
      <div style="background-color: white">Ma commande</div>
      <div v-if="confirmed">
        <b-notification
          type="is-success"
        >Votre commande a été confirmé, veuillez suivre le statut de votre commande</b-notification>
      </div>
      <div v-if="!confirmed">
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
      confirmed: false,
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
        .then(r => (this.confirmed = true))
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