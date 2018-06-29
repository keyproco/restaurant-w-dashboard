
<template>
                <b-dropdown position="is-bottom-left">
                    <a class="navbar-item" slot="trigger">
                        <span>Login</span>
                        <b-icon icon="menu-down"></b-icon>
                    </a>

                    <b-dropdown-item custom paddingless>
                        <form  method="POST" action="/login">
                            <input type="hidden" name="_token" :value="csrf">
                            <div class="modal-card" style="width:300px;">
                                <section class="modal-card-body">
                                    <b-field label="Email">
                                        <b-input
                                            name="email"
                                            type="email"
                                            placeholder="Your email">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Password">
                                        <b-input
                                            name="password"
                                            type="password"
                                            password-reveal
                                            placeholder="Your password"
                                            required>
                                        </b-input>
                                    </b-field>
                                    <b-checkbox name="remember">Se souvenir de moi</b-checkbox>
                                </section>
                                <footer class="modal-card-foot">
                                    <button class="button is-primary">Login</button>
                                </footer>
                            </div>
                        </form>
                    </b-dropdown-item>
                </b-dropdown>
</template>

<script>
    export default {
        data() {
            return {
                csrf : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }

    }
</script>
