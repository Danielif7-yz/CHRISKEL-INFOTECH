<?php

function upload_file($file_input, $upload_dir = 'uploads')
{
	if (!isset($_FILES[$file_input])) {
		return false;
	}

	// return false if error occurred
	$error = $_FILES[$file_input]['error'];

	if ($error !== UPLOAD_ERR_OK) {
		return false;
	}

	// move the uploaded file to the upload_dir
	$new_file = $upload_dir . $_FILES[$file_input]['name'];

	return move_uploaded_file(
		$_FILES[$file_input]['tmp_name'],
		$new_file
	);
}
if (isset($_POST['submit'])) {

    $status = upload_file('fileToUpload');
        
    if ($status) {
        echo 'The file has been uploaded successfully!';
    } else {
        echo 'An error occurred during the file upload!';
    }
    
}

// $target_path = $target_path.basename($_FILES['fileToUpload']['name']);   
  
// if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {

//     echo "File uploaded successfully!";  

// } else{  

//     echo "Sorry, file not uploaded, please try again!";  

// }  

// $response = array( 
//     'status' => 0, 
//     'message' => 'Form submission failed, please try again.' 
// ); 
 
// // If form is submitted 
// if(isset($_POST['submit'])){ 
//     // Get the submitted form data 
//     $name = $_POST['name'];  
     
//     // Check whether submitted data is not empty 
//     if(!empty($name)){ 
       
//         $uploadStatus = 1; 
            
//         // Upload file 
//         $uploadedFile = ''; 
//         if(!empty($_FILES["fileToUpload"]["name"])){ 
                
//             // File path config 
//             $fileName = basename($_FILES["fileToUpload"]["name"]); 
//             $targetFilePath = $uploadDir . $fileName; 
//             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                
//             // Allow certain file formats 
//             $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
//             if(in_array($fileType, $allowTypes)){ 
//                 // Upload file to the server 
//                 if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)){ 
//                     $uploadedFile = $fileName; 
//                 }else{ 
//                     $uploadStatus = 0; 
//                     $response['message'] = 'Sorry, there was an error uploading your file.'; 
//                 } 
//             }else{ 
//                 $uploadStatus = 0; 
//                 $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
//             } 
//         } 
            
//         if($uploadStatus == 1){ 
//             // Include the database config file 
//             include_once 'dbConfig.php'; 
                
//             // Insert form data in the database 
//             $insert = $db->query("INSERT INTO csc_file_tbl (user_id,file_name) VALUES ('".$name."','".$uploadedFile."')"); 
                
//             if($insert){ 
//                 $response['status'] = 1; 
//                 $response['message'] = 'Form data submitted successfully!'; 
//             } 
//         } 
//     }else{ 
//          $response['message'] = 'Please fill all the mandatory fields (name and email).'; 
//     } 
// } 
 
// // Return response 
// echo json_encode($response);