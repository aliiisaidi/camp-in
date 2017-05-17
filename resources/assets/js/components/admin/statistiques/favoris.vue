<template>
    <div id="chartFavoris"></div>
</template>
<script>
    export default{
        data(){
            return {}
        },
        created(){
            let self = this;
            let campings = [];
            axios.get('/admin/api/favoris')
                .then(function (res) {
                    console.log(res);
                    let favoris = res.data;
                    favoris.forEach((camping) => {
                        campings.push({
                            'categorie': camping.nom,
                            'count': camping.aggregate
                        });
                    });
                    self.setChart(campings);
                })
                .catch(function (err) {
                    console.log(err);
                });

        },
        methods: {
            setChart(campings){
                let chart = AmCharts.makeChart("chartFavoris", {
                    "type": "serial",
                    "theme": "light",
                    "marginRight": 70,
                    "language": "fr",
                    "balloon": {
                        "adjustBorderColor": false,
                        "horizontalPadding": 10,
                        "verticalPadding": 8,
                        "color": "#ffffff"
                    },
                    "dataProvider": campings,
                    "valueAxes": [{
                        "axisAlpha": 0,
                        "position": "left",
                        "title": "Favoris des campings"
                    }],
                    "startDuration": 1,
                    "graphs": [{
                        "balloonText": "<span style='font-size:12px;'>[[categorie]] :<br><span style='font-size:20px;'>[[count]] Favoris</span></span>",
                        "bullet": "round",
                        "lineThickness": 3,
                        "bulletSize": 7,
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "useLineColorForBulletBorder": true,
                        "bulletBorderThickness": 3,
                        "fillAlphas": 0,
                        "lineAlpha": 1,
                        "title": "Favoris",
                        "valueField": "count",
                        "dashLengthField": "dashLengthLine"
                    }],
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "categorie",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "axisAlpha": 0,
                        "tickLength": 0
                    },
                    "export": {
                        "enabled": true
                    }


                });
            }
        }
    }
</script>