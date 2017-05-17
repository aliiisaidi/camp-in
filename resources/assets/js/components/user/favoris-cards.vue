<template>
    <div>
        <div class="tab__content" v-if="isEmpty">
            <section class="space--xs imagebg" data-overlay="4">
                <div class="background-image-holder" style="background: url('/img/favs.jpg'); opacity: 1;">
                    <img alt="background" src="img/favs.jpg">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="cta cta--horizontal text-center-xs">
                            <div class="col-sm-4">
                                <h4>Votre liste de favoris est encore vide</h4>
                            </div>
                            <div class="col-sm-5">

                            </div>
                            <div class="col-sm-3 text-right text-center-xs">
                                <a style="background-color:#674172;" class="btn type--uppercase" href="/">
                                    <span class="btn__text">
                                        Explorer
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
        </div>
        <div class="container" v-if="!isEmpty">
            <div class="row">
                <camping-card :likes="likes" v-for="camping in campings" :key="camping" :camping="camping"
                              @removeCamping="hateCamping(camping.id)"
                              @addCamping="addCamping(camping.id)"></camping-card>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                campings: [],
                likes: [],
                isEmpty: false
            }
        },
        created(){
            let self = this;
            axios.get('/navigation/api/likes_camping_ids')
                .then(function (res) {
                    self.likes = res.data;
                })
                .catch(function (err) {
                    console.log(err);
                });
            axios.get('/api/favoris')
                .then((res) => {
                    self.campings = res.data;
                    if(self.campings.length < 1){
                        self.isEmpty = true;
                    }
                    console.log(res.data);
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        methods: {
            addCamping(id){
                axios.post('/navigation/like_camping', {
                    'camping_id': id
                })
                    .then(function (res) {
                        console.log(res.data);
                    })
                    .catch(function (err) {
                        console.log(err);
                    });
            },
            hateCamping(id){
                let self = this;
                axios.post('/navigation/hate_camping', {
                    'camping_id': id
                })
                    .then(function (res) {
                        console.log(res.data);
                    })
                    .catch(function (err) {
                        console.log(err);
                    });
            },


        }
    }
</script>