<?php
    ob_start();
    session_start();

    //Page Title
    $pageTitle = 'Timing';

    //Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    //Extra JS FILES
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

    //Check If user is already logged in
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Timing</h1>
                
            </div>

            <?php
                $do = '';

                if(isset($_GET['do']) && in_array($_GET['do'], array('Add','Edit')))
                {
                    $do = htmlspecialchars($_GET['do']);
                }
                else
                {
                    $do = 'Manage';
                }

                if($do == 'Manage')
                {
                    $stmt = $con->prepare("SELECT * FROM timing");
                    $stmt->execute();
                    $timing = $stmt->fetchAll(); 

                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Timing</h6>
                            </div>
                            <div class="card-body">
                                
                                

                                <!-- Employees Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Day</th>
                                                <th scope="col">open time</th>
                                                <th scope="col">close time</th>
                                                <th scope="col"> manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($timing as $time)
                                                {
                                                   
                                                    echo "<tr>";
                                                        echo "<td>";
                                                            echo $time['day'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo substr($time['open_time'],0,5);
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo substr($time['close_time'],0,5);
                                                        echo "</td>";
                                                        
                                                        echo "</td>";
                                                        echo "<td>";
                                                            // $delete_data = "delete_employee_".$time["day"];
                                                    ?>
                                                        <ul class="list-inline m-0">

                                                            <!-- EDIT BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Edit">
                                                                <button class="btn btn-success btn-sm rounded-0"style="background-color:#EEB365;border-color:#EEB365;">
                                                                    <a href="timing.php?do=Edit&day=<?php echo $time['day']; ?>" style="color: white;">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                </button>
                                                            </li>

                                                            
                                                        </ul>
                                                    <?php
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                
                    
                elseif($do == 'Edit')
                {
                    $flag_edit_time_form=0;
                    $day = isset($_GET['day'])?strval($_GET['day']):0;

                    if($day)
                    {
                        $stmt = $con->prepare("Select * from timing where day = ?");
                        $stmt->execute(array($day));
                        $time = $stmt->fetch();
                        $count = $stmt->rowCount();

                        if($count > 0)
                        {
                            ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark">Edit timings</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="timing.php?do=Edit&day=<?php echo $day; ?>">
                                        <!-- Employee ID -->
                                        <input type="hidden" name="day" value="<?php echo $time['day'];?>">

                                        <div class="row">
                                            
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="open_time">open time</label>
                                                    <input type="time" class="form-control" value="<?php echo $time['open_time'] ?>" placeholder="opentime" name="open_time">
                                                    <?php
                                                        if(isset($_POST['edit_time']))
                                                        {
                                                            if(empty(test_input($_POST['open_time'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        open time is required
                                                                    </div>
                                                                <?php

                                                                $flag_edit_time_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                    </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="close_time">close time</label>
                                                    <input type="time" class="form-control" value="<?php echo $time['close_time'] ?>"  placeholder="close time" name="close_time">
                                                    <?php
                                                        if(isset($_POST['edit_time']))
                                                        {
                                                            if(empty(test_input($_POST['close_time'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        close_time
                                                                    </div>
                                                                <?php

                                                                $flag_edit_time_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <!-- SUBMIT BUTTON -->
                                        <button type="submit" name="edit_time" class="btn text-dark"style="background-color:#EEB365;border-color:#EEB365;">
                                            Edit time
                                        </button>
                                    </form>
                                    <?php
                                        /*** EDIT EMPLOYEE ***/
                                        if(isset($_POST['edit_time']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_edit_time_form == 0)
                                        {
                                            
                                            $open_time = $_POST['open_time'];
                                            $close_time = test_input($_POST['close_time']);
                                            
                                            $day = $_POST['day'];

                                            try
                                            {
                                                $stmt = $con->prepare("update timing set  open_time = ?, close_time = ? where day = ? ");
                                                $stmt->execute(array($open_time,$close_time,$day));
                                                
                                                ?> 
                                                    <!-- SUCCESS MESSAGE -->

                                                    <script type="text/javascript">
                                                        swal("time Updated","The time has been updated successfully", "success").then((value) => 
                                                        {
                                                            window.location.replace("timing.php");
                                                        });
                                                    </script>

                                                <?php

                                            }
                                            catch(Exception $e)
                                            {
                                                echo "<div class = 'alert alert-danger' style='margin:10px 0px;'>";
                                                    echo 'Error occurred: ' .$e->getMessage();
                                                echo "</div>";
                                            }
                                            
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        else
                        {
                            header('Location: timing.php');
                            exit();
                        }
                    }
                    else
                    {
                        header('Location: timing.php');
                        exit();
                    }
                }
            ?>
        </div>
  
<?php 
        
        //Include Footer
        include 'Includes/templates/footer.php';
    }
    else
    {
        header('Location: login.php');
        exit();
    }

?>