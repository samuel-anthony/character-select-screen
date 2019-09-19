  var p1 ,p2 ,is_p1 = false,is_p2 = false, allUserCount,allUser,pickedUser,pickedGame,allGame;
  var stopper = 50, timer;
  $(document).ready(function(){
    $.ajax({
      url: '/getAllUser',
      success:function(data) {
        allUserCount = data.count;
        allUser = data.allUser;
        pickedUser = data.pickedUser;
        allGame = data.allGame;
        pickedGame = data.pickedUser;
        markThePickedUser();
        p1 = 0;
        p2 = 0;
        }
    });
  });

  $(document).keydown(function(event){
    /*if(event.keyCode == '37'){
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
    else*/ if (event.keyCode == '13') {
      //enter
      if(!is_p1){
        is_p1 = true;
      }
      else if (!is_p2) {
        is_p2 = true;
      }
      else if(is_p1 && is_p2){
        timer = setInterval(randomGame,stopper);
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
    url: '/pressKey/'+allUser[p1].id+'/'+allUser[p2].id,
    success:function(data) {
        p1 = data.newValue;
        hoverCharacterPointer();
      }
  });
}

function movePlayerTwo(val1){
  $.ajax({
    url: '/pressKey/'+p2+'/'+val1,
    success:function(data) {
        p2 = data.newValue;
        hoverCharacterPointer();
      }
  });
}

function hoverCharacterPointer(){
  for(var c = 0; c < allUserCount; c++){
    $('#'+c).removeClass('selectedRed');
    }
    $('#'+(allUser[p1].id-1)).addClass('selectedRed');
    $('#'+(allUser[p2].id-1)).addClass('selectedRed');
    if(!is_p1){
      $("#p1Pic").attr("src","/storage/big/"+allUser[p1].profileImage+".jpg");
      $("#p1Name").html(allUser[p1].name);
    }
    else if (!is_p2) {
      $("#p2Pic").attr("src","/storage/big/"+allUser[p2].profileImage+".jpg");
      $("#p2Name").html(allUser[p2].name);

  }
}

function randomPlayerOne(){
  stopper += 10;
  var rand = Math.floor(Math.random()*(allUser.length));
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
  var rand = Math.floor(Math.random()*(allUser.length));
  p2 = rand;
  hoverCharacterPointer();
  clearInterval(timer);
  if(stopper<300){
    timer = setInterval(randomPlayerTwo,stopper);
  }
  else {
    if(p1 != p2){
      is_p2 = true;
      stopper = 50;
    }
    else{
      timer = setInterval(randomPlayerTwo,stopper);
    }
  }
}

function randomGame(){
  stopper += 10;
  var rand = Math.floor(Math.random()*(allGame.length));
  $('#game').html(allGame[rand]);
  clearInterval(timer);
  if(stopper<300){
    timer = setInterval(randomGame,stopper);
  }
  else{
    $.ajax({
      url:'/submitCharacter/'+allUser[p1].id+'/'+allUser[p2].id+'/'+allGame[rand].id
    });
  }
}

function markThePickedUser(){
   for(var c = 0; c < pickedUser.length ; c++){
     $('#'+(pickedUser[c].id-1)).addClass('pickedUser');
   }
}
