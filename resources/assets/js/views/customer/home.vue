<template>
  <div class="columns">
    <div class="column is-two-thirds">
      <p class="bd-notification is-info">First column</p>
      <div :key="category.id" v-for="(category) in data">
        <h1>{{category.name}}</h1>
        <div class="columns is-multiline">
          <div :key="product.id" v-for="(product) in category.products" class="column is-one-third">
            <div class="card">
              <div @click="add(product)" class="card-image">
                <figure class="image is-4by3 is-rounded">
                  <img :src="product.image" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-left">
                    <figure class="image is-48x48">
                      <img
                        src="https://bulma.io/images/placeholders/96x96.png"
                        alt="Placeholder image"
                      >
                    </figure>
                  </div>
                  <div class="media-content">
                    <p class="title is-4">{{product.name}}</p>
                    <p class="subtitle is-6">@johnsmith</p>
                  </div>
                </div>

                <div class="content">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec iaculis mauris.
                  <a>@bulmaio</a>.
                  <a href="#">#css</a>
                  <a href="#">#responsive</a>
                  <br>
                  <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <p class="bd-notification is-danger">Second column</p>
      <div class="columns">
        <div class="column">
          <p class="bd-notification is-danger">Auto</p>
          <product/>
        </div>
      </div>
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
    addproduct: function(product) {
      this.list.push(product.id);
      axios.post("/add", product.id).then(r => console.log(r));
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