<?php
require_once('../Model/facultyModel.php');

class studentController {
    private $facultyModel;

    public function __construct() {
        $this->facultyModel = new facultyModel();
    }

    private function setCorsHeaders() {
        header("Access-Control-Allow-Origin: http://localhost:5173");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Access-Control-Max-Age: 3600");
    }

    public function getCreate_API() {
        $this->setCorsHeaders();

        $data = json_decode(file_get_contents('php://input'), true);

        $procedure = "add_student";
        try {
            
            $data = $this->uploads();

            $result = $this->facultyModel->create($procedure, $data);
            echo json_encode("Success: Data inserted successfully.");
        } catch (Exception $e) {
            echo json_encode("Error: ".$e->getMessage());
        }
    }

    public function getUpdate_API() {
        $this->setCorsHeaders();
    
        $data = json_decode(file_get_contents('php://input'), true);
    
        $procedure = "edit_student";
        try {
           $data = $this->UpdateFaculty();
    
            $result = $this->facultyModel->update($procedure, $data);
            echo json_encode("Success: Data updated successfully.");
        } catch (Exception $e) {
            echo json_encode("Error: ".$e->getMessage());
        }
    }
    

    public function getDelete_API() {
        $this->setCorsHeaders();

        $id = json_decode(file_get_contents('php://input'), true);

        $procedure = "del_student";
        try {
            $result = $this->facultyModel->destroy($procedure, $id);
            echo json_encode("Success: Data Deleted successfully.");
        } catch (Exception $e) {
            echo json_encode("Error: ".$e->getMessage());
        }
    }

    public function getAllData_API() {
        $this->setCorsHeaders();

        $procedure = "get_student";
        try {
            $result = $this->facultyModel->All($procedure);
            $data = is_array($result) ? $result : [];
            echo json_encode($data);
        } catch (Exception $e) {
            echo json_encode("Error: ".$e->getMessage());
        }
    }

    
    public function uploads(){
        $uploadDirectory = 'D:/xammp/htdocs/management/frontend/src/assets/uploads/';
        $filename = null;
        if(isset($_FILES['profile']) && !empty($_FILES['profile']['name'])) {

            $originalFilename = $_FILES['profile']['name'];
            $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);

            $filename = bin2hex(random_bytes(8)).'.'.$extension;

            $uploadedFile = $uploadDirectory. $filename = bin2hex(random_bytes(8)).'.'.$extension;;
            if(move_uploaded_file($_FILES['profile']['tmp_name'], $uploadedFile)) {

                $data['profile'] = $filename;
                $data['fname'] = $_POST['fname'];
                $data['lname'] = $_POST['lname'];
                $data['mname'] = $_POST['mname'];
                $data['email'] = $_POST['email'];
                $data['password'] = $_POST['password'];
                $data['dob'] = $_POST['dob'];
                $data['gender'] = $_POST['gender'];
                $data['address'] = $_POST['address'];
                $data['phone'] = $_POST['phone'];
                $data['yearLevel'] = $_POST['yearLevel'];
                
                $data = is_array($data) ? $data : [];
            } else {
                throw new Exception("Error: File upload failed.");
            }
        }
        return $data;
    }

    public function UpdateFaculty(){
        $uploadDirectory = 'D:/xammp/htdocs/management/frontend/src/assets/uploads/';
        $filename = null;
        $data = []; 

        if(isset($_FILES['profile']) && !empty($_FILES['profile']['name'])) {
            $originalFilename = $_FILES['profile']['name'];
            $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);

            $filename = bin2hex(random_bytes(8)).'.'.$extension;

            $uploadedFile = $uploadDirectory . $filename;

            if(move_uploaded_file($_FILES['profile']['tmp_name'], $uploadedFile)) {
                $data['id'] = $_POST['id'];
                $data['profile'] = $filename;
                $data['fname'] = $_POST['fname'];
                $data['lname'] = $_POST['lname'];
                $data['mname'] = $_POST['mname'];
                $data['email'] = $_POST['email'];
                $data['password'] = $_POST['password'];
                $data['dob'] = $_POST['dob'];
                $data['gender'] = $_POST['gender'];
                $data['address'] = $_POST['address'];
                $data['phone'] = $_POST['phone'];
                $data['yearLevel'] = $_POST['yearLevel'];
            } else {
                throw new Exception("Error: File upload failed.");
            }
        }else{
            $data['id'] = $_POST['id'];
            $data['profile'] =null;
            $data['fname'] = $_POST['fname'];
            $data['lname'] = $_POST['lname'];
            $data['mname'] = $_POST['mname'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $data['dob'] = $_POST['dob'];
            $data['gender'] = $_POST['gender'];
            $data['address'] = $_POST['address'];
            $data['phone'] = $_POST['phone'];
            $data['yearLevel'] = $_POST['yearLevel'];
        }
        return $data;
    }

}
?>