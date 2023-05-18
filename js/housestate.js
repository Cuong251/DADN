function tempClick() {
    var a = document.getElementById("temp");
    var b = document.getElementById("humi");
    var c = document.getElementById("ligh");
    var i1 = document.getElementById("tempI");
    var i2 = document.getElementById("humiI");
    var i3 = document.getElementById("lighI");
    var s1 = document.getElementById("tempS");
    var s2 = document.getElementById("humiS");
    var s3 = document.getElementById("lighS");
    var x = document.getElementById("temp-widget");
    var y = document.getElementById("humi-widget");
    var z = document.getElementById("ligh-widget");
    if (x.style.display === "none") {
      a.style.backgroundColor="#7A40F2";
      i1.style.color="#FFFFFF";
      s1.style.color="#FFFFFF";
      b.style.backgroundColor="#FFFFFF";
      i2.style.color="#7A40F2";
      s2.style.color="#7A40F2";
      c.style.backgroundColor="#FFFFFF";
      i3.style.color="#7A40F2";
      s3.style.color="#7A40F2";
      x.style.display = "block";
      y.style.display = "none";
      z.style.display = "none";
  }}
  function humiClick() {
    var a = document.getElementById("temp");
    var b = document.getElementById("humi");
    var c = document.getElementById("ligh");
    var i1 = document.getElementById("tempI");
    var i2 = document.getElementById("humiI");
    var i3 = document.getElementById("lighI");
    var s1 = document.getElementById("tempS");
    var s2 = document.getElementById("humiS");
    var s3 = document.getElementById("lighS");
    var x = document.getElementById("temp-widget");
    var y = document.getElementById("humi-widget");
    var z = document.getElementById("ligh-widget");
    if (y.style.display === "none") {
        a.style.backgroundColor="white";
        i1.style.color="#7A40F2";
        s1.style.color="#7A40F2";
        b.style.backgroundColor="#7A40F2";
        i2.style.color="#FFFFFF";
        s2.style.color="#FFFFFF";
        c.style.backgroundColor="#FFFFFF";
        i3.style.color="#7A40F2";
        s3.style.color="#7A40F2";
      x.style.display = "none";
      y.style.display = "block";
      z.style.display = "none";
  }}
  function lighClick() {
    var a = document.getElementById("temp");
    var b = document.getElementById("humi");
    var c = document.getElementById("ligh");
    var i1 = document.getElementById("tempI");
    var i2 = document.getElementById("humiI");
    var i3 = document.getElementById("lighI");
    var s1 = document.getElementById("tempS");
    var s2 = document.getElementById("humiS");
    var s3 = document.getElementById("lighS");
    var x = document.getElementById("temp-widget");
    var y = document.getElementById("humi-widget");
    var z = document.getElementById("ligh-widget");
    if (z.style.display === "none") {
        a.style.backgroundColor="white";
        i1.style.color="#7A40F2";
        s1.style.color="#7A40F2";
        b.style.backgroundColor="#FFFFFF";
        i2.style.color="#7A40F2";
        s2.style.color="#7A40F2";
        c.style.backgroundColor="#7A40F2";
        i3.style.color="#FFFFFF";
        s3.style.color="#FFFFFF";
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "block";
  }
  }