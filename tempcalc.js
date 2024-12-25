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
      var kelvin = inputNum;
      var celsius = kelvin - 273;
      //Convert Celsius to Fahrenheit
      var fahrenheit = celsius*(9/5)+32;
      //Round Down
      fahrenheit = Math.floor(fahrenheit);

      $("#kelvinValue").append(kelvin);       
      $("#celsiusValue").append(celsius);
      $("#fahrenheitValue").append(fahrenheit);

      console.log(tempType);
      console.log(inputNum);
      console.log(kelvin);
      console.log(celsius);
      console.log(fahrenheit);

      if (tempType === "k") {
        alert("Temp Type = k");
      } else if (tempType === "c") {
        alert("Temp Type = c");
      } else if (tempType === "f"){
        alert("Temp Type = f");
      } else {
        alert("Default Value");
      }

      $("input.btn").prop('disabled', true);
      event.preventDefault(); 
  });

});

// $(document).ready(function(){
//   $("#calc").click(function(){

//   });
// });

