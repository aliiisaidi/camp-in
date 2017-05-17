<template>
    <form @submit.prevent="inscription">
        <p><i class=""></i></p>
        <div class="row">
            <div class="col-xs-12">
                <input type="text" v-model="form.first_name" placeholder="Prénom" :class="{ 'input-error': errors.first_name }"/>
                <p v-if="errors.first_name" class="message-error">{{ errors.first_name[0] }}</p>
            </div>
            <div class="col-xs-12">
                <input type="text" v-model="form.last_name" placeholder="Nom" :class="{ 'input-error': errors.last_name }"/>
                <p v-if="errors.last_name" class="message-error">{{ errors.last_name[0] }}</p>
            </div>
            <div class="col-xs-12">
                <input type="text" v-model="form.email" placeholder="Adresse E-mail" :class="{ 'input-error': errors.email }"/>
                <p v-if="errors.email" class="message-error">{{ errors.email[0] }}</p>
            </div>
            <div class="col-xs-12">
                <input type="password" v-model="form.password" placeholder="Mot de passe" :class="{ 'input-error': errors.password }"/>
                <p v-if="errors.password" class="message-error">{{ errors.password[0] }}</p>
            </div>
            <div class="col-xs-12">
                <input type="password" v-model="form.password_confirmation"
                       placeholder="Confirmation du mot de passe" :class="{ 'input-error': errors.password_confirmation }"/>
                <p v-if="errors.password_confirmation" class="message-error">{{ errors.password_confirmation[0] }}</p>
            </div>
            <div class="col-xs-12">
                <button type="submit" style="background-color: #674172; color: #ffffff;"
                        class="btn  type--uppercase" :class="{ 'btn--loading' : isLoading}">
                    S'inscrire
                </button>
            </div>
        </div>
    </form>
</template>
<script>
    export default{
        data(){
            return {
                isLoading: false,
                form: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors: {}
            }
        },
        methods: {
            inscription(){
                this.isLoading = true;
                this.errors = {};
                let self = this;
                axios.post('/inscription', self.form)
                    .then(function (response) {
                        self.isLoading = false;
                        if(response.data.saved){
                            self.form = {
                                first_name: '',
                                last_name: '',
                                email: '',
                                password: '',
                                password_confirmation: '',
                            };
                            mr.modals.closeActiveModal();
                            let modal = $('.inscription-valide');
                            mr.modals.showModal(modal);
                        }
                    })
                    .catch(function (error) {
                        self.errors = error.response.data;
                        self.isLoading = false;
                    });
            }
        }
    }
</script>