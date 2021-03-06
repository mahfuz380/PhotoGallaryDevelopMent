<?php
class Photo extends DbObject{

	protected static $dbTable = "photos";
	protected static $dbTableFields = array('title', 'caption', 'description', 'fileName', 'alternateText', 'type', 'size');
	public $id;
	public $title;
	public $caption;
	public $description;
	public $fileName;
	public $alternateText;
	public $type;
	public $size;
	
	

	public $tmpPath;
	public $uploadDirectory = "images";
	

	//this is passing $_FIlES['uploaded_file'] as an argument

	public function setFile($file){

		if(empty($file) || !$file || !is_array($file)){
			$this->errors[] = "There was no file uploaded here";
			return false;
		}else if($file['error'] != 0){
			$this->errors[] = $this->upload_errors_array[$file['error']];
			return false;
		}else{

			$this->fileName = basename($file['name']);
			$this->tmpPath = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];

		} // end if else 

		

	} // end setFile

	public function picturePath(){
		return $this->uploadDirectory.DS.$this->fileName;
	}

	public function save(){

		if($this->id){
			$this->update();
		}else{
			if(!empty($this->errors)){
				return false;
			} // end nested if

			if(empty($this->fileName) || empty($this->tmpPath)){
				$this->errors[] = "the file not available";
				return false;
			}

			//$targetPath = SITE_ROOT . DS . 'admin' .DS. $this->uploadDirectory .DS. $this->fileName;
			$targetPath = $this->uploadDirectory. DS .$this->fileName;
			if(file_exists($targetPath)){
				$this->errors[] = "The file {$this->fileName} already exists";
				return false;
			}

			//"images/$this->fileName"

			if(move_uploaded_file($this->tmpPath, $targetPath)){
				if($this->create()){
					unset($this->tmpPath);
					return true;
				}
			}else{
				$this->errors[] = "the file directory probably does not have permission";
				return false;
			}

			

		} // end if else


	} //end photoSave

	public function deletePhoto(){
		if($this->delete()){
			$targetPath = $this->picturePath();

			return unlink($targetPath) ? true :false;
			
		}else{
			return false;
		} // end else if

	} // end deletePhoto

	public static function displaySidebarData($photo_id){

		$photo = Photo::findById($photo_id);
		 $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picturePath()}' alt='No Image'></a>";
		 $output .= "<p>{$photo->fileName}</p>";
		 $output .= "<p>{$photo->type}</p>";
		 $output .= "<p>{$photo->size}</p>";

		 echo $output;

	} // end of ajaxData



} // end of photo class 
?>