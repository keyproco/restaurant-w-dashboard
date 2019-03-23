
    <template>
  <div>
    <article :key="order.id" v-for="order in orders" class="tile is-child notification is-white">
      <p class="title">{{order.id}}</p>
      <p class="subtitle">Top tile</p>
      <div class="content">
        <Status :status="order.status"/>
      </div>
    </article>
  </div>
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
  props: ["orders"],
  methods: {},
  mounted() {
    console.log(this.orders);
  },
  updated() {
    console.log(this.orders);
  }
};
</script>