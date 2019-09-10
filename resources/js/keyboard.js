  var p1 = 0,p2 = 0,is_p1 = false,is_p2 = false, allUser = 30;
  var stopper = 50, timer;
  $(document).ready(function(){
    hoverCharacterPointer();
  });

  $(document).keydown(function(event){
    if(event.keyCode == '37'){
      //left
      if(!is_p1){
        movePlayerOne(-1);
      }
      else if (!is_p2) {
        movePlayerTwo(-1);
      }
    }
    else if (event.keyCode == '38') {
      //up
      if(!is_p1){
        movePlayerOne(-10);
      }
      else if (!is_p2) {
        movePlayerTwo(-10);
      }
    }
    else if (event.keyCode == '39') {
      //right
      if(!is_p1){
        movePlayerOne(1);
      }
      else if (!is_p2) {
        movePlayerTwo(1);
      }
    }
    else if (event.keyCode == '40') {
      //down
      if(!is_p1){
        movePlayerOne(10);
      }
      else if (!is_p2) {
        movePlayerTwo(10);
      }
    }
    else if (event.keyCode == '13') {
      //enter
      if(!is_p1){
        is_p1 = true;
      }
      else if (!is_p2) {
        is_p2 = true;
      }
    }
    else if (event.keyCode == '8') {
      //backspace
      if(is_p2){
        is_p2 = false;
      }
      else if (is_p1) {
        is_p1 = false;
      }
    }
    else if(event.keyCode == '82') {
      //random, when r is pressed
      if(!is_p1){
        timer = setInterval(randomPlayerOne,stopper);
      }
      else if (!is_p2) {
        timer = setInterval(randomPlayerTwo,stopper);
      }
    }
  });
function movePlayerOne(val1){
  $.ajax({
    url: '/pressKey/'+p1+'/'+val1,
    success:function(data) {
        p1 = data.newValue;
        $("#p1Pic").attr("src",data.playerImage);
        $("#p1Name").html(data.playerName);
        hoverCharacterPointer();
      }
  });
}

function movePlayerTwo(val1){
  $.ajax({
    url: '/pressKey/'+p2+'/'+val1,
    success:function(data) {
        p2 = data.newValue;
        $("#p2Pic").attr("src",data.playerImage);
        $("#p2Name").html(data.playerName);
        hoverCharacterPointer();
      }
  });
}

function hoverCharacterPointer(){
  for(var c = 0; c < allUser; c++){
    $('#'+c).removeClass('selectedRed');
    $('#'+p1).addClass('selectedRed');
    $('#'+p2).addClass('selectedRed');
  }
}

function randomPlayerOne(){
  stopper += 10;
  var rand = Math.floor(Math.random()*(29));
  p1 = rand;
  hoverCharacterPointer();
  clearInterval(timer);
  if(stopper<300){
    timer = setInterval(randomPlayerOne,stopper);
  }
  else {
    is_p1 = true;
    stopper = 50;
  }
}
function randomPlayerTwo(){
  stopper +=10;
  var rand = Math.floor(Math.random()*29);
  p2 = rand;
  hoverCharacterPointer();
  clearInterval(timer);
  if(stopper<300){
    timer = setInterval(randomPlayerTwo,stopper);
    alert(p2);
  }
  else {
    is_p2 = true;
    stopper = 50;
  }
}
function loadImage(){

}
