
function hideShowAddCard() 
{
  var x = document.getElementById("addCardDiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
    
  }
}

function hideShowAddMember() 
{
  var x = document.getElementById("addMemberDiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
    
  }
}

function acceptInvitation($boardId)
{
  var idOfBoard = $boardId;
  var dataString = 'idOfBoard='+idOfBoard;

  $.ajax({
      type:'POST',
      data:dataString,
      url:'addMemberToBoard.php',
      success:function(data) {
        window.location.href = 'http://localhost/planningtoolbord/menu.php';
      }
  });
}

function declineInvitation($boardId)
{
  var idOfBoard = $boardId;
  var dataString = 'idOfBoard='+idOfBoard;

  $.ajax({
      type:'POST',
      data:dataString,
      url:'deleteinvitation.php',
      success:function(data) {
        refreshPage();
      }
  });
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
    $leftposition = rect.left;

    if ($leftposition < 350)
    {
      var targetStatus = 'isToDo';
      PostToUpdatephp(selectedCard, targetStatus);
    }

    if ($leftposition > 350 && $leftposition < 600)
    {
      var targetStatus = 'isDoing';
      PostToUpdatephp(selectedCard, targetStatus);
    }

    if ($leftposition > 600 && $leftposition <900)
    {
      var targetStatus = 'isReview';
      PostToUpdatephp(selectedCard, targetStatus);

    }
    if ($leftposition > 900)
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
      url:'update.php',
      success:function(data) {
        refreshPage();
      }
  });
}

function runPHP($boardId)
{ 
  var boardId = $boardId;
  var dataString = 'boardId='+boardId;

  $.ajax({
    type:'POST',
    data:dataString,
    url:'navigatetoboard.php',
    success:function(data) {
      window.location.href = 'http://localhost/planningtoolbord/dashboard.php';
    }
});

  
}

function runRemoveUserFromBoardPHP($username)
{
  selectedUser = $username;
  var dataString = 'selectedUser='+selectedUser;

  $.ajax({
      type:'POST',
      data:dataString,
      url:'removeuserfromboard.php',
      success:function(data) {
        window.location.href = 'http://localhost/planningtoolbord/boardsettings.php';
      }
  });
  
}


function runDeleteCardPHP($divID)
{
  selectedCard = $divID;
  var dataString = 'selectedCard='+selectedCard;

  $.ajax({
      type:'POST',
      data:dataString,
      url:'removecard.php',
      success:function(data) {
      
      }
  });
  
}

function runMakeUserAdminPHP($username)
{
  selectedUser = $username;
  var dataString = 'selectedUser='+selectedUser;

  $.ajax({
      type:'POST',
      data:dataString,
      url:'updateusertoadmin.php',
      success:function(data) {
        window.location.href = 'http://localhost/planningtoolbord/boardsettings.php';
      }
  });
}

function runRemoveAdminFromUserPHP($username)
{
  selectedUser = $username;
  var dataString = 'selectedUser='+selectedUser;
  $.ajax({
      type:'POST',
      data:dataString,
      url:'removeadminfromuser.php',
      success:function(data) {
        window.location.href = 'http://localhost/planningtoolbord/boardsettings.php';
      }
  });
}


function navigatetoboardsettings($boardId)
{
  var boardId = $boardId;
  var dataString = 'boardId='+boardId;

  $.ajax({
    type:'POST',
    data:dataString,
    url:'navigatetoboardsettings.php',
    success:function(data) {
      window.location.href = 'http://localhost/planningtoolbord/boardsettings.php';
    }
});
  
}

function log($board)
{
alert($board);
}

function refreshPage()
{
  window.location.reload(true); //true sets request type to GET

}
function goToConfirmBoardDeletion()
{
  window.location.href = 'http://localhost/planningtoolbord/confirmboarddeletion.php';
}

function goToBoardDeletion()
{

  window.location.href = 'http://localhost/planningtoolbord/boarddeletion.php';
}