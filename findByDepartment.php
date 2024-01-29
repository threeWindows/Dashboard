<link rel="stylesheet" href="dashboard.css">


<div class="mainContainer">
    
<?php
          include_once('../P/leftPanel.php');
        ?>  

      <div class="main-panel">
      <ul class="panelForm">
          <li><a href="findByClient.php">Klient</a></li>
          <li><a href="findByDepartment.php">Oddział</a></li>
          <li><a href="">Pracownik</a></li>
          <li><a href="">Sprzęt</a></li>
        </ul>
          
        <form action="dashboard.php" method="post" class="searchContainer">
          <input type="text" name="search" id="search">
          <input type="submit" value="Wyszukaj">
        </form>
      </div>
    </div>