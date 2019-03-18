<template>
  <div clas="column" style="background-color: #172A39; ">
    <h4 style="color:white
;" class>Mon panier</h4>
    <ul :key="product.id" v-for=" product in orders.products">
      <div
        style="
         ;background-color:#0a3d62; box-shadow: 0 2px 4px #172A39;"
        class="box is-radiusless"
      >
        <article class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <img class="is-rounded" :src="product.image" alt="image de la pizza">
            </figure>
          </div>
          <div class="media-content">
            <div class="content is-flex" style="justify-content: space-between;aling-items: center">
              <p style="color:#c59d5f">
                <strong style="color:#c59d5f">{{product.name}}</strong>
                <br>
                <small>{{product.price}} $</small>
                <!-- <small>quantité: {{product.pivot.quantity}}</small> -->
                <br>
              </p>
              <a @click="removeItem(product.id)" class="delete is-hcenterd"></a>
            </div>
          </div>
        </article>
      </div>
    </ul>
    <div class="box m-t-10">
      <b>Total : {{basket.total}}$</b>
    </div>
    <!-- <router-link to="cofirmer-commande">
      <a class="button is-primary m-t-25" style="width:100%;">
        <b>Commander</b>
      </a>
    </router-link>-->
    <!-- <router-link to="cofirmer-commande"> -->
    <a @click="orderItems(basket)" class="button is-primary m-t-25" style="width:100%;">
      <b>Commander</b>
    </a>
    <!-- </router-link> -->
  </div>
</template>


<script>
export default {
  data() {
    return {
      basket: {
        total: 0
      }
    };
  },
  props: {
    orders: {
      type: Object,
      default: function() {
        return { data: "empty" };
      }
    }
  },
  methods: {
    removeItem: function(item) {
      console.log(item);
    },
    orderItems: function(basket) {
      this.$router.push({ name: "confirm", params: { basket: basket } });
    }
  },
  mounted() {},
  created() {
    this.basket = this.orders;
    console.log("basket", this.basket);
    console.log("Product Created", this.orders);
  },
  updated() {
    this.basket = this.orders;
    console.log(this.basket);
    console.log("Order ID ", this.orders.id);
    console.log(this.$route.params);
  }
};
</script>