<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require 'function/function.php';
$students = getStudentRecords();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
    <script defer src="./assets/js/common.js"></script>
</head>

<body  class="h-100 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10"><h2 class="">Teacher Portal </h2></div>
            <div class="col-md-2"><a href="home.php"  class="home_">  <i class="fa fa-home color-danger"></i> Home</a><a href="logout.php"> Logout <i class="fa fa-sign-out color-danger"></i></a></div>
            
            <!-- <a href="logout.php"><i class="fa fa-logout color-danger"></a> -->
        </div>

        <?php
        if (isset($_SESSION['error_msg'])): ?>
            <div class="alert alert-success err_msg">
                <?php
                $x =  json_decode($_SESSION['error_msg']);
                echo htmlspecialchars($x->error); ?></div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table header-border table-hover verticle-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Marks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="studentTable">
                    <?php foreach ($students as $student): ?>
                        <tr data-id="<?php echo $student['id']; ?>">
                            <td contenteditable="true"><?php echo htmlspecialchars($student['name']); ?></td>
                            <td contenteditable="true"><?php echo htmlspecialchars($student['subject']); ?></td>
                            <td contenteditable="true"><?php echo htmlspecialchars($student['marks']); ?></td>
                            <td>
                                <span><a href="#?uid=<?php echo $student['id']; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" data-bs-toggle="modal" data-bs-target="#upstudentModal" class="updateBtn m-r-4"><i class="fa fa-pencil color-muted m-r-5"></i> </a><a href="function/action.php?sid=<?php echo $student['id']; ?>&action=DELETE" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"><i class="fa fa-trash color-danger"></i></a></span>
                                 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

   



        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addStudentBtn"> Add New Student</button>
    </div>

    <!-- Modal for Adding New Student -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="studentModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add New Student</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="studentForm" method="post" action="function/action.php" class="mt-5 mb-5 login-input">

                    <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name"></div>
                        <div class="form-group">
                        <input class="form-control" type="text" name="subject" placeholder="Subject"></div>
                        <div class="form-group"> <input class="form-control" type="number" name="marks" placeholder="Marks"></div>
                        <div class="form-group">
                            <input class="btn login-form__btn submit w-100" type="submit" value="SUBMIT" name="action">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <!-- Modal for Update Student Data -->

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="upstudentModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Student</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="updateStudentForm" method="post" action="function/action.php" class="mt-5 mb-5 login-input">
                        <input type="hidden" id="uid" name="uid">
                        <div class="form-group">
                        <input class="form-control" type="text" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group"><input class="form-control" type="text" id="subject" name="subject" placeholder="Subject"></div>
                        <div class="form-group"><input class="form-control" type="number" id="marks" name="marks" placeholder="Marks"></div>
                        <div class="form-group"><input class="btn login-form__btn submit w-100" type="submit" value="UPDATE" name="action"></div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <?php unset($_SESSION['error_msg']); ?>

</body>

</html>