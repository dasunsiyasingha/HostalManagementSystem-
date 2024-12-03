<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: #f9f9f9;
      color: #333;
      font-family: 'Roboto', sans-serif;
    }

    .container-main {
      margin-top: 30px;
    }

    .room-details {
      background-color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .room-details h3 {
      color: #007bff;
      font-weight: bold;
    }

    .room-details ul {
      list-style-type: none;
      padding: 0;
    }

    .room-details ul li::before {
      content: "\f0da";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      color: #007bff;
      margin-right: 10px;
    }

    .message-box {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 15px;
      padding: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .message-header {
      color: #333;
      font-size: 18px;
      font-weight: bold;
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
      margin-bottom: 15px;
    }

    .message {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
      background-color: #f8f9fa;
      padding: 10px;
      border-radius: 10px;
      color: #333;
    }

    .message-btns button {
      margin-left: 5px;
    }

    .message-btns .btn-success {
      background-color: #28a745;
      border: none;
    }

    .message-btns .btn-danger {
      background-color: #dc3545;
      border: none;
    }

    .input-box {
      display: flex;
      margin-top: 15px;
    }

    .input-box input {
      flex: 1;
      margin-right: 5px;
    }

    .input-box .btn-primary {
      background-color: #007bff;
      border: none;
    }
  </style>
</head>

<body>
  <?php include '../components/header.php'; ?>

  <div class="container container-main">
    <div class="row g-4">
      <!-- Room Details -->
      <div class="col-md-7">
        <div class="room-details">
          <h3 class="text-center">MY ROOM DETAILS</h3>
          <p><strong>Room Number:</strong> 34</p>
          <p><strong>Room Members:</strong></p>
          <ul>
            <li>A.K. Bandara</li>
            <li>B. Puwakbadilla</li>
            <li>C.F. Ponchitha</li>
          </ul>
          <img class="img-fluid mx-auto d-block" src="../assets/picture/Myroom.png" alt="Room Image" style="max-height: 287px;">
        </div>
      </div>

      <!-- Warden Messages -->
      <div class="col-md-5">
        <div class="message-box" style="height: 33.5rem; position: relative; padding-bottom: 60px;">
          <h4 class="message-header">Warden</h4>
          <!-- <div class="message" style="height: calc(100% - 100px); overflow-y: auto; margin-bottom: px; padding: 10px; background-color: #f8f9fa; border-radius: 10px;"> -->
          <!-- Message content -->
          <div class="col-md-12  d-flex align-items-center justify-content cont-massage  position: absolute; top: 0;">
            <!-- Message Text -->
                  <div class="message-text" style="color: black; flex: 1; max-width: 100%; overflow-wrap: break-word;">
                    <span>I want to go to the hospital to meet my doctor</span>
                  </div>


                <div class="col-md-5 " style="height: 3rem;">

                        <div class="message-btns" style="margin-left: 7rem;">
                          <button class="btn btn-success btn-sm me-1">Accept</button>
                          <!-- <button class="btn btn-danger btn-sm">Decline</button> -->
                        </div>
                 </div>
           </div>
           <div class="col-md-12  d-flex align-items-center justify-content cont-massage  position: absolute; top: 0;">
            <!-- Message Text -->
                  <div class="message-text" style="color: black; flex: 1; max-width: 100%; overflow-wrap: break-word;">
                    <span>I want to go to the hospital to meet my doctor</span>
                  </div>


                <div class="col-md-5 " style="height: 3rem;">

                        <div class="message-btns" style="margin-left: 7rem;">
                          <button class="btn btn-success btn-sm me-1">Accept</button>
                          <!-- <button class="btn btn-danger btn-sm">Decline</button> -->
                        </div>
                 </div>
           </div>

           

          
            <!-- Fixed input box -->
            <div class="input-box" style="position: absolute; bottom: 10px; left: 15px; right: 15px; display: flex; gap: 10px;">
              <input class="form-control" type="text" placeholder="Type your reason for being late">
              <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send</button>
            </div>
          </div>
        </div>

    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include '../components/footer.php'; ?>
</body>

</html>