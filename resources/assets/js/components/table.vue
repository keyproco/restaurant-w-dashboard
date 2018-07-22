<template>
    <b-table
        :data="data"
        paginated
        per-page="5"
        
        detailed
        detail-key="id"
        @details-open="(row, index) => $toast.open(`${ row.name}`)"
    >

        <template slot-scope="props">
            <b-table-column sortable  field="id" label="ID" width="40" numeric>
                {{ props.row.id }}
            </b-table-column>
            <b-table-column field="name"  label="Nom du produit" sortable>
                {{ props.row.name }}
            </b-table-column>
            <b-table-column field="price" label="Prix" sortable>
                {{ props.row.price }}
            </b-table-column>
            <b-table-column sortable field="category.name"label="Catégorie">
                <b-icon pack="fa"
                    :icon="props.row.category.name === 'burger' ? 'mars' : 'venus'">
                </b-icon>
                 {{ props.row.category.name }}
            </b-table-column>
            <b-table-column field="date" label="Date" sortable centered>
                <span class="tag is-success">
                    {{ new Date(props.row.created_at).toLocaleDateString() }}
                </span>
            </b-table-column>
        </template>

        <template slot="detail" slot-scope="props">
            <article class="media">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <img :src="props.row.image"/>
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>{{  props.row.price }}</strong>
                            <small>@{{  props.row.price }}</small>
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
                data : this.products,
            }
        },
        props: [ 'products'],
        mounted() {
            console.log(this.products)
        }
    }
</script>