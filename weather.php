<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather App</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
</head>

<body>
  <button onclick=" fLaadBier_axios()">haal weer </button>
  <div id="weertabel">weertabel komt hier</div>
  <script>
function fLaadBier_axios() {
    let url ="https://api.openweathermap.org/data/2.5/forecast?lat=52.51&lon=6.08&appid=f7d5295e9f26c003682af3464439c474"
    axios.get(url)
        .then(function (response) {
          let json = response.data; 

          let htm = "plaats: "+ response.data.city.name + "<br>"
          htm += "temperatuur: "+response.data.list[0].main.temp + " kelvin<br>"
          htm += "temperatuur: "+ (response.data.list[0].main.temp-273) + "<sup> o</sup>C<br>"
          document.getElementById("weertabel").innerHTML = htm;
        })
}
</script>
</body>
</html>
