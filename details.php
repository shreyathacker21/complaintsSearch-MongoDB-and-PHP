<?php
/**
 * Created by PhpStorm.
 * User: randyjp
 * Date: 4/29/15
 * Time: 11:27 PM
 */

require_once "Complaint.php";
require_once "DataLayer.php";
require_once "lib.php";
$dl = new DataLayer();
$id = $_GET["id"];
$messages = array();
$success = true;

if(count($_POST)>0)
{
    $id = $_POST["hiddenId"];
    if(!empty($_POST["txtComments"]))
    {
        $dl->addCommentById($id, $_POST["txtComments"]);
        $messages[] = "Comment Added Successfully";
    }
    else
    {
        $messages[] = "Comments can't be empty.";
        $success = false;
    }
}
if(empty($id))
{
    header("location:index.php");
    die();
}
$complaint = $dl->findComplaintById($id);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complaints Details</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <? echo displayMessages($messages,$success);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-7">
                <h1>Complaint # <?echo $complaint->getComplaintId();?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-4 col-md-3">
                <div class="image">
                    <img src="<? echo $complaint->getImage();?> " width="150px" height="150px" class="img-responsive">
                </div>
            </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Product</td>
                        <td><? echo $complaint->getProduct();?></td>
                    </tr>
                    <tr>
                        <td>Issue</td>
                        <td><? echo $complaint->getIssued();?></td>
                    </tr>
                    <tr>
                        <td>Sub-Issue</td>
                        <td><? echo $complaint->getSubIssue();?></td>
                    </tr>
                    <tr>
                        <td>Data Received</td>
                        <td><? echo $complaint->getDateReceived();?></td>
                    </tr>
                    <tr>
                        <td>Company</td>
                        <td><? echo $complaint->getCompany();?></td>
                    </tr>
                    <tr>
                        <td>Company Response</td>
                        <td><? echo $complaint->getCompanyResponse();?></td>
                    </tr>
                    <?
                    foreach($complaint->getComments() as $comment)
                    {
                        echo "<tr>
                                <td>Comment:</td>
                                <td>".$comment['Comment']."</td>
                              </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <form method="post" action="details.php">
                    <div class="form-group">
                        <label for="txtComments">Add Comment:</label>
                        <textarea rows="5" cols="30" class="form-control" name="txtComments" id="txtComments"></textarea>
                        <input type="hidden" value="<?echo $id;?>" name="hiddenId">
                    </div>
                    <input type="submit" name="btnComments" class="btn btn-primary col-md-12" value="Add Comment">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <a href="index.php">Back to main page</a>
            </div>
        </div>
    </div>
</body>
</html>