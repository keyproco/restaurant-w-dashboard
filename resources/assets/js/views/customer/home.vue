<template>
  <div class="columns">
    <div class="column is-two-thirds">
      <p class="bd-notification is-info">First column</p>
      <div :key="category.id" v-for="(category) in data">
        <h1>{{category.name}}</h1>
        <div class="columns is-multiline">
          <div
            :key="product.id"
            v-for="(product) in category.products"
            class="column is-4 is-mobile"
            style="min-width: 250px"
          >
            <div class="card" style="-webkit-box-shadow: none; box-shadow:none">
              <div @click="addOrder(product)" class="card-image is-flex is-hcentered">
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
                <div class="content">
                  {{product.description}}
                  <a>@bulmaio</a>.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <product/>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      data: [],
      list: []
    };
  },
  methods: {
    addOrder: function(product) {
      this.list.push(product.id);
      axios.post("/order", { id: product.id }).then(r => console.log(r));
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
  },
  created() {
    console.log("Mon Accueil");
  },
  updated() {}
};
</script>