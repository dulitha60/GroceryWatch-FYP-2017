$(document).ready(function(){
   $.ajax({
   			url:"http://192.168.64.2/webpages/datac.php",
   			method: "GET",
   			success: function(data){
   				console.log(data);

   				var can = [];
   				var distance = [];

   				for(var i in data){
   					can.push("day" + data[i].canid);
   					distance.push(data[i].distance);
   				}

   				var chartdata = {
   					labels: can,
   					datasets : [
   						{
   							label: 'Can avaliability',
   							backgroundColor: 'rgba(200,200,200,0.75)',
   							borderColor: 'rgba(200,200,200,0.75)',
   							hoverBackgroundColor : 'rgba(200,200,200,1)',
   							hoverBorderColor: 'rgba(200,200,200,1)',
   							data: distance
   						}

   					]


   				};

   				var ctx = $("#mycanvas2 ");

   				var barGraph = new Chart(ctx,{
   					type: 'bar',
   					data: chartdata
   				})
   			},

   			error: function(data){
   				console.log(data);
   			}

   });



});