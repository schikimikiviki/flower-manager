<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With");
header("Content-Type: application/json"); 

require_once("dbConnect.php");

$conn = connect();

if (!$conn) {
    die("Failed to connect to the database.");
}

$method = $_SERVER["REQUEST_METHOD"];
$requestUrl = $_SERVER['REQUEST_URI'];
$baseUrl = '/flower-manager-crud/api';
$endpoint = substr($requestUrl, strlen($baseUrl));

switch ($endpoint) {
    case '/flowers':
        handleFlowersRequest();
        break;

    case '/flowers/save':
        handleFlowersRequest();
        break;

    case '/users':
        // Handle users endpoint
       // handleUsersRequest();
        break;
        
    default:
        // Handle unknown endpoint
        http_response_code(404);
        echo json_encode(['error' => 'Not found']);
        break;
}




function handleFlowersRequest() {

global $conn;
global $method;

  switch ($method) {

      case "GET":
        $sql = "SELECT * FROM flowers";
        $statement = $conn->prepare($sql);
        $statement->execute();
        
        $result = $statement->get_result();

     
        $flowers = [];
        while ($row = $result->fetch_assoc()) {
            $flowers[] = $row;
        }
        
        echo json_encode($flowers);
        break;

      case "POST":
        // Get the raw POST data
        $flowerData = json_decode(file_get_contents("php://input"), true);

        // Prepare the SQL statement
        $sql = "INSERT INTO flowers (name, description, maintenance, location, color, winter_care_tips, how_to_use, propagation, worth_knowing) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);

        // Bind parameters
        $statement->bind_param("sssssssss", 
            $flowerData['name'], 
            $flowerData['description'], 
            $flowerData['maintenance'], 
            $flowerData['location'], 
            $flowerData['color'], 
            $flowerData['winter_care_tips'], 
            $flowerData['how_to_use'], 
            $flowerData['propagation'], 
            $flowerData['worth_knowing']
        );

        // Execute the statement
        if ($statement->execute()) {
            $response = ["status" => 1, "message" => "Record created successfully."];
        } else {
            $response = ["status" => 0, "message" => "Failed to create record."];
        }

        echo json_encode($response);
        break; 
}

}
