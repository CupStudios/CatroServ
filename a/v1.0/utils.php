<?php
function logErr($error) {
	return json_encode($error, JSON_PRETTY_PRINT);
}

function getRequests($ip, $type) {
	if ($type == "webserver") {
		// Decode iplist.json as an associative array
		$iplist = json_decode(file_get_contents('iplist.json'), true);

		// Check if IP exists in iplist
		if (in_array($ip, $iplist)) {
			// Decode requests.json as an associative array
			$requests = json_decode(file_get_contents('../../requests.json'), true);

        	// Check if the IP has associated requests and return them
        	if (isset($requests[$ip])) {
            return $requests[$ip];
        	} else {
            	return "{}"; // IP exists but no requests found
        	}
    	} else {
        	return logErr(array("error" => -2)); // IP not found in iplist
    	}
	} elseif($type == "device") {
		$requests = json_decode(file_get_contents('../../requestsr.json'), true);
	
		if(isset($requests[$ip])) {
			$request = $requests[$ip];
			return json_encode($request);
		} else{
			return "{}";
		}
	}
}

function setRequestResponse($ip, $ip2, $response) {
    // Get the requests for the first IP (from the webserver type)
    $requests = explode(",", getRequests($ip, "webserver"));
    
    // Remove the first two values from the requests array
    $requests = array_slice($requests, 2);
    
    // Convert the requests array back into a comma-separated string
    $requests = implode(",", $requests);
    
    // Decode the requests.json file as an associative array
    $requestsFile = json_decode(file_get_contents('../../requests.json'), true);
    
    // Update the requests for the first IP
    $requestsFile[$ip] = $requests;
    
    // Encode the updated requests array back into JSON and save it to the file
    file_put_contents('../../requests.json', json_encode($requestsFile, JSON_PRETTY_PRINT));
    
    // Get the current requests from requestsr.json
    $requests = json_decode(file_get_contents('requestsr.json'), true); // Ensure this is an associative array
    
    // Prepare the new response
    $newResponse = array("$ip" => $response);
    
    // Check if $ip2 already has an entry in the requests
    if (!isset($requests[$ip2])) {
        // If no entry for $ip2, initialize it as an empty array
        $requests[$ip2] = array();
    }
    
    // Merge the new response with any existing responses for $ip2
    $requests[$ip2] = array_merge($requests[$ip2], $newResponse);
    
    // Encode the updated requests array and save it back to requestsr.json
    file_put_contents('../../requestsr.json', json_encode($requests, JSON_PRETTY_PRINT));
}
?>
