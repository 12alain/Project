 
 function addField(){
                               
  var field = "<input type='file' name='avatar[]' value='' class='form-control-file ml-3 ' aria-describedby='fileHelpId'/><br/>";
  document.getElementById('fields').innerHTML += field;
  let x=0;
  if(document.getElementById('button').clicked == true) {
    let x=x+1;
  }
  if (x===4) {
      document.getElementById("button").style.display = "none"; 
  }

  
}

    function check(ele) {
    
        if (ele.checked == true ) {
            return true;
        }else{
            return false;
        }
        if (check(ele)==true) {
                var field = "<input type='file' name='file' value='' class='form-control-file image' aria-describedby='fileHelpId'/><br/>";
                document.getElementById('check').innerHTML += field;
         }
    
    }
   
 
function checkCheckBox(ele) {
 
    if (ele.checked == false ) {
        var div = document.getElementById("ajout");
        div.removeChild(div.firstChild);
    return false;
    }
    else {
        var input = document.createElement("input");
        input.type = "text";
        input.name = "name_de_l_input";
        document.getElementById("ajout").appendChild(input);
    }
    return true;
     
}
/* function myFunction() {
    if (  document.querySelector('#myradio2').checked ) {
        document.getElementById("myText").disabled = true;
       
    }else{
      document.getElementById("myText").disabled = false;
      
    }
       
  } */

  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 

  function myFunction1() {
    var x = document.getElementById("Input");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 

  function zoom(e) {
    var zoomer = e.currentTarget;
    e.offsetX ? (offsetX = e.offsetX) : (offsetX = e.touches[0].pageX);
    e.offsetY ? (offsetY = e.offsetY) : (offsetX = e.touches[0].pageX);
    x = (offsetX / zoomer.offsetWidth) * 100;
    y = (offsetY / zoomer.offsetHeight) * 100;
    zoomer.style.backgroundPosition = x + "% " + y + "%";
  }

  function handleFiles(files) {
    var imageType = /^image\//;
    for (var i = 0; i < files.length; i++) {
    var file = files[i];
    if (!imageType.test(file.type)) {
      alert("veuillez sélectionner une image");
    }else{
      if(i == 0){
        preview.innerHTML = '';
      }
      var img = document.createElement("img");
      img.classList.add("obj");
      img.file = file;
      preview.appendChild(img); 
      var reader = new FileReader();
      reader.onload = ( function(aImg) { 
      return function(e) { 
      aImg.src = e.target.result; 
    }; 
   })(img);
 
  reader.readAsDataURL(file);
  }
  
  }
 }
