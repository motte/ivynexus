<?php
// This prevents error returns
ini_set( "display_errors", 0);
/**
 * Image manager class
 */
class Imagemanager {
	private $type = '';
	private $uploadExtentions = array('png', 'jpg', 'jpeg', 'gif');
	private $uploadTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png');
	private $image;
	private $name;
	
	public function __construct() {}
	
	/**
	 * Load image from local file system
	 * @param String $filepath
	 * @return void	
	 */
	public function loadFromFile($filepath) {
		$info = getimagesize($filepath);
      	$this->type = $info[2];
     	if($this->type == IMAGETYPE_JPEG) {
        	$this->image = imagecreatefromjpeg($filepath);
      	} 
      	elseif($this->type == IMAGETYPE_GIF) {
        	$this->image = imagecreatefromgif($filepath);
        } 
        elseif($this->type == IMAGETYPE_PNG) {
	        $this->image = imagecreatefrompng($filepath);
      	}
	}
	
	/**
	 * Get the image width
	 * @return int
	 */
	public function getWidth() {
    	return imagesx($this->image);
	}
   	
   	/**
   	 * Get the height of the image
   	 * @return int
   	 */
	public function getHeight() {
      return imagesy($this->image);
   	}
   	
   	/**
   	 * Resize the image
   	 * @param int $x width
   	 * @param int $y height
   	 * @return void
   	 */
   	public function resize($x, $y) {
	   	$new = imagecreatetruecolor($x, $y);
      	imagecopyresampled($new, $this->image, 0, 0, 0, 0, $x, $y, $this->getWidth(), $this->getHeight());
      	$this->image = $new;
   	}
   	
   	/**
   	 * Resize the image to a square
   	 * @param int $x width
   	 * @param int $y height
   	 * @return void
   	 */
   	public function resizeSqr() {
	   	$origX = $this->getWidth();
	   	$origY = $this->getHeight();
	   	if($origY > $origX){
		   	/* Portrait */
		   	$offsetY = ($origY - $origX)/2;
		   	$x = $this->getWidth();
		   	$new = imagecreatetruecolor($x, $x);
			imagecopyresampled($new,
                   $this->image,
                   0, 0,
                   0, $offsetY,
                   $x, $x,
                   $x, $x);
		}
		elseif($origY < $origX) {
			/* Landscape */
			$offsetX = ($origX - $origY)/2;
			$x = $origY;
			$new = imagecreatetruecolor($x, $x);
			imagecopyresampled($new,
                   $this->image,
                   0, 0,
                   $offsetX, 0,
                   $x, $x,
                   $x, $x);
		}
		else {
			//Squares
			$new = imagecreatetruecolor($origX, $origX);
			imagecopyresampled($new,
                   $this->image,
                   0, 0,
                   0, 0,
                   $origX, $origX,
                   $origX, $origX);
		}

      	      	$this->image = $new;
   	}
   	
   	public function resizeProfileSqr() {
	   	$origX = $this->getWidth();
	   	$origY = $this->getHeight();
	   	if($origY > $origX){
		   	/* Portrait */
		   	
		   	$x = $this->getWidth();
		   	$new = imagecreatetruecolor($x, $x);
			imagecopyresampled($new,
                   $this->image,
                   0, 0,
                   0, 0,
                   $x, $x,
                   $x, $x);
		}
		elseif($origY < $origX) {
			/* Landscape */
			$offsetX = ($origX - $origY)/2;
			$x = $origY;
			$new = imagecreatetruecolor($x, $x);
			imagecopyresampled($new,
                   $this->image,
                   0, 0,
                   $offsetX, 0,
                   $x, $x,
                   $x, $x);
		}
		else {
			//Squares
			$new = imagecreatetruecolor($origX, $origX);
			imagecopyresampled($new,
                   $this->image,
                   0, 0,
                   0, 0,
                   $origX, $origX,
                   $origX, $origX);
		}

      	      	$this->image = $new;
   	}

   	/**
   	 * Resize the image, scaling the width, based on a new height
   	 * @param int $height 
   	 * @return void
   	 */
   	public function resizeScaleWidth($height) {
      	$width = $this->getWidth() * ($height / $this->getHeight());
      	$this->resize($width, $height);
   	}
   	
   	/**
   	 * Resize the image, scaling the height, based on a new width
   	 * @param int $width
   	 * @return void
   	 */
   	public function resizeScaleHeight($width) {
		$height = $this->getHeight() * ($width / $this->getWidth());
      	$this->resize($width, $height);
   	}
   	
   	/**
   	 * Scale an image
   	 * @param int $percentage
   	 * @return void
   	 */
   	public function scale($percentage) {
	   	$width = $this->getWidth() * $percentage / 100;
      	$height = $this->getHeight() * $percentage / 100; 
      	$this->resize($width, $height);
   	}
   	
   	/**
   	 * Display the image to the browser - called before output is sent, exit() should be called straight after.
   	 * @return void
   	 */
   	public function display() {
	   	$type = '';
	   	if($this->type == IMAGETYPE_JPEG) {
		   	$type = 'image/jpeg';
	   	}
	   	elseif($this->type == IMAGETYPE_GIF) {
		   	$type = 'image/gif';
	   	}
	   	elseif($this->type == IMAGETYPE_PNG) {
		   	$type = 'image/png';
	   	}
	   	
	   	header('Content-Type: ' . $type);
	   	
	   	if($this->type == IMAGETYPE_JPEG) {
		   	imagejpeg($this->image);
	   	}
	   	elseif($this->type == IMAGETYPE_GIF) {
		   	imagegif($this->image);
	   	}
	   	elseif( $this->type == IMAGETYPE_PNG ) {
		   	imagepng($this->image);
	   	}
	   	
   	}
	
