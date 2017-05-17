<template>
    <div class="col-lg-3 ">
        <div class="blog-post-sm bordered  campingBox">
            <div class="blog-img-thumb">
                <a href="javascript:;">
                    <img v-if="camping.photos[0]" :src="'/' + camping.photos[0].url">
                    <img v-else src="/img/par_defaut.jpg">
                </a>
            </div>
            <div class="blog-post-content overF">
                <h2 class="blog-title blog-post-title">
                    <a :href="'/administration/camping/'+ camping.public_key">{{ camping.nom }}</a>
                    <span class="ratings" v-if="camping.classement">
                        <i v-for="i in camping.classement" class="icon-star rating-star"></i>
                    </span>

                </h2>
                <p class="blog-post-desc">
                    <b>Catégorie : </b> {{ camping.categorie }} <br>
                    <b>Adresse : </b> {{ camping.adresse }} , {{ camping.commune }} .

                </p>
                <div class="blog-post-foot">
                    <div class="blog-post-meta">
                        <i class="icon-calendar font-blue"></i>
                        <a href="javascript:;">{{ camping.created_at }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: {
            camping: {
                type: Object,
                required: true
            },

        },
        data(){
            return {}
        }
    }
</script>