$(document).ready(function(){
   $.ajax({
   			url:"http://192.168.64.2/webpages/data.php",
   			method: "GET",
   			success: function(data){
   				console.log(data);

   				var vegetable = [];
   				var weight = [];

   				for(var i in data){
   					vegetable.push("vegetable" + data[i].vegeid);
   					weight.push(data[i].weight);
   				}

   				var chartdata = {
   					labels: vegetable,
   					datasets : [
   						{
   							label: 'vegetable weight',
   							backgroundColor: 'rgba(200,200,200,0.75)',
   							borderColor: 'rgba(200,200,200,0.75)',
   							hoverBackgroundColor : 'rgba(200,200,200,1)',
   							hoverBorderColor: 'rgba(200,200,200,1)',
   							data: weight
   						}

   					]


   				};

   				var ctx = $("#mycanvas ");

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