	public function exifrotation($source) {
	//fix photos taken on cameras that have incorrect

        //dimensions

        $exif = exif_read_data($source);

        //get the orientation

        $ort = $exif['Orientation'];

        //determine what oreientation the image was taken at

        switch($ort)

        {

            case 2: // horizontal flip

                $this->ImageFlip($this->image);

                break;

            case 3: // 180 rotate left

                $this->image = imagerotate($this->image, 180, -1);

                break;

            case 4: // vertical flip

                $this->ImageFlip($dimg);

                break;

            case 5: // vertical flip + 90 rotate right

                $this->ImageFlip($this->image);

                $this->image = imagerotate($this->image, -90, -1);

                break;

            case 6: // 90 rotate right

                $this->image = imagerotate($this->image, -90, -1);

                break;

            case 7: // horizontal flip + 90 rotate right

                $this->ImageFlip($this->image);

                $this->image = imagerotate($this->image, -90, -1);

                break;

            case 8: // 90 rotate left

                $this->image = imagerotate($this->image, 90, -1);

                break;

        }

    }


/**
*	ImageHandler - ImageFlip()
*
* 	Resizes an image to set width and height
*
* 	EXAMPLE USAGE:
*
* 	$ImageHandler->Resize(200, "file.jpg", "png", "images");
*
*	@param	string		$image (image to flip)
*	@param	int			$x
*	@param	int			$y
*	@param	int			$width
*	@param	int			$height
*
*/

public function ImageFlip($image, $x = 0, $y = 0, $width = null, $height = null) {
    if ($width  < 1) {
    	$width  = imagesx($image);
    }
    if ($height < 1) {
    	$height = imagesy($image);
	}
    // Truecolor provides better results, if possible.
    if (function_exists('imageistruecolor') && imageistruecolor($image)) {
        $tmp = imagecreatetruecolor(1, $height);
    }
    else {
        $tmp = imagecreate(1, $height);
    }

    $x2 = $x + $width - 1;

    for ($i = (int)floor(($width - 1) / 2); $i >= 0; $i--) {
        // Backup right stripe.
        imagecopy($tmp, $image, 0, 0, $x2 - $i, $y, 1, $height);

        // Copy left stripe to the right.
        imagecopy($image, $image, $x2 - $i, $y, $x + $i, $y, 1, $height);

        // Copy backuped right stripe to the left.
        imagecopy($image, $tmp, $x + $i,  $y, 0, 0, 1, $height);
    }
    imagedestroy($tmp);
    return true;
}

	
	/* This is where I program the exif of the uploaded photo.  Certain cameras set the exif so we need to write it correctly.

    
	
	/**
	 * Load image from postdata
	 * @param String $postfield the field from which the image was uploaded
	 * @param String $moveto the location for the upload
	 * @param String $name_prefix a prefix for the filename
	 * @return boolean
	 */
	 public function loadFromPost($postfield, $moveto, $name_prefix='') {
	 	if(is_uploaded_file($_FILES[$postfield]['tmp_name'])) {
	 		$i = strrpos($_FILES[$postfield]['name'], '.');
	 		if(!$i) {
	 			// 'no extention';
	 			return false;
	 		}
	 		else {	
	 			$l = strlen($_FILES[$postfield]['name']) - $i;
	 			$ext = strtolower(substr($_FILES[$postfield]['name'], $i+1, $l));
	 			if(in_array($ext, $this->uploadExtentions)) {
	 				if(in_array($_FILES[$postfield]['type'], $this->uploadTypes)) {
	 					$name = str_replace(' ', '', $_FILES[$postfield]['name']);
	 					$this->name = $name_prefix . $name;
	 					$path = $moveto . $name_prefix.$name;
	 					//move_uploaded_file($_SERVER[$postfield]['tmp_name'], $path);
	 					move_uploaded_file($_FILES[$postfield]['tmp_name'], $path);
	 					//move_uploaded_file($_POST[$postfield]['tmp_name'], $path);
	 					$this->loadFromFile($path);
	 					$this->exifrotation($path);
	 					return true;
	 				}
	 				else {
	 					// 'invalid type';
	 					return false;
	 				}
	 			}
	 			else {
	 				// 'invalid extention';
	 				return false;
	 			}
	 		}
	 	}
	 	else {
	 		// 'not uploaded file';
	 		return false;
	 	}
	 }
	
	
	/**
	 * Get the image name
	 * @return String
	 */
	public function getPhotoName() {
		return $this->name;
	}

	/**
	 * Get the thumbnail image name
	 * @return String
	 */
	public function getThumbName() {
		return 'thumb' . $this->name;
	}

	/**
	 * Get the square image name
	 * @return String
	 */
	public function getSqrName() {
		return 'sqr' . $this->name;
	}
	
	/**
	 * Save changes to an image e.g. after resize
	 * @param String $location location of image
	 * @param String $type type of the image
	 * @param int $quality image quality /100
	 * @return void
	 */
	public function save($location, $type='', $quality=100) {
		$type = ($type == '') ? $this->type : $type;
		
		if($type == IMAGETYPE_JPEG) {
        	imagejpeg($this->image, $location, $quality);
    	} 
    	elseif($type == IMAGETYPE_GIF) {
        	imagegif($this->image, $location);         
      	} 
      	elseif($type == IMAGETYPE_PNG) {
        	imagepng($this->image, $location);
        }
	}
}

?>