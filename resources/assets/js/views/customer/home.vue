<template>
  <div class="columns">
    <div class="column is-9">
      <p class="bd-notification is-danger">First column</p>
      <div :key="category.id" v-for="(category) in data">
        <h1>{{category.name}}</h1>
        <div class="columns is-multiline">
          <div
            :key="product.id"
            v-for="(product) in category.products"
            class="column is-4 is-mobile"
          >
            <div
              @click="addOrder(product)"
              class="card"
              style="-webkit-box-shadow: none; box-shadow:none"
            >
              <div class="level">D'autres infos</div>
              <div class="card-image is-flex is-hcentered">
                <figure class="image is-128x128">
                  <img class="is-rounded" :src="product.image" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p style=" color:#c59d5f" class="title is-5 has-text-centered">{{product.name}}</p>
                    <p style="color:#d35400" class="subtitle is-6 has-text-centered">
                      <b>{{product.price}}$</b>
                    </p>
                  </div>
                </div>
                <div class="content">{{product.description}}</div>
              </div>
              <div style=" background-color: #f6b93b;" class="level">_</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="column is-3">
      <product :orders="orders"/>
    </div>
  </div>
</template>


<script>
import Product from "../../components/product.vue";

export default {
  data() {
    return {
      data: [],
      orders: {}
    };
  },
  components: { Product },
  methods: {
    addOrder: function(product) {
      axios.post("/order", { id: product.id, quantity: 2 }).then(r => {
        console.log("add-order", r.data);
        this.orders.total = r.data.total;
        this.orders.products.push(r.data.product);
      });
    }
  },
  mounted() {
    axios
      .get(`http://localhost:8000/by-categories`)
      .then(r => {
        this.data = r.data;
        console.log(this.data);
        this.isLoading = false;
      })
      .catch(e => {
        console.log("product-error", e);
      });
    axios
      .get("user-orders")
      .then(orders => {
        this.orders = orders.data;
        console.log("parent", this.orders);
      })
      .catch(e => console.log(e));
  },
  created() {
    console.log("Mon Accueil");
  },
  updated() {}
};
</script>