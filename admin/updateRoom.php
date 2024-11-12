
<?php     include('../includes/config.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room details</title>
    <?php
        include '../libraries/styles.php';
    ?>

</head>
<body>
    
    <div class="row " style="width:100vw;">
            <div class="row m-auto" style="width:100%;">
                <!-- HEADER LINE -->
                <div id="liveAlertPlaceholder" class="mt-4"></div>
                <div class="row" style=height:30%; >
                        <div class="col-12 d-flex justify-content-center m-auto mt-4 bg-primary p-4 card-body skew-shadow position-relative rounded-2">
                            <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2" style="color:white;">Update Rooms Details</h5>
                        </div>
                </div>
                <!--CLOSED HEADER LINE -->

                <!-- SELECT DROP DOWN LIST ROOM NUMBERS ROW -->
                
                <div class="row">
                    <div class="col-4 ">
                        <div class="form-group">
                            <label for="stbatch">Select Room</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="room" name="room" placeholder="Select Room Number" aria-label="Student Room" required>
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                        
                                        $sql = "SELECT roomNo FROM room;";
                                        $results = $conn->query($sql);

                                        if($results->num_rows > 0)
                                        {
                                        foreach($results as $result)
                                            {?>
                                            <li> <a class="dropdown-item" href="?room=<?php echo htmlentities($result['roomNo']); ?>" onclick="setRoom('<?php echo htmlentities($result['roomNo']); ?>')" ><?php echo htmlentities($result['roomNo']); ?></a></li>
                                    <?php  }}?>
                                </ul>
                            </div>
                        </div>

                        <script>
                            function setRoom(value) {
                                document.getElementById('room').value = value+" Room";
                            }
                        </script>

                        <?php
                            if (isset($_GET['room'])) {
                                // Retrieve the room number from the URL
                                $roomNumber = $_GET['room'];
                                echo "<script> document.getElementById('room').value =".$roomNumber."+' room';</script>";
                            }
                        ?>
                    </div>
                        
                    <div class="col-4">
                    </div>
                    <div class="col-4"></div>
                </div>
                <!-- SELECT DROP DOWN LIST ROOM NUMBERS ROW END -->
                    <div class="row" >
                        <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <div><h4 class="card-title mb-2">Desk Details</h4></div>
                                    <div><button class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#addNewDesk" >Add new Desk</button></div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                <table
                                    id="basic-datatables"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Desk ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Desk ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        if(isset($roomNumber)){
                                                $sql = "SELECT room.roomNo AS room_no, desk.deskID AS desk_id, desk.demageState AS desk_damage FROM room LEFT JOIN desk ON room.roomNo = desk.roomNo WHERE room.roomNo = $roomNumber;";

                                                if ($result = $conn->query($sql)) {
                                                    
                                                    while ($row = $result->fetch_assoc()) {
                                                        if(!empty($row['desk_id'])){
                                                            $deskid = $row['desk_id'];
                                                            $color = $row['desk_damage']=="Damaged" ? "danger" : "success";
                                                            $status = $row['desk_damage']=="Damaged" ? "Damaged" : "Good";
                                                            $btnColor = $row['desk_damage']=="Damaged" ? "danger" : "success";
                                                        
                                                            echo "<tr>
                                                                    <td>".$row['room_no']."</td> 
                                                                    <td>".$deskid."</td>";
                                                            
                                                            echo '<td>
                                                                    <div class="form-check form-switch">
                                                                        <span class="badge 
                                                                                        rounded-2 p-2 
                                                                                        text-bg-'.$color.'"
                                                                                        role="button" 
                                                                                        id="d_status'.$deskid.'" 
                                                                                        style="cursor: pointer; 
                                                                                            width:65px;" 
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#editDeskstatus'.$deskid.'" >'.$status.' </span>
                                                                    </div>
                                                                </td>
<!--CHANGE DESK STATUS Modal -->
    <div class="modal fade" 
            id="editDeskstatus'.$deskid.'" 
            tabindex="-1" 
            role="dialog" 
            aria-hidden="true">

        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Change</span>
                    <span class="fw-light"> Status </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="small p-2 border-left border-info">
                    Change Desk Status
                </p>
                <form role="form" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ms-3">
                                <input type="text" class="btn btn-'.$btnColor.'"
                                            id="deskDamgeBtn'.$deskid.'" 
                                            name="deskDamgeBtn"
                                            class="damageBtn" 
                                            onclick="deskToggleStatus'.$deskid.'()" 
                                            value="'.$status.'" 
                                            readonly>
                                </input>

                                <script>
                                    function deskToggleStatus'.$deskid.'(){
                                        let damageBtn = document.getElementById("deskDamgeBtn'.$deskid.'");
                                        let value = damageBtn.value;
                                        if(value == "Damaged"){
                                            damageBtn.classList.replace("btn-danger", "btn-success");
                                            damageBtn.innerHTML = "Good";
                                            damageBtn.value = "Good";
                                            console.log(damageBtn.value);
                                        }else{
                                            damageBtn.classList.replace("btn-success", "btn-danger");
                                            damageBtn.innerHTML = "Damaged";
                                            damageBtn.value = "Damaged";
                                            console.log(damageBtn.value);
                                        }
                                    
                                    }
                                </script>
                            
                            </div>
                            <input type="text" name="deskid" id="deskid" value="'.$deskid.'" style="visibility:hidden" readonly>
                        </div>
                    </div> 
                    <!-- CLOSED ROW -->

                    <div class="modal-footer border-0">
                        <button type="submit" id="deskStatChnge'.$deskid.'" name="deskStatChnge" class="btn btn-primary">
                            Change
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
            <!-- modal-body CLOSED-->
            
        </div>
            <!-- modal-content CLOSED-->

    </div>
</div>';
                                                    

                                                    echo '<td>
                                                            <div class="form-button-action">
                                                                <button type="button" 
                                                                        title=""
                                                                        class="btn btn-link btn-primary btn-lg" 
                                                                        data-original-title="Edit Desk"
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#updateDesk'.$deskid.'"> <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" 
                                                                        class="btn btn-link btn-danger" 
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteDesk'.$deskid.'"
                                                                        data-original-title="Remove"> <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>

<!--EDIT DESK Modal -->
        <div class="modal fade" 
             id="updateDesk'.$deskid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

        <div class="modal-dialog" 
             role="document">

            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Edit</span>
                    <span class="fw-light">Desk '.$deskid.'</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">
                    Create a new row using this form, make sure you fill them all
                </p>

                <form role="form" method="post">
                <input id="addDesk" 
                       name="current_deskid" 
                       type="text" 
                       class="form-control" 
                       value="'.$deskid.'" 
                       style="visibility:hidden" readonly />

                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="form-group form-group-default">
                            
                            <label>Desk ID</label>
                            <input id="addDeskid" name="up_deskid" type="text" class="form-control" value="'.$deskid.'" required />
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">

                            <label>Room Number</label>
                            <input id="addRoom" name="up_room" type="text" class="form-control" value= "'.$row['room_no'].'"/>

                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" id="updatedesk" name="updatedesk" class="btn btn-primary">
                        Update
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>


 <!--DELETE DESK Modal -->
        <div class="modal fade" 
             id="deleteDesk'.$deskid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

            <div class="modal-dialog" 
                 role="document">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold"> Delete</span>
                        <span class="fw-light">Desk </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="small">
                        You are going to delete '.$deskid.' Desk. Please confirm to delete?
                    </p>
                    <form role="form" method="post">
                        <input id="delete_Deskid" name="delete_Deskid" type="text" value="'.$deskid.'" style="height:1px; visibility:hidden;" />
                        <div class="modal-footer border-0">
                            <button type="submit" id="deskDelete" name="deskDelete" class="btn btn-primary">
                                DELETE
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>';

    echo "</tr>";
            }else{
                $deskid = "No items";
                $status = "  ";
            }
            }
            $result->free();
        }
    }
?>
                                    
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                            
<!--ADD NEW DESK Modal -->
                                    <div class="modal fade" id="addNewDesk" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                            <span class="fw-mediumbold"> ADD </span>
                                            <span class="fw-light">New Desk </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">
                                            Add new desk to any Room
                                            </p>
                                            <form role="form" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                <div class="form-group form-group-default">
                                                    <label>Desk ID</label>
                                                    <input id="addnewDeskid" name="new_deskid" type="text" class="form-control" required />
                                                </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Room Number</label>
                                                    <input id="addnewRoom" name="new_room" type="text" class="form-control" required/>
                                                </div>
                                                </div>

                                                <div class="col-sm-12 ">
                                                <div class="form-group-default" style="border-style: none;">
                                                    <label>Status</label>
                                                    <!-- <div class="ms-3"> -->
                                                        <input type="text" class="mt-2 btn btn-success"
                                                                    id="deskDmgState" 
                                                                    name="deskDmgState"
                                                                    class="damageBtn" 
                                                                    onclick="deskToggleStatus()" 
                                                                    value="Good" 
                                                                    readonly>
                                                        </input>

                                                        <script>
                                                            function deskToggleStatus(){
                                                                let damageBtn = document.getElementById("deskDamgeBtn");
                                                                let value = damageBtn.value;
                                                                if(value == "Damaged"){
                                                                    damageBtn.classList.replace("btn-danger", "btn-success");
                                                                    damageBtn.innerHTML = "Good";
                                                                    damageBtn.value = "Good";
                                                                    console.log(damageBtn.value);
                                                                }else{
                                                                    damageBtn.classList.replace("btn-success", "btn-danger");
                                                                    damageBtn.innerHTML = "Damaged";
                                                                    damageBtn.value = "Damaged";
                                                                    console.log(damageBtn.value);
                                                                }
                                                            
                                                            }
                                                        </script>
                                                    
                                                    <!-- </div> -->
                                                </div>
                                                </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addDesk" name="addDesk" class="btn btn-primary">
                                                Add desk
                                                </button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        <!-- </div> -->

<!-- -----------------------------------------CHAIR TABLE------------------------------------------------------------ -->
                        
                        <div class="col-6"><!--  (chair) -->
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <div><h4 class="card-title mb-2">Chair Details</h4></div>
                                    <div><button class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#addNewChair" >Add new Chair</button></div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                <table
                                    id="basic-datatables"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Chair ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Chair ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        if(isset($roomNumber)){
                                                $sql = "SELECT room.roomNo AS room_no, chair.chairID AS chair_id, chair.demageState AS chair_damage FROM room LEFT JOIN chair ON room.roomNo = chair.roomNo WHERE room.roomNo = $roomNumber;";

                                                if ($result = $conn->query($sql)) {
                                                    
                                                    while ($row = $result->fetch_assoc()) {
                                                        if(!empty($row['chair_id'])){
                                                            $chairid = $row['chair_id'];
                                                            $color = $row['chair_damage']=="Damaged" ? "danger" : "success";
                                                            $status = $row['chair_damage']=="Damaged" ? "Damaged" : "Good";
                                                            $btnColor = $row['chair_damage']=="Damaged" ? "danger" : "success";
                                                        
                                                            echo "<tr>
                                                                    <td>".$row['room_no']."</td> 
                                                                    <td>".$chairid."</td>";
                                                            
                                                            echo '<td>
                                                                    <div class="form-check form-switch">
                                                                        <span class="badge 
                                                                                        rounded-2 p-2 
                                                                                        text-bg-'.$color.'"
                                                                                        role="button" 
                                                                                        id="d_status'.$chairid.'" 
                                                                                        style="cursor: pointer; 
                                                                                            width:65px;" 
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#editChairstatus'.$chairid.'" >'.$status.' </span>
                                                                    </div>
                                                                </td>
<!--CHANGE CHAIR STATUS Modal -->
    <div class="modal fade" 
            id="editChairstatus'.$chairid.'" 
            tabindex="-1" 
            role="dialog" 
            aria-hidden="true">

        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Change</span>
                    <span class="fw-light"> Status </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="small p-2 border-left border-info">
                    Change Chair Status
                </p>
                <form role="form" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ms-3">
                                <input type="text" class="btn btn-'.$btnColor.'"
                                            id="chairDamgeBtn'.$chairid.'" 
                                            name="chairDamgeBtn"
                                            class="damageBtn" 
                                            onclick="chairToggleStatus'.$chairid.'()" 
                                            value="'.$status.'" 
                                            readonly>
                                </input>

                                <script>
                                    function chairToggleStatus'.$chairid.'(){
                                        let damageBtn = document.getElementById("chairDamgeBtn'.$chairid.'");
                                        let value = damageBtn.value;
                                        if(value == "Damaged"){
                                            damageBtn.classList.replace("btn-danger", "btn-success");
                                            damageBtn.innerHTML = "Good";
                                            damageBtn.value = "Good";
                                            console.log(damageBtn.value);
                                        }else{
                                            damageBtn.classList.replace("btn-success", "btn-danger");
                                            damageBtn.innerHTML = "Damaged";
                                            damageBtn.value = "Damaged";
                                            console.log(damageBtn.value);
                                        }
                                    
                                    }
                                </script>
                            
                            </div>
                            <input type="text" name="chairid" id="chairid" value="'.$chairid.'" style="visibility:hidden" readonly>
                        </div>
                    </div> 
                    <!-- CLOSED ROW -->

                    <div class="modal-footer border-0">
                        <button type="submit" id="chairStatChnge'.$chairid.'" name="chairStatChnge" class="btn btn-primary">
                            Change
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
            <!-- modal-body CLOSED-->
            
        </div>
            <!-- modal-content CLOSED-->

    </div>
</div>';
                                                    

                                                    echo '<td>
                                                            <div class="form-button-action">
                                                                <button type="button" 
                                                                        title=""
                                                                        class="btn btn-link btn-primary btn-lg" 
                                                                        data-original-title="Edit Chair"
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#updateChair'.$chairid.'"> <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" 
                                                                        class="btn btn-link btn-danger" 
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteChair'.$chairid.'"
                                                                        data-original-title="Remove"> <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>

<!--EDIT CHAIR Modal -->
        <div class="modal fade" 
             id="updateChair'.$chairid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

        <div class="modal-dialog" 
             role="document">

            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Edit</span>
                    <span class="fw-light">Chair '.$chairid.'</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">
                    Create a new row using this form, make sure you fill them all
                </p>

                <form role="form" method="post">
                <input id="addChair" 
                       name="current_chairid" 
                       type="text" 
                       class="form-control" 
                       value="'.$chairid.'" 
                       style="visibility:hidden" readonly />

                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="form-group form-group-default">
                            
                            <label>Chair ID</label>
                            <input id="addChairid" name="up_Chairid" type="text" class="form-control" value="'.$chairid.'" required />
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">

                            <label>Room Number</label>
                            <input id="addRoom" name="up_room" type="text" class="form-control" value= "'.$row['room_no'].'" required />

                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" id="updatechair" name="updatechair" class="btn btn-primary">
                        Update
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>


 <!--DELETE CHAIR Modal -->
        <div class="modal fade" 
             id="deleteChair'.$chairid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

            <div class="modal-dialog" 
                 role="document">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold"> Delete</span>
                        <span class="fw-light">Chair </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="small">
                        You are going to delete '.$chairid.' Chair. Please confirm to delete?
                    </p>
                    <form role="form" method="post">
                        <input id="delete_Chairid" name="delete_Chairid" type="text" value="'.$chairid.'" style="height:1px; visibility:hidden;" />
                        <div class="modal-footer border-0">
                            <button type="submit" id="chairDelete" name="chairDelete" class="btn btn-primary">
                                Delete
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>';

    echo "</tr>";
            }else{
                $chairid = "No items";
                $status = "  ";
            }
            }
            $result->free();
        }
    }
?>
                                    
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                            
<!--ADD NEW CHAIR Modal -->
                                    <div class="modal fade" id="addNewChair" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                            <span class="fw-mediumbold"> ADD </span>
                                            <span class="fw-light">New Chair </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">
                                            Add new chair to any Room
                                            </p>
                                            <form role="form" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                <div class="form-group form-group-default">
                                                    <label>Chair ID</label>
                                                    <input id="addnewChairid" name="new_chairid" type="text" class="form-control" required />
                                                </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Room Number</label>
                                                    <input id="addnewRoom" name="new_room" type="text" class="form-control" required/>
                                                </div>
                                                </div>

                                                <div class="col-sm-12 ">
                                                <div class="form-group-default" style="border-style: none;">
                                                    <label>Status</label>
                                                    <!-- <div class="ms-3"> -->
                                                        <input type="text" class="mt-2 btn btn-success"
                                                                    id="chairDmgState" 
                                                                    name="chairDmgState"
                                                                    class="damageBtn" 
                                                                    onclick="chairToggleStatus()" 
                                                                    value="Good" 
                                                                    readonly>
                                                        </input>

                                                        <script>
                                                            function chairToggleStatus(){
                                                                let damageBtn = document.getElementById("chairDmgState");
                                                                let value = damageBtn.value;
                                                                if(value == "Damaged"){
                                                                    damageBtn.classList.replace("btn-danger", "btn-success");
                                                                    damageBtn.innerHTML = "Good";
                                                                    damageBtn.value = "Good";
                                                                    console.log(damageBtn.value);
                                                                }else{
                                                                    damageBtn.classList.replace("btn-success", "btn-danger");
                                                                    damageBtn.innerHTML = "Damaged";
                                                                    damageBtn.value = "Damaged";
                                                                    console.log(damageBtn.value);
                                                                }
                                                            
                                                            }
                                                        </script>
                                                    
                                                    <!-- </div> -->
                                                </div>
                                                </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addChair" name="addChair" class="btn btn-primary">
                                                Add Chair
                                                </button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        <!-- </div>  -->
                        <!-- </div>  -->
                        <!-- col-6 closed (chair) -->
                        
<hr>                        
<!-- -----------------------------------------BEDs TABLE------------------------------------------------------------ -->
<!-- <div class="row"> -->
                        
                        <div class="col-6"><!--  (Beds) -->
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <div><h4 class="card-title mb-2">Beds Details</h4></div>
                                    <div><button class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#addNewBed" >Add new Bed</button></div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                <table
                                    id="basic-datatables"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Bed ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Bed ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        if(isset($roomNumber)){
                                                $sql = "SELECT room.roomNo AS room_no, bed.bedID AS bed_id, bed.demageState AS bed_damage FROM room LEFT JOIN bed ON room.roomNo = bed.roomNo WHERE room.roomNo = $roomNumber;";

                                                if ($result = $conn->query($sql)) {
                                                    
                                                    while ($row = $result->fetch_assoc()) {
                                                        if(!empty($row['bed_id'])){
                                                            $bedid = $row['bed_id'];
                                                            $color = $row['bed_damage']=="Damaged" ? "danger" : "success";
                                                            $status = $row['bed_damage']=="Damaged" ? "Damaged" : "Good";
                                                            $btnColor = $row['bed_damage']=="Damaged" ? "danger" : "success";
                                                        
                                                            echo "<tr>
                                                                    <td>".$row['room_no']."</td> 
                                                                    <td>".$bedid."</td>";
                                                            
                                                            echo '<td>
                                                                    <div class="form-check form-switch">
                                                                        <span class="badge 
                                                                                        rounded-2 p-2 
                                                                                        text-bg-'.$color.'"
                                                                                        role="button" 
                                                                                        id="d_status'.$bedid.'" 
                                                                                        style="cursor: pointer; 
                                                                                            width:65px;" 
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#editBedstatus'.$bedid.'" >'.$status.' </span>
                                                                    </div>
                                                                </td>
<!--CHANGE BED STATUS Modal -->
    <div class="modal fade" 
            id="editBedstatus'.$bedid.'" 
            tabindex="-1" 
            role="dialog" 
            aria-hidden="true">

        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Change</span>
                    <span class="fw-light"> Status </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="small p-2 border-left border-info">
                    Change Bed Status
                </p>
                <form role="form" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ms-3">
                                <input type="text" class="btn btn-'.$btnColor.'"
                                            id="bedDamgeBtn'.$bedid.'" 
                                            name="bedDamgeBtn"
                                            class="damageBtn" 
                                            onclick="bedToggleStatus'.$bedid.'()" 
                                            value="'.$status.'" 
                                            readonly>
                                </input>

                                <script>
                                    function bedToggleStatus'.$bedid.'(){
                                        let damageBtn = document.getElementById("bedDamgeBtn'.$bedid.'");
                                        let value = damageBtn.value;
                                        if(value == "Damaged"){
                                            damageBtn.classList.replace("btn-danger", "btn-success");
                                            damageBtn.innerHTML = "Good";
                                            damageBtn.value = "Good";
                                            console.log(damageBtn.value);
                                        }else{
                                            damageBtn.classList.replace("btn-success", "btn-danger");
                                            damageBtn.innerHTML = "Damaged";
                                            damageBtn.value = "Damaged";
                                            console.log(damageBtn.value);
                                        }
                                    
                                    }
                                </script>
                            
                            </div>
                            <input type="text" name="bedid" id="bedid" value="'.$bedid.'" style="visibility:hidden" readonly>
                        </div>
                    </div> 
                    <!-- CLOSED ROW -->

                    <div class="modal-footer border-0">
                        <button type="submit" id="bedStatChnge'.$bedid.'" name="bedStatChnge" class="btn btn-primary">
                            Change
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
            <!-- modal-body CLOSED-->
            
        </div>
            <!-- modal-content CLOSED-->

    </div>
</div>';
                                                    

                                                    echo '<td>
                                                            <div class="form-button-action">
                                                                <button type="button" 
                                                                        title=""
                                                                        class="btn btn-link btn-primary btn-lg" 
                                                                        data-original-title="Edit Bed"
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#updateBed'.$bedid.'"> <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" 
                                                                        class="btn btn-link btn-danger" 
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteBed'.$bedid.'"
                                                                        data-original-title="Remove"> <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>

<!--EDIT BED Modal -->
        <div class="modal fade" 
             id="updateBed'.$bedid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

        <div class="modal-dialog" 
             role="document">

            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Edit</span>
                    <span class="fw-light">Bed '.$bedid.'</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">
                    Create a new row using this form, make sure you fill them all
                </p>

                <form role="form" method="post">
                <input id="addBed" 
                       name="current_bedid" 
                       type="text" 
                       class="form-control" 
                       value="'.$bedid.'" 
                       style="visibility:hidden" readonly />

                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="form-group form-group-default">
                            
                            <label>Bed ID</label>
                            <input id="addBedid" name="up_Bedid" type="text" class="form-control" value="'.$bedid.'" required />
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">

                            <label>Room Number</label>
                            <input id="addRoom" name="up_room" type="text" class="form-control" value= "'.$row['room_no'].'" required />

                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" id="updatebed" name="updatebed" class="btn btn-primary">
                        Update
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>


 <!--DELETE CHAIR Modal -->
        <div class="modal fade" 
             id="deleteBed'.$bedid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

            <div class="modal-dialog" 
                 role="document">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold"> Delete</span>
                        <span class="fw-light">Bed </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="small">
                        You are going to delete '.$bedid.' Bed. Please confirm to delete?
                    </p>
                    <form role="form" method="post">
                        <input id="delete_Bedid" name="delete_Bedid" type="text" value="'.$bedid.'" style="height:1px; visibility:hidden;" />
                        <div class="modal-footer border-0">
                            <button type="submit" id="bedDelete" name="bedDelete" class="btn btn-primary">
                                Delete
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>';

    echo "</tr>";
            }else{
                $bedid = "No items";
                $status = "  ";
            }
            }
            $result->free();
        }
    }
?>
                                    
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                            
<!--ADD NEW BEDs Modal -->
                                    <div class="modal fade" id="addNewBed" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                            <span class="fw-mediumbold"> ADD </span>
                                            <span class="fw-light">New Bed </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">
                                            Add new bed to any Room
                                            </p>
                                            <form role="form" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                <div class="form-group form-group-default">
                                                    <label>Bed ID</label>
                                                    <input id="addnewBedid" name="new_bedid" type="text" class="form-control" required />
                                                </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Room Number</label>
                                                    <input id="addnewRoom" name="new_room" type="text" class="form-control" required/>
                                                </div>
                                                </div>

                                                <div class="col-sm-12 ">
                                                <div class="form-group-default" style="border-style: none;">
                                                    <label>Status</label>
                                                    <!-- <div class="ms-3"> -->
                                                        <input type="text" class="mt-2 btn btn-success"
                                                                    id="bedDmgState" 
                                                                    name="bedDmgState"
                                                                    class="damageBtn" 
                                                                    onclick="bedToggleStatus()" 
                                                                    value="Good" 
                                                                    readonly>
                                                        </input>

                                                        <script>
                                                            function bedToggleStatus(){
                                                                let damageBtn = document.getElementById("bedDmgState");
                                                                let value = damageBtn.value;
                                                                if(value == "Damaged"){
                                                                    damageBtn.classList.replace("btn-danger", "btn-success");
                                                                    damageBtn.innerHTML = "Good";
                                                                    damageBtn.value = "Good";
                                                                    console.log(damageBtn.value);
                                                                }else{
                                                                    damageBtn.classList.replace("btn-success", "btn-danger");
                                                                    damageBtn.innerHTML = "Damaged";
                                                                    damageBtn.value = "Damaged";
                                                                    console.log(damageBtn.value);
                                                                }
                                                            
                                                            }
                                                        </script>
                                                    
                                                    <!-- </div> -->
                                                </div>
                                                </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addBed" name="addBed" class="btn btn-primary">
                                                Add Bed
                                                </button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        <!-- </div> -->
                         <!-- col-6 closed (Beds) -->



<!-- -----------------------------------------METTRESS TABLE------------------------------------------------------------ -->
                        
                    <div class="col-6"><!--  (Mettress) -->
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <div><h4 class="card-title mb-2">Mettresses Details</h4></div>
                                    <div><button class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#addNewMettress" >Add new Mettress</button></div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                <table
                                    id="basic-datatables"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Mettress ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Mettress ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        if(isset($roomNumber)){
                                                $sql = "SELECT room.roomNo AS room_no, mettress.mettressID AS mettress_id, mettress.demageState AS mettress_damage FROM room LEFT JOIN mettress ON room.roomNo = mettress.roomNo WHERE room.roomNo = $roomNumber;";

                                                if ($result = $conn->query($sql)) {
                                                    
                                                    while ($row = $result->fetch_assoc()) {
                                                        if(!empty($row['mettress_id'])){
                                                            $mettressid = $row['mettress_id'];
                                                            $color = $row['mettress_damage']=="Damaged" ? "danger" : "success";
                                                            $status = $row['mettress_damage']=="Damaged" ? "Damaged" : "Good";
                                                            $btnColor = $row['mettress_damage']=="Damaged" ? "danger" : "success";
                                                        
                                                            echo "<tr>
                                                                    <td>".$row['room_no']."</td> 
                                                                    <td>".$mettressid."</td>";
                                                            
                                                            echo '<td>
                                                                    <div class="form-check form-switch">
                                                                        <span class="badge 
                                                                                        rounded-2 p-2 
                                                                                        text-bg-'.$color.'"
                                                                                        role="button" 
                                                                                        id="d_status'.$mettressid.'" 
                                                                                        style="cursor: pointer; 
                                                                                            width:65px;" 
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#editMettressstatus'.$mettressid.'" >'.$status.' </span>
                                                                    </div>
                                                                </td>
<!--CHANGE BED STATUS Modal -->
    <div class="modal fade" 
            id="editMettressstatus'.$mettressid.'" 
            tabindex="-1" 
            role="dialog" 
            aria-hidden="true">

        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Change</span>
                    <span class="fw-light"> Status </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="small p-2 border-left border-info">
                    Change Mettress Status
                </p>
                <form role="form" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ms-3">
                                <input type="text" class="btn btn-'.$btnColor.'"
                                            id="mettressDamgeBtn'.$mettressid.'" 
                                            name="mettressDamgeBtn"
                                            class="damageBtn" 
                                            onclick="mettressToggleStatus'.$mettressid.'()" 
                                            value="'.$status.'" 
                                            readonly>
                                </input>

                                <script>
                                    function mettressToggleStatus'.$mettressid.'(){
                                        let damageBtn = document.getElementById("mettressDamgeBtn'.$mettressid.'");
                                        let value = damageBtn.value;
                                        if(value == "Damaged"){
                                            damageBtn.classList.replace("btn-danger", "btn-success");
                                            damageBtn.innerHTML = "Good";
                                            damageBtn.value = "Good";
                                            console.log(damageBtn.value);
                                        }else{
                                            damageBtn.classList.replace("btn-success", "btn-danger");
                                            damageBtn.innerHTML = "Damaged";
                                            damageBtn.value = "Damaged";
                                            console.log(damageBtn.value);
                                        }
                                    
                                    }
                                </script>
                            
                            </div>
                            <input type="text" name="mettressid" id="mettressid" value="'.$mettressid.'" style="visibility:hidden" readonly>
                        </div>
                    </div> 
                    <!-- CLOSED ROW -->

                    <div class="modal-footer border-0">
                        <button type="submit" id="mettressStatChnge'.$mettressid.'" name="mettressStatChnge" class="btn btn-primary">
                            Change
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
            <!-- modal-body CLOSED-->
            
        </div>
            <!-- modal-content CLOSED-->

    </div>
</div>';
                                                    

                                                    echo '<td>
                                                            <div class="form-button-action">
                                                                <button type="button" 
                                                                        title=""
                                                                        class="btn btn-link btn-primary btn-lg" 
                                                                        data-original-title="Edit Mettress"
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#updateMettress'.$mettressid.'"> <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" 
                                                                        class="btn btn-link btn-danger" 
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteMettress'.$mettressid.'"
                                                                        data-original-title="Remove"> <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>

<!--EDIT CHAIR Modal -->
        <div class="modal fade" 
             id="updateMettress'.$mettressid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

        <div class="modal-dialog" 
             role="document">

            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Edit</span>
                    <span class="fw-light">Mettress '.$mettressid.'</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">
                    Create a new row using this form, make sure you fill them all
                </p>

                <form role="form" method="post">
                <input id="addMettress" 
                       name="current_mettressid" 
                       type="text" 
                       class="form-control" 
                       value="'.$mettressid.'" 
                       style="visibility:hidden" readonly />

                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="form-group form-group-default">
                            
                            <label>Mettress ID</label>
                            <input id="addMettressid" name="up_Mettressid" type="text" class="form-control" value="'.$mettressid.'" required />
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">

                            <label>Room Number</label>
                            <input id="addRoom" name="up_room" type="text" class="form-control" value= "'.$row['room_no'].'" required />

                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" id="updatemettress" name="updatemettress" class="btn btn-primary">
                        Update
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>


 <!--DELETE CHAIR Modal -->
        <div class="modal fade" 
             id="deleteMettress'.$mettressid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

            <div class="modal-dialog" 
                 role="document">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold"> Delete</span>
                        <span class="fw-light">Mettress </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="small">
                        You are going to delete '.$mettressid.' Mettress. Please confirm to delete?
                    </p>
                    <form role="form" method="post">
                        <input id="delete_Mettressid" name="delete_Mettressid" type="text" value="'.$mettressid.'" style="height:1px; visibility:hidden;" />
                        <div class="modal-footer border-0">
                            <button type="submit" id="mettressDelete" name="mettressDelete" class="btn btn-primary">
                                Delete
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>';

    echo "</tr>";
            }else{
                $mettressid = "No items";
                $status = "  ";
            }
            }
            $result->free();
        }
    }
?>
                                    
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                            
<!--ADD NEW METTRESS Modal -->
                                    <div class="modal fade" id="addNewMettress" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                            <span class="fw-mediumbold"> ADD </span>
                                            <span class="fw-light">New Mettress </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">
                                            Add new mettress to any Room
                                            </p>
                                            <form role="form" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                <div class="form-group form-group-default">
                                                    <label>Mettress ID</label>
                                                    <input id="addnewMettressid" name="new_mettressid" type="text" class="form-control" required />
                                                </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Room Number</label>
                                                    <input id="addnewRoom" name="new_room" type="text" class="form-control" required/>
                                                </div>
                                                </div>

                                                <div class="col-sm-12 ">
                                                <div class="form-group-default" style="border-style: none;">
                                                    <label>Status</label>
                                                    <!-- <div class="ms-3"> -->
                                                        <input type="text" class="mt-2 btn btn-success"
                                                                    id="mettressDmgState" 
                                                                    name="mettressDmgState"
                                                                    class="damageBtn" 
                                                                    onclick="mettressToggleStatus()" 
                                                                    value="Good" 
                                                                    readonly>
                                                        </input>

                                                        <script>
                                                            function mettressToggleStatus(){
                                                                let damageBtn = document.getElementById("mettressDmgState");
                                                                let value = damageBtn.value;
                                                                if(value == "Damaged"){
                                                                    damageBtn.classList.replace("btn-danger", "btn-success");
                                                                    damageBtn.innerHTML = "Good";
                                                                    damageBtn.value = "Good";
                                                                    console.log(damageBtn.value);
                                                                }else{
                                                                    damageBtn.classList.replace("btn-success", "btn-danger");
                                                                    damageBtn.innerHTML = "Damaged";
                                                                    damageBtn.value = "Damaged";
                                                                    console.log(damageBtn.value);
                                                                }
                                                            
                                                            }
                                                        </script>
                                                    
                                                    <!-- </div> -->
                                                </div>
                                                </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addMettress" name="addMettress" class="btn btn-primary">
                                                Add Mettress
                                                </button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        <!-- </div>  -->
                        <!-- col-6 closed (mettress) -->

<hr>


<!-- -----------------------------------------LOCKER TABLE------------------------------------------------------------ -->
                        
                    <div class="col-6"><!--  (Locker) -->
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <div><h4 class="card-title mb-2">Lockers Details</h4></div>
                                    <div><button class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#addNewLocker" >Add new Locker</button></div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                <table
                                    id="basic-datatables"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Locker ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Locker ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        if(isset($roomNumber)){
                                                $sql = "SELECT room.roomNo AS room_no, locker.lockerID AS locker_id, locker.demageState AS locker_damage FROM room LEFT JOIN locker ON room.roomNo = locker.roomNo WHERE room.roomNo = $roomNumber;";

                                                if ($result = $conn->query($sql)) {
                                                    
                                                    while ($row = $result->fetch_assoc()) {
                                                        if(!empty($row['locker_id'])){
                                                            $lockerid = $row['locker_id'];
                                                            $color = $row['locker_damage']=="Damaged" ? "danger" : "success";
                                                            $status = $row['locker_damage']=="Damaged" ? "Damaged" : "Good";
                                                            $btnColor = $row['locker_damage']=="Damaged" ? "danger" : "success";
                                                        
                                                            echo "<tr>
                                                                    <td>".$row['room_no']."</td> 
                                                                    <td>".$lockerid."</td>";
                                                            
                                                            echo '<td>
                                                                    <div class="form-check form-switch">
                                                                        <span class="badge 
                                                                                        rounded-2 p-2 
                                                                                        text-bg-'.$color.'"
                                                                                        role="button" 
                                                                                        id="d_status'.$lockerid.'" 
                                                                                        style="cursor: pointer; 
                                                                                            width:65px;" 
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#editLockerstatus'.$lockerid.'" >'.$status.' </span>
                                                                    </div>
                                                                </td>
<!--CHANGE BED STATUS Modal -->
    <div class="modal fade" 
            id="editLockerstatus'.$lockerid.'" 
            tabindex="-1" 
            role="dialog" 
            aria-hidden="true">

        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Change</span>
                    <span class="fw-light"> Status </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="small p-2 border-left border-info">
                    Change Locker Status
                </p>
                <form role="form" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ms-3">
                                <input type="text" class="btn btn-'.$btnColor.'"
                                            id="lockerDamgeBtn'.$lockerid.'" 
                                            name="lockerDamgeBtn"
                                            class="damageBtn" 
                                            onclick="lockerToggleStatus'.$lockerid.'()" 
                                            value="'.$status.'" 
                                            readonly>
                                </input>

                                <script>
                                    function lockerToggleStatus'.$lockerid.'(){
                                        let damageBtn = document.getElementById("lockerDamgeBtn'.$lockerid.'");
                                        let value = damageBtn.value;
                                        if(value == "Damaged"){
                                            damageBtn.classList.replace("btn-danger", "btn-success");
                                            damageBtn.innerHTML = "Good";
                                            damageBtn.value = "Good";
                                            console.log(damageBtn.value);
                                        }else{
                                            damageBtn.classList.replace("btn-success", "btn-danger");
                                            damageBtn.innerHTML = "Damaged";
                                            damageBtn.value = "Damaged";
                                            console.log(damageBtn.value);
                                        }
                                    
                                    }
                                </script>
                            
                            </div>
                            <input type="text" name="lockerid" id="lockerid" value="'.$lockerid.'" style="visibility:hidden" readonly>
                        </div>
                    </div> 
                    <!-- CLOSED ROW -->

                    <div class="modal-footer border-0">
                        <button type="submit" id="lockerStatChnge'.$lockerid.'" name="lockerStatChnge" class="btn btn-primary">
                            Change
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
            <!-- modal-body CLOSED-->
            
        </div>
            <!-- modal-content CLOSED-->

    </div>
</div>';
                                                    

                                                    echo '<td>
                                                            <div class="form-button-action">
                                                                <button type="button" 
                                                                        title=""
                                                                        class="btn btn-link btn-primary btn-lg" 
                                                                        data-original-title="Edit Locker"
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#updateLocker'.$lockerid.'"> <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" 
                                                                        class="btn btn-link btn-danger" 
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteLocker'.$lockerid.'"
                                                                        data-original-title="Remove"> <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>

<!--EDIT CHAIR Modal -->
        <div class="modal fade" 
             id="updateLocker'.$lockerid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

        <div class="modal-dialog" 
             role="document">

            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Edit</span>
                    <span class="fw-light">Locker '.$lockerid.'</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">
                    Create a new row using this form, make sure you fill them all
                </p>

                <form role="form" method="post">
                <input id="addLocker" 
                       name="current_lockerid" 
                       type="text" 
                       class="form-control" 
                       value="'.$lockerid.'" 
                       style="visibility:hidden" readonly />

                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="form-group form-group-default">
                            
                            <label>Locker ID</label>
                            <input id="addLockerid" name="up_Lockerid" type="text" class="form-control" value="'.$lockerid.'" required />
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">

                            <label>Room Number</label>
                            <input id="addRoom" name="up_room" type="text" class="form-control" value= "'.$row['room_no'].'" required />

                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" id="updatelocker" name="updatelocker" class="btn btn-primary">
                        Update
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>


 <!--DELETE CHAIR Modal -->
        <div class="modal fade" 
             id="deleteLocker'.$lockerid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

            <div class="modal-dialog" 
                 role="document">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold"> Delete</span>
                        <span class="fw-light">Locker </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="small">
                        You are going to delete '.$lockerid.' Locker. Please confirm to delete?
                    </p>
                    <form role="form" method="post">
                        <input id="delete_Lockerid" name="delete_Lockerid" type="text" value="'.$lockerid.'" style="height:1px; visibility:hidden;" />
                        <div class="modal-footer border-0">
                            <button type="submit" id="lockerDelete" name="lockerDelete" class="btn btn-primary">
                                Delete
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>';

    echo "</tr>";
            }else{
                $lockerid = "No items";
                $status = "  ";
            }
            }
            $result->free();
        }
    }
?>
                                    
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                            
<!--ADD NEW METTRESS Modal -->
                                    <div class="modal fade" id="addNewLocker" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                            <span class="fw-mediumbold"> ADD </span>
                                            <span class="fw-light">New Locker </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">
                                            Add new locker to any Room
                                            </p>
                                            <form role="form" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                <div class="form-group form-group-default">
                                                    <label>Locker ID</label>
                                                    <input id="addnewLockerid" name="new_lockerid" type="text" class="form-control" required />
                                                </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Room Number</label>
                                                    <input id="addnewRoom" name="new_room" type="text" class="form-control" required/>
                                                </div>
                                                </div>

                                                <div class="col-sm-12 ">
                                                <div class="form-group-default" style="border-style: none;">
                                                    <label>Status</label>
                                                    <!-- <div class="ms-3"> -->
                                                        <input type="text" class="mt-2 btn btn-success"
                                                                    id="lockerDmgState" 
                                                                    name="lockerDmgState"
                                                                    class="damageBtn" 
                                                                    onclick="lockerToggleStatus()" 
                                                                    value="Good" 
                                                                    readonly>
                                                        </input>

                                                        <script>
                                                            function lockerToggleStatus(){
                                                                let damageBtn = document.getElementById("lockerDmgState");
                                                                let value = damageBtn.value;
                                                                if(value == "Damaged"){
                                                                    damageBtn.classList.replace("btn-danger", "btn-success");
                                                                    damageBtn.innerHTML = "Good";
                                                                    damageBtn.value = "Good";
                                                                    console.log(damageBtn.value);
                                                                }else{
                                                                    damageBtn.classList.replace("btn-success", "btn-danger");
                                                                    damageBtn.innerHTML = "Damaged";
                                                                    damageBtn.value = "Damaged";
                                                                    console.log(damageBtn.value);
                                                                }
                                                            
                                                            }
                                                        </script>
                                                    
                                                    <!-- </div> -->
                                                </div>
                                                </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addLocker" name="addLocker" class="btn btn-primary">
                                                Add Locker
                                                </button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        <!-- </div> -->
                         <!-- col-6 closed (locker) -->



<!-- -----------------------------------------RACK TABLE------------------------------------------------------------ -->
                        
                    <div class="col-6"><!--  (Rack) -->
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <div><h4 class="card-title mb-2">Racks Details</h4></div>
                                    <div><button class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#addNewRack" >Add new Rack</button></div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                <table
                                    id="basic-datatables"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Rack ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Rack ID</th>
                                        <th>Damage Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        if(isset($roomNumber)){
                                                $sql = "SELECT room.roomNo AS room_no, rack.rackID AS rack_id, rack.demageState AS rack_damage FROM room LEFT JOIN rack ON room.roomNo = rack.roomNo WHERE room.roomNo = $roomNumber;";

                                                if ($result = $conn->query($sql)) {
                                                    
                                                    while ($row = $result->fetch_assoc()) {
                                                        if(!empty($row['rack_id'])){
                                                            $rackid = $row['rack_id'];
                                                            $color = $row['rack_damage']=="Damaged" ? "danger" : "success";
                                                            $status = $row['rack_damage']=="Damaged" ? "Damaged" : "Good";
                                                            $btnColor = $row['rack_damage']=="Damaged" ? "danger" : "success";
                                                        
                                                            echo "<tr>
                                                                    <td>".$row['room_no']."</td> 
                                                                    <td>".$rackid."</td>";
                                                            
                                                            echo '<td>
                                                                    <div class="form-check form-switch">
                                                                        <span class="badge 
                                                                                        rounded-2 p-2 
                                                                                        text-bg-'.$color.'"
                                                                                        role="button" 
                                                                                        id="d_status'.$rackid.'" 
                                                                                        style="cursor: pointer; 
                                                                                            width:65px;" 
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#editRackstatus'.$rackid.'" >'.$status.' </span>
                                                                    </div>
                                                                </td>
<!--CHANGE BED STATUS Modal -->
    <div class="modal fade" 
            id="editRackstatus'.$rackid.'" 
            tabindex="-1" 
            role="dialog" 
            aria-hidden="true">

        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Change</span>
                    <span class="fw-light"> Status </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="small p-2 border-left border-info">
                    Change Rack Status
                </p>
                <form role="form" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ms-3">
                                <input type="text" class="btn btn-'.$btnColor.'"
                                            id="rackDamgeBtn'.$rackid.'" 
                                            name="rackDamgeBtn"
                                            class="damageBtn" 
                                            onclick="rackToggleStatus'.$rackid.'()" 
                                            value="'.$status.'" 
                                            readonly>
                                </input>

                                <script>
                                    function rackToggleStatus'.$rackid.'(){
                                        let damageBtn = document.getElementById("rackDamgeBtn'.$rackid.'");
                                        let value = damageBtn.value;
                                        if(value == "Damaged"){
                                            damageBtn.classList.replace("btn-danger", "btn-success");
                                            damageBtn.innerHTML = "Good";
                                            damageBtn.value = "Good";
                                            console.log(damageBtn.value);
                                        }else{
                                            damageBtn.classList.replace("btn-success", "btn-danger");
                                            damageBtn.innerHTML = "Damaged";
                                            damageBtn.value = "Damaged";
                                            console.log(damageBtn.value);
                                        }
                                    
                                    }
                                </script>
                            
                            </div>
                            <input type="text" name="rackid" id="rackid" value="'.$rackid.'" style="visibility:hidden" readonly>
                        </div>
                    </div> 
                    <!-- CLOSED ROW -->

                    <div class="modal-footer border-0">
                        <button type="submit" id="rackStatChnge'.$rackid.'" name="rackStatChnge" class="btn btn-primary">
                            Change
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
            <!-- modal-body CLOSED-->
            
        </div>
            <!-- modal-content CLOSED-->

    </div>
</div>';
                                                    

                                                    echo '<td>
                                                            <div class="form-button-action">
                                                                <button type="button" 
                                                                        title=""
                                                                        class="btn btn-link btn-primary btn-lg" 
                                                                        data-original-title="Edit Rack"
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#updateRack'.$rackid.'"> <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" 
                                                                        class="btn btn-link btn-danger" 
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteRack'.$rackid.'"
                                                                        data-original-title="Remove"> <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>

<!--EDIT CHAIR Modal -->
        <div class="modal fade" 
             id="updateRack'.$rackid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

        <div class="modal-dialog" 
             role="document">

            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Edit</span>
                    <span class="fw-light">Rack '.$rackid.'</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">
                    Create a new row using this form, make sure you fill them all
                </p>

                <form role="form" method="post">
                <input id="addRack" 
                       name="current_rackid" 
                       type="text" 
                       class="form-control" 
                       value="'.$rackid.'" 
                       style="visibility:hidden" readonly />

                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="form-group form-group-default">
                            
                            <label>Rack ID</label>
                            <input id="addRackid" name="up_Rackid" type="text" class="form-control" value="'.$rackid.'" required />
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">

                            <label>Room Number</label>
                            <input id="addRoom" name="up_room" type="text" class="form-control" value= "'.$row['room_no'].'" required />

                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" id="updaterack" name="updaterack" class="btn btn-primary">
                        Update
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>


 <!--DELETE CHAIR Modal -->
        <div class="modal fade" 
             id="deleteRack'.$rackid.'" 
             tabindex="-1" 
             role="dialog" 
             aria-hidden="true">

            <div class="modal-dialog" 
                 role="document">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold"> Delete</span>
                        <span class="fw-light">Rack </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="small">
                        You are going to delete '.$rackid.' Rack. Please confirm to delete?
                    </p>
                    <form role="form" method="post">
                        <input id="delete_Rackid" name="delete_Rackid" type="text" value="'.$rackid.'" style="height:1px; visibility:hidden;" />
                        <div class="modal-footer border-0">
                            <button type="submit" id="rackDelete" name="rackDelete" class="btn btn-primary">
                                Delete
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>';

    echo "</tr>";
            }else{
                $rackid = "No items";
                $status = "  ";
            }
            }
            $result->free();
        }
    }
?>
                                    
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                            
<!--ADD NEW METTRESS Modal -->
                                    <div class="modal fade" id="addNewRack" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                            <span class="fw-mediumbold"> ADD </span>
                                            <span class="fw-light">New Rack </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">
                                            Add new rack to any Room
                                            </p>
                                            <form role="form" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                <div class="form-group form-group-default">
                                                    <label>Rack ID</label>
                                                    <input id="addnewRackid" name="new_rackid" type="text" class="form-control" required />
                                                </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Room Number</label>
                                                    <input id="addnewRoom" name="new_room" type="text" class="form-control" required/>
                                                </div>
                                                </div>

                                                <div class="col-sm-12 ">
                                                <div class="form-group-default" style="border-style: none;">
                                                    <label>Status</label>
                                                    <!-- <div class="ms-3"> -->
                                                        <input type="text" class="mt-2 btn btn-success"
                                                                    id="rackDmgState" 
                                                                    name="rackDmgState"
                                                                    class="damageBtn" 
                                                                    onclick="rackToggleStatus()" 
                                                                    value="Good" 
                                                                    readonly>
                                                        </input>

                                                        <script>
                                                            function rackToggleStatus(){
                                                                let damageBtn = document.getElementById("rackDmgState");
                                                                let value = damageBtn.value;
                                                                if(value == "Damaged"){
                                                                    damageBtn.classList.replace("btn-danger", "btn-success");
                                                                    damageBtn.innerHTML = "Good";
                                                                    damageBtn.value = "Good";
                                                                    console.log(damageBtn.value);
                                                                }else{
                                                                    damageBtn.classList.replace("btn-success", "btn-danger");
                                                                    damageBtn.innerHTML = "Damaged";
                                                                    damageBtn.value = "Damaged";
                                                                    console.log(damageBtn.value);
                                                                }
                                                            
                                                            }
                                                        </script>
                                                    
                                                    <!-- </div> -->
                                                </div>
                                                </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addRack" name="addRack" class="btn btn-primary">
                                                Add Rack
                                                </button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div> <!-- col-6 closed (rack) -->
                        
                        <!-- <div class="row border border-danger">

                        </div> -->


                        <!-- <div class="col-md-4 border border-success">

                        </div> -->

                        <!-- <div class="col-md-12"> -->
                
                        
                </div>
            </div>
    </div>
    </div>
    <script>
        //FOR ALERT BOX
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible text-${type} rounded-3 " role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
                                    }
    </script>

    <!-- Include Bootstrap JS Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Fonts and icons -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></> -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <?php include '../libraries/script.php';?>
