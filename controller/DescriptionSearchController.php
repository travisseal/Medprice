<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/19/16
 * Time: 2:14 PM
 *
 * Objective: Handles the data connection for the description of the diagnosis
 *
 */

include 'DataConnection.php';

class DescriptionSearchController
{

    public static function getTerm()
    {
        $term = trim(strip_tags($_GET['term']));
        $a_json = array();
        $a_json_row = array();


        if ($data = DataConnection::connectDB()->query("SELECT Description FROM icd_10_procedures2 WHERE match (description) against ((+'$term') IN BOOLEAN MODE) limit 6;")) {
            while($row = mysqli_fetch_array($data)) {
                $longDescription = htmlentities(stripslashes($row['Description']));

                $a_json_row["id"] = "Description";
                $a_json_row["value"] = $longDescription;

                array_push($a_json, $a_json_row);
            }
        }
        return $a_json;

        DataConnection::close();
    }

}


