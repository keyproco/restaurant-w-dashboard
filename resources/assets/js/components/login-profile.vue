<template>
    <b-dropdown v-model="navigation" position="is-bottom-left">
        <a class="navbar-item" slot="trigger">
            <span>Mon compte</span>
            <b-icon icon="menu-down"></b-icon>
        </a>

        <b-dropdown-item custom>
            Hello <b>{{ currentUser }}!</b> : )
        </b-dropdown-item>
        <hr class="dropdown-divider">
        <a href="/"><b-dropdown-item value="/">
            <b-icon icon="home"></b-icon>
            Accueil
        </b-dropdown-item></a>
        <a href="/home"><b-dropdown-item  value="/home">
            <b-icon  pack="fas" icon="tachometer-alt"></b-icon>
            Profile
        </b-dropdown-item></a>
        <b-dropdown-item value="blog" disabled>
            <b-icon icon="book-open"></b-icon>
            Compte
        </b-dropdown-item>
        <hr class="dropdown-divider">
        <b-dropdown-item value="settings">
            <b-icon icon="settings"></b-icon>
            Commandes
        </b-dropdown-item>
        <form id="logout-form" method="POST" action="/logout" >
            <input type="hidden" name="_token" :value="csrf">
                  <b-dropdown-item @click="logoutMe" value="logout">
            <b-icon icon="logout"></b-icon>
            Me déconnecter
        </b-dropdown-item>
        </form>
    </b-dropdown>
</template>

<script>
export default  {
    data() {
        return {
            navigation: window.location.pathname,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            currentUser: ''
        }
    },
    methods: {
        logoutMe() {
            document.getElementById('logout-form').submit();
        }
    },
    mounted() {
        axios.get('/current-user').then((r) => this.currentUser = r.data).catch((e) => console.log('fail'));
    }
}
</script>