<template>
    <div id="chartClassement"></div>
</template>
<script>
    export default{
        data(){
            return {}
        },
        created(){
            let self = this;
            let campings = [];
            axios.get('/api/classement')
                .then(function (res) {
                    let classement = res.data;
                    let hist = {};
                    classement.map(function (a) {
                        if (a in hist) hist[a]++; else hist[a] = 1;
                    });
                    $.each(hist, function(index, value) {
                        campings.push({
                            'classement' : index,
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
                let chart = AmCharts.makeChart("chartClassement", {
                    "type": "serial",
                    "theme": "light",
                    "marginRight": 70,
                    "dataProvider": campings,
                    "valueAxes": [{
                        "axisAlpha": 0,
                        "position": "left",
                        "title": "Classement des Campings"
                    }],
                    "startDuration": 1,
                    "graphs": [{
                        "balloonText": "<b>[[classement]] étoiles: [[count]] Campings</b>",
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
                    "categoryField": "classement",
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