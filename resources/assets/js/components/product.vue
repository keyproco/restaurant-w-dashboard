<template>
  <div class="columns">
    <div class="column" style="background-color:#FFF7EB">Mon PANIER
      <br>
      <ul :key="product.id" v-for=" product in basket.products">
        <li>{{product.name}} {{product.price}} $</li>
      </ul>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      basket: {}
    };
  },
  methods: {},
  mounted() {},
  created() {
    axios
      .get("user-orders")
      .then(basket => (this.basket = basket.data))
      .catch(e => console.log(e));
  },
  updated() {}
};
</script>