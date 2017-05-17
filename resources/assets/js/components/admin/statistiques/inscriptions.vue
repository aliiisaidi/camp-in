<template>
    <div id="chartInscriptions"></div>
</template>
<script>
    export default{
        data(){
            return {}
        },
        created(){
            let self = this;
            let inscriptions = [];
            axios.get('/api/inscriptions')
                .then(function (res) {
                    let dates = res.data;
                    let mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
                    let inscriptions = [];
                    dates.forEach((data) => {
                        let jsDate = new Date(data.date);
                        console.log(jsDate);
                        inscriptions.push(jsDate.getDate() + ' / ' + mois[jsDate.getMonth()]);
                    });
                    let hist = {};
                    inscriptions.map(function (a) {
                        if (a in hist) hist[a]++; else hist[a] = 1;
                    });
                    let months = [];
                    $.each(hist, function (index, value) {
                        months.push({
                            'month': index,
                            'count': value
                        });
                    });
                    console.log(months);
                    self.setChart(months);
                })
                .catch(function (err) {
                    console.log(err);
                });

        },
        methods: {
            setChart(inscriptions){
                let chart = AmCharts.makeChart("chartInscriptions", {
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
                    "dataProvider": inscriptions,
                    "valueAxes": [{
                        "axisAlpha": 0,
                        "position": "left",
                        "title": "Inscriptions des Utilisateurs"
                    }],
                    "startDuration": 1,
                    "graphs": [{
                        "balloonText": "<span style='font-size:12px;'>[[title]] durant [[category]]:<br><span style='font-size:20px;'>[[value]]</span></span>",
                        "bullet": "round",
                        "lineThickness": 3,
                        "bulletSize": 7,
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "useLineColorForBulletBorder": true,
                        "bulletBorderThickness": 3,
                        "fillAlphas": 0,
                        "lineAlpha": 1,
                        "title": "Inscriptions",
                        "valueField": "count",
                        "dashLengthField": "dashLengthLine"
                    }],
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "month",
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