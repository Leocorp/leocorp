  var appName = "<b>" + Module.codeUrl.replace("Release/", "").replace(".js","") + "</b> ";
  var canvas = document.getElementsByTagName("canvas")[0];
  var canvasRect = canvas.getBoundingClientRect();

  var loader = document.createElement("div");
  loader.id = "loader";

  var loaderWidth = canvas.offsetWidth;
  var loaderHeight = canvas.offsetHeight;

  document.body.appendChild(loader);

  loader.style.position = "absolute";

  loader.style.top = 0;
  loader.style.bottom = 0;
  loader.style.left = 0;
  loader.style.right = 0;
  loader.style.margin = "auto";
  loader.style.width = loaderWidth + "px";
  loader.style.height = loaderHeight + "px";
  loader.style.background = "transparent";
  loader.style.color = "#fff";
  loader.style.opacity = 0.8;
  loader.style.fontSize = "16px";
  loader.style.letterSpacing = "3px";
  loader.style.fontWeight = "100";
  loader.style.textAlign = "left";
  loader.style.padding =  "30px";
  loader.style.boxSizing = "border-box";

  var dotCount = 0;
  var checkDisplay = setInterval(function(){

    if(Module.progress > 0) {
      loader.style.display="none";
      clearInterval(checkDisplay);
    } else {

      loader.innerHTML = "Loading " + appName;

      for (var x = 0; x<dotCount; x++){
        loader.innerHTML+= ".";
      }
      
      dotCount = dotCount >= 40 ? 0 : ++dotCount;
    }
  },100);
