<?php 
         function valide_image(array $files,string $key,array &$arrayError,$target_file):void{
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    
              $arrayError[$key] = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        
            }elseif ($files["avatar"]["size"] > 500000) {
                $arrayError[$key] = "la tailee ne doit pas dépasser 500kb.";
            }
          }
          function validate_image_upload(array $files,string $key,array &$arrayError):void{

            // Check if form was submitted
            
              // Configure upload directory and allowed file types
              $upload_dir = 'uploads'.DIRECTORY_SEPARATOR;
              $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
              
              // Define maxsize for files i.e 2MB
              $maxsize = 2 * 1024 * 1024;
            
              // Checks if user sent an empty form
              if(!empty(array_filter($files['avatar']['name']))) {
            
                // Loop through each file in files[] array
                foreach ($files['avatar']['tmp_name'] as $key => $value) {
                  
                  $file_tmpname = $files['avatar']['tmp_name'][$key];
                  $file_name = $files['avatar']['name'][$key];
                  $file_size = $files['avatar']['size'][$key];
                  $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            
                  // Set upload file path
                  $filepath = $upload_dir.$file_name;
            
                  // Check file type is allowed or not
                  if(in_array(strtolower($file_ext), $allowed_types)) {
            
                    // Verify file size - 2MB max
                    if ($file_size > $maxsize)		
                      $arrayError[$key] = "Error: File size is larger than the allowed limit.";
            
                    // If file with name already exist then append time in
                    // front of name of the file to avoid overwriting of file
                    if(file_exists($filepath)) {
                      $filepath = $upload_dir.time().$file_name;
                      
                      if(!move_uploaded_file($file_tmpname, $filepath)) {
                    				
                        $arrayError[$key] = "Error uploading {$file_name} <br />";
                      }
                    }
                    else {
                    
                      if(!move_uploaded_file($file_tmpname, $filepath)) {
                        $arrayError[$key] = "Error uploading {$file_name} <br />";
                      }
                    }
                  }
                  else {
                    
                    // If file extension not valid
                    $arrayError[$key] = "Error uploading {$file_name} ";
                    $arrayError[$key] = "({$file_ext} file type is not allowed)<br / >";
                  }
                }
              }
              else {
                
                // If no files selected
                $arrayError[$key] = "No files selected.";
              }
            
            
            
          }
?>