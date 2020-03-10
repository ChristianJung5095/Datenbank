<!DOCTYPE html>
<html>

<head>
  <title> DataTables Testseite</title>
  <!-- Links zu den verschiedenen Scripten-->
  <meta charset="utf-16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="jquery.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <table id="table_id" class="display">
    <thead>
      <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Straße</th>
        <th>PLZ</th>
        <th>ID</th>
        <th>Buttons</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //Aufbau der Datenbank-verbindung
      $conn = new mysqli("localhost", "root", "", "Personendaten");

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT ID, Vorname, Nachname, Strasse, PLZ FROM Daten";
      foreach ($conn->query($sql) as $row) {
      ?>
        <form method="POST">
          <tr>
            <td><?php echo $row["Vorname"]; ?></td>
            <td><?php echo $row["Nachname"]; ?></td>
            <td><?php echo $row["Strasse"]; ?></td>
            <td><?php echo $row["PLZ"]; ?></td>
            <td><?php echo $row["ID"]; ?></td>
            <td><button type="button" class="bttn1" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-trash"></i></button><button type="button" class="bttn2" data-toggle="modal" data-target="#myModal2"><i class="fa fa-folder"></i></button></td>
        </form>
        <form method="POST" id="refresh">
        </form>
      <?php } ?>
    </tbody>
  </table>
  <script src="script.js"></script>

  <!-- THIS MODAL IS FOR INSERTING NEW USERS -->
  <!-- Trigger the modal with a button -->
  <button type="button" id="button" class="btn btn-default bttn" data-toggle="modal" data-target="#myModal">Enter New Data</button>

  <!-- Modal -->
  <form id="test">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <div class="md-form">
              <label for="vorname">Vorname</label>
              <input class="form-control" type="text" required minlength="2" id="vorname" name="vorname" autocomplete="off">
            </div>
            <div class="md-form">
              <label for="nachname">Nachname</label>
              <input class="form-control" type="text" required id="nachname" name="nachname" autocomplete="off">
            </div>
            <div class="md-form">
              <label for="adresse">Adresse</label>
              <input class="form-control" type="text" id="adresse" name="adresse" autocomplete="off">
            </div>
            <div class="md-form">
              <label for="plz">Postleitzahl</label>
              <input class="form-control" type="text" id="plz" name="plz" autocomplete="off">
            </div>
          </div>
          <div class="modal-footer">
            <button id="submit" value="submit" data-dismiss="modal" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>


  <!-- HERE STARTS MY SECOND MODAL BOX FOR THE UPDATING-->
  <!-- Trigger the modal with a button -->

  <!-- Modal -->

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Vorname ändern</p>
          <p><input class="form-control" type="text" id="vorname2" name="vorname" autocomplete="off"></p>
          <p>Nachname ändern</p>
          <p><input class="form-control" type="text" id="nachname2" name="nachname" autocomplete="off"></p>
          <p>Adresse ändern</p>
          <p><input class="form-control" type="text" id="adresse2" name="adresse" autocomplete="off"></p>
          <p>Postleitzahl ändern</p>
          <p><input class="form-control" type="text" id="plz2" name="plz" autocomplete="off"></p>
        </div>
        <div class="modal-footer">
          <button type="button" id="submit2" class="btn btn-default" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- HERE IS A MODAL FOR CONFIRMING THE DELETE //-->
<button type="button" class="bttn1" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title1">Soll der Datensatz entfernt werden?</h4>
      </div>
      <div class="modal-body">
        <button type="button" id="confirm" class="btn btn-primary" data-dismiss="modal">Bestätigen</button>
        <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>
  </div>
</div>

</body>

</html>