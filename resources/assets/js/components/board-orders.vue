
    <template>
  <article ref="order" class="tile is-child notification is-white">
    <p class="title">n° de commande {{id}}</p>
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
    return {};
  },
  components: { Status },
  props: {
    id: Number,
    status: Number
  },
  methods: {
    onStatusChanged(e) {
      this.$emit("changeStatus", { status: e.status, id: this.$props.id });
    }
  },
  mounted() {},
  updated() {
    // console.log(this.orders);
  }
};
</script>