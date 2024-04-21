<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';
    }
    else{
        $status = '<b style="color:blue">Voted</b>';
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System (OVS)</title>
    <link rel="stylesheet" href="../css/stylesheet2.css">
</head>
<body>
    <div class="container-fluid" id="mainsection">
        <div class="row bg-black text-white" id="header">
            <div class="col-1">
                <img src="../images/votelogo.gif" width="80px">
            </div>
            <div class="col-11">
                <h3>ONLINE VOTING SYSTEM  <br> <small>Welcome <?php echo $userdata['name'] ?>!</small></h3>
                </div>
            </div>
            
            <br>
            <div id="data">
              <div id="profile">
              <b>Name:</b> <?php echo $userdata['name'] ?> <br><br>
              <b>Mobile:</b> <?php echo $userdata['mobile'] ?> <br><br>
              <b>Status:</b> <?php echo $status ?> <br><br>  

            </div>

            <div id="groups">
                <?php
                    if($_SESSION['groupsdata']){
                        for($i=0; $i<count($groupsdata); $i++){
                            ?>
                            <div>
                                <b>Candidate Name:</b> <?php echo $groupsdata[$i]['name'] ?><br><br>
                                <b>Votes:</b> <?php echo $groupsdata[$i]['votes'] ?> <br><br>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                    <?php 
                                           if($_SESSION['userdata']['status'] ==0){
                                            ?>
                                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                            <?php
                                           }
                                           else{
                                            ?>
                                            <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                                            <?php
                                           }

                                    ?>
                                </form>
                                <br>
                                <hr>

                            </div>
                            
                           
                            <?php
                        }

                    }
                    else{

                    }
                ?>

            </div>
            </div>
            
        
        

        
        <div class="row bg-black text-white" id="footer">
            <div class="col-12">
                <p> &copy; Copyright 2024 - All Rights Reserved <br>
                 Developed by Yogesh Khupse!
                </p>
                <div>
                <a href="logout.php"> <button class="logoutbtn">Logout</button></a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>