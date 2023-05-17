<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="myscripts.js"></script>

    <!----======== CSS ======== -->
    <link href="https://cdn.jsdelivr.net/npm/round-slider@1.6.1/dist/roundslider.min.css" rel="stylesheet">
    <!----===== Boxicons CSS ===== -->

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://icons.getbootstrap.com/assets/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--<title>Dashboard topbar Menu</title>-->
    <link rel="stylesheet" href="housestate.css">
    <link rel="stylesheet" href="switch.css">
    <link rel="stylesheet" href="style.css">

</head>


<body>
    <div class="flex-container">
        <div class="temperature" id="temp" onclick="tempClick()"><a href="#">
                <div class="bi bi-thermometer" id="tempI"></div>
                <span style="color: #7A40F2;" id="tempS"> Temperature</span>
            </a></div>
        <div class="humidity" id="humi" onclick="humiClick()"><a href="#">
                <div class="bi bi-droplet" id="humiI"> </div><span style="color: #7A40F2;" id="humiS"> Humidity</span>
            </a></div>
        <div class="light" id="ligh" onclick="lighClick()"><a href="#">
                <div class="bi bi-lightbulb" id="lighI"></div> <span style="color: #7A40F2;" id="lighS"> Light</span>
            </a></div>
    </div>
    <div class="temp-container">
        <div class="widget" id="temp-widget" style="display:none">
            <div class="container">
                <div class="header">
                    <div class="left">

                        <div class="bi bi-thermometer" style="color:black"></div>
                        <p>Temperature </p>
                    </div>
                    <div class="right">

                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="slider-container">
                    <div id="sliderT"></div>
                </div>
                <div class="misc">
                    <div class="card">
                        <p>Outside Temp </p>
                        <span id="outTemp"> 28 C</span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="humi-container" style="
  display:flex;
  align-items: center;
  justify-content: center;">
        <div class="widget" id="humi-widget" style="display:none">
            <div class="container">
                <div class="header">
                    <div class="left">

                        <div class="bi bi-droplet" style="color:black"></div>
                        <p>Humidity </p>
                    </div>
                    <div class="right">

                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="slider-container">
                    <div id="sliderH"></div>
                </div>
                <div class="misc">
                    <div class="card">
                        <p>Outside Humidity </p>
                        <span>78%</span>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="ligh-container" style="
  display:flex;
  align-items: center;
  justify-content: center;">
        <div class="widget" id="ligh-widget" style="display:none">
            <div class="container">
                <div class="header">
                    <div class="left">
                        <div class="bi bi-lightbulb" style="color:black"></div>
                        <p>Light </p>
                    </div>
                    <div class="right">

                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div id="board">The Board is Empty, now add some div on it</div>

<button id="btn_add">Add a Div</button>
                <div class="lightBox" >
                    <div class="switch-name">AAA</div>
                    <div class="switch-container">
                <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
</div>
</div>
                
            </div>
        </div>
    </div>

    <div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>


</body>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/round-slider@1.6.1/dist/roundslider.min.js"></script>
<script>
$("#sliderT").roundSlider({
    sliderType: "min-range",
    circleShape: "pie",
    startAngle: "315",
    lineCap: "Round",
    radius: 120,
    width: 32,
    min: 0,
    max: 100,
    svgMode: true,
    handleSize: "+8",
    pathColor: "#e3e4ed",
    borderWidth: 0,
    editableTooltip: false,
    startValue: 0,
    rangeColor: "#7A40F2",
    value: 28,
    change: function (args) {
        		console.log(args.value);
                updateValue('yolo-fan',args.value);
            $('#range').html(args.value);
         }
});

$("#sliderH").roundSlider({
    sliderType: "min-range",
    circleShape: "pie",
    startAngle: "315",
    lineCap: "Round",
    radius: 120,
    width: 32,
    min: 0,
    max: 100,
    svgMode: true,
    handleSize: "+8",
    pathColor: "#e3e4ed",
    borderWidth: 0,
    editableTooltip: false,
    startValue: 0,
    rangeColor: "#7A40F2",
    value: 78,
    readOnly: true
});
</script>


<script>
function updateValue(feedName, value) {
    // Update value on Adafruit IO
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
    };
    xhttp.open("POST", "https://io.adafruit.com/api/v2/" + "QliShad" + "/feeds/" + feedName + "/data", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.setRequestHeader("X-AIO-Key", "aio_Erza91TD0vIdrfWO2Gkqip6h3E3f");
    xhttp.send(JSON.stringify({value: value}));
}
</script>
<script>
$(document).ready(function() {

$("#btn_add").click(function() {
$("#board").append("<div class='box'> Just added div </div>");
});

});

$(document).ready(function() {
$("#board").append("<div class='lightBox'> <label class='switch'>   <input type='checkbox' checked>     <span class='slider round'></span>      </label> </div>");

});
</script>

<script>
    $(document).ready(setInterval(function() {
    $.get('call.php', function(data) {
      //do something with the data
         var mydata=$.parseJSON(data);
         $("#outTemp").html((mydata[0])+' C');
	     var obj1 =  $("#sliderT").data("roundSlider");
         obj1.setValue((mydata[1]));
    });
}, 2000));
</script>

<!-- <script>

$(document).ready(function(){
  $.ajax({url: "call.php", success: function(result){
    var data=result;
    $("#sliderT").roundSlider({value:data});
    $("#div1").html(result);
  }});})
</script> -->

</html>