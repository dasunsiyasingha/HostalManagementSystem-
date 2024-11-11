
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
    
    <div class="row border border-primary" style="width:100vw;">
            <div class="row m-auto border border-primary" style="width:100%;">
                <!-- HEADER LINE -->
                <div class="row" style=height:30%; >
                        <div class="col-12 d-flex justify-content-center m-auto mt-4 bg-primary p-4 card-body skew-shadow position-relative rounded-2">
                            <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2" style="color:white;">Update Rooms Details</h5>
                        </div>
                </div>
                <!--CLOSED HEADER LINE -->

                <!-- SELECT DROP DOWN LIST ROOM NUMBERS ROW -->
                <div class="row">
                    <div class="col-4 border border-success">
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
                        
                    <div class="col-4 border border-success"></div>
                    <div class="col-4 border border-success"></div>
                </div>
                <!-- SELECT DROP DOWN LIST ROOM NUMBERS ROW END -->
                        
                    <div class="row border border-success">
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
                        <!-- </div> col-6 closed (chair) -->


<!-- -----------------------------------------BEDs TABLE------------------------------------------------------------ -->
                        
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

<!--EDIT CHAIR Modal -->
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
                        </div> <!-- col-6 closed (Beds) -->



<!-- -----------------------------------------METTRESS TABLE------------------------------------------------------------ -->
                        
                    <div class="col-6"><!--  (Mettress) -->
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <div><h4 class="card-title mb-2">Mettresses Details</h4></div>
                                    <div><button class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#addNewBed" >Add new Mettress</button></div>
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
                        </div> <!-- col-6 closed (mettress) -->
                        
                        <div class="row border border-danger">

                        </div>


                        <!-- <div class="col-md-4 border border-success">

                        </div> -->

                        <!-- <div class="col-md-12"> -->
                
                        
                </div>
            </div>
    </div>
    </div>
    

    <!-- Include Bootstrap JS Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></>
        <!-- Fonts and icons -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></> -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <?php include '../libraries/script.php';?>
</body>
</html>

<?php
// ------------------------------------------------------------ ALL Functions of Desk
if(isset($_POST['deskStatChnge'])){
    $deskId = $_POST['deskid'];
    $damageStatus = $_POST['deskDamgeBtn'];

    try{
        $sql = "UPDATE desk SET demageState = '$damageStatus' WHERE deskID = '$deskId';";
        mysqli_query($conn, $sql);

        echo "Desk status Changed";

    }catch(mysqli_sql_exception $e){
        // Display a generic error message for other SQL errors
        echo "<script>alert('An error occurred while Changing the Desk status.');</script>";
    }

}

if(isset($_POST['updatedesk'])){
    $currentDeskId = $_POST['current_deskid'];
    $up_deskId = $_POST['up_deskid'];
    $up_roomNo = $_POST['up_room'];
    try{
        $sql = "UPDATE desk SET deskID='$up_deskId', roomNo ='$up_roomNo' WHERE deskID = '$currentDeskId'";
        mysqli_query($conn, $sql);
    
        echo "Desk details updated";
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            echo "<script>alert('Already have that ID. please use another ID.');</script>";
        } else {
            // Display a generic error message for other SQL errors
            echo "<script>alert('An error occurred while updating the desk information.');</script>";
        }
    }


}

