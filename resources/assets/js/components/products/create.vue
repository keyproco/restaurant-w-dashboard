<template>
     <form action="/createProduct" method="POST" accept-charset="utf-8" @submit.prevent>
    <section>
        <div class="block">
            <b-radio v-model="radio"
                native-value="1">
                Hamburger
            </b-radio>
            <b-radio v-model="radio"
                native-value="2">
                Boissons
            </b-radio>
            <b-radio v-model="radio"
                native-value="3">
                Desserts
            </b-radio>
        </div>
        <p class="content">
            <b>Selection:</b>
            {{ radio }}
        </p>
        <b-field>
            <b-input v-model="name" placeholder="Nom du produit" type="text"></b-input>
        </b-field>
        <b-field>
            <b-input v-model="price" placeholder="Prix du produit" type="number"></b-input>
        </b-field>
        <b-field>
            <b-input placeholder="text"
                type="file"
                min="10"
                max="20">
            </b-input>
        </b-field>
        <b-field>
            <b-input v-model="description" type="textarea"
                minlength="10"
                maxlength="50"
                placeholder="Description du produit">
            </b-input>
        </b-field>
        <button @click="createProduct" class="button is-info">Créer</button>
    </section>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                radio: '',
                name : '',
                description: '',
                price: ''
            }
        },
        methods: {
            createProduct() {
                axios
                .post('/admin/products', this.$data)
                .then((s) =>  Event.$emit('created', s)) 
                .catch((e) => console.log('error', e))
            }
        }
    }
</script>