</body>
</html>

<?php
// ------------------------------------------------------------ ALL Functions of Desk --------------------------------------------------
if(isset($_POST['deskStatChnge'])){
    $deskId = $_POST['deskid'];
    $damageStatus = $_POST['deskDamgeBtn'];

    try{
        $sql = "UPDATE desk SET demageState = '$damageStatus' WHERE deskID = '$deskId';";
        mysqli_query($conn, $sql);

        // echo "Desk status Changed";
        echo "<script>history.back();</script>";

    }catch(mysqli_sql_exception $e){
        // Display a generic error message for other SQL errors
        echo "<script>appendAlert('An error occurred while Changing the Desk status.', 'danger');</script>";
    }

}

if(isset($_POST['updatedesk'])){
    $currentDeskId = $_POST['current_deskid'];
    $up_deskId = $_POST['up_deskid'];
    $up_roomNo = $_POST['up_room'];
    try{
        $sql = "UPDATE desk SET deskID='$up_deskId', roomNo ='$up_roomNo' WHERE deskID = '$currentDeskId'";
        mysqli_query($conn, $sql);
    
        // echo "Desk details updated";
        echo "<script>history.back();</script>";
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Desk ID. please use another ID.', 'warning');</script>";

        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the desk information.');</script>";
            echo "<script>appendAlert('An error occurred while updating the desk information.', 'danger');</script>";
        }
    }


}

