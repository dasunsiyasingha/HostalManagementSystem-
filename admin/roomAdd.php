<?php
    session_start();
    error_reporting(0);
    include('../includes/config.php');
    if(strlen($_SESSION['alogin'])==0){ 
        header('location:../home/home.php');
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>room Details</title>
    <?php
        include '../libraries/styles.php';
    ?>
    <style>

        .form-check-input{
            border-color: red;
        }

        .form-check-input:checked{
            background-color: red;
            border-color: red;
        }

        .form-switch{
            margin-top:0px;
            padding-top:0px;
        }


    </style>
</head>
<body>
    <div class="container-fluid d-flex align-items-center justify-content-center" >
        <div  style="width: 50%; ">
                <div id="liveAlertPlaceholder" class="mt-5"></div>
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h3 class="card-title text-center">ADD ROOMS DETAILS</h3>
                                    <!-- <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button> -->
                </div>
                <div class="card-body">
                    <form role="form" method="post">
                        <div class="form-group mb-3">
                            <label for="roomNo">Room Number</label>
                            <input type="text" class="form-control" id="roomNo" name="roomNo" placeholder="Enter Room Number" required>
                        </div>
<!-- For Chair Inputs -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="addchair">Number of chairs</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="addchair" name="addchair"  placeholder="Enter Number of Chairs" aria-label="room chair">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a class="dropdown-item" href="#" onclick="addchair('0')">0</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addchair('1')">1</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addchair('2')">2</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addchair('3')">3</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addchair('4')">4</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addchair('5')">5</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addchair('6')">6</a></li>
                                            
                                        </ul>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row" id="chairInputs"></div><hr>
<!-- For Desk Inputs -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="adddesk">Number of desk</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="adddesk" name="adddesk"  placeholder="Enter Number of Chairs" aria-label="room desk">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a class="dropdown-item" href="#" onclick="adddesk('0')">0</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="adddesk('1')">1</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="adddesk('2')">2</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="adddesk('3')">3</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="adddesk('4')">4</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="adddesk('5')">5</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="adddesk('6')">6</a></li>
                                            
                                        </ul>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row" id="deskInputs"></div><hr>
<!-- For beds Inputs -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="addbed">Number of Beds</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="addbed" name="addbed"  placeholder="Enter Number of Beds" aria-label="room bed">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a class="dropdown-item" href="#" onclick="addbed('0')">0</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addbed('1')">1</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addbed('2')">2</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addbed('3')">3</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addbed('4')">4</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addbed('5')">5</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addbed('6')">6</a></li>
                                            
                                        </ul>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row" id="bedInputs"></div><hr>


<!-- For mettress Inputs -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="addmettress">Number of Mattress</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="addmettress" name="addmettress"  placeholder="Enter Number of Mettresses" aria-label="room Mettress">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a class="dropdown-item" href="#" onclick="addmettress('0')">0</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addmettress('1')">1</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addmettress('2')">2</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addmettress('3')">3</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addmettress('4')">4</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addmettress('5')">5</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addmettress('6')">6</a></li>
                                            
                                        </ul>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row" id="mettressInputs"></div><hr>
<!-- For lockers Inputs -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="addlockers">Number of Lockers</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="addlockers" name="addlockers"  placeholder="Enter Number of Lockers" aria-label="room lockers">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a class="dropdown-item" href="#" onclick="addlockers('0')">0</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addlockers('1')">1</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addlockers('2')">2</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addlockers('3')">3</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addlockers('4')">4</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addlockers('5')">5</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addlockers('6')">6</a></li>
                                            
                                        </ul>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row" id="lockersInputs"></div><hr>


<!-- For Clothes Racks Inputs -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="addracks">Number of Racks</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="addracks" name="addracks"  placeholder="Enter Number of Racks" aria-label="room racks">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a class="dropdown-item" href="#" onclick="addracks('0')">0</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addracks('1')">1</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addracks('2')">2</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addracks('3')">3</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addracks('4')">4</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addracks('5')">5</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="addracks('6')">6</a></li>
                                            
                                        </ul>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row" id="racksInputs"></div><hr>
                        

                        <script>

                        function addchair(value) {
                            document.getElementById('addchair').value = value;
                            var chairinputs = document.getElementById('chairInputs');
                            chairinputs.innerHTML = "";
                            for(i=1; i<=value; i++){
        
                                let colDiv = document.createElement('div');
                                colDiv.className = 'col-4';
                                

                                let formGroup = document.createElement('div');
                                formGroup.className = 'form-group mb-3';
                                
    
                                let label = document.createElement('label');
                                label.setAttribute('for', 'chair' + i);
                                label.textContent = i + ' Chair ID';
                                

                                let input = document.createElement('input');
                                input.type = 'text';
                                input.className = 'form-control';
                                input.id = 'chair' + i;
                                input.name = 'chair' + i;
                                input.placeholder = 'Enter Chair ID';
                                input.required = true;

                                let statusDiv = document.createElement('div');
                                statusDiv.className = 'form-check form-switch';

                                let statusInput = document.createElement('input');
                                statusInput.className = 'form-check-input';
                                statusInput.type = 'checkbox';
                                statusInput.role = 'switch';
                                statusInput.id = 'statuschair' + i;
                                statusInput.name = 'statuschair' + i;
                                statusInput.value = 'Damaged'

                                let statusLabel = document.createElement('label');
                                statusLabel.className = 'form-check-label';
                                statusLabel.for = 'statuschair' + i;
                                statusLabel.innerHTML = 'Damaged';

                                statusDiv.appendChild(statusInput);
                                statusDiv.appendChild(statusLabel);


                                formGroup.appendChild(label);
                                formGroup.appendChild(input);
                                colDiv.appendChild(formGroup);
                                colDiv.appendChild(statusDiv);
                                chairinputs.appendChild(colDiv);
                            }
                        }

                        function adddesk(value) {
                            document.getElementById('adddesk').value = value;
                            var deskinputs = document.getElementById('deskInputs');
                            deskinputs.innerHTML = "";
                            for(i=1; i<=value; i++){
        
                                let colDiv = document.createElement('div');
                                colDiv.className = 'col-4';
                                

                                let formGroup = document.createElement('div');
                                formGroup.className = 'form-group mb-3';
                                
    
                                let label = document.createElement('label');
                                label.setAttribute('for', 'desk' + i);
                                label.textContent = i + ' Desk ID ';
                                

                                let input = document.createElement('input');
                                input.type = 'text';
                                input.className = 'form-control';
                                input.id = 'desk' + i;
                                input.name = 'desk' + i;
                                input.placeholder = 'Enter Desk ID';
                                input.required = true;

                                let statusDiv = document.createElement('div');
                                statusDiv.className = 'form-check form-switch';

                                let statusInput = document.createElement('input');
                                statusInput.className = 'form-check-input';
                                statusInput.type = 'checkbox';
                                statusInput.role = 'switch';
                                statusInput.id = 'statusdesk' + i;
                                statusInput.name = 'statusdesk' + i;
                                statusInput.value = 'Damaged'

                                let statusLabel = document.createElement('label');
                                statusLabel.className = 'form-check-label';
                                statusLabel.for = 'statusdesk' + i;
                                statusLabel.innerHTML = 'Damaged';

                                statusDiv.appendChild(statusInput);
                                statusDiv.appendChild(statusLabel);


                                formGroup.appendChild(label);
                                formGroup.appendChild(input);
                                colDiv.appendChild(formGroup);
                                colDiv.appendChild(statusDiv);
                                deskinputs.appendChild(colDiv);
                            }
                        }


                        function addbed(value) {
                            document.getElementById('addbed').value = value;
                            var bedinputs = document.getElementById('bedInputs');
                            bedinputs.innerHTML = "";
                            for(i=1; i<=value; i++){
        
                                let colDiv = document.createElement('div');
                                colDiv.className = 'col-4';
                                

                                let formGroup = document.createElement('div');
                                formGroup.className = 'form-group mb-3';
                                
    
                                let label = document.createElement('label');
                                label.setAttribute('for', 'bed' + i);
                                label.textContent = i + ' bed ID ';
                                

                                let input = document.createElement('input');
                                input.type = 'text';
                                input.className = 'form-control';
                                input.id = 'bed' + i;
                                input.name = 'bed' + i;
                                input.placeholder = 'Enter bed ID';
                                input.required = true;

                                let statusDiv = document.createElement('div');
                                statusDiv.className = 'form-check form-switch';

                                let statusInput = document.createElement('input');
                                statusInput.className = 'form-check-input';
                                statusInput.type = 'checkbox';
                                statusInput.role = 'switch';
                                statusInput.id = 'statusbed' + i;
                                statusInput.name = 'statusbed' + i;
                                statusInput.value = 'Damaged'

                                let statusLabel = document.createElement('label');
                                statusLabel.className = 'form-check-label';
                                statusLabel.for = 'statusbed' + i;
                                statusLabel.innerHTML = 'Damaged';

                                statusDiv.appendChild(statusInput);
                                statusDiv.appendChild(statusLabel);


                                formGroup.appendChild(label);
                                formGroup.appendChild(input);
                                colDiv.appendChild(formGroup);
                                colDiv.appendChild(statusDiv);
                                bedinputs.appendChild(colDiv);
                            }
                        }


                        function addmettress(value) {
                            document.getElementById('addmettress').value = value;
                            var mettressinputs = document.getElementById('mettressInputs');
                            mettressinputs.innerHTML = "";
                            for(i=1; i<=value; i++){
        
                                let colDiv = document.createElement('div');
                                colDiv.className = 'col-4';
                                

                                let formGroup = document.createElement('div');
                                formGroup.className = 'form-group mb-3';
                                
    
                                let label = document.createElement('label');
                                label.setAttribute('for', 'mettress' + i);
                                label.textContent = i + ' mettress ID ';
                                

                                let input = document.createElement('input');
                                input.type = 'text';
                                input.className = 'form-control';
                                input.id = 'mettress' + i;
                                input.name = 'mettress' + i;
                                input.placeholder = 'Enter mettress ID';
                                input.required = true;

                                let statusDiv = document.createElement('div');
                                statusDiv.className = 'form-check form-switch';

                                let statusInput = document.createElement('input');
                                statusInput.className = 'form-check-input';
                                statusInput.type = 'checkbox';
                                statusInput.role = 'switch';
                                statusInput.id = 'statusmettress' + i;
                                statusInput.name = 'statusmettress' + i;
                                statusInput.value = 'Damaged'

                                let statusLabel = document.createElement('label');
                                statusLabel.className = 'form-check-label';
                                statusLabel.for = 'statusmettress' + i;
                                statusLabel.innerHTML = 'Damaged';

                                statusDiv.appendChild(statusInput);
                                statusDiv.appendChild(statusLabel);


                                formGroup.appendChild(label);
                                formGroup.appendChild(input);
                                colDiv.appendChild(formGroup);
                                colDiv.appendChild(statusDiv);
                                mettressInputs.appendChild(colDiv);
                            }
                        }


                        function addlockers(value) {
                            document.getElementById('addlockers').value = value;
                            var lockersinputs = document.getElementById('lockersInputs');
                            lockersinputs.innerHTML = "";
                            for(i=1; i<=value; i++){
        
                                let colDiv = document.createElement('div');
                                colDiv.className = 'col-4';
                                

                                let formGroup = document.createElement('div');
                                formGroup.className = 'form-group mb-3';
                                
    
                                let label = document.createElement('label');
                                label.setAttribute('for', 'locker' + i);
                                label.textContent = i + ' locker ID ';
                                

                                let input = document.createElement('input');
                                input.type = 'text';
                                input.className = 'form-control';
                                input.id = 'locker' + i;
                                input.name = 'locker' + i;
                                input.placeholder = 'Enter locker ID';
                                input.required = true;

                                let statusDiv = document.createElement('div');
                                statusDiv.className = 'form-check form-switch';

                                let statusInput = document.createElement('input');
                                statusInput.className = 'form-check-input';
                                statusInput.type = 'checkbox';
                                statusInput.role = 'switch';
                                statusInput.id = 'statuslocker' + i;
                                statusInput.name = 'statuslocker' + i;
                                statusInput.value = 'Damaged'

                                let statusLabel = document.createElement('label');
                                statusLabel.className = 'form-check-label';
                                statusLabel.for = 'statuslocker' + i;
                                statusLabel.innerHTML = 'Damaged';

                                statusDiv.appendChild(statusInput);
                                statusDiv.appendChild(statusLabel);


                                formGroup.appendChild(label);
                                formGroup.appendChild(input);
                                colDiv.appendChild(formGroup);
                                colDiv.appendChild(statusDiv);
                                lockersinputs.appendChild(colDiv);
                            }
                        }


                        function addracks(value) {
                            document.getElementById('addracks').value = value;
                            var rackinputs = document.getElementById('racksInputs');
                            rackinputs.innerHTML = "";
                            for(i=1; i<=value; i++){
        
                                let colDiv = document.createElement('div');
                                colDiv.className = 'col-4';
                                

                                let formGroup = document.createElement('div');
                                formGroup.className = 'form-group mb-3';
                                
    
                                let label = document.createElement('label');
                                label.setAttribute('for', 'rack' + i);
                                label.textContent = i + ' Rack ID ';
                                

                                let input = document.createElement('input');
                                input.type = 'text';
                                input.className = 'form-control';
                                input.id = 'rack' + i;
                                input.name = 'rack' + i;
                                input.placeholder = 'Enter Rack ID';
                                input.required = true;

                                let statusDiv = document.createElement('div');
                                statusDiv.className = 'form-check form-switch';

                                let statusInput = document.createElement('input');
                                statusInput.className = 'form-check-input';
                                statusInput.type = 'checkbox';
                                statusInput.role = 'switch';
                                statusInput.id = 'statusrack' + i;
                                statusInput.name = 'statusrack' + i;
                                statusInput.value = 'Damaged'

                                let statusLabel = document.createElement('label');
                                statusLabel.className = 'form-check-label';
                                statusLabel.for = 'statusrack' + i;
                                statusLabel.innerHTML = 'Damaged';

                                statusDiv.appendChild(statusInput);
                                statusDiv.appendChild(statusLabel);


                                formGroup.appendChild(label);
                                formGroup.appendChild(input);
                                colDiv.appendChild(formGroup);
                                colDiv.appendChild(statusDiv);
                                rackinputs.appendChild(colDiv);
                            }
                        }

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

                        // const alertTrigger = document.getElementById('liveAlertBtn')
                        // if (alertTrigger) {
                        //     alertTrigger.addEventListener('click', () => {
                        //         appendAlert('Nice, you triggered this alert message!', 'danger')
                        //     })
                        // }
                        </script>




                                <div class="card-action text-center d-flex justify-content-between">
                                                    <button class="btn"></button>


                                                    <button type="submit" name="addroom" id="addroom" class="btn btn-success ">ADD ROOM</button>

                                 </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS Bundle with Popper.js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- Fonts and icons -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <?php include '../libraries/script.php';?>
</body>
</html>

<?php 

if(isset($_POST['addroom'])){

    $roomNum = $_POST['roomNo'];

    $chairs = $_POST['addchair'];
    $desks = $_POST['adddesk'];
    $beds = $_POST['addbed'];
    $mettresses = $_POST['addmettress'];
    $lockers = $_POST['addlockers'];
    $racks = $_POST['addracks'];

    if($roomNum != ''){
        $sql="INSERT INTO  room(roomNo) VALUES('$roomNum')";
        if (mysqli_query($conn, $sql)) {
            // echo "room New record created successfully";
            echo "<script>appendAlert('Nice, Room Details Add Success!', 'success');</script>";
            // appendAlert('Nice, you triggered this alert message!', 'danger');
        } else {
            // echo "room Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<script>appendAlert('Bad, Room Details Add Failed!', 'danger');</script>";
        }
    }

// ADD CHAIR DETAILS
    if(isset($chairs)){
        if($chairs!=0 && $roomNum != ''){

            for($i=1; $i<=$chairs; $i++){
            //    echo $_POST['chair'."$i"]."<br/>";
                $chairId = $_POST['chair'."$i"];
                $statusChair = $_POST['statuschair'."$i"];
                if($statusChair != 'Damaged'){
                    $statusChair = 'Good';
                }

                $sql="INSERT INTO  chair(chairID, demageState, roomNo) VALUES('$chairId','$statusChair','$roomNum')";
                if (mysqli_query($conn, $sql)) {
                    // echo "chairs New record created successfully";
                    $chairAlart = 'success';
                } else {
                    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    $chairAlart = 'fail';
                }
            
            }

        }
    }

// ADD DESK DETAILS
    if(isset($desks)){
        if($desks!=0){
            for($i=1; $i<=$desks; $i++){
                $deskId = $_POST['desk'."$i"];
                $statusDesk = $_POST['statusdesk'."$i"];
                if($statusDesk != 'Damaged'){
                    $statusDesk = 'Good';
                }

                $sql="INSERT INTO  desk(deskID, demageState, roomNo) VALUES('$deskId','$statusDesk','$roomNum')";
                if (mysqli_query($conn, $sql)) {
                    // echo "desks New record created successfully";
                    $deskAlart = 'success';
                } else {
                    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    $deskAlart = 'fail';
                }
            
            }

        }
    }


// ADD beds DETAILS
    if(isset($beds)){
        if($beds!=0){
            for($i=1; $i<=$beds; $i++){
                $bedId = $_POST['bed'."$i"];
                $statusBed = $_POST['statusbed'."$i"];
                if($statusBed != 'Damaged'){
                    $statusBed = 'Good';
                }

                $sql="INSERT INTO  bed(bedID, demageState, roomNo) VALUES('$bedId','$statusBed','$roomNum')";
                if (mysqli_query($conn, $sql)) {
                    // echo "beds New record created successfully";
                    $bedAlart = 'success';
                } else {
                    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    $bedAlart = 'fail';
                }
            
            }

        }
    }


// ADD METTRESSES DETAILS
    if(isset($mettresses)){
        if($mettresses!=0){
            for($i=1; $i<=$mettresses; $i++){
                $mettressId = $_POST['mettress'."$i"];
                $statusMettress = $_POST['statusmettress'."$i"];
                if($statusMettress != 'Damaged'){
                    $statusMettress = 'Good';
                }

                $sql="INSERT INTO  mettress(mettressID, demageState, roomNo) VALUES('$mettressId','$statusMettress','$roomNum')";
                if (mysqli_query($conn, $sql)) {
                    // echo "mettress New record created successfully";
                    $mettressAlart = 'success';
                } else {
                    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    $mettressAlart = 'fail';
                }
            
            }

        }
    }


// ADD LOCKERS DETAILS
    if(isset($lockers)){
        if($lockers!=0){
            for($i=1; $i<=$lockers; $i++){
                $lockersId = $_POST['lockers'."$i"];
                $statusLockers = $_POST['statuslockers'."$i"];
                if($statusLockers != 'Damaged'){
                    $statusLockers = 'Good';
                }

                $sql="INSERT INTO  locker(lockerID, demageState, roomNo) VALUES('$lockersId','$statusLockers','$roomNum')";
                if (mysqli_query($conn, $sql)) {
                    // echo "lockers New record created successfully";
                    $lockerAlart = 'success';
                } else {
                    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    $lockerAlart = 'fail';
                }
            
            }

        }
    }


// ADD RACKS DETAILS
    if(isset($racks)){
        if($racks!=0){
            for($i=1; $i<=$racks; $i++){
                $rackId = $_POST['rack'."$i"];
                $statusRack = $_POST['statusrack'."$i"];
                if($statusRack != 'Damaged'){
                    $statusRack = 'Good';
                }

                $sql="INSERT INTO  rack(rackID, demageState, roomNo) VALUES('$rackId','$statusRack','$roomNum')";
                if (mysqli_query($conn, $sql)) {
                    // echo "New record created successfully";
                    $rackAlart = 'success';
                } else {
                    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    $rackAlart = 'fail';

                }
            
            }

        }
    }
}


if($chairAlart && $deskAlart && $bedAlart && $mettressAlart && $lockerAlart && $rackAlart){
    
    if(($chairAlart == 'success') && ($deskAlart=='success' ) && ($bedAlart=='success') && ($mettressAlart == 'success') && ($lockerAlart == 'success') && ($rackAlart == 'success')){
        $allDetailAlart = 'ok';
        echo "<script>appendAlert('Nice, All Room Components Details Add Success!', 'success');</script>";
    }else if(($chairAlart == 'fail') && ($deskAlart=='fail' ) && ($bedAlart=='fail') && ($mettressAlart == 'fail') && ($lockerAlart == 'fail') && ($rackAlart == 'fail')){
        $allDetailAlart = 'ok';
        echo "<script>appendAlert('Bad, All Room Components Add Faild! Try Again', 'danger');</script>";
    }else{
        $allDetailAlart = 'ok';
        echo "<script>appendAlert('Warning!, chair details add " .$chairAlart." ! <br> desk details add " .$deskAlart." ! <br> Bed details add " .$bedAlart. " ! <br> Mettress details add " .$mettressAlart. " ! <br> Locker details add " .$lockerAlart. " ! <br> Rack details add " .$rackAlart. " !', 'warning');</script>";
    }
}

if($allDetailAlart != 'ok'){
   if($chairAlart == 'success'){
    echo "<script>appendAlert('Nice, Chair Details Add Success !', 'success');</script>";
   } else if($chairAlart == 'fail'){
    echo "<script>appendAlert('Bad, Chair Details Add failed !', 'danger');</script>";
   }

   if($deskAlart == 'success'){
    echo "<script>appendAlert('Nice, Desk Details Add Success !', 'success');</script>";
   } else if($deskAlart == 'fail'){
    echo "<script>appendAlert('Bad, Desk Details Add failed !', 'danger');</script>";
   }

   if($bedAlart == 'success'){
    echo "<script>appendAlert('Nice, Bed Details Add Success !', 'success');</script>";
   } else if($bedAlart == 'fail'){
    echo "<script>appendAlert('Bad, Bed Details Add failed !', 'danger');</script>";
   }

   if($mettressAlart == 'success'){
    echo "<script>appendAlert('Nice, Mettress Details Add Success !', 'success');</script>";
   } else if($mettressAlart == 'fail'){
    echo "<script>appendAlert('Bad, Mettress Details Add failed !', 'danger');</script>";
   }

   if($lockerAlart == 'success'){
    echo "<script>appendAlert('Nice, Locker Details Add Success !', 'success');</script>";
   } else if($lockerAlart == 'fail'){
    echo "<script>appendAlert('Bad, Locker Details Add failed !', 'danger');</script>";
   }

   if($rackAlart == 'success'){
    echo "<script>appendAlert('Nice, Racks Details Add Success !', 'success');</script>";
   } else if($rackAlart == 'fail'){
    echo "<script>appendAlert('Bad, Racks Details Add failed !', 'danger');</script>";
   }
}

} ?>

