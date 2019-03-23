
    <template>
  <article class="tile is-child notification is-white">
    <p class="title">{{id}}</p>
    <p class="subtitle">Top tile</p>
    <div class="content">
      <Status @changed="onStatusChanged" :status="status"/>
    </div>
  </article>
</template>

<script>
import Status from "./status";
export default {
  data() {
    return {
      data: []
    };
  },
  components: { Status },
  props: {
    id: Number,
    status: Number
  },
  methods: {
    onStatusChanged(e) {
      console.log("Status Changed from Parent", e);
      // console.log("refId", this.$refs.order);
    }
  },
  mounted() {
    // console.log(this.orders);
  },
  updated() {
    // console.log(this.orders);
  }
};
</script>