(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	
	var activityBar = function(){
		var activity = document.getElementById("activity");
		if (activity !== null) {
			var activityData = [{
					first: [35, 18, 15, 35, 40, 20, 30, 25, 22, 20]
				},
				{
					first: [50, 35, 10, 45, 40, 50, 60, 35, 10, 50]
				},
				{
					first: [20, 35, 60, 45, 40, 35, 30, 35, 10, 40]
				},
				{
					first: [25, 88, 25, 50, 21, 42, 60, 33, 50, 60]
				}
			];
			activity.height = 260;
			
			var config = {
				type: "bar",
				data: {
					labels: [
						"01",
						"02",
						"03",
						"04",
						"05",
						"06",
						"07",
						"08",
						"09",
						"10"
					],
					datasets: [
						{
							label: "My First dataset",
							data:  [35, 18, 15, 35, 40, 20, 30, 25, 22, 20, 45, 35, 35, 18, 15, 35, 40, 20, 30, 25, 22, 20, 45, 35, 30, 25, 22, 20, 45, 35],
							borderColor: 'rgba(47, 76, 221, 1)',
							borderWidth: "0",
							barThickness:'flex',
							backgroundColor: '#ff6d4d',
							minBarLength:10
						}
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								color: "rgba(233,236,255,1)",
								drawBorder: true
							},
							ticks: {
								fontColor: "#3e4954",
								 max: 60,
                min: 0,
                stepSize: 20
							},
						}],
						xAxes: [{
							barPercentage: 0.7,
							
							gridLines: {
								display: true,
								zeroLineColor: "transparent"
							},
							ticks: {
								stepSize: 20,
								fontColor: "#3e4954",
								fontFamily: "Nunito, sans-serif"
							}
						}]
					},
					tooltips: {
						mode: "index",
						intersect: false,
						titleFontColor: "#888",
						bodyFontColor: "#555",
						titleFontSize: 12,
						bodyFontSize: 15,
						backgroundColor: "rgba(255,255,255,1)",
						displayColors: true,
						xPadding: 10,
						yPadding: 7,
						borderColor: "rgba(220, 220, 220, 1)",
						borderWidth: 1,
						caretSize: 6,
						caretPadding: 10
					}
				}
			};

			var ctx = document.getElementById("activity").getContext("2d");
			var myLine = new Chart(ctx, config);

			var items = document.querySelectorAll("#user-activity .nav-tabs .nav-item");
			items.forEach(function(item, index) {
				item.addEventListener("click", function() {
					config.data.datasets[0].data = activityData[index].first;
					myLine.update();
				});
			});
		}
	}
	var donutChart = function(){
		var options = {
			series: [26,10,26,9,12,16,32,6],
			//colors:['#ff5c5a', '#2bc156', '#404a56'],
			chart: {
				height: 330,
				width:560,
				type: 'donut',
				sparkline: {
					enabled: true,
				},
				
			},
			labels: ["Fast Food", "Italian ", "Main Course","Starter ", "Beverages", "Indian ","Dessert ", "Other "],
			plotOptions: {
				pie: {
					customScale: 1,
					donut: {
						size: '50%'
						
					}
				}
			},
			legend: {
				show:true,
				 fontSize: '18px',
				position: 'right',
				  offsetY: 0,
				  //height: 270,
				   itemMargin: {
					  vertical: 5,
					horizontal: 5,
				  },
				  markers: {
					  width: 16,
					  height: 16,
					  strokeWidth: 0,
					  radius: 0,
				  },
			},
			dataLabels: {
				enabled: false
			},
			responsive: [{
				breakpoint: 1300,
				options: {
					chart: {
						height: 230,
						width:400
					},
					legend: {
						fontSize: '14px',
						itemMargin: {
						  vertical: 0,
						horizontal: 5,
					  },
					}
				}
			},
			{
				breakpoint: 575,
				options: {
					chart: {
						height: 230,
						width:300
					},
					legend: {
						show:false,
						fontSize: '14px',
						itemMargin: {
						  vertical: 0,
						horizontal: 5,
					  },
					}
				}
			}],
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
	}
	
	
	
	var counterBar = function(){
		$(".counter").counterUp({
			delay: 30,
			time: 3000
		});
	}
	
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				activityBar();		
				donutChart();	
				counterBar();
			},
			
			resize:function(){
				
			}
		}
	
	}();

	jQuery(document).ready(function(){
	});
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);