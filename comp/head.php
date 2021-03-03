<?php
  function head($name){
    ?>
      <header>
      <div>
      <article style='float:left'>
      <a href="admin.php" style="color:inherit;text-decoration:none;">
      <ul>
      <li>
        <img src="assets/icon.png" class='logo'>
        </li>
        <li class='span'>
        <h2><?php echo $name?></h2>
        </li>
        </ul>
      <ul>
    </a>
        </article>
        <article style="float:right;">
        <button onclick="getbyid('roomdialog').style.display='block'">Create Room</button>
        </article>
        </div>
      </header>
      <div class='overlay' style="top:0;" id="roomdialog">
        <div class="dialog" style="    text-align: center;">
          <h3 style="    margin: 8px;
">Create Room</h3>
          <form action="createroom.php" method="POST">
            <input type="text" name="code" placeholder="Enter Room Name" style="    width: 90%;
    display: inline-block;
    padding: 10px;
    border-radius: 10px;
    background: #f2f2f2;
    border: 1px solid #666;" required>
    <button>Create</button>
    </form>
    <button onClick="getbyid('roomdialog').style.display='none'">Cancel</button>
        </div>
      </div>
      <style>
      button{    margin-top: 30px;
    background: green;
    color: #fff;
    padding: 10px;
    border: 0;
    border-radius: 10px;
    cursor:pointer;
}</style>
    <?php
  }
?>