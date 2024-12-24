//Daily Value type Const
var kelvin = 290;
//Convert Kelvin to Celsius
var celsius = kelvin - 273;
//Convert Celsius to Fahrenheit
var fahrenheit = celsius*(9/5)+32;
//Round Down
fahrenheit = Math.floor(fahrenheit);

console.log(kelvin);
// document.getElementById("kelvinValue").innerHTML = "JS TEST";

console.log(celsius);
console.log(fahrenheit);
console.log(
  'The temperature is '
  + fahrenheit +
  ' degrees Fahrenheit.'
);


$(document).ready(function(){
  $("#calc").one("click", function(){
    $("#kelvinValue").append(kelvin);
    $("#celsiusValue").append(celsius);
    $("#fahrenheitValue").append(fahrenheit);
  });
  $("#calc2").one("click", function(){
    $("#kelvinValue").append(kelvin);
    $("#celsiusValue").append(celsius);
    $("#fahrenheitValue").append(fahrenheit);
  });
  
	$("#calc2").click(function() {
	    var tc = $(this).closest("form").find("input[name='searchbox']").val();
	    alert(tc);      
	    return false;
	});

});

// $(document).ready(function(){
//   $("#calc").click(function(){

//   });
// });

