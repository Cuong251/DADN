<?php 
  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = '';
  $db_name = 'smart_home';
  
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $rows = mysqli_query($conn, "SELECT * FROM devices");
  $i = 1;
?>

<table class="myTable">
  <thead>
  <caption>Manage IoT devices 
    <form> 
    <a href="javascript:void(0)" onclick = "addItems()">
        <input type="submit" class="btn btn-primary" id = "addDevices" style="float: right;" value = "Add devices">
    </a>
  </form>
</caption>
      <caption>Device list
 
        <div class="col-md-4" style="float: right;">
            <div class="input-group">
                <span class="input-group-prepend" >
                    <div class="input-group-text bg-white border-right-0"><i class="fa fa-search"></i></div>
                </span>
                <input class="form-control py-2 border-left-0 border" type="search" placeholder="Search device" id="example-search-input">
            </div>
        </div>
        <!-- https://stackoverflow.com/questions/45696685/search-input-with-an-icon-bootstrap -->
      </caption>
      
<tr class = "table-ele">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Feed name</th>
      <th scope="col">Room</th>
      <th scope="col">Sensor</th>
      <th scope="col" colspan="2" ></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row) : ?>
      <tr id = <?php echo $row["id"]; ?>>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["feed_name"]; ?></td>
        <td><?php echo $row["room_id"]; ?></td>
        <td><?php echo $row["sensor_id"]; ?></td>
        <td> <button type="button" id = "buttonIoTChange" onclick = "del(<?php echo $row['id']; ?>);" class="btn btn-light" data-toggle="modal" data-target=".bd-example-modal-lg" >
      <i class="bi bi-trash"></i>
      </button>     
    </td>
    </tr>
      </tr>
      <?php endforeach; ?>


<!-- Default bootstrap modal example -->

 </td>


  </tbody>
  
</table>
 <!-- Modal for Add button -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal-window" aria-hidden="true">

  <div class="modal-dialog" role="document" >

    <div class="modal-content" id = "createModal-content">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id = "CloseBtn">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-header d-block" >

        <h5 class="modal-title text-center" id="createModal-window"  >New IoT device</h5>

      </div>
      <div class="modal-body text-left" >
      <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">MQTT Connect ID</label>
            <input type="text" class="form-control" id="message-text">
          </div>
        </form>
      </div>
      <div class="modal-footer">
      <a id = "CreateBtn"  data-toggle="modal" data-target="#confirmCreate-Modal" data-remote="false" class="btn btn-success">
              Create
    </a>
        <button type="button" id = "CancelBtn" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>




 <!-- Modal for Confirm Create button (Inside Create button) -->
 <div class="modal fade" id="confirmCreate-Modal" tabindex="-1" role="dialog" aria-labelledby="confirmCreate-ModalContent" aria-hidden="true">

<div class="modal-dialog" role="document">

  <div class="modal-content" id = "confirmCreate-Modalcontent">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close" id = "CloseBtn">
        <span aria-hidden="true">&times;</span>
      </button>
    <div class="modal-header d-block" >

      <h5 class="modal-title text-center" id="confirmCreate-Modalwindow" >Confirmation</h5>

    </div>
    <div class="modal-body">
      Are you sure want to add this new IoT devices ? 
    </div>
    <div class="modal-footer">
    <a id = "CreateBtn" data-toggle="modal" data-target="#confirmCreate-Modal" data-remote="false" class="btn btn-success">
            Create
  </a>
      <button type="button" id = "CancelBtn" class="btn btn-success" data-dismiss="modal">Cancel</button>
    </div>
  </div>
</div>
</div>

    <!-- <tr class = "table-ele">
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td> <a id = "buttonIoTCreate" data-toggle="modal" data-target="#createModal" data-remote="false" class="btn btn-light">
    <i class="bi bi-trash"></i>
</a> -->