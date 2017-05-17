<template>
    <form @submit.prevent="connexion">
        <div class="row">
            <div class="col-sm-12">
                <input type="text" v-model="form.email" placeholder="Adresse E-mail" :class="{ 'input-error': errors.email }"/>
                <p v-if="errors.email" class="message-error">{{ errors.email[0] }}</p>
            </div>
            <div class="col-sm-12">
                <input type="password" v-model="form.password" placeholder="Mot de Passe" :class="{ 'input-error': errors.password }"/>
                <p v-if="errors.password" class="message-error">{{ errors.password[0] }}</p>
            </div>
            <div class="col-sm-12">
                <button style="background-color: #674172; color: #ffffff;" class="btn type--uppercase" type="submit">Se connecter</button>
            </div>
        </div>
    </form>
</template>
<script>
    export default{
        data(){
            return {
                form: {
                    email: '',
                    password: ''
                },
                errors: {},
                isLoading: false
            }
        },
        methods: {
            connexion(){
                this.isLoading = true;
                let self = this;
                axios.post('/connexion', self.form)
                    .then(function (response) {
                        self.isLoading = false;
                        if (response.data.connected) {
                            window.location.replace('/navigation')
                        }
                    })
                    .catch(function (error) {
                        self.isLoading = false;
                        self.errors = error.response.data;
                    });
            }
        }
    }
</script>