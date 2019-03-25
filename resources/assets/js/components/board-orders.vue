
    <template>
  <article ref="order" class="tile is-child notification is-white">
    <div class="content">
      <Status @changed="onStatusChanged" :status="status"/>
    </div>
    <p class="title is-size-6">Commande n°{{id}} - Client : {{user.name}}</p>

    <p class="subtitle">
      <b>
        <ul :key="product.id" v-for="product in products">
          <li
            style="list-style: upper-roman; "
            class="is-size-6"
            v-text="product.name + '  x' + product.pivot.quantity "
          ></li>
        </ul>
      </b>
      <br>
    </p>
    <div class="columns">
      <div class="column">
        <b class="is-size-5" style="color: rgb(39, 238, 156)">Total: {{getTotal}} &euro;</b>
      </div>
      <div class="column">
        <b-collapse :open="false" class="card" aria-id="contentIdForA11y3">
          <div
            slot="trigger"
            slot-scope="props"
            class="card-header"
            role="button"
            aria-controls="contentIdForA11y3"
          >
            <p class="card-header-title">Adresse</p>
            <a class="card-header-icon">
              <b-icon :icon="props.open ? 'fas menu-down' : 'fas menu-up'"></b-icon>
            </a>
          </div>
          <footer class="card-footer">
            <a class="card-footer-item">{{adress.street}}</a>
            <a class="card-footer-item">{{adress.zipcode}}</a>
          </footer>
        </b-collapse>
      </div>
    </div>
  </article>
</template>

<script>
import Status from "./status";
import Numee from "numeral";
export default {
  data() {
    return {};
  },
  components: { Status },
  props: {
    id: Number,
    status: Number,
    total: Number,
    adress: Object,
    products: Array,
    user: Object
  },
  computed: {
    getTotal() {
      return Numee(this.total).format("0,0.00");
    }
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