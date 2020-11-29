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

    # Return max if no results found
    if ($result) {
        $response = "";
        while($row = mysql_fetch_array($result)) {
            $response .= "TEST";

            $response .= `
                <div style="position:relative; background: #FFFFFF;border: 1px solid #BBBBBB;border-radius: 4px; width:260px; height:400px; margin:20px">
                    <div style="position: absolute;width: 100px;height: 24px;right: 0px;top: 0px;background: #C4C4C4;">
                        <p class="text-center font-medium" style="color: #FFFFFF">
                            Test
                        </p>
                    </div>

                    <div style="position: absolute;height: 218px;left: 20px;right: 20px;top: 25px;background: black;"></div>
                    <div style="position: absolute;left: 20px;right: 20px;top: 250px;font-family: Inter;font-style: normal;font-weight: normal;font-size: 16px;color: #19191D;">
                        Leather Shoes Testing Right Here and a second line
                    </div>
                    <div style="position: absolute;left: 20px;right: 20px;top: 300px;font-family: Inter;font-style: normal;font-weight: 600;font-size: 16px;color: #19191D;">
                        Sold by Wrangler
                    </div>
                    <div style="position: absolute;height: 35px;left: 20px;right: 20px;top:320px;font-family: Inter;font-style: normal;font-weight: bold;font-size: 24px;line-height: 150%;display: flex;align-items: center;color: rgba(0, 0, 0, 0.87);">
                        $13.85
                    </div>
                    <button style="position: absolute;left:20;width:220;height: 32px;bottom: 10px;background: #FFFFFF;border: 1px solid #9DC2FF;box-sizing: border-box;border-radius: 4px;">
                        <p class="text-center" style="position: absolute;height: 24px;left: 12px;right: 12px;top: calc(50% - 24px/2);font-family: Inter;font-style: normal;font-weight: 500;font-size: 14px;color: #2264D1;">Add To Cart</p>
                    </button>
                </div>
                `;
        }
        return $response;
    }
    else {
        return mysql_error();
    }
?>