if(isset($_POST['deskDelete'])){
    $del_DeskId = $_POST['delete_Deskid'];

    $sql = "DELETE FROM desk WHERE deskID = '$del_DeskId'";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Desk details Deleted";
        echo "<script>history.back();</script>";
    } else {
        // echo "Desk details delete Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while deleting the desk information', 'danger');</script>";
    }

}

if(isset($_POST['addDesk'])){
    $new_DeskId = $_POST['new_deskid'];
    $roomId = $_POST['new_room'];
    $deskDamgeSt = $_POST['deskDmgState'];

    try{
        $sql = "INSERT INTO desk(deskID, demageState, roomNo) VALUES ('$new_DeskId','$deskDamgeSt','$roomId')";
        mysqli_query($conn, $sql);
    
        // echo "New Chair details Added";
        echo "<script>appendAlert(' Added New Desk information', 'success');</script>";
        
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Desk ID. please use another ID', 'warning');</script>";
        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the chair information.');</script>";
            echo "<script>appendAlert('An error occurred while Added the Desk information', 'danger');</script>";
        }
    }

}


// ------------------------------------------------------------------------ ALL Functions of Chair ------------------------------------------
if(isset($_POST['chairStatChnge'])){
    $chairId = $_POST['chairid'];
    $damageStatus = $_POST['chairDamgeBtn'];

    $sql = "UPDATE chair SET demageState = '$damageStatus' WHERE chairID = '$chairId';";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Chair status Changed";
        echo "<script>history.back();</script>";
    } else {
        // echo "Chair status Changing Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while changing the chair status', 'danger');</script>";
    }

}

