<?php
    #error_reporting(E_ALL);
    #ini_set('display_errors', 'on');
    # Establish connection to mysql database
	$conn = new mysqli('localhost', 'store', 'qwerty12qwaszx', "store");

    if (! $conn){
        throw new Db_Connect_Error(); 
    }   

	# Get parameters from POST request
	#$start = $conn->real_escape_string($_POST['start']);
	#$limit = $conn->real_escape_string($_POST['limit']);
	#$limit = 2000;
	#$query = $_POST['query'];
	
#	$queryString = 'WHERE ';
#
#    # If parameters for times do not exist, use default values
#	if($query['timeStart'] == "")
#		$query['timeStart'] = "1111/1/1";
#	if($query['timeEnd'] == "")
#		$query['timeEnd'] = date("Y/m/d");

    # Add to query string with time filter
	#$queryString .= 'products.time BETWEEN "' . $query['timeStart'] . '" AND "' . $query['timeEnd'] . '" ';

	# Query for all posts matching filter criteria
#	$sqlPosts = $conn->query("SELECT * FROM `posts`
#		" . $queryString . " 
#		ORDER BY `time` DESC
#        LIMIT $start, $limit");

    $query = "SELECT * FROM Product";
    
    $result = $conn->query($query);

    $response = "";

    # Return max if no results found
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $respone = "TEST";
        }
        return $response;
    }
    else {
        return $response;
    }
?>