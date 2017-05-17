<template>
    <div>
        <h1 class="page-title" style="margin-top: 0"> Consultation <small> {{ showing }} sur {{ total }}</small></h1>
        <div class="blog-page blog-content-1">
            <div class="row">
                <single-camping v-for="camping in campings" :key="camping" :camping="camping"></single-camping>

            </div>
            <button style="width: 100%" v-if="isNextPage" class="btn" @click="showMore" >Afficher Plus
            </button>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                campings: [],
                showing: 0,
                total: 0,
                nextPage: '',
                isNextPage: false,
            }
        },
        created(){
            HoldOn.open({
                theme: 'sk-folding-cube'
            });
            let self = this;
            axios.get('/api/campings')
                .then((res) => {
                    HoldOn.close();
                    self.campings = res.data.data;
                    self.showing = res.data.to;
                    self.total = res.data.total;
                    if (res.data.next_page_url !== null) {
                        self.nextPage = res.data.next_page_url;
                        self.isNextPage = true;
                    } else {
                        self.nextPage = '';
                        self.isNextPage = false;
                    }

                    console.log(res.data);
                })
                .catch((err) => {
                    HoldOn.close();
                    console.log(err);
                })
        },
        methods: {
            showMore(){
                HoldOn.open({
                    theme: 'sk-folding-cube'
                });
                let self = this;
                axios.get(self.nextPage)
                    .then((res) => {
                        HoldOn.close();
                        if (res.data.data) {
                            res.data.data.forEach((obj) => {
                                self.campings.push(obj);
                            });
                            self.showing = res.data.to;
                            self.total = res.data.total;
                            if (res.data.current_page !== res.data.last_page) {
                                self.nextPage = res.data.next_page_url;
                                self.isNextPage = true;
                            } else {
                                self.nextPage = '';
                                self.isNextPage = false;
                            }
                        }
                        console.log(res.data);
                    })
                    .catch((err) => {
                        HoldOn.close();
                        console.log(err);
                    })
            }
        }
    }
</script>