if(isset($_POST['updatechair'])){
    $currentChairId = $_POST['current_chairid'];
    $up_chairId = $_POST['up_Chairid'];
    $up_roomNo = $_POST['up_room'];

    
    try{
        $sql = "UPDATE chair SET chairID='$up_chairId', roomNo ='$up_roomNo' WHERE chairID = '$currentChairId'";
        mysqli_query($conn, $sql);
    
        // echo "Chair details updated";
        echo "<script>history.back();</script>";

    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Chair ID. please use another ID', 'warning');</script>";

        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the chair information.');</script>";
            echo "<script>appendAlert('An error occurred while updating the desk information', 'danger');</script>";
        }
    }

}

if(isset($_POST['chairDelete'])){
    $del_ChairId = $_POST['delete_Chairid'];

    $sql = "DELETE FROM chair WHERE chairID = '$del_ChairId'";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Chair details Deleted";
        echo "<script>history.back();</script>";
    } else {
        // echo "Chair details delete Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while deleting the Chair information', 'danger');</script>";
    }

}

if(isset($_POST['addChair'])){
    $new_ChairId = $_POST['new_chairid'];
    $roomId = $_POST['new_room'];
    $chairDamgeSt = $_POST['chairDmgState'];

    try{
        $sql = "INSERT INTO chair(chairID, demageState, roomNo) VALUES ('$new_ChairId','$chairDamgeSt','$roomId')";
        mysqli_query($conn, $sql);
    
        // echo "New Chair details Added";
        echo "<script>appendAlert(' Added New Chair information', 'success');</script>";
        
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Chair ID. please use another ID', 'warning');</script>";
        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the chair information.');</script>";
            echo "<script>appendAlert('An error occurred while Added the chair information', 'danger');</script>";
        }
    }

}


