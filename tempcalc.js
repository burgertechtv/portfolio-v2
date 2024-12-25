$(document).ready(function(){
  // $("#calc").one("click", function(){
  //   $("#kelvinValue").append(kelvin);
  //   $("#celsiusValue").append(celsius);
  //   $("#fahrenheitValue").append(fahrenheit);
  //     var tempType = $("#mySelect").val();
  //     var inputNum = $("#inputNum").val();
  //     console.log(tempType);
  //     console.log(inputNum);
  // });
  
  $("form").submit(function(event) {
      var tempType = $("#mySelect").val();
      var inputNum = $("#inputNum").val();

      if (tempType === "k") {
        var kelvin = inputNum;
        //Convert Kelvin to Celsius
        var celsius = kelvin - 273;
        //Convert Celsius to Fahrenheit
        var fahrenheit = celsius*(9/5)+32;
        //Round Down
        fahrenheit = Math.floor(fahrenheit);

        $("#kelvinValue").append(kelvin);       
        $("#celsiusValue").append(celsius);
        $("#fahrenheitValue").append(fahrenheit);
        
        $("input.btn").prop('disabled', true);

      } else if (tempType === "c") {
        var celsius = inputNum;
        //Convert Celsius to Fahrenheit
        var fahrenheit = celsius*(9/5)+32;
        fahrenheit = Math.floor(fahrenheit);
        //Convert Celsius to Kelvin
        var kelvin = Number(celsius) + 273;
        kelvin = Math.floor(kelvin);
        $("#celsiusValue").append(celsius);
        $("#fahrenheitValue").append(fahrenheit);
        $("#kelvinValue").append(kelvin);

        $("input.btn").prop('disabled', true);

      } else if (tempType === "f"){
        var fahrenheit = inputNum;
        //Convert Fahrenheit to Celsius
        var celsius = (Number(fahrenheit) - 32) * (5/9) ;
        celsius = Math.floor(celsius);
        //Convert Celsius to Kelvin
        var kelvin = Number(celsius) + 273;
        kelvin = Math.floor(kelvin);
        $("#celsiusValue").append(celsius);
        $("#fahrenheitValue").append(fahrenheit);
        $("#kelvinValue").append(kelvin);

        $("input.btn").prop('disabled', true);

      } else {
        alert("No Temp Type Selected");

      }
      

      
      event.preventDefault(); 
  });

});

// $(document).ready(function(){
//   $("#calc").click(function(){

//   });
// });

