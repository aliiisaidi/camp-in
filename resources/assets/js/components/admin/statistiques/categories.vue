<template>
    <div id="chartCategorie"></div>
</template>
<script>
    export default{
        data(){
            return {}
        },
        created(){
            let self = this;
            let campings = [];
            axios.get('/api/categories')
                .then(function (res) {
                    let classement = res.data;
                    let hist = {};
                    classement.map(function (a) {
                        if (a in hist) hist[a]++; else hist[a] = 1;
                    });
                    $.each(hist, function(index, value) {
                        campings.push({
                            'categorie' : index,
                            'count': value
                        });
                    });
                    self.setChart(campings);
                })
                .catch(function (err) {
                    console.log(err);
                });

        },
        methods:{
            setChart(campings){
                let chart = AmCharts.makeChart("chartCategorie", {
                    "type": "serial",
                    "theme": "light",
                    "marginRight": 70,
                    "dataProvider": campings,
                    "valueAxes": [{
                        "axisAlpha": 0,
                        "position": "left",
                        "title": "Catégories des Campings"
                    }],
                    "startDuration": 1,
                    "graphs": [{
                        "balloonText": "<b>[[categorie]] : [[count]] Campings</b>",
                        "fillAlphas": 0.9,
                        "lineAlpha": 0.2,
                        "type": "column",
                        "valueField": "count"
                    }],
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "categorie",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "labelRotation": 0
                    },
                    "export": {
                        "enabled": true
                    }

                });
            }
        }
    }
</script>