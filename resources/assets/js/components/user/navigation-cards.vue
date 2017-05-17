<template>
    <div class="container">
        <div class="row">
            <camping-card :likes="likes" v-for="camping in campings" :key="camping" :camping="camping" @removeCamping="hateCamping(camping.id)" @addCamping="addCamping(camping.id)"></camping-card>
        </div>
        <div class="pagination" style="margin-bottom: 40px;">
            <div class="col-xs-6">
                <a style="color:#674172 !important;" v-if="isPreviousPage" class="type--fine-print" href="#" @click="showLess($event)">« Précédent</a>
            </div>
            <div  class="col-xs-6 text-right">
                <a style="color:#674172 !important;" v-if="isNextPage" class="type--fine-print" href="#" @click="showMore($event)">Suivant »</a>
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
                nextPage: '',
                previousPage: '',
                isNextPage: false,
                isPreviousPage: false
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
            axios.get('/navigation/api/campings')
                .then((res) => {
                    self.campings = res.data.data;
                    if (res.data.next_page_url !== null) {
                        self.nextPage = res.data.next_page_url;
                        self.isNextPage = true;
                    } else {
                        self.nextPage = '';
                        self.isNextPage = false;
                    }
                    if (res.data.prev_page_url !== null) {
                        self.previousPage = res.data.prev_page_url;
                        self.isPreviousPage = true;
                    } else {
                        self.previousPage = '';
                        self.isPreviousPage = false;
                    }

                })
                .catch((err) => {
                    console.log(err);
                })
        },
        methods: {
            showMore(event){
                if(event) event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "fast");
                let self = this;
                axios.get(self.nextPage)
                    .then((res) => {
                        if (res.data.data) {
                            self.campings = res.data.data;
                            if (res.data.next_page_url !== null) {
                                self.nextPage = res.data.next_page_url;
                                self.isNextPage = true;
                            } else {
                                self.nextPage = '';
                                self.isNextPage = false;
                            }
                            if (res.data.prev_page_url !== null) {
                                self.previousPage = res.data.prev_page_url;
                                self.isPreviousPage = true;
                            } else {
                                self.previousPage = '';
                                self.isPreviousPage = false;
                            }
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    })
            },
            showLess(event){
                if(event) event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "fast");
                let self = this;
                axios.get(self.previousPage)
                    .then((res) => {
                        if (res.data.data) {
                            self.campings = res.data.data;
                            if (res.data.next_page_url !== null) {
                                self.nextPage = res.data.next_page_url;
                                self.isNextPage = true;
                            } else {
                                self.nextPage = '';
                                self.isNextPage = false;
                            }

                            if (res.data.prev_page_url !== null) {
                                self.previousPage = res.data.prev_page_url;
                                self.isPreviousPage = true;
                            } else {
                                self.previousPage = '';
                                self.isPreviousPage = false;
                            }
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    })
            },
            addCamping(id){
                axios.post('/navigation/like_camping', {
                    'camping_id' : id
                })
                    .then(function (res) {
                        console.log(res.data);
                    })
                    .catch(function (err) {
                        console.log(err);
                    });
            },
            hateCamping(id){
                axios.post('/navigation/hate_camping', {
                    'camping_id' : id
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