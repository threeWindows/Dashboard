<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&family=Roboto+Condensed:wght@500&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="mainContainer">
        <?php
          include_once('../P/leftPanel.php');
        ?>  
      <div class="main-panel">
        
        <ul class="panelForm">
          <li><a href="findByClient.php">Klient</a></li>
          <li><a href="findByDepartment.php">Oddział</a></li>
          <li><a href="findByEmployee.php">Pracownik</a></li>
          <li><a href="findByDevice.php">Sprzęt</a></li>
        </ul>
          
        <form action="dashboard.php" method="post" class="searchContainer">
          <input type="text" name="search" id="search">
          <input type="submit" value="Wyszukaj">
        </form>
      </div>
    </div>

    <div class="con">
      <table>

      </table>
    </div>
</body>
</html>