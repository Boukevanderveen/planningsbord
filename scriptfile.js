function hideShow() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
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
}

function draggedObject(selectedCard)
{
    var rect = document.getElementById(selectedCard).getBoundingClientRect();
    $lol = rect.left;
    if ($lol > 350 && $lol < 600)
    {
        var updatetoIsDoing  = function(selectedCard) 
        
{
}
    }

    if ($lol > 600 && $lol <900)
    {
    document.getElementById("text").innerHTML = "isReview " + $lol;
    }
    if ($lol > 900)
    {
    document.getElementById("text").innerHTML = "isDone " + $lol;
    }
   
}
}