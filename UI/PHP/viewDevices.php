<table class="myTable">
  <thead>
  <caption>Manage IoT devices <input type="button" class="btn btn-primary" value="Add devices" id = "addDevices" style="float: right;"> </caption>
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
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Room</th>
      <th scope="col">House</th>
      <th scope="col" colspan="2" ></th>
    </tr>
  </thead>
  <tbody>
    <tr class = "table-ele">
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td> <a id = "buttonIoTCreate" data-toggle="modal" data-target="#createModal" data-remote="false" class="btn btn-light">
    <i class="bi bi-trash"></i>
</a>

<!-- Default bootstrap modal example -->

 </td>
      <td> <button type="button" id = "buttonIoTChange" class="btn btn-light" data-toggle="modal" data-target=".bd-example-modal-lg">
      <i class="bi bi-gear"></i>
      </button> 
    <!-- Button trigger modal -->
    
    </td>
    </tr>

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

        <h5 class="modal-title text-center" id="createModal-window" >New IoT device</h5>

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