// ------------------------------------------------------------------------ ALL Functions of Bed -----------------------------------------
if(isset($_POST['bedStatChnge'])){
    $bedId = $_POST['bedid'];
    $damageStatus = $_POST['bedDamgeBtn'];

    $sql = "UPDATE bed SET demageState = '$damageStatus' WHERE bedID = '$bedId';";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Bed status Changed";
        echo "<script>history.back();</script>";
    } else {
        // echo "Bed status Changing Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while Changing the Bed Status', 'danger');</script>";
    }

}

if(isset($_POST['updatebed'])){
    $currentBedId = $_POST['current_bedid'];
    $up_bedId = $_POST['up_Bedid'];
    $up_roomNo = $_POST['up_room'];

    
    try{
        $sql = "UPDATE bed SET bedID='$up_bedId', roomNo ='$up_roomNo' WHERE bedID = '$currentBedId'";
        mysqli_query($conn, $sql);
    
        // echo "Bed details updated";
        echo "<script>history.back();</script>";

    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Bed ID. please use another ID', 'warning');</script>";
            
        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the bed information.');</script>";
            echo "<script>appendAlert('An error occurred while updating the bed information', 'danger');</script>";
        }
    }

}

if(isset($_POST['bedDelete'])){
    $del_BedId = $_POST['delete_Bedid'];

    $sql = "DELETE FROM bed WHERE bedID = '$del_BedId'";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Bed details Deleted";
        echo "<script>history.back();</script>";
    } else {
        // echo "Bed details delete Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while deleting the desk information', 'danger');</script>";
    }

}

