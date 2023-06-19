<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <link rel="stylesheet" href="assets/css/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/Ludens---Create-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Ludens---Sleek-Image-Input-with-Preview.css">
</head>

<body id="page-top">
    <?php
    session_name('mentor');
    session_start();
    include "connect.php";
    // $_SESSION['mentor_id'] 
    // $_SESSION['first_name'] 
    // $_SESSION['last_name']
    // $_SESSION['email'] 
    // $_SESSION['image_path']
    $email = $_SESSION['email'];

    $image_path = $_SESSION['image_path'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    
    // Get the mentor id
    $mentor_id = $_SESSION['mentor_id'];

    // Get the mentor info
    $sql = "SELECT * FROM Mentor WHERE mentor_id = :mentor_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':mentor_id', $mentor_id, PDO::PARAM_INT);
    $stmt->execute();

    // Check if the mentor exists
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $image_path = $row['image_path'];
        $title = $row['title'];
        $introduction = $row['introduction'];
        $about_me = $row['about_me'];
        $position = $row['position'];
        $how_it_works = $row['how_it_works'];
        $why_choose_me = $row['why_choose_me'];
        $what_you_will_learn = $row['what_you_will_learn'];
        $session_image_path = $row['session_image_path'];
        $full_name = $first_name . ' ' . $last_name;
         ?>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbarstyle">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex align-items-center" href="homepage.php">
                    <div class="d-flex" style="margin-left: 26px;"><span data-aos="fade-right" data-aos-duration="1000" style="margin-left: -32px;"><img src="assets/img/icons8-dumbbell-50%201.svg" width="48" height="97"><span style="font-family: 'Vidaloka';margin-left: 8px;">MENTORINI</span></span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar-1">
                    <li class="nav-item"><a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="upcoming-sessions.php"><i class="icon ion-android-arrow-dropright-circle"></i><span>upcoming sessions</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="archieve-sessions.php"><i class="icon ion-android-archive"></i><span>Archieve&nbsp; sessions</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="declined-sessions.php"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">

                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM8.70711 7.29289C8.31658 6.90237 7.68342 6.90237 7.29289 7.29289C6.90237 7.68342 6.90237 8.31658 7.29289 8.70711L8.58579 10L7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071C7.68342 13.0976 8.31658 13.0976 8.70711 12.7071L10 11.4142L11.2929 12.7071C11.6834 13.0976 12.3166 13.0976 12.7071 12.7071C13.0976 12.3166 13.0976 11.6834 12.7071 11.2929L11.4142 10L12.7071 8.70711C13.0976 8.31658 13.0976 7.68342 12.7071 7.29289C12.3166 6.90237 11.6834 6.90237 11.2929 7.29289L10 8.58579L8.70711 7.29289Z" fill="currentColor"></path>
                            </svg><span>declined sessions</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle-1" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $full_name; ?></span><img class="border rounded-circle img-profile" src="<?php echo $image_path; ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">User Settings</p>
                                </div>
                                <div class="card-body">
                                    <form action="update-profil.php" method="post" id="form" class="form" enctype="multipart/form-data">
                                        <div class="row" style="margin-bottom: 25px;text-align: left;">
                                            <div class="col-md-6">
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" placeholder="John" name="first_name" required="" value="<?php echo $first_name; ?>"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" placeholder="Doe" name="last_name" required=""  value="<?php echo $last_name; ?>"></div>
                                            </div>
                                            <div class="col-sm-8 col-md-8 col-lg-9 col-xl-10 col-xxl-10 align-self-center">
                                                <div class="row">
                                                    <div class="col-md-12 text-start">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email-1" placeholder="user@example.com" name="email" required=""  value="<?php echo $email; ?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-start">
                                                <div class="mb-3"><label class="form-label" for="username"><strong>Current Password</strong></label><input class="form-control" type="password" id="password" placeholder="Password" name="current_password"></div>
                                            </div>
                                            <div class="col-md-6 text-start">
                                                <div class="mb-3"><label class="form-label" for="username"><strong>New Password</strong></label><input class="form-control" type="password" id="password-1" placeholder="Password" name="new_password"></div>
                                            </div>
                                            <div class="col-md-6 text-start">
                                                <div class="mb-3"><label class="form-label" for="username"><strong>Confirm Password</strong></label><input class="form-control" type="password" id="verifyPassword" placeholder="Password"></div>
                                            </div>
                                            <div class="col">
                                                <p id="emailErrorMsg" class="text-danger" style="display: none;"></p>
                                                <p id="passwordErrorMsg" class="text-danger" style="display: none;"></p>
                                            </div>
                                            <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button class="btn btn-primary btn-sm ment-btn-style" type="submit">Save&nbsp;Settings</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="<?php echo $image_path; ?>" width="160" height="160">
                                    <div class="mb-3">
                                        <div id="modal-open-8">
                                            <div class="modal fade" role="dialog" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4>update profile picture</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-8 col-lg-8 offset-sm-0 offset-md-2">
                                                                    <div class="file-upload-wrapper">
                                                                        <div class="view file-upload" style="padding-bottom: 7px;padding-right: 4px;"><input type="file" id="input-file-now-1" class="file_upload"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-primary btn-sm ment-btn-style" type="button">Change Photo</button><button class="btn btn-warning" style="background-color: rgb(255,139,160);" type="button" data-bs-dismiss="modal">Close</button></div>
                                                    </div>
                                                </div>
                                            </div><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">change your&nbsp; change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow" style="margin-top: 30px;">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Descriptiions Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="edit-personal-profil-infos.php" method="post" id="form" class="form" enctype="multipart/form-data" >
                                                <div class="mb-3">
                                                     <div class="mb-3"><label class="form-label" for="city"><strong>session's image&nbsp;</strong></label><input class="form-control file_upload" type="file" id="input-file-now-1" name="session_image" ></div>
                                                     <label class="form-label" for="address"><strong>Title</strong></label><input class="form-control" type="text" id="address-1" placeholder="Mentorships Program Title" name="title" value="<?php echo $title; ?>">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>Introdution</strong></label><textarea class="form-control" id="signature-1" rows="4" name="introduction" ><?php echo $introduction; ?></textarea></div>
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>About Me:</strong></label><textarea class="form-control" id="signature-2" rows="4" name="about_me" ><?php echo $about_me; ?></textarea></div>
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>Position:</strong></label><textarea class="form-control" id="signature-4" rows="4" name="position"><?php echo $position; ?></textarea ></div>
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>How It Works :</strong></label><textarea class="form-control" id="signature-3" rows="4" name="how_it_works" ><?php echo $how_it_works; ?></textarea></div>
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>Why Choose Me:</strong></label><textarea class="form-control" id="signature-6" rows="4" name="why_choose_me" ><?php echo $why_choose_me; ?></textarea></div>
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>What You Will Learn:</strong></label><textarea class="form-control" id="signature-7" rows="4" name="what_you_will_learn"><?php echo $what_you_will_learn; ?></textarea></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm ment-btn-style" type="submit">Save&nbsp;Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       <?php
     } else {
        echo "The mentor with id $mentor_id does not exist.";
    }
    include "crud-profil-tables.php";
    ?>

            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/Ludens---Create-Edit-Form-Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js"></script>
    <script src="assets/js/Ludens---Create-Edit-Form-Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js"></script>
    <script src="assets/js/Ludens---Create-Edit-Form-theme.js"></script>
    <script src="assets/js/Ludens---Sleek-Image-Input-with-Preview-dependencies.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/zectStudio_12H-Time-Format-scripts.js"></script>
</body>

</html>