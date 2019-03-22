<template>
  <div class="columns">
    <div class="column is-9">
      <p class="bd-notification is-danger">First column</p>

      <b-tabs type="is-toggle-rounded" expanded>
        <div v-if="isLoading" class="is-flex" style="flex-wrap:wrap">
          <content-loader
            style="display:block; width: 200px; height: 250"
            :key="time*5"
            v-for="time of 6"
            :height="150"
            :width="200"
            :speed="4"
            primaryColor="#FFF7EB"
            secondaryColor="#c59d5f"
          >
            <circle cx="78.49364293939723" cy="41.37364293939723" r="31.033642939397232"/>
            <rect x="71.66" y="91.75" rx="0" ry="0" width="18.54" height="7.95"/>
            <rect x="27.5" y="103.25" rx="0" ry="0" width="123" height="7.54"/>
            <rect x="27.5" y="113.25" rx="0" ry="0" width="123" height="7.54"/>
            <rect x="27.5" y="123.25" rx="0" ry="0" width="123" height="7.54"/>
            <rect x="53.41" y="78.25" rx="0" ry="0" width="54" height="10"/>
          </content-loader>
        </div>

        <div :key="category.id" v-for="(category) in data">
          <b-tab-item :label="category.name" icon="google-photos">
            <div
              class="section is-3 is-flex"
              :key="product.id"
              v-for="(product) in category.products"
            >
              <div style="width: 200px;-webkit-box-shadow: none; box-shadow:none" class="card">
                <div class="level">D'autres infos</div>
                <div class="card-image is-flex is-hcentered">
                  <figure class="image is-128x128">
                    <img
                      style="border: 5px solid white"
                      class="is-rounded"
                      :src="product.image"
                      alt="Placeholder image"
                    >
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-content">
                      <p
                        style=" color:#c59d5f"
                        class="title is-5 has-text-centered"
                      >{{product.name}}</p>
                      <p style="color:#d35400" class="subtitle is-6 has-text-centered">
                        <b>{{product.price}}$</b>
                      </p>
                    </div>
                  </div>
                  <div class="content has-text-white">{{product.description}}</div>
                </div>
                <div style=" background-color: #f6b93b;" class="level">
                  <b-select v-model="quantity" placeholder="Quantité">
                    <option v-for="number in 10" :value="number" :key="number">{{ number}}</option>
                  </b-select>
                  <b-tooltip label="Ajouter le produit" position="is-bottom">
                    <a @click="addOrder(product )" class="button is-danger">
                      <i class="fas fa-plus"></i>
                    </a>
                  </b-tooltip>
                </div>
              </div>
            </div>
          </b-tab-item>
        </div>
      </b-tabs>
    </div>
    <div class="column is-3">
      <product :orders="orders"/>
    </div>
  </div>
</template>


<script>
import Product from "../../components/product.vue";
import { ContentLoader } from "vue-content-loader";
export default {
  data() {
    return {
      data: [],
      quantity: 1,
      isLoading: false,
      orders: {
        products: []
      }
    };
  },
  components: { Product, ContentLoader },
  methods: {
    addOrder: function(product) {
      console.log("selected id Product", this.number);
      axios
        .post("/order", { id: product.id, quantity: this.quantity })
        .then(r => {
          this.orders.total = r.data.total;
          this.orders.products.push(r.data.product);
        });
    }
  },
  mounted() {
    this.isLoading = true;
    axios
      .get(`http://localhost:8000/by-categories`)
      .then(r => {
        this.data = r.data;
        this.isLoading = false;
      })
      .catch(e => {
        console.log("product-error", e);
      });
    axios
      .get("user-orders")
      .then(orders => {
        this.orders = orders.data == "" ? this.orders : orders.data;
      })
      .catch(e => console.log(e));
  },
  created() {},
  updated() {}
};
</script>

<style scope>
.tab-item {
  display: flex;
  flex-wrap: wrap;
}
svg {
  display: block;
}
.b-tabs .tab-content {
  flex-direction: row;
  align-items: flex-start;
  flex-wrap: wrap;
}
</style>
