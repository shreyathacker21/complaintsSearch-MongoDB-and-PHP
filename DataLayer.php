<?php
/**
 * Created by PhpStorm.
 * User: randyjp
 * Date: 4/29/15
 * Time: 9:17 PM
 */

class DataLayer {

    private $collection;

    public function __construct()
    {
        $m = new MongoClient();
        $db = $m->selectDB("ConsumerComplaint");
        $this->collection = $db->selectCollection("complaints2");
    }

    public function findComplaintByIssue($word)
    {
        $complaints = array();
        $regex = new mongoRegex("/".$word."/i");
        $query = array(
            '$or' => array(
                array(
                   "Issue" => $regex
                ),
                array(
                    "Sub-issue" =>$regex
                )
            )
        );

        $cursor = $this->genericSelect($query);
        foreach($cursor as $doc)
        {
            $complaints[] = new Complaint($doc["Complaint ID"],$doc["Product"],null,null,null,null,null,null,null,null,null,
                                          null,null,null,null,null);
        }

        return $complaints;
    }

    public function findComplaintById($id){
        $query = array("Complaint ID" => (int)$id);
        $cursor = $this->genericSelectOne($query);
        return new Complaint($cursor["Complaint ID"],$cursor["Product"],$cursor["Sub-product"],$cursor["Issue"],
                             $cursor["Sub-issue"],$cursor["State"],$cursor["ZIP code"],$cursor["Submitted via"],
                             $cursor["Date received"],$cursor["Date sent to company"],$cursor["Company"],
                             $cursor["Company response"],$cursor["Timely response?"],$cursor["Consumer disputed?"],
                             $cursor["Image"],$cursor["Comments"]);

    }

    public function addCommentById($id,$comment)
    {
        $newComment = array(
                      '$push'=>array(
                            "Comments" => ["Comment"=>$comment]
                        )
        );
        $this->collection->update(array("Complaint ID"=>(int)$id),$newComment);
    }


    public function genericSelect($query)
    {
        return $this->collection->find($query);
    }

    public function genericSelectOne($query)
    {
        return $this->collection->findOne($query);
    }
}