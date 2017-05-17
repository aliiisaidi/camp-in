<template>
    <div>
        <table id="adminTableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Adresse E-mail</th>
                <th>Inscrit le</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="modal" id="alertDelete" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title text-danger">Attention !!!</h4>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer définitivement l'utilisateur {{ user.first_name
                        }} {{ user.last_name }} ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn red btn-outline" @click="deleteUser">
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
                user: {},
                tableRow: '',
                jqueryRow: ''
            }
        },
        created(){
            let self = this;
            $(document).ready(function () {
                let table = $('#adminTableUsers').DataTable({
                    "processing": true,
                    "ajax": {"url": "/api/users", "dataSrc": ""},
                    "columns": [
                        {"data": "first_name"},
                        {"data": "last_name"},
                        {"data": "email"},
                        {"data": "created_at"}
                    ],
                    "lengthMenu": [
                        [5, 15, 20, -1],
                        [5, 15, 20, "tous les"] // change per page values here
                    ],
                    "pageLength": 5,
                    "language": {
                        url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/French.json'
                    },

                });
                $('#adminTableUsers').find('tbody').on('click', 'tr', function () {
                    let data = table.row(this).data();
                    self.tableRow = table.row(this);
                    self.jqueryRow = $(this);
                    self.user = data;
                    console.log(data);
                    $('#alertDelete').modal();
                });
            });
        },
        methods: {
            deleteUser(){
                HoldOn.open({
                    theme: "sk-folding-cube"
                });
                let self = this;
                axios.post('/administration/delete-user', {
                    'public_key': self.user.public_key
                })
                    .then(function (res) {
                        $('#alertDelete').modal('hide');
                        HoldOn.close();
                        if (res.data.deleted) {
                            toastr.success('L\'utilisateur ' + self.user.first_name + ' ' + self.user.last_name + ' est bien supprimé');
                            self.user = {};
                            self.errors = {};
                            self.tableRow.remove();
                            self.jqueryRow.hide(500);
                            self.tableRow = '';
                            self.jqueryRow = '';
                        } else {
                            $('#alertDelete').modal('hide');
                            HoldOn.close();
                            toastr.error('Une érreure c\'est produite');
                        }
                    })
                    .catch(function (err) {
                        HoldOn.close();
                        console.log(err);
                    });
            },
        }
    }
</script>