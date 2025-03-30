<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Navbar</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      
    }

    .navbar {
      position: relative;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 30px;
      background-color: #1c375a;
      color: white;
    }

    .menu {
      position: relative;
      display: flex;
      gap: 30px;
      z-index: 2;
    }

    .menu a {
      text-decoration: none;
      color: white;
      font-size: 16px;
      z-index: 3;
      position: relative;
    }

    .menu::after {
      content: '';
      position: absolute;
      bottom: -15px;
      left: 50%;
      transform: translateX(-50%);
      width: 35rem;
      height: 80px;
      background-color: #324c65;
      clip-path: polygon(20% 0, 90% 0, 70% 100%, 0% 100%);
      z-index: 1;
    }

    .user-section {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-section .icon {
      width: 24px;
      height: 24px;
      background-color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #1c375a;
    }

    .logout {
      color: white;
      cursor: pointer;
      font-size: 20px;
    }

    /* Media query for smaller screen sizes */
    @media screen and (max-width: 768px) {
      .navbar {
        flex-direction: column;
        align-items: flex-start;
        padding: 15px;
      }

      .menu {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        width: 100%;
      }

      .menu::after {
        width: 100%;
        left: 0;
        transform: none;
      }

      .menu a {
        font-size: 14px;
      }

      .user-section {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
      }

      .logout {
        font-size: 18px;
      }
    }

    /* Media query for very small screens */
    @media screen and (max-width: 480px) {
      .menu a {
        font-size: 12px;
      }

      .user-section .icon {
        width: 20px;
        height: 20px;
      }

      .logout {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="logo">Hostel Management System</div>
    <div class="menu">
      <a href="#dashboard">Dashboard</a>
      <a href="#rooms">Rooms</a>
      <a href="#students">Students</a>
      <a href="#reports">Reports</a>
    </div>
    <div class="user-section">
      <div class="user-info">
        <div>Admin</div>
        <div>Dinuka Shalinda</div>
      </div>
      <div class="icon">👤</div>
      <div class="logout">➡</div>
    </div>
  </nav>
</body>
</html>


<!-- <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Hostel Management</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manage Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manage Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header> -->
