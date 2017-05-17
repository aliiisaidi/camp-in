<template>
    <div id="map"></div>

</template>
<script>
    export default{
        data(){
            return {}
        },
        mounted(){
            let map = new GMaps({
                el: '#map',
                lat: 46.2276,
                lng: 2.2137,
                zoom: 5
            });
            let markers = [];
            axios.get('/api/all-campings')
                .then(function (res) {
                    res.data.forEach((camping) => {
                        let image = '/img/par_defaut.jpg';
                        if (camping.photos.length > 1) {
                            image = '/' + camping.photos[0].url;
                        }
                        map.addMarker({
                            lat: camping.lat,
                            lng: camping.lng,
                            title: camping.nom,
                            infoWindow: {
                                content: '<div class="blog-post-lg bordered blog-container" style="width: 320px;">' +
                                '<div class="blog-img-thumb">' +
                                '<a href="javascript:;">' +
                                '<div style="position: relative;height: 200px;">' +
                                '<img src="' + image + '" class="theImage"/></div>' +
                                '</a>' +
                                '</div>' +
                                '<div class="blog-post-content">' +
                                '<h3 class="blog-title blog-post-title lowercase">' + camping.nom + '</h3>' +
                                '<h4> Classement : ' + camping.classement + '<br>' +
                                '  Catégorie : ' + camping.categorie + '</h4>' +
                                '<a  href="/administration/camping/'+ camping.public_key +'">Consulter</a>' +
                                '</div></div>'
                            }
                        });
                        console.log(camping);
                    });
                })
                .catch(function (err) {
                    console.log(err);
                });

        }
    }
</script>