if(isset($_POST['addBed'])){
    $new_BedId = $_POST['new_bedid'];
    $roomId = $_POST['new_room'];
    $bedDamgeSt = $_POST['bedDmgState'];

    try{
        $sql = "INSERT INTO bed(bedID, demageState, roomNo) VALUES ('$new_BedId','$bedDamgeSt','$roomId')";
        mysqli_query($conn, $sql);
    
        // echo "New Bed details Added";
        echo "<script>appendAlert('Added New Bed information', 'success');</script>";

        
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Bed ID. please use another ID', 'warning');</script>";
        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the bed information.');</script>";
            echo "<script>appendAlert('An error occurred while updating the bed information', 'danger');</script>";
        }
    }

}




// ------------------------------------------------------------------------ ALL Functions of METTRESS --------------------------------------
if(isset($_POST['mettressStatChnge'])){
    $mettressId = $_POST['mettressid'];
    $damageStatus = $_POST['mettressDamgeBtn'];

    $sql = "UPDATE mettress SET demageState = '$damageStatus' WHERE mettressID = '$mettressId';";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Mettress status Changed";
        echo "<script>history.back();</script>";
    } else {
        // echo "Mettress status Changing Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while Changing the Mettress status', 'danger');</script>";
    }

}

if(isset($_POST['updatemettress'])){
    $currentMettressId = $_POST['current_mettressid'];
    $up_mettressId = $_POST['up_Mettressid'];
    $up_roomNo = $_POST['up_room'];

    
    try{
        $sql = "UPDATE mettress SET mettressID='$up_mettressId', roomNo ='$up_roomNo' WHERE mettressID = '$currentMettressId'";
        mysqli_query($conn, $sql);
    
        // echo "Mettress details updated";
        echo "<script>history.back();</script>";

    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Mettress ID. please use another ID', 'warning');</script>";

        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the mettress information.');</script>";
            echo "<script>appendAlert('An error occurred while updating the Mettress information', 'danger');</script>";

        }
    }

}

