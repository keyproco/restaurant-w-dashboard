<template>
  <div class="columns">
    <div class="column">
      <section>
        <b-tabs v-model="activeTab">
          <b-tab-item label="Commandes livrés">
            <b-table :loading="isLoading" :data="orders">
              <template slot-scope="props">
                <b-table-column field="id" label="N°" width="40" numeric>{{ props.row.id }}</b-table-column>

                <b-table-column field="first_name" label="First Name">{{ props.row.first_name }}</b-table-column>

                <b-table-column field="total" label="Total">{{ props.row.total }} &euro;</b-table-column>

                <b-table-column field="date" label="Commandé" centered>
                  <span
                    class="tag is-success"
                  >{{ new Date(props.row.created_at).toLocaleDateString() }}</span>
                </b-table-column>

                <b-table-column label="Confirmé">{{ props.row.confirmed === false ? 'Non' : 'Oui' }}</b-table-column>
                <b-table-column label="Status">{{ props.row.status }}</b-table-column>
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

          <b-tab-item label="Commande en cours">Lorem
            <br>ipsum
            <br>dolor
            <br>sit
            <br>amet.
          </b-tab-item>
        </b-tabs>
      </section>
    </div>
  </div>
</template>


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
          numeric: true
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