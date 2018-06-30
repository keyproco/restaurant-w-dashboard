import Chart from 'chart.js';
export default {
	template: `<div">
					<canvas  ref="canvas">
					</canvas>
					<div  class="legend" v-html="legend"></div>
				</div>`,
    props: {
        labels: {},
        values: {},
        color: {
            default: 'rgba(220,220,220,0.2)',
            background: 'red'
        }
    },
    data() {
    	return {
    		legend: ''
    	};
    },

    mounted() {
        var data = {
          labels: this.labels,
          
          datasets: [
            {
              backgroundColor: this.color,
              hoverBackgroundColor: 'red',
              strokeColor: "rgba(220,220,220,1)",
              pointColor: "rgba(220,220,220,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: this.values,
              responsive: true,

            },
          ]
        };
console.log(this.values, this.labels);
let myChart = new Chart(this.$refs.canvas.getContext('2d'), {
type: 'line',
data: data
});

	this.legend = myChart.generateLegend();
    }

}