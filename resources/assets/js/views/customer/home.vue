<template>
  <div>Accueil</div>
</template>


<script>
export default {
  data() {
    return {
      data: {}
    };
  },
  methods: {},
  mounted() {
    axios
      .get(`http://localhost:8000/categories/`)
      .then(r => {
        this.data = r.data;
        this.isLoading = false;
      })
      .catch(e => {
        console.log("product-error", e);
      });
  },
  created() {
    console.log("Mon compte");
  },
  updated() {}
};
</script>