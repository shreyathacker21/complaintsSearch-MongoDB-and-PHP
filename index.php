<?php
/**
 * Created by PhpStorm.
 * User: randyjp
 * Date: 4/29/15
 * Time: 9:17 PM
 */
require_once "Complaint.php";
require_once "DataLayer.php";
require_once "lib.php";

$complaints;
$searchText="";
$errors =array();
//$hey = new DataLayer();
//$hey->addPicture();
if(count($_POST)>0)
{
    if($_POST["search"])
    {
        $searchText = $_POST["searcher"];
        if(empty($searchText))
        {
            $errors[] = "Please type some text to search";
        }
        else
        {
            $dl = new DataLayer();
            $complaints = $dl->findComplaintByIssue($searchText);
            if(count($complaints)<1)
            {
                $errors[] = "Your search yielded no results";
            }
        }
    }
    else
    {
        $complaints = null;
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js" chaset="utf-8" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" charset="utf-8" type="text/javascript"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <? echo displayMessages($errors,false);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-7">
                <h1>Complaints Search App</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"></div>
        </div><br>
        <div class="row">
            <div class="col-md-offset-3 col-md-7">
                <form method="post" action="index.php" class="form-inline">
                    <div class="form-group">
                        <label for="searcher">Search Criteria:</label>
                        <input type="text" name="searcher" id="searcher" placeholder="Issue">
                    </div>
                    <input type="submit" value="Search" name="search" value="<?php echo $searchText?>" class="btn btn-primary">
                    <input type="submit" value="Clean Results" name="btnClean" class="btn btn-info">
                </form>
            </div>
        </div>
        <?
            if(count($complaints)>0)
            {
                echo generateComplaintsTable($complaints);
            }
        ?>
    </div>
</body>
</html>

<?php
    function generateComplaintsTable($complaints)
    {
        $html = "<div class='row'>
                    <div class='col-md-offset-2 col-md-7'>
                            <table id='table_id' class='table table-bordered margins'>
                        <thead>
                            <tr>
                                <th>Complaint ID</th>
                                <th>Product</th>
                            </tr>
                        </thead>
                        <tbody>";

        foreach($complaints as $complaint)
        {
            $id = $complaint->getComplaintId();
            $html .= "<tr><td><a href='details.php?id=$id'>" .$complaint->getComplaintId() ."</a></td>" .
                     "<td>". $complaint->getProduct() . "</td></tr>";
        }

        $html .= "</tbody>
                </table>
            </div>
        </div>";

        return $html;

    }
?>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>