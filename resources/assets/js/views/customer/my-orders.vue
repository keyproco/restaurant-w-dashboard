<template>
  <div class="columns">
    <div class="column">
      <section>
        <b-tabs :animated="false" v-model="activeTab">
          <b-tab-item label="Commandes">
            <b-table
              paginated
              :per-page="perPage"
              :loading="isLoading"
              :data="orders.filter(order => order.confirmed == 1)"
            >
              <template slot-scope="props">
                <b-table-column
                  field="id"
                  label="N° de commande"
                  width="140"
                  numeric
                >N°{{ props.row.id }}</b-table-column>
                <b-table-column field="date" label="Commandé le" centered>
                  <span
                    class="tag is-success"
                  >{{ new Date(props.row.created_at).toLocaleDateString() }}</span>
                </b-table-column>
                <b-table-column label="Confirmé">{{ props.row.confirmed == false ? 'Non' : 'Oui' }}</b-table-column>
                <b-table-column label="Statut">{{ formatStatus[props.index] }}</b-table-column>
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
                <b-table-column field="id" label="N°" width="140" numeric>N° {{ props.row.id }}</b-table-column>
                <b-table-column field="date" label="Commandé le" centered>
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
      perPage: 5,
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
      ],
      status: {
        0: "Dans le panier",
        1: "En attente",
        2: "Validé",
        3: "Confirmé"
      }
    };
  },
  computed: {
    formatStatus: function(order) {
      const status = code => {
        return status.labels[code] || status.labels["default"];
      };
      status.labels = {
        0: "Panier",
        1: "En attente",
        2: "En préparation",
        3: "Livré"
      };
      return this.orders.map(r => status(r.status));
    }
  },
  methods: {},
  mounted() {
    // const status = code => {
    //   return status.labels[code] || status.labels["default"];
    // };
    // status.labels = {
    //   1: "PENDING",
    //   0: "NOTHING",
    //   default: "Default"
    // };
    // console.log(status(0));
  },
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