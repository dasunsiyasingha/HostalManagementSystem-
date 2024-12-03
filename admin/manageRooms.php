<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* Sticky Footer Layout */
        html, body {
            height: 100%;
            margin: 0;
        }

        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrap {
            flex: 1 0 auto;
        }

        .footer {
            flex-shrink: 0;
            background-color: #1f2937;
            padding: 1rem 0;
        }

        .menu-card {
            border-radius: 15px;
            min-height: 120px;
            transition: transform 0.3s;
            width: 100%;
            max-width: 150px;
            margin: 0 auto;
        }
        
        .menu-card:hover {
            transform: translateY(-5px);
        }

        .menu-card.blue {
            background-color: #0d6efd;
        }

        .menu-card.green {
            background-color: #198754;
        }

        .menu-icon {
    font-size: 2.5rem; /* Adjust icon size */
    margin-top: 1rem; /* Add spacing if needed */
    z-index: 2; /* Ensure it's visible over backgrounds */
}


        .dashboard-container {
            background-color: #b9fff2;
            border-radius: 25px;
            width: 100%;
            padding: 2rem;
            margin: 1rem 0;
        }

        .navbar {
            background-color: #2d3e50 !important;
        }

        .btn-purple {
            background-color: #6f42c1;
            border-color: #6f42c1;
            color: white;
            border-radius: 50px;
            padding: 10px 25px;
            width: 100%;
            max-width: 300px;
            margin: 0.5rem 0;
        }

        .btn-purple:hover {
            background-color: #5a32a3;
            border-color: #5a32a3;
            color: white;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .nav-link:hover {
            color: white !important;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            background-color: #4b5563;
            border-radius: 50%;
        }
        .custom-card {
    height: 15rem; /* Adjust height as per requirement */
    width: 8rem; /* Adjust width for proportional design */
    border-radius: 70px; /* Rounded corners */
    background: linear-gradient(to bottom, #31ce35 50%, #31ce35 50%);
    /* Green gradient with two distinct shades */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
    transition: transform 0.3s;
    position: relative;
}

.custom-card {
    position: relative;
    height: 17rem; /* Card height */
    width: 8rem; /* Card width */
    border-radius: 60px; /* Entire card rounding */
    overflow: hidden; /* To clip the inner shape */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #28a745; /* Top color */
}



        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .menu-card {
                min-height: 100px;
                max-width: 100px;
            }

            .menu-icon {
                font-size: 1.5rem;
            }

            .btn-purple {
                max-width: 100%;
            }

            .modal-dialog {
                margin: 1.75rem 0.5rem;
            }
        }

        @media (max-width: 576px) {
            .menu-card {
                min-height: 80px;
                max-width: 80px;
            }

            .menu-icon {
    font-size: 2.5rem; /* Adjust icon size */
    margin-top: 1rem; /* Add spacing if needed */
    z-index: 2; /* Ensure it's visible over backgrounds */
}


            .dashboard-container {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body class="page-container">
    <!-- Navbar -->
    <?php include '../components/header.php';?>
    
    <!-- Main Content Wrapper -->
    <div class="content-wrap">
        <!-- Main Content -->
        <div class="container-fluid px-3">
            <div class="dashboard-container mt-5" style="min-height: 30rem;">
                <!-- Menu Grid -->
                <div class="row g-3 justify-content-center mb-4">
                    <div class="col-4 col-md-2">
                       <div class="menu-card green text-white d-flex flex-column align-items-center justify-content-center" style="height: 15rem;">
                            <i class="bi bi-hospital menu-icon mb-2"></i>
                            <span class="text-center">ROOMS</span>
                        </div>
                    </div>
                    <!-- Rooms -->
                    <div class="col-4 col-md-2">
                    <div class="menu-card green text-white d-flex flex-column align-items-center justify-content-center" style="height: 15rem;">
                            <i class="bi bi-chevron-bar-contract menu-icon mb-2"></i>
                            <span class="text-center">CHAIRS</span>
                        </div>
                    </div>
                    <!-- Beds -->
                    <!-- Tables -->
                    <div class="col-4 col-md-2">
                        <div class="menu-card blue text-white d-flex flex-column align-items-center justify-content-center" style="height: 15rem;">
                            <i class="bi bi-table menu-icon mb-2"></i>
                            <span class="text-center">TABLES</span>
                        </div>
                    </div>
                    <!-- Chairs -->
                    <div class="col-4 col-md-2">
                        <div class="menu-card green text-white d-flex flex-column align-items-center justify-content-center" style="height: 15rem;">
                        <img src="../assets/picture/adlog-bg (2).png" alt="Hostel Management Image" style="width:68rem;margin-top:-10rem">
                            <span class="text-center">TOWAL RACK</span>
                        </div>
                    </div>
                    <!-- Security -->
                    <div class="col-4 col-md-2">
                        <div class="menu-card blue text-white d-flex flex-column align-items-center justify-content-center" style="height: 15rem;">
                            <i class="bi bi-shield-lock menu-icon mb-2"></i>
                            <span class="text-center">SECURITY</span>
                        </div>
                    </div>
                    <!-- Fans -->
                    <div class="col-4 col-md-2">
                        <div class="menu-card green text-white d-flex flex-column align-items-center justify-content-center" style="height: 15rem;">
                            <i class="bi bi-fan menu-icon mb-2"></i>
                            <span class="text-center">FANS</span>
                        </div>
                    </div>
                </div>

                <!-- Action Section -->
                <div class="row justify-content-center mt-5">
                    <div class="col-12 col-md-6 text-center mb-3 mt-5">
                        <button class="btn btn-purple cursor: pointer;" role="button" onclick="location.href='roomAdd.php';" >
                            ADD ROOM DETAILS
                        </button>
                    </div>
                    <div class="col-12 col-md-6 text-center mt-5">
                        <button class="btn btn-purple pointer;" role="button" onclick="location.href='updateRoom.php';" >
                            UPDATE ROOM DETAILS
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center text-secondary py-3">
        <p class="mb-1">© 2024 Hostel Management System. All Rights Reserved.</p>
        <p class="mb-2">Developed by Dinu & Dassa Web House</p>
        <div>
            <a href="#" class="text-secondary text-decoration-none">Privacy Policy</a>
            <span class="mx-2">|</span>
            <a href="#" class="text-secondary text-decoration-none">Terms of Service</a>
            <span class="mx-2">|</span>
            <a href="#" class="text-secondary text-decoration-none">Support</a>
        </div>
    </footer>

    <!-- Modals remain the same as in previous version -->
    <!-- Add Room Modal -->
    <div class="modal fade" id="addRoomModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Room Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addRoomForm">
                        <div class="mb-3">
                            <label class="form-label">Room Number</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Capacity</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Floor</label>
                            <input type="number" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="addRoomForm" class="btn btn-primary">Add Room</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Room Modal -->
    <div class="modal fade" id="updateRoomModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Room Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="updateRoomForm">
                        <div class="mb-3">
                            <label class="form-label">Select Room</label>
                            <select class="form-select" required>
                                <option value="">Choose room...</option>
                                <option value="101">Room 101</option>
                                <option value="102">Room 102</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Capacity</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option value="available">Available</option>
                                <option value="occupied">Occupied</option>
                                <option value="maintenance">Under Maintenance</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="updateRoomForm" class="btn btn-primary">Update Room</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Form submission handlers
        document.getElementById('addRoomForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add room logic here
            const modal = bootstrap.Modal.getInstance(document.getElementById('addRoomModal'));
            modal.hide();
        });

        document.getElementById('updateRoomForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Update room logic here
            const modal = bootstrap.Modal.getInstance(document.getElementById('updateRoomModal'));
            modal.hide();
        });
    </script>
</body>
</html>