if(isset($_POST['mettressDelete'])){
    $del_MettressId = $_POST['delete_Mettressid'];

    $sql = "DELETE FROM mettress WHERE mettressID = '$del_MettressId'";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Mettress details Deleted";
        echo "<script>history.back();</script>";
    } else {
        // echo "Mettress details delete Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while deleting the mettress information', 'danger');</script>";

    }

}

if(isset($_POST['addMettress'])){
    $new_MettressId = $_POST['new_mettressid'];
    $roomId = $_POST['new_room'];
    $mettressDamgeSt = $_POST['mettressDmgState'];

    try{
        $sql = "INSERT INTO mettress(mettressID, demageState, roomNo) VALUES ('$new_MettressId','$mettressDamgeSt','$roomId')";
        mysqli_query($conn, $sql);
    
        // echo "New Mettress details Added";
        echo "<script>appendAlert('Added new Mettress information', 'success');</script>";

        
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Mettress ID. please use another ID', 'warning');</script>";
        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the mettress information.');</script>";
            echo "<script>appendAlert('An error occurred while adding new Mettress information', 'danger');</script>";
        }
    }

}




// ------------------------------------------------------------------------ ALL Functions of LOCKER -----------------------------------------
if(isset($_POST['lockerStatChnge'])){
    $lockerId = $_POST['lockerid'];
    $damageStatus = $_POST['lockerDamgeBtn'];

    $sql = "UPDATE locker SET demageState = '$damageStatus' WHERE lockerID = '$lockerId';";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Locker status Changed";
        echo "<script>history.back();</script>";
    } else {
        // echo "Locker status Changing Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while changing the Locker information', 'danger');</script>";
    }

}

