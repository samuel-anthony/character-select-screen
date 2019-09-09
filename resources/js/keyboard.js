  var p1 = 1,p2 = 1,is_p1 = false,is_p2 = false;


  $(document).keydown(function(event){
    if(event.keyCode == '37'){
      if(!is_p1){
        movePlayerOne(-1);
      }
      else if (!is_p2) {
        movePlayerTwo(-1);
      }
    }
    else if (event.keyCode == '38') {
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
  });
function movePlayerOne(val1){
  $('#'+p1).removeClass('kontol memek');
  $.ajax({
    url: '/pressKey/'+p1+'/'+val1,
    success:function(data) {
        p1 = data.newValue;
        $("#p1Gen").hide("slide", { direction: "left" }, 100);
        $("#p1Pic").attr("src",data.playerImage);
        $("#p1Name").html(data.playerName);
        $("#p1Gen").show("slide", { direction: "right"}, 100);
        $('#'+p1).addClass('kontol memek');
      }
  });
}

function movePlayerTwo(val1){
  $('#'+p2).removeClass('kontol memek');
  $.ajax({
    url: '/pressKey/'+p2+'/'+val1,
    success:function(data) {
        p2 = data.newValue;
        $("#p2Gen").hide("slide", { direction: "right" }, 100);
        $("#p2Pic").attr("src",data.playerImage);
        $("#p2Name").html(data.playerName);
        $("#p2Gen").show("slide", { direction: "left"}, 100);
        $('#'+p2).addClass('kontol memek');
      }
  });
}
