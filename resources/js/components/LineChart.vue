<script>
import {Line} from "vue-chartjs"
export default {
    extends: Line,
    props:{
        label:{
            type : String
        },
        chartData  : {
            type : Array
        },
        options:{
            type: Object
            },
        chartColors:{
            type: Object
            }
        },

        mounted() {
            const dates =  this.chartData.map(d=>d.date).reverse();
            const totals =  this.chartData.map(d=>d.total).reverse();
            const borderColor =   "#077187";
            const pointBorderColor =  "#0E1428";
            const pointBackgroundColor =  "#AFD6AC";
            const backgroudColor =  "#74A57F";
            // const {borderColor,pointBorderColor,pointBackgroundColor,backgroudColor} = this.chartColors;

            this.renderChart({
                labels:dates,
                datasets:[{
                    label:this.label,
                    data:totals,
                    borderColor: borderColor,
                    pointBorderColor: pointBorderColor,
                    pointBackgroundColor: pointBackgroundColor,
                    backgroundColor: "#87ceeb",
                    // color: backgroudColor,
                    // borderColor: "#077187",
                    // pointBorderColor: "#0E1428",
                    // pointBackgroundColor: "#AFD6AC",
                    // backgroudColor: "#74A57F",
                }],

            },
            this.options
            );
        },

    }


</script>
