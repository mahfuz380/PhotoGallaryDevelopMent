<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <?php 
                        

                        // $reslut = User::findAllUsers();
                        // while($row = mysqli_fetch_array($reslut)){
                        //     echo  $row['id'] . " " . $row['userName'] . "<br>";
                        
                        // }

                        // $foundUser = User::findUsersById(2);
                        // $user = User::instantiation($foundUser); 

                        
                        // echo $user->id . " " . $user->userName;

                        // $users = User::findAllUsers();
                        // foreach ($users as $user) {
                        //     echo $user->userName . "<br>";
                        // }

                        $foundUser = User::findUsersById(2);
                        echo $foundUser->userName;
                     
                        
                        
                        ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->