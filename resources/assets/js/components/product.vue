<template>
  <div style="background-color: #172A39; " class="column">
    <h4 style="color:white
;" class>Mon panier</h4>
    <ul :key="product.id" v-for=" product in basket.products">
      <div style=" box-shadow: 0 2px 4px #172A39;" class="box is-radiusless">
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
                <small>quantité: {{product.pivot.quantity}}</small>
                <br>
              </p>
              <a @click="removeItem(product.id)" class="delete is-hcenterd"></a>
            </div>
          </div>
        </article>
      </div>
    </ul>
    <div class="box m-t-10">
      <b>Total : 100$</b>
    </div>
    <a class="button is-primary m-t-25" style="width:100%;">
      <b>Commander</b>
    </a>
  </div>
</template>


<script>
export default {
  data() {
    return {
      basket: {}
    };
  },
  methods: {
    removeItem: function(item) {
      console.log(item);
    }
  },
  mounted() {},
  created() {
    axios
      .get("user-orders")
      .then(basket => {
        this.basket = basket.data;
        console.log(this.basket);
      })
      .catch(e => console.log(e));
  },
  updated() {}
};
</script>