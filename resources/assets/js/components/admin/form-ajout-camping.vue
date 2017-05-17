<template>
    <div>
        <div class="mt-element-overlay">
            <div class="row">
                <upload-image v-if="images" v-for="(image , index) in images" :key="index" :image="image" @deleteImage="removeImage($event,index)"></upload-image>
            </div>
        </div>
        <form class="form-horizontal" @submit.prevent="ajoutCamping">
            <div class="form-body">
                <div class="form-group" :class="{ 'has-error' : errors.image }">
                    <label class="col-md-3 control-label">Photos</label>
                    <div class="col-md-9">
                        <input type="file" id="imageUploadInput" @change="onFileChange">
                        <span class="help-block" v-if="errors.image"> {{ errors.image[0] }} </span>
                    </div>
                </div>
                <div class="form-group " :class="{ 'has-error' : errors.adresse }">
                    <label class="control-label col-md-3">Adresse</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.adresse" class="form-control" placeholder="Adresse">
                        <span class="help-block" v-if="errors.adresse"> {{ errors.adresse[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.nom }">
                    <label class="col-md-3 control-label">Nom commercial</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.nom" class="form-control" placeholder="Nom commercial">
                        <span class="help-block" v-if="errors.nom"> {{ errors.nom[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.commune }">
                    <label class="col-md-3 control-label">Commune</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.commune" class="form-control" placeholder="Commune">
                        <span class="help-block" v-if="errors.commune"> {{ errors.commune[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.categorie }">
                    <label class="col-md-3 control-label">Catégorie</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.categorie" class="form-control" placeholder="Catégorie">
                        <span class="help-block" v-if="errors.categorie"> {{ errors.categorie[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.email }">
                    <label class="col-md-3 control-label">Adresse e-mail</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.email" class="form-control" placeholder="Adresse e-mail">
                        <span class="help-block" v-if="errors.email"> {{ errors.email[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.site }">
                    <label class="col-md-3 control-label">Site internet</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.site" class="form-control" placeholder="Site internet">
                        <span class="help-block" v-if="errors.site"> {{ errors.site[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.phone }">
                    <label class="col-md-3 control-label">Telephone</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.phone" class="form-control" placeholder="Telephone">
                        <span class="help-block" v-if="errors.phone"> {{ errors.phone[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.lat }">
                    <label class="col-md-3 control-label">Latitude</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.lat" class="form-control" placeholder="Latitude">
                        <span class="help-block" v-if="errors.lat"> {{ errors.lat[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.lng }">
                    <label class="col-md-3 control-label">Longitude</label>
                    <div class="col-md-9">
                        <input type="text" v-model="form.lng" class="form-control" placeholder="Longitude">
                        <span class="help-block" v-if="errors.lng"> {{ errors.lng[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.classement }">
                    <label class="col-md-3 control-label">Classement</label>
                    <div class="col-md-9">
                        <input type="number" v-model="form.classement" class="form-control" placeholder="Classement">
                        <span class="help-block" v-if="errors.classement"> {{ errors.classement[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.code_postal }">
                    <label class="col-md-3 control-label">Code Postal</label>
                    <div class="col-md-9">
                        <input type="number" v-model="form.code_postal" class="form-control" placeholder="Code Postal">
                        <span class="help-block" v-if="errors.code_postal"> {{ errors.code_postal[0] }} </span>
                    </div>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.nbr }">
                    <label class="col-md-3 control-label">Nombre d'emplacement</label>
                    <div class="col-md-9">
                        <input type="number" v-model="form.nbr" class="form-control" placeholder="Nombre d'emplacement">
                        <span class="help-block" v-if="errors.nbr"> {{ errors.nbr[0] }} </span>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn blue pull-right">Ajouter</button>
            </div>
        </form>
        <div class="modal fade" id="campingAdded" tabindex="-1" role="basic" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Succés</h4>
                    </div>
                    <div class="modal-body">
                        camping bien ajouté
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        <a :href="campingLink" type="button" class="btn green">Consulter</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                campingLink: '',
                images: [],
                files:[],
                form: {
                    adresse: '',
                    nom: '',
                    commune: '',
                    categorie: '',
                    email: '',
                    site: '',
                    phone: '',
                    lat: '',
                    lng: '',
                    classement: '',
                    code_postal: '',
                    nbr: '',
                },
                errors: {}

            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                this.files.push(files[0]);
                $('#imageUploadInput').val('');
            },
            createImage(file) {
                let reader = new FileReader();
                let self = this;
                reader.onload = (e) => {
                    self.images.push(e.target.result);
                };
                reader.readAsDataURL(file);
            },
            removeImage(event,index){
                if (event) event.preventDefault();
                this.images.splice(index, 1);
                this.files.splice(index, 1);
                if(this.images.length <= 0){
                    if($('#imageUploadInput').val()) { // returns true if the string is not empty
                        $('#imageUploadInput').val('');
                    }
                }
            },
            ajoutCamping(){
                HoldOn.open({
                    theme: "sk-folding-cube"
                });
                let data = new FormData();
                for (let i = 0; i < this.files.length; i++) {
                    data.append('files[]', this.files[i]);
                }
                data.append('adresse',this.form.adresse);
                data.append('nom',this.form.nom);
                data.append('commune',this.form.commune);
                data.append('categorie',this.form.categorie);
                data.append('email',this.form.email);
                data.append('site',this.form.site);
                data.append('phone',this.form.phone);
                data.append('lat',this.form.lat);
                data.append('lng',this.form.lng);
                data.append('classement',this.form.classement);
                data.append('code_postal',this.form.code_postal);
                data.append('nbr',this.form.nbr);
                let self = this;
                axios.post('/administration/ajout-camping', data)
                    .then(function (response) {
                        HoldOn.close();
                        if(response.data.done && response.data.public_key){
                            self.errors = {};
                            self.form = {};
                            self.images = [];
                            self.files = [];
                            self.campingIsAdded = true;
                            self.campingLink = '/administration/camping/'+response.data.public_key;
                            $('#campingAdded').modal('show');
                        }else{
                            toastr.error('Une erreure c\'est produite');
                        }
                        console.log(response.data);
                    })
                    .catch(function (error){
                        HoldOn.close();
                        self.errors = error.response.data;
                    });
            }
        }
    }
</script>