<template>
    <form class="form-horizontal" @submit.prevent="editPassword">
        <div class="form-group" :class="{ 'has-error' : errors.old_password }">
            <label class="col-sm-2 control-label">Mot de passe actuel</label>
            <div class="col-sm-10">
                <input type="password" v-model="form.old_password" class="form-control" placeholder="Mot de passe actuel">
                <span class="help-block" v-if="errors.old_password"> {{ errors.old_password[0] }} </span>
            </div>
        </div>
        <div class="form-group" :class="{ 'has-error' : errors.password }">
            <label class="col-sm-2 control-label">Nouveau mot de passe</label>
            <div class="col-sm-10">
                <input type="password" v-model="form.password" class="form-control" placeholder="Nouveau mot de passe">
                <span class="help-block" v-if="errors.password"> {{ errors.password[0] }} </span>
            </div>
        </div>
        <div class="form-group" :class="{ 'has-error' : errors.password_confirmation }">
            <label class="col-sm-2 control-label">Confirmation du mot de passe</label>
            <div class="col-sm-10">
                <input type="password" v-model="form.password_confirmation" class="form-control" placeholder="Confirmation du mot de passe">
                <span class="help-block" v-if="errors.password_confirmation"> {{ errors.password_confirmation[0] }} </span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Changer</button>
            </div>
        </div>
    </form>
</template>
<script>
    export default{
        data(){
            return {
                form:{
                    old_password:'',
                    password:'',
                    password_confirmation:''
                },
                errors:{}
            }
        },
        methods:{
            editPassword(){
                let self = this;
                axios.post('/administration/editPassword', self.form)
                    .then(function (res) {
                        if(res.data.changed){
                            self.form = {
                                old_password:'',
                                password:'',
                                password_confirmation:''
                            };
                            self.errors = {};
                            toastr.success('Mot de passe modifié');
                        }
                        console.log(res.data);
                    })
                    .catch(function (err) {
                        self.errors = err.response.data;
                        console.log(err);
                    });
            }
        }
    }
</script>