if(isset($_POST['deskDelete'])){
    $del_DeskId = $_POST['delete_Deskid'];

    $sql = "DELETE FROM desk WHERE deskID = '$del_DeskId'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Desk details Deleted";
    } else {
        echo "Desk details delete Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

if(isset($_POST['addDesk'])){
    $new_DeskId = $_POST['new_deskid'];
    $roomId = $_POST['new_room'];
    $deskDamgeSt = $_POST['deskDmgState'];

    $sql = "INSERT INTO desk(deskID, demageState, roomNo) VALUES ('$new_DeskId','$deskDamgeSt','$roomId')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New Desk details Added";
    } else {
        echo "New Desk details Add Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}


// ------------------------------------------------------------------------ ALL Functions of Chair
if(isset($_POST['chairStatChnge'])){
    $chairId = $_POST['chairid'];
    $damageStatus = $_POST['chairDamgeBtn'];

    $sql = "UPDATE chair SET demageState = '$damageStatus' WHERE chairID = '$chairId';";
    
    if (mysqli_query($conn, $sql)) {
        echo "Chair status Changed";
    } else {
        echo "Chair status Changing Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

if(isset($_POST['updatechair'])){
    $currentChairId = $_POST['current_chairid'];
    $up_chairId = $_POST['up_Chairid'];
    $up_roomNo = $_POST['up_room'];

    
    try{
        $sql = "UPDATE chair SET chairID='$up_chairId', roomNo ='$up_roomNo' WHERE chairID = '$currentChairId'";
        mysqli_query($conn, $sql);
    
        echo "Chair details updated";

    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            echo "<script>alert('Already have that ID. please use another ID.');</script>";
        } else {
            // Display a generic error message for other SQL errors
            echo "<script>alert('An error occurred while updating the chair information.');</script>";
        }
    }

}

if(isset($_POST['chairDelete'])){
    $del_ChairId = $_POST['delete_Chairid'];

    $sql = "DELETE FROM chair WHERE chairID = '$del_ChairId'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Chair details Deleted";
    } else {
        echo "Chair details delete Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

if(isset($_POST['addChair'])){
    $new_ChairId = $_POST['new_chairid'];
    $roomId = $_POST['new_room'];
    $chairDamgeSt = $_POST['chairDmgState'];

    try{
        $sql = "INSERT INTO chair(chairID, demageState, roomNo) VALUES ('$new_ChairId','$chairDamgeSt','$roomId')";
        mysqli_query($conn, $sql);
    
        echo "New Chair details Added";
        
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            echo "<script>alert('Already have that ID. please use another ID.');</script>";
        } else {
            // Display a generic error message for other SQL errors
            echo "<script>alert('An error occurred while updating the chair information.');</script>";
        }
    }

}


// ------------------------------------------------------------------------ ALL Functions of Bed
if(isset($_POST['bedStatChnge'])){
    $bedId = $_POST['bedid'];
    $damageStatus = $_POST['bedDamgeBtn'];

    $sql = "UPDATE bed SET demageState = '$damageStatus' WHERE bedID = '$bedId';";
    
    if (mysqli_query($conn, $sql)) {
        echo "Bed status Changed";
    } else {
        echo "Bed status Changing Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

if(isset($_POST['updatebed'])){
    $currentBedId = $_POST['current_bedid'];
    $up_bedId = $_POST['up_Bedid'];
    $up_roomNo = $_POST['up_room'];

    
    try{
        $sql = "UPDATE bed SET bedID='$up_bedId', roomNo ='$up_roomNo' WHERE bedID = '$currentBedId'";
        mysqli_query($conn, $sql);
    
        echo "Bed details updated";

    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            echo "<script>alert('Already have that ID. please use another ID.');</script>";
        } else {
            // Display a generic error message for other SQL errors
            echo "<script>alert('An error occurred while updating the bed information.');</script>";
        }
    }

}

if(isset($_POST['bedDelete'])){
    $del_BedId = $_POST['delete_Bedid'];

    $sql = "DELETE FROM bed WHERE bedID = '$del_BedId'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Bed details Deleted";
    } else {
        echo "Bed details delete Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

if(isset($_POST['addBed'])){
    $new_BedId = $_POST['new_bedid'];
    $roomId = $_POST['new_room'];
    $bedDamgeSt = $_POST['bedDmgState'];

    try{
        $sql = "INSERT INTO bed(bedID, demageState, roomNo) VALUES ('$new_BedId','$bedDamgeSt','$roomId')";
        mysqli_query($conn, $sql);
    
        echo "New Bed details Added";
        
    }catch(mysqli_sql_exception $e){
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // Display a custom error message
            echo "<script>alert('Already have that ID. please use another ID.');</script>";
        } else {
            // Display a generic error message for other SQL errors
            echo "<script>alert('An error occurred while updating the bed information.');</script>";
        }
    }

}

?>

