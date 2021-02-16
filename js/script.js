var parent_idValue=null;
var idValue=null;
var cnt=null;

/**
 * Handling clicking on button 'create root'
 */

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
    });
  });
});

/**
 * Handling clicking on text
 */

$(document).ready(function() {
  $(document).on('click', '.sub-text', function() {
    idValue = $(this).attr('id');
    //var text = document.getElementById(idValue).innerHTML;
    setVisibleAdd('.update-modal');
  });
});

/**
 * Handling clicking on close X (Delete form)
 */

$(document).ready(function() {
    $(document).on('click', 'button.exit_delete', function() {
      setVisibleAdd('.delete-modal');
      clearInterval(cnt);
      document.querySelector('.left').innerHTML = '20';
    });
});

/**
 * Handling clicking on close X (Add form)
 */

$(document).ready(function(){
  $(document).on('click', 'button.exit_insert', function(){
    setVisibleAdd('.add-modal');
  });
});

/**
 * Handling clicking on close X (Update form)
 */

$(document).ready(function(){
  $(document).on('click', 'button.exit_update', function(){
    setVisibleAdd('.update-modal');
  });
});

/**
 * Handling clicking on + (Add button)
 */

$(document).ready(function(){
  $(document).on('click', 'button.add', function(){
    parent_idValue = $(this).attr("id");
    setVisibleAdd('.add-modal');
  });
});

/**
 * Handling clicking on - (Delete button)
 */

$(document).ready(function(){
  $(document).on('click', 'button.delete', function(){
    idValue = $(this).attr("id");
    setVisibleAdd('.delete-modal');
    cnt = setInterval(function(){ count(); }, 1000);
  });
});

/**
 * Handling clicking on button 'Yes i am' (Update window)
 */

$(document).ready(function(){
  $(document).on('click', 'button.agree_update', function(){
    let nameValue = document.querySelector('textarea.txt2');
    $.ajax({
      method: "POST",
      url: "update.php",
      data: {name: nameValue.value, id: idValue},
      success:
        function(result){
          document.body.innerHTML=result;
      }
    });
  });
});

/**
 * Handling clicking on button 'Yes i am' (Add window)
 */

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

/**
 * Handling clicking on button 'Yes i am' (Delete window)
 */

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

/**
 * Handling clicking on button 'No' (Update window)
 */

$(document).ready(function() {
  $(document).on('click', 'button.disagree_update', function() {
    setVisibleAdd('.update-modal');
    document.querySelector('.txt2').value='';
  });
});

/**
 * Handling clicking on button 'No' (Add window)
 */

$(document).ready(function() {
  $(document).on('click', 'button.disagree_insert', function() {
    setVisibleAdd('.add-modal');
    document.querySelector('.txt1').value='';
  });
});

/**
 * Handling clicking on button 'No' (Delete window)
 */

$(document).ready(function() {
  $(document).on('click', 'button.disagree_delete', function() {
    setVisibleAdd('.delete-modal');
    clearInterval(cnt);
    document.querySelector('.left').innerHTML = '20';
  })
});

/**
 * Toggle visability of popup window
 * @param {string} x Title of window to toggle
 */

function setVisibleAdd(x){
  if(document.querySelector(x).style.display == "flex"){
    document.querySelector(x).style.display="none";
  }
  else {
      document.querySelector(x).style.display="flex";
  }
}


/**
 * Timer before close popup window for delete
 */

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
