<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/19/16
 * Time: 11:07 PM
 *
 * This is the handler for the DescriptionSearchController
 *
 */


require('../controller/DescriptionSearchController.php');

if(isset($_GET['term']))
{
    $controller = new DescriptionSearchController();
    echo json_encode($controller->getTerm());
    flush();

}
