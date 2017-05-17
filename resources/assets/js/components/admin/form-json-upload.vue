<template>
    <div>
        <div class="form-group">
            <input type="file" @change="upload($event)">
        </div>
        <div class="modal fade" id="jsonDone" tabindex="-1" role="basic" aria-hidden="true" v-if="jsonIsDone">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Succés</h4>
                    </div>
                    <div class="modal-body">
                        {{ count }} campings ajoutés
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        <a v-if="!jsonIsNone" href="/administration/campings-consultation" type="button" class="btn green">Consulter</a>
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
                jsonIsDone: true,
                jsonIsNone: false,
                count: 0
            }
        },
        methods: {
            upload(event){
                let extension = event.target.files[0].name.split('.').pop();
                if (extension === 'json') {
                    HoldOn.open({
                        theme: "sk-folding-cube"
                    });
                    let data = new FormData();
                    data.append('file', event.target.files[0]);
                    //console.log(data);
                    let self = this;
                    axios.post('/administration/json-file', data).then(function (response) {
                        HoldOn.close();
                        self.count = response.data.count;
                        self.jsonIsNone = self.count === 0;
                        self.jsonIsDone = true;
                        $('#jsonDone').modal('show');
                    });
                } else {
                    toastr.error('Ce n\'est pas un fichier JSON');
                }

            }
        }
    }
</script>