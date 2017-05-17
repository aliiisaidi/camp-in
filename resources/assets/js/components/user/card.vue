<template>
    <div class="col-md-4" style="margin-top: 20px;">
        <div class="card card-2 text-center">
            <div class="card__top" style="height: 230px;">
                <a href="#">
                    <img v-if="camping.photos[0]" :src="'/'+camping.photos[0].url" style="min-height: 230px;" class="theImage">
                    <img v-else alt="Image" src="/img/par_defaut.jpg" style="min-height: 250px;" class="theImage">
                </a>
            </div>
            <div class="card__body" style="overflow: auto;height: 200px;">
                <h4>{{ camping.nom }}</h4>
                <a style="color:#674172 !important;" v-if="camping.site !== '-'" class="type--fade" target="_blank" :href="camping.site">{{ camping.site }}</a>
                <p>
                    {{ camping.adresse }} , {{ camping.commune }} , {{ camping.code_postal }}
                </p>
            </div>
            <div class="card__bottom text-center">
                <div class="card__action">
                    <span class="h6 type--uppercase">Détails</span>
                    <a :href="'/camping/'+camping.public_key">
                        <i class="material-icons">flip_to_front</i>
                    </a>
                </div>
                <div class="card__action">
                    <span class="h6 type--uppercase">J'aime</span>
                    <a @click="toggleCamping($event)" style="cursor: pointer;" class="noselect">
                        <i v-if="!isAdded" class="material-icons">favorite_border</i>
                        <i v-else class="material-icons" style="color: #D24D57;">favorite</i>
                    </a>
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
            likes: {
                type: Array,
                required: true
            },

        },
        data(){
            return {
                isAdded: false
            }
        },
        created(){
            this.isAdded = this.likes.includes(this.camping.id);
        },
        methods:{
            toggleCamping(event){
                if(event) event.preventDefault();
                if(this.isAdded){
                    this.isAdded = false;
                    this.$emit('removeCamping');
                }else{
                    this.isAdded = true;
                    this.$emit('addCamping');
                }

            }
        }
    }
</script>