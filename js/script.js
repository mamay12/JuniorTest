
var parent_idValue=null;
var idValue=null;
var cnt=null;

$(document).ready(function() {
  $(document).on('click', '.sub-text', function() {
    idValue = $(this).attr('id');
    var text = document.getElementById(idValue).innerHTML;
    setVisibleAdd('.update-modal');
  })
})

$(document).ready(function(){
  $(document).on('click', '.exit_insert', function(){
    setVisibleAdd('.add-modal');
  })
})


$(document).ready(function(){
  $(document).on('click', '.exit_update', function(){
    setVisibleAdd('.update-modal');
  })
})

$(document).ready(function(){
  $(document).on('click', '.agree_update', function(){

    let nameValue = document.querySelector('textarea.txt2');

    $.ajax({
      method: "POST",
      url: "update.php",
      data: {name: nameValue.value, id: idValue},
      success:
        function(result){
          document.body.innerHTML=result;
      }
    })
  })
})

$(document).ready(function() {
    $(document).on('click', 'button.exit_delete', function() {
      setVisibleAdd('.delete-modal');
      clearInterval(cnt);
      document.querySelector('.left').innerHTML = '20';
    })
})


$(document).ready(function(){
  $(document).on('click', 'button.create-root', function(){
    $.ajax({
      method: "POST",
      url: "insert.php",
      data: {name: 'root'},
      success:
        function(result){
          document.body.innerHTML=result;
        }
    })
  })
})

$(document).ready(function(){

  $(document).on('click', 'button.delete', function(){
    idValue = $(this).attr("id");
    setVisibleAdd('.delete-modal');
    cnt = setInterval(function(){ count(); }, 1000);
  });

});

$(document).ready(function() {
  $(document).on('click', 'button.disagree_delete', function() {
    setVisibleAdd('.delete-modal');
    clearInterval(cnt);
    document.querySelector('.left').innerHTML = '20';
  })
})

$(document).ready(function() {
  $(document).on('click', 'button.disagree_update', function() {
    setVisibleAdd('.update-modal');
    document.querySelector('.txt2').value='';
  })
})

$(document).ready(function() {
  $(document).on('click', 'button.disagree_insert', function() {
    setVisibleAdd('.add-modal');
    document.querySelector('.txt1').value='';
  })
})

$(document).ready(function(){
  $(document).on('click', 'button.agree_delete', function(){
    clearInterval(cnt);
    document.querySelector('.left').innerHTML = '20';

    $.ajax({
      method: "POST",
      url: "delete.php",
      data: {id: idValue},
      success:
        function(result){
          document.body.innerHTML=result;
      }
    })
  });
});

$(document).ready(function(){

  $(document).on('click', 'button.add', function(){
    parent_idValue = $(this).attr("id");
    setVisibleAdd('.add-modal');
  });
});

$(document).ready(function(){
  $(document).on('click', 'button.agree_insert', function(){
    let nameValue = document.querySelector('textarea.txt1');
        $.ajax({
          method: "POST",
          url: "insert.php",
          data: {name: nameValue.value, parent_id: parent_idValue},
          success:
            function(result){
              document.body.innerHTML=result;
          }
        })
  });
});

function setVisibleAdd(x){
  if(document.querySelector(x).style.display == "flex"){
    document.querySelector(x).style.display="none";
  }
  else {
      document.querySelector(x).style.display="flex";
  }
}



function count() {
  var time = document.querySelector('.left').innerHTML;
  var value = Number(time);

  if(value == 0){
    clearInterval(cnt);
    setVisibleAdd('.delete-modal');
    document.querySelector('.left').innerHTML = '20';
  } else {
    value--;
    document.querySelector('.left').innerHTML = value;
  }
}
