<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./assets/bootstrap/js/popper.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/jquery/jquery-3.6.1.js"></script>

  <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="./assets/fontawesome/css/brands.css" rel="stylesheet">
  <link href="./assets/fontawesome/css/solid.css" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">

  <title>Simple ToDo List</title>
</head>

<body>
  <?php
   require_once('./database/database.php');
  ?>
  <div class="container">
    <h1 style="text-align: center; margin-top: 3%">
      Simple ToDo List <img src="./assets/logo_icon.png">
    </h1>

      <div class="bg-light p-5 rounded">
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="1" style="resize: none;"></textarea>
        </div>
        <button class="button btn btn-primary" value="createTask">Create task</button>
      </div>
  </div>
</body>

<script>
  $(document).ready(function(){
    $('.button').click(function(){
        var action = $(this).val();
        var name = $('#name').val();
        var description = $('#description').val();
        data =  {'action': action, 'name': name, 'description': description};
        $.post('ajaxFunctions.php', data, function (response) {
          // alert(data);
        });
    });
  });
</script>
</html>