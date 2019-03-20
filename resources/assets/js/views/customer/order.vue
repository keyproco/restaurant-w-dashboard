<template>
  <div class="columns">
    <div class="column">
      <div style="background-color: white">
        <vue-good-wizard :steps="steps" :onNext="nextClicked" :onBack="backClicked">
          <div slot="page1">
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
          <div slot="page2">
            <section>
              <b-field label="Adresse">
                <b-input v-model="adresse"></b-input>
              </b-field>
              <b-field label="Code postal">
                <b-input v-model="zipcode" type="number" maxlength="5"></b-input>
              </b-field>
              <b-field label="Appartement, étage, interphone">
                <b-input type="number" v-model="additionalInfo"></b-input>
              </b-field>
            </section>
          </div>
          <div slot="page3">
            <h4>Step 3</h4>
            <p>This is step 3</p>
          </div>
          <div slot="page4">
            <h4>Step 4</h4>
            <p>This is step 4</p>
          </div>
        </vue-good-wizard>
      </div>
    </div>
  </div>
</template>

<script>
import { GoodWizard } from "vue-good-wizard";
export default {
  data() {
    return {
      steps: [
        {
          label: "Commande",
          slot: "page1"
        },
        {
          label: "Livraison",
          slot: "page2"
        },
        {
          label: "Payer",
          slot: "page3",
          options: {
            nextDisabled: false // control whether next is disabled or not
          }
        }
      ],
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
  components: {
    "vue-good-wizard": GoodWizard
  },
  methods: {
    nextClicked(currentPage) {
      console.log("next clicked", currentPage);
      return true; //return false if you want to prevent moving to next page
    },
    backClicked(currentPage) {
      console.log("back clicked", currentPage);
      return true; //return false if you want to prevent moving to previous page
    },
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