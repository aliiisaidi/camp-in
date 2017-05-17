<template>
    <div class="col-md-3" style="margin-bottom: 20px;">
        <div class="mt-overlay-1">
            <img :src="image" class="theImage">
            <div class="mt-overlay">
                <ul class="mt-info">
                    <li>
                        <a class="btn default btn-outline" @click="deleteImage">
                            <i class="icon-trash"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: {
            image: {
                required: true
            }
        },
        data(){
            return {
                isDeleted: false
            }
        },
        methods: {
            deleteImage(){
                this.isDeleted = true;
                this.$emit('deleteImage');
            }
        }
    }
</script>