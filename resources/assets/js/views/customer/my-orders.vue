<template>
  <div class="columns">
    <div class="column">
      <section>
        <b-tabs :animated="false" v-model="activeTab">
          <b-tab-item label="Commandes livrés">
            <b-table :loading="isLoading" :data="orders.filter(order => order.confirmed == 1)">
              <template slot-scope="props">
                <b-table-column
                  field="id"
                  label="N° de commande"
                  width="140"
                  numeric
                >{{ props.row.id }}</b-table-column>
                <b-table-column field="date" label="Commandé" centered>
                  <span
                    class="tag is-success"
                  >{{ new Date(props.row.created_at).toLocaleDateString() }}</span>
                </b-table-column>
                <b-table-column label="Confirmé">{{ props.row.confirmed == false ? 'Non' : 'Oui' }}</b-table-column>
                <b-table-column label="Statut">{{ props.row.status }}</b-table-column>
                <b-table-column field="total" label="Total">{{ props.row.total }} &euro;</b-table-column>
              </template>

              <template slot="empty">
                <section class="section">
                  <div class="content has-text-centered">
                    <p>
                      <b-icon icon="emoticon-sad" size="is-large"></b-icon>
                    </p>
                    <p>Aucune commande</p>
                  </div>
                </section>
              </template>
            </b-table>
          </b-tab-item>

          <b-tab-item label="Commande en cours">
            <b-table :loading="isLoading" :data="orders.filter(order => order.confirmed == 0 )">
              <template slot-scope="props">
                <b-table-column field="id" label="N°" width="40" numeric>{{ props.row.id }}</b-table-column>
                <b-table-column field="date" label="Commandé" centered>
                  <span
                    class="tag is-success"
                  >{{ new Date(props.row.created_at).toLocaleDateString() }}</span>
                </b-table-column>

                <b-table-column label="Confirmé">{{ props.row.confirmed == false ? 'Non' : 'Oui' }}</b-table-column>
                <b-table-column label="Statut">{{ props.row.status }}</b-table-column>
                <b-table-column field="total" label="Total">{{ props.row.total }} &euro;</b-table-column>
              </template>

              <template slot="empty">
                <section class="section">
                  <div class="content has-text-centered">
                    <p>
                      <b-icon icon="emoticon-sad" size="is-large"></b-icon>
                    </p>
                    <p>Aucune commande</p>
                  </div>
                </section>
              </template>
            </b-table>
          </b-tab-item>
        </b-tabs>
      </section>
    </div>
  </div>
</template>

<style scoped>
.tabs li.is-active a {
  background-color: blue;
}
</style>
<script>
export default {
  data() {
    return {
      activeTab: 0,
      isLoading: false,
      orders: [],
      columns: [
        {
          field: "id",
          label: "n° de commande",
          width: "40",
          numeric: true,
          centered: true
        },
        {
          field: "status",
          label: "Statut"
        },
        {
          field: "confirmed",
          label: "confirmé",
          centered: true
        },
        {
          field: "total",
          label: "Total",
          centered: true
        }
      ]
    };
  },
  methods: {},
  mounted() {},
  created() {
    this.isLoading = true;
    axios
      .get("/order")
      .then(r => {
        this.orders = r.data;
        this.isLoading = false;
      })
      .catch(r => console.log(r));
  },
  updated() {}
};
</script>