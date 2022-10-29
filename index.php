<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./assets/bootstrap/js/popper.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/jquery/js/jquery-3.6.1.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="./assets/fontawesome/css/brands.css" rel="stylesheet">
  <link href="./assets/fontawesome/css/solid.css" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">

  <title>Simple ToDo List</title>
</head>

<body>
  <?php require_once('./database/database.php'); ?>
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
    <br>
    <br>
    <table id="table" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th style="width: 20%;">Name</th>
          <th style="width: 70%;">Description</th>
          <th style="width: 10%;">Functions</th>
        </tr>
      </thead>
      <tbody id="table_content"></tbody>
    </table>
  </div>
</body>

<script>
  $(document).ready(function() {
    $('.button').click(function() {
      var action = $(this).val();
      var name = $('#name').val();
      var description = $('#description').val();

      console.log(!name, !description)

      if (!name, !description) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: "Name or description can't be empty!",
        })
      } else {
        data = {
          'action': action,
          'name': name,
          'description': description
        };
        $.post('ajaxFunctions.php', data, function(response) {
          $('#name').val('');
          $('#description').val('');
          $('#table_content').empty();
        }).done(function() {
          generateTable()
        })
      }
    });
    generateTable()
  });

  function deleteTask(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: 'ajaxFunctions.php',
            type: 'POST',
            dataType: 'json',
            "data": {
              'action': 'deleteTask',
              'id': id
            },
            success: function(data) {
              if (data.status == 201) {
                swal.fire(
                  'Good job!',
                  'You clicked the button!',
                  'success',
                );
                $('#table_content').empty();
                generateTable()
              } else {
                if (data.msg != '') {
                  swal.fire(data.msg, {
                    icon: "error",
                  });
                }
              }
            }
          })
        }
      });
  }

  function generateTable() {
    var action = 'generateTable';
    data = {
      'action': action,
    };
    $.post('ajaxFunctions.php', data, function(response) {
      contents = JSON.parse(response);
      contents.forEach(content => {
        $('#table_content').append(`
        <tr>
          <td>${content['name']}</td>
          <td>${content['description']}</td>
          <td>
            <center>
              <div class="btn-group">
                <a class="btn btn-danger btn-sm" onclick="deleteTask(${content['id']})"><i class="fa fa-trash"></i></a>
              </div>
            </center>
          </td>
        </tr>
        `);
      });
    })
  }
</script>

</html>
