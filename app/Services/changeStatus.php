<?php
namespace App\Services;
 class ChangeStatus{

    public static function changeStatus($id,$modelRepo){
        
        $modelObject=$modelRepo->find($id);
        $modelObjectStatus=str_replace(' ', '',$modelObject->status);
      
        if ($modelObjectStatus == 'فعال') {
            $modelRepo->update($id, ['status' => 'غیرفعال']);
            return 'bg-danger';
            
        } else {
            $modelRepo->update($id, ['status' => 'فعال']);
            return 'bg-danger';
        }

    }
    
 }


?>
