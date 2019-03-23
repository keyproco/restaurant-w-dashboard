
      
    <template>
  <div>
    <b-field>
      <b-radio-button v-model="statusModel" native-value="1" type="is-warning">
        <b-icon icon="clock"></b-icon>
        <span>En attente</span>
      </b-radio-button>

      <b-radio-button v-model="statusModel" native-value="2" type="is-info">
        <b-icon icon="angle-double-right"></b-icon>
        <span>Préparation</span>
      </b-radio-button>

      <b-radio-button v-model="statusModel" native-value="3">
        <b-icon icon="check"></b-icon>Livraison
      </b-radio-button>
    </b-field>
  </div>
</template>

<script>
export default {
  data() {
    return {
      statusModel: "1"
    };
  },
  props: ["status"],
  methods: {},
  mounted() {},
  updated() {
    console.log("Status from parent", this.status);

    console.log("status changed To", this.statusModel);
  }
};
</script>