var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.6.0.min.js';
document.getElementsByTagName('head')[0].appendChild(script);


function create() {
  var name = 'BABA'; 
  var last_name = 'BOOEY';
  var dataString = 'name='+name+'&last_name='+last_name;

  $.ajax({
      type:'POST',
      data:dataString,
      url:'insert.php',
      success:function(data) {
          alert(data);
      }
  });
}

function hideShow() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function alerrt()
{
  alert("LOLEFRE");
}

function startDrag($divID)
{
    var selectedCard = $divID

    dragElement(document.getElementById(selectedCard));


  function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
    draggedObject(selectedCard);
  }




  var selectedCardId = JSON.stringify(selectedCard);
  $.ajax({
      url: 'dashboard.php',
      type: 'post',
      data: {selectedCard: selectedCardId},
      success: function(response){
        
      }
  });
  }

  function draggedObject(selectedCard)
  {
    var rect = document.getElementById(selectedCard).getBoundingClientRect();
    $lol = rect.left;

    if ($lol < 350)
    {
      var targetStatus = 'isToDo';
      PostToUpdatephp(selectedCard, targetStatus);
    }

    if ($lol > 350 && $lol < 600)
    {
      var targetStatus = 'isDoing';
      PostToUpdatephp(selectedCard, targetStatus);
    }

    if ($lol > 600 && $lol <900)
    {
      var targetStatus = 'isReview';
      PostToUpdatephp(selectedCard, targetStatus);

    }
    if ($lol > 900)
    {
      var targetStatus = 'isDone';
      PostToUpdatephp(selectedCard, targetStatus);
    }
   
  }
}

function PostToUpdatephp(selectedCard, targetStatus)
{
  var dataString = 'selectedCard='+selectedCard+'&targetStatus='+targetStatus;

  $.ajax({
      type:'POST',
      data:dataString,
      url:'insert.php',
      success:function(data) {
          alert(data);
      }
  });
}