<template>
  <section>
    <button class="button is-medium" @click="toast">Launch toast (default)</button>
    
    <button class="button is-medium is-success" @click="success">Launch toast (custom)</button>
    
    <button class="button is-medium is-danger" @click="danger">Launch toast (custom)</button>
  </section>
</template>

<template>
  <b-table
    :data="data"
    :loading="isLoading"
    paginated
    per-page="5"
    detailed
    detail-key="id"
    @details-open="(row, index) => $toast.open(`${ row.name}`)"
  >
    <template slot-scope="props">
      <b-table-column sortable field="id" label="ID" width="40" numeric>{{ props.row.id }}</b-table-column>
      <b-table-column field="name" label="Nom du produit" sortable>{{ props.row.name }}</b-table-column>
      <b-table-column field="price" label="Prix" sortable>{{ props.row.price }}</b-table-column>
      <b-table-column sortable field="category.name" label="Catégorie">
        <b-icon pack="fa" :icon="props.row.category.name === 'burger' ? 'mars' : 'venus'"></b-icon>
        {{ props.row.category.name }}
      </b-table-column>
      <b-table-column field="date" label="Ajouté" sortable centered>
        <span class="tag is-info">{{ new Date(props.row.created_at).toLocaleDateString() }}</span>
      </b-table-column>
      <b-loading :is-full-page="isFullPage" :active.sync="isLoading"></b-loading>
    </template>

    <template slot="detail" slot-scope="props">
      <article class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img :src="props.row.image">
          </p>
        </figure>
        <div class="media-content">
          <div class="content">
            <p>
              <strong>{{ props.row.name }}</strong>
              <br>
              <small>{{ props.row.description }}</small>
              <br>
            </p>
          </div>
        </div>
      </article>
    </template>
  </b-table>
</template>
<script>
export default {
  data() {
    return {
      data: [],
      isLoading: false,
      isFullPage: false
    };
  },
  methods: {},
  mounted() {
    this.isLoading = true;
    axios
      .get(`http://localhost:8000/products/`)
      .then(r => {
        this.data = r.data;
        this.isLoading = false;
      })
      .catch(e => {
        console.log("product-error", e);
      });

    Event.$on("created", data => {
      this.isLoading = true;
      axios
        .get(`http://127.0.0.1:8000/admin/products/${data.data.id}`)
        .then(r => {
          this.isLoading = false;
          this.data.push(r.data);
          this.$toast.open({
            message: ` vient d'être ajouté avec succès ok!`,
            type: "is-success"
          });
        })

        .catch(e => {
          this.isLoading = false;
          this.$toast.open({
            message: `Le produit n'a pas pu être enregistré`,
            type: "is-danger"
          });
        });
    });
  },
  created() {},
  updated() {}
};
</script>