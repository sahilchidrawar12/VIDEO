<?php
namespace App\Traits;

trait Commonfunction {
    public function file_upload($image,$destination_path, $compress_image_size='',$file_name=''){
      $fname = random_number();
      // dd($fname);
      $input['image_name'] = $fname.'.'.$image->getClientOriginalExtension();
      // dd($input['image_name']);
      $destination_path = public_path($destination_path);
      if($compress_image_size != ''){
        $url = $destination_path.'/'.$input['image_name'];
        $this->compress_image($image, $url, $compress_image_size);
      }else{
        $image->move($destination_path, $input['image_name']);
      }
      if($file_name != '' && file_exists(public_path($destination_path.'/'.$file_name))){    
        unlink(public_path($destination_path.'/'.$file_name));
      }  
      // echo $input['image_name']; die;
        
      return $input['image_name'];
    }

      public function compress_image($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);
        $image='';
        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/jpg')
            $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source_url);
        imagejpeg($image,$destination_url, $quality);
        return $destination_url;
      }
}
?>