if(isset($_POST['updatelocker'])){
    $currentLockerId = $_POST['current_lockerid'];
    $up_lockerId = $_POST['up_Lockerid'];
    $up_roomNo = $_POST['up_room'];

    
    try{
        $sql = "UPDATE locker SET lockerID='$up_lockerId', roomNo ='$up_roomNo' WHERE lockerID = '$currentLockerId'";
        mysqli_query($conn, $sql);
    
        // echo "Locker details updated";
        echo "<script>history.back();</script>";

    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Locker ID. please use another ID', 'warning');</script>";

        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the locker information.');</script>";
            echo "<script>appendAlert('An error occurred while updating the Locker information', 'danger');</script>";

        }
    }

}

if(isset($_POST['lockerDelete'])){
    $del_LockerId = $_POST['delete_Lockerid'];

    $sql = "DELETE FROM locker WHERE lockerID = '$del_LockerId'";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Locker details Deleted";
        echo "<script>history.back();</script>";
    } else {
        // echo "Locker details delete Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while deleting the Locker information', 'danger');</script>";

    }

}

if(isset($_POST['addLocker'])){
    $new_LockerId = $_POST['new_lockerid'];
    $roomId = $_POST['new_room'];
    $lockerDamgeSt = $_POST['lockerDmgState'];

    try{
        $sql = "INSERT INTO locker(lockerID, demageState, roomNo) VALUES ('$new_LockerId','$lockerDamgeSt','$roomId')";
        mysqli_query($conn, $sql);
    
        // echo "New Locker details Added";            
        echo "<script>appendAlert('Added New Locker information', 'success');</script>";

        
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Locker ID. please use another ID', 'warning');</script>";
        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the locker information.');</script>";
            echo "<script>appendAlert('An error occurred while Adding New Locker information', 'danger');</script>";
        }
    }

}



// ------------------------------------------------------------------------ ALL Functions of RACKS -----------------------------------------
if(isset($_POST['rackStatChnge'])){
    $rackId = $_POST['rackid'];
    $damageStatus = $_POST['rackDamgeBtn'];

    $sql = "UPDATE rack SET demageState = '$damageStatus' WHERE rackID = '$rackId';";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Rack status Changed";
        echo "<script>history.back();</script>";
    } else {
        // echo "Rack status Changing Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while changing the Rack status', 'danger');</script>";

    }

}

if(isset($_POST['updaterack'])){
    $currentRackId = $_POST['current_rackid'];
    $up_rackId = $_POST['up_Rackid'];
    $up_roomNo = $_POST['up_room'];

    
    try{
        $sql = "UPDATE rack SET rackID='$up_rackId', roomNo ='$up_roomNo' WHERE rackID = '$currentRackId'";
        mysqli_query($conn, $sql);
    
        // echo "Rack details updated";
        echo "<script>history.back();</script>";

    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Rack ID. please use another ID', 'warning');</script>";
        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the rack information.');</script>";
            echo "<script>appendAlert('An error occurred while updating the Rack information', 'danger');</script>";
        }
    }

}

if(isset($_POST['rackDelete'])){
    $del_RackId = $_POST['delete_Rackid'];

    $sql = "DELETE FROM rack WHERE rackID = '$del_RackId'";
    
    if (mysqli_query($conn, $sql)) {
        // echo "Rack details Deleted";
        echo "<script>history.back();</script>";
    } else {
        // echo "Rack details delete Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>appendAlert('An error occurred while deleting the Rack information', 'danger');</script>";
    }

}

if(isset($_POST['addRack'])){
    $new_RackId = $_POST['new_rackid'];
    $roomId = $_POST['new_room'];
    $rackDamgeSt = $_POST['rackDmgState'];

    try{
        $sql = "INSERT INTO rack(rackID, demageState, roomNo) VALUES ('$new_RackId','$rackDamgeSt','$roomId')";
        mysqli_query($conn, $sql);
    
        // echo "New Rack details Added";
        echo "<script>appendAlert('Added New Rack information', 'success');</script>";
        
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            // echo "<script>alert('Already have that ID. please use another ID.');</script>";
            echo "<script>appendAlert('Already have that Rack ID. please use another ID', 'warning');</script>";
        } else {
            // Display a generic error message for other SQL errors
            // echo "<script>alert('An error occurred while updating the rack information.');</script>";
            echo "<script>appendAlert('An error occurred while Adding New Rack information', 'danger');</script>";
        }
    }

}

?>

