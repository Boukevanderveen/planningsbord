
<html>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="menu.php">Planningbord</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="menu.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      </li>
    </ul>
    <li class="nav-item active">
        <a class="nav-link" id="listbutton" href="memberlist.php">Member list<span class="sr-only">(current)</span></a>
      </li>
    <li class="nav-item active">
        <a class="nav-link" id="setingsbutton" href="boardsettings.php">⚙ Bord settings<span class="sr-only">(current)</span></a>
      </li>
    <form class="form-inline my-2 my-lg-0">
      <a href="logout.php" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Logout</a>
    </form>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
<div id="newcardButton" class="btn btn-outline-primary my-2 my-sm-0" onclick="hideShowAddCard()">Nieuwe Kaart</button> </div>
<div id="newcardButton2" class="btn btn-outline-primary my-2 my-sm-0" onclick="hideShowAddMember()">Nieuw Lid Toevoegen</button> </div>

</nav>
