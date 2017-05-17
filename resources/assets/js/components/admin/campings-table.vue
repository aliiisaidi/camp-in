<template>
    <div>
        <table id="adminTableCampings" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nom commercial</th>
                <th>Adresse</th>
                <th>Commune</th>
                <th>Code Postal</th>
                <th>Catégorie</th>
                <th>Courriel</th>
                <th>Site internet</th>
                <th>Numéro de téléphone</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Classement</th>
                <th>Nombre de places</th>
                <th>Créé</th>
                <th>Modifié</th>
                <th>Clé publique</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="modal" id="workingModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">{{ form.nom }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="mt-element-overlay">
                            <div class="row">
                                <upload-image v-if="form.photos.length > 0" v-for="(photo , index) in form.photos"
                                              :key="index"
                                              :image="'/'+form.photos[index].url"
                                              @deleteImage="removeImageDb($event,form.photos[index].id)"></upload-image>
                                <upload-image v-if="images" v-for="(image , index) in images" :key="index"
                                              :image="image" @deleteImage="removeImage($event,index)"></upload-image>
                            </div>
                        </div>

                        <hr>
                        <form @submit.prevent="submitForm" id="theForm">
                            <div class="form-group">
                                <label>Ajouter une image</label>
                                <input type="file" id="imageUploadInput" @change="onFileChange">
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.nom }">
                                <label>Nom commercial</label>
                                <input type="text" v-model="form.nom" class="form-control">
                                <span class="help-block" v-if="errors.nom"> {{ errors.nom[0] }} </span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.adresse }">
                                <label>Adresse</label>
                                <input type="text" v-model="form.adresse" class="form-control">
                                <span class="help-block" v-if="errors.adresse"> {{ errors.adresse[0] }} </span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.commune }">
                                <label>Commune</label>
                                <input type="text" v-model="form.commune" class="form-control">
                                <span class="help-block" v-if="errors.commune"> {{ errors.commune[0] }} </span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.code_postal }">
                                <label>Code Postal</label>
                                <input type="text" v-model="form.code_postal" class="form-control">
                                <span class="help-block" v-if="errors.code_postal"> {{ errors.code_postal[0] }} </span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.categorie }">
                                <label>Catégorie</label>
                                <input type="text" v-model="form.categorie" class="form-control">
                                <span class="help-block" v-if="errors.categorie"> {{ errors.categorie[0] }} </span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.email }">
                                <label>Courriel</label>
                                <input type="text" v-model="form.email" class="form-control">
                                <span class="help-block" v-if="errors.email"> {{ errors.email[0] }} </span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.site }">
                                <label>Site internet</label>
                                <input type="text" v-model="form.site" class="form-control">
                                <span class="help-block" v-if="errors.site"> {{ errors.site[0] }} </span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.phone }">
                                <label>Numéro de téléphone</label>
                                <input type="text" v-model="form.phone" class="form-control">
                                <span class="help-block" v-if="errors.phone"> {{ errors.phone[0] }} </span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.lat }">
                                <label>Latitude</label>
                                <input type="text" v-model="form.lat" class="form-control">
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.lng }">
                                <label>Longitude</label>
                                <input type="text" v-model="form.lng" class="form-control">
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.classement }">
                                <label>Classement</label>
                                <input type="number" v-model="form.classement" class="form-control">
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.nbr }">
                                <label>Nombre de places</label>
                                <input type="number" v-model="form.nbr" class="form-control">
                            </div>
                            <input type="submit" style="display: none;">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn red btn-outline" data-toggle="modal" href="#alertDelete">
                            Supprimer
                        </button>
                        <button type="button" class="btn green" @click="submitForm">Mettre à jour</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="alertDelete" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title text-danger">Attention !!!</h4>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûrs de vouloir supprimer définitivement le camping {{ form.nom }} ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn red btn-outline" @click="deleteCamping">
                            Oui
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
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
                tableRow: '',
                jqueryRow: '',
                errors: {},
                images: [],
                files: []
            }
        },
        created(){
            let self = this;
            $(document).ready(function () {
                let table = $('#adminTableCampings').DataTable({
                    "processing": true,
                    "ajax": {"url": "/api/all-campings", "dataSrc": ""},
                    "columns": [
                        {"data": "nom"},
                        {"data": "adresse"},
                        {"data": "commune"},
                        {"data": "code_postal"},
                        {"data": "categorie"},
                        {"data": "email"},
                        {"data": "site"},
                        {"data": "phone"},
                        {"data": "lat"},
                        {"data": "lng"},
                        {"data": "classement"},
                        {"data": "nbr"},
                        {"data": "created_at"},
                        {"data": "updated_at"},
                        {"data": "public_key"}
                    ],
                    "lengthMenu": [
                        [5, 15, 20, -1],
                        [5, 15, 20, "tous les"] // change per page values here
                    ],
                    "pageLength": 20,
                    "language": {
                        url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/French.json'
                    },

                });

                $('#adminTableCampings').find('tbody').on('click', 'tr', function () {
                    let data = table.row(this).data();
                    self.tableRow = table.row(this);
                    self.jqueryRow = $(this);
                    axios.get('/api/camping/'+data.public_key)
                        .then(function (res) {
                            self.form = res.data;
                        })
                        .catch(function (err) {
                            console.log(err);
                        });

                    $('#workingModal').modal();
                });

                $('#workingModal').on('hidden.bs.modal', function () {
                    self.form = {
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
                    };
                    self.tableRow = '';
                    self.jqueryRow = '';
                    self.errors = {};
                    self.images =  [];
                    self.files = [];
                });
            });
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
            removeImage(event, index){
                if (event) event.preventDefault();
                this.images.splice(index, 1);
                this.files.splice(index, 1);
                if (this.images.length <= 0) {
                    if ($('#imageUploadInput').val()) { // returns true if the string is not empty
                        $('#imageUploadInput').val('');
                    }
                }
            },
            submitForm(){
                console.log(this.form);
                let data = new FormData();
                for (let i = 0; i < this.files.length; i++) {
                    data.append('files[]', this.files[i]);
                }
                data.append('public_key', this.form.public_key);
                data.append('adresse', this.form.adresse);
                data.append('nom', this.form.nom);
                data.append('commune', this.form.commune);
                data.append('categorie', this.form.categorie);
                data.append('email', this.form.email);
                data.append('site', this.form.site);
                data.append('phone', this.form.phone);
                data.append('lat', this.form.lat);
                data.append('lng', this.form.lng);
                data.append('classement', this.form.classement);
                data.append('code_postal', this.form.code_postal);
                data.append('nbr', this.form.nbr);
                let self = this;
                console.log(data);
                HoldOn.open({
                    theme: "sk-folding-cube"
                });
                axios.post('/administration/edit-camping', data)
                    .then(function (res) {
                        HoldOn.close();
                        console.log(res);
                        if (res.data.updated) {
                            self.tableRow.data(res.data.camping);
                            $('#workingModal').modal('hide');
                            self.tableRow = '';
                            self.form = {
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
                            };
                            self.errors = {};
                            self.jqueryRow = '';
                            self.errors = {};
                            self.images =  [];
                            self.files = [];
                            toastr.success('le camping ' + res.data.camping.nom + ' est bien modifié');

                        } else {
                            toastr.error('Une erreure s\'est produite');
                        }
                    })
                    .catch(function (err) {
                        HoldOn.close();
                        self.errors = err.response.data;
                    });
            },
            deleteCamping(){
                HoldOn.open({
                    theme: "sk-folding-cube"
                });
                let self = this;
                axios.post('/administration/delete-camping', {
                    'public_key': self.form.public_key
                })
                    .then(function (res) {
                        console.log(res.data);
                        $('#alertDelete').modal('hide');
                        $('#workingModal').modal('hide');
                        HoldOn.close();
                        if (res.data.deleted) {
                            toastr.success('Le camping ' + self.form.nom + ' est bien supprimé');
                            self.form = {
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
                            };
                            self.files = [];
                            self.images = [];
                            self.errors = {};
                            self.tableRow.remove();
                            self.jqueryRow.hide(500);
                            self.tableRow = '';
                            self.jqueryRow = '';
                        } else {
                            $('#alertDelete').modal('hide');
                            $('#workingModal').modal('hide');
                            HoldOn.close();
                            toastr.error('Une érreure s\'est produite');
                        }
                    })
                    .catch(function (err) {
                        HoldOn.close();
                        console.log(err);
                    });
            },
            removeImageDb(event, id){
                if (event) event.preventDefault();
                let self = this;
                axios.post('/administration/delete-photo', {
                    'id': id
                })
                    .then(function (res) {
                        if (res.data) {
                            self.form.photos = res.data;
                            self.tableRow.data(self.form);
                        }
                        console.log(res);
                    })
                    .catch(function (err) {
                        console.log(err);
                    });
            }
        }
    }
</script>