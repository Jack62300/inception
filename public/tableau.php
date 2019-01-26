<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta author="Benoit Delobel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inception Roleplay</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/drag.css">
    <script type="text/javascript" src="js/main.js" defer></script>
    <script type="text/javascript" src="js/time.js" defer></script>
    <script type="text/javascript" src="js/drag.js" defer></script>
    
</head>
<body>
    
    <div class="container-fluid">
    <div class="responsive-table">
  <table id="sortable">
    <tr class="ui-state-default">
      <th>Drag Row</th>
      <th>Id</th>
      <th>Fruit</th>
      <th>Quantity</th>
      <th>Image</th>
    </tr>
    <tr>
      <td><i class="fa fa-bars"></i></td>
      <td data-id="1">1</td>
      <td>Apple</td>
      <td>5</td>
      <td><img src="" alt="noImage" width="30px" height="25px"></td>
    </tr>
    <tr>
      <td><i class="fa fa-bars"></i></td>
      <td data-id="2">2</td>
      <td>Orange</td>
      <td>8</td>
      <td><img src="" alt="noImage" width="30px" height="25px"></td>
    </tr>
    <tr>
      <td><i class="fa fa-bars" ></i></td>
      <td data-role="test" data-id="3">3</td>
      <td>Banana</td>
      <td>3</td>
      <td><img src="" alt="noImage" width="30px" height="25px"></td>
    </tr>
  </table>
</div>

<div class="responsive-table">
  <table id="sortable">
    <tr class="ui-state-default">
      <th>Drag Row</th>
      <th>Id</th>
      <th>Fruit</th>
      <th>Quantity</th>
      <th>Image</th>
    </tr>
    <tr>
      <td><i class="fa fa-bars"></i></td>
      <td data-id="1">1</td>
      <td>Apple</td>
      <td>5</td>
      <td><img src="" alt="noImage" width="30px" height="25px"></td>
    </tr>
    <tr>
      <td><i class="fa fa-bars"></i></td>
      <td data-id="2">2</td>
      <td>Orange</td>
      <td>8</td>
      <td><img src="" alt="noImage" width="30px" height="25px"></td>
    </tr>
    <tr>
      <td><i class="fa fa-bars" ></i></td>
      <td data-role="test" data-id="3">3</td>
      <td>Banana</td>
      <td>3</td>
      <td><img src="" alt="noImage" width="30px" height="25px"></td>
    </tr>
  </table>
</div>
    </div>
  
    <div class="displayNav">
          
    </div>
    
    <div class="nav">
      <div class="toggler"><img src="images/logo.png"></div>
      <div class="time" id="time"></div>
    </div>
    <?php require_once('../template/modal.php'); ?>
</body>
</body>
</body>

</body>
</body>
</html>