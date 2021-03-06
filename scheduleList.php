<?php
$connection = mysqli_connect("localhost", "root", "", "transport_management");

session_start();

$sql = "SELECT * FROM `schedule`";
$res = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Schedules</title>
  <meta name="description" content="Bootstrap.">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
  <script src="sweetalert2/sweetalert2.min.js"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="animate.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include 'navbar_admin.php'; ?>
  <br>


  <div class="container">
    <div class="row">

      <div class="page-header">
        <p>
        <h1 style="text-align: center;"> Schedule List </h1>
        <a class="btn btn-primary float-right" href="scheduleAdd.php" role="button">Add schedule</a>
        </p>
      </div>
      <?php
      if (isset($_GET['msg'])) { ?>
        <div class="alert alert-danger alert-dismissable" style="width: 300px; margin:0 auto;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <?php echo $_GET['msg']; ?>
        </div>
      <?php
      } ?>
    </div>
    <div class="col-md-12 animated bounceIn">

      <?php
      if (mysqli_num_rows($res) > 0) { ?>


        <br>
        <table id="myTable" class="table table-bordered animated bounce">
          <thead>
            <th>NO</th>
            <th>PERIOD</th>
            <th>FIRST</th>
            <th>SECOND</th>
            <th>THIRD</th>
            <th>ACTION</th>

          </thead>

         
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($res)) {?>
              <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["period"] ?></td>
                <td><?php echo $row["first"] ?></td>
                <td><?php echo $row["second"] ?></td>
                <td><?php echo $row["third"] ?></td>
                <td>
                  <a class="btn btn-primary" href="ScheduleView.php?id=<?php echo $row["id"]; ?>">View</a>
                  <a class="btn btn-info" href="ScheduleEdit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                  <a class="btn btn-danger" onclick="return confirm('Are you sure to delete?');" href="scheduleDelete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
              </tr>
              <?php }
        } ?>
            </tbody>
      
        </table>
    </div>
    <div class="col-md-3"></div>

  </div>


  </div>
  <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>


  <script>
    window.sr = ScrollReveal();
    sr.reveal('.foo', {
      duration: 800
    });
    sr.reveal('.foo1', {
      duration: 800,
      origin: 'top'
    });
  </script>


</body>
<script>
  $(document).ready(function() {
    $('#myTable').dataTable();
  });
</script>

</html>