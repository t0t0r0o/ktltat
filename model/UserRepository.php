<?php

class userRepository {
    public $error;
    public $user;
    public $is_student = true;
   
    function getBySearch($search) {
        $cond = "name LIKE '%$search%'";
        $users = $this->fetch($cond);
        return $users;
    }
    function getAll() {
        return $this->fetch();
    }

    function fetch($cond = null) {
        global $conn;
        $sql = "SELECT * FROM user";
        if ($cond) {
            $sql .= " WHERE role_id = 1 AND $cond ";
        }
        // print_r($sql);
        // exit;
        $result = $conn->query($sql);
        $users = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = ['id'=>$row["id"],'name'=> $row["name"],'birthday' => $row["birthday"],'gender' => $row["gender"]];
                $users[] = $user;
            }
        }
        return $users;
    }

    function save($data){
        global $conn;
        $name=$data["name"];
        $birthday=$data["birthday"];
        $gender=$data["gender"];
        $sql="INSERT INTO user (name, birthday, gender)
        VALUES ('$name', '$birthday', $gender)
        ";
        if($conn->query($sql)){
            return true;
        }else{
            $this->error= "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
        
    }

    function find($id){
        $cond="id =$id";
        $users=$this->fetch($cond);
        $user=current($users);//Lấy user tại vị trí con trỏ
        return $user;

    }

    function update($user){
        global $conn;
        $name=$user->name;
        $birthday=$user->birthday;
        $gender=$user->gender;
        $id=$user->id;
        $sql="UPDATE user SET name='$name',birthday='$birthday',gender=$gender WHERE id=$id";

        if($conn->query($sql)){
            return true;
        }else{
            $this->error= "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    function delete($id){
        global $conn;
        $sql="DELETE FROM `user` WHERE id=$id";
        if($conn->query($sql)){
            return true;
        }else{
            $this->error= "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

  
    function login($data){
        global $conn;
        $username = $data['username'];
        $password = $data['password'];
        $sql = "SELECT * FROM user WHERE username LIKE '$username' AND password LIKE '$password'";
        $result = $conn->query($sql);
        $user = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = ['id'=>$row["id"],'name'=> $row["name"],'birthday' => $row["birthday"],'gender' => $row["gender"], 'role_id' => $row["role_id"]];
            $this->user = $user;
        }
        return $user;
    }
}

?>