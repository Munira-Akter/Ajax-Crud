<?php


namespace App\Controller;
use App\Support\Database;


class User extends Database{


    // staff insert

    public function  StaffInsert($name,$email,$cell,$photo){
      $data =  $this -> Insert ("INSERT INTO ajaxs  (name , email, cell, photo) VALUES ('$name', '$email', '$cell','$photo')");
      If($data){
        return true;
      }else{
        return false;
      }
    
    }

    //  all staff data show

    public function allStaff(){
      return  $this -> SelectAll('ajaxs');
    }

    //   staff data delete

    public function  deleteId ($delete_id){
      $single_delete_data = $this -> SingleData('ajaxs' , $delete_id);
      $image_delete_data = $single_delete_data -> fetch_assoc();
      unlink('../photos/Staffs/' . $image_delete_data['photo']);
      $data = $this -> DataDelete('ajaxs' , $delete_id);
      if($data){
        return true;
      }else{
        return false;
      }
    }


    // single data show
    public function  staffSingle($view_id){
      return $this -> SingleData('ajaxs' , $view_id);
    }
    // single data show
    public function  staffSingleedit($edit_id){
      return $this -> SingleData('ajaxs' , $edit_id);
    }

    // active id
    public function staffUp($active_id){
      $this -> DataUpdate("UPDATE ajaxs SET status='inactive' WHERE id = $active_id");
    }

    // update staff
    public function staff_Update_data($name,$email,$cell,$photo,$id){
      $data =  $this ->  DataUpdate("UPDATE ajaxs SET name = '$name' , email = '$email' , cell='$cell', photo = '$photo' WHERE id = '$id'");
      if($data){
        return true;
      }else{
        return false;
      }
    }

    // email_check 

    public function emailCheck($email){
       $data =   $this -> customquery('email' , 'ajaxs' , $email);
       if($data){
        return true;
      }else{
        return false;
      }
    }

    // cell_check 

    public function cellCheck($cell){
       $data =   $this -> customquery('cell' , 'ajaxs' , $cell);
       if($data){
        return true;
      }else{
        return false;
      }
    }
    // serach staff 

        public function staffserach($search){
          return $this -> serach ("SELECT * FROM ajaxs WHERE name LIKE '%$search%' ");
        }
  }

?>