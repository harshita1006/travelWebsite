<?php
    require 'config.php';
    $msg="";
    if(isset($_POST['submit']))
    {
        $p_name=$_POST['pName'];
        $p_desc=$_POST['pDesc'];
        $iday1=$_POST['iday1'];
        $iday2=$_POST['iday2'];
        $iday3=$_POST['iday3'];
        $iday4=$_POST['iday4'];
        $iday5=$_POST['iday5'];
        $iday6=$_POST['iday6'];
        $p_price=$_POST['pPrice'];

        $target_dir="images/";
        $target_file=$target_dir.basename($_FILES['pImage']["name"]);
        move_uploaded_file($_FILES['pImage']["tmp_name"],$target_file);
        $target_file1=$target_dir.basename($_FILES['pImage1']["name"]);
        move_uploaded_file($_FILES['pImage']["tmp_name"],$target_file1);
        $target_file2=$target_dir.basename($_FILES['pImage2']["name"]);
        move_uploaded_file($_FILES['pImage']["tmp_name"],$target_file2);

        $sql= "INSERT into Packages (package_name,p_description,iday1,iday2,iday3,iday4,iday5,iday6,package_price,p_image,p_image1,p_image2)
        VALUES ('$p_name','$p_desc','$iday1','$iday2','$iday3','$iday4','$iday5','$iday6','$p_price','$target_file','$target_file1','$target_file2')";
        if(mysqli_query($conn,$sql))
        {
            $msg="Package added to the database successfully.";
        }
        else
        {
            $msg="Failed to add the Package.";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Package Details</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-light mt-5 rounded"> 
                    <h2 class="text-center p-2">Add Package Details</h2>
                    <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                        <div class="form-group">
                            <input type="text" name="pName" class="form-control" placeholder="Package Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="pDesc" class="form-control" placeholder="Package Description" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="pPrice" class="form-control" placeholder="Package Price" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="iday1" class="form-control" placeholder="Itinerary Day 1" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="iday2" class="form-control" placeholder="Itinerary Day 2" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="iday3" class="form-control" placeholder="Itinerary Day 3" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="iday4" class="form-control" placeholder="Itinerary Day 4" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="iday5" class="form-control" placeholder="Itinerary Day 5" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="iday6" class="form-control" placeholder="Itinerary Day 6" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="pImage" class="custom-file-input" placeholder="customFile" required>
                                <label for="customFile" class="custom-file-label">Choose Image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="pImage1" class="custom-file-input" placeholder="customFile" required>
                                <label for="customFile" class="custom-file-label">Choose Image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="pImage2" class="custom-file-input" placeholder="customFile" required>
                                <label for="customFile" class="custom-file-label">Choose Image</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add">
                        </div>
                        <div class="form-group">
                            <h4 class="text-center"><?= $msg; ?></h4>
                        </div>
                    </form>
                </div>
            </div>
            <div class= "row justify-content-center">
                <div class="col-md-6 mt-3 p-4 bg-light rounded">
                    <a href="package.php" class="btn btn-warning btn-block btn-lg">Go to Packages</a>
                </div>
            </div>
        </div>
    </body>
</html>