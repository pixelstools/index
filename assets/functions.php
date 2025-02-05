<?php
//this is for database connection
require_once('database.php');


//this is for checking the user
function checkUser($data){
$db=$GLOBALS['db'];
$email_id=mysqli_real_escape_string($db,$data['email']);
$password=mysqli_real_escape_string($db,$data['password']);
$query="SELECT * FROM useraccounts WHERE email='$email' AND password='$password'";
$runQuery=mysqli_query($db,$query);
$user=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
if(count($user)>0)  {
    return $user;
}else{

    return false;
}
}


//this is for checking email
function checkEmail($data){
    $db=$GLOBALS['db'];
    $email_id=mysqli_real_escape_string($db,$data['email']);
    $query="SELECT * FROM useraccounts WHERE email='$email'";
    $runQuery=mysqli_query($db,$query);
    $user=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    if(count($user)>0)  {
        return true;
    }else{
    
        return false;
    }
    }

//this is for checking the user
function checkRefCode($data){
    $db=$GLOBALS['db'];
    $ref_code=mysqli_real_escape_string($db,$data['ref_code']);

    $query="SELECT * FROM useraccounts WHERE user_code='$ref_code'";
    $runQuery=mysqli_query($db,$query);
    $user=mysqli_fetch_all($runQuery) ;
    if(count($user)>0)  {
        return true;
    }else{
        return false;
    }
    }

//this id for generate user code
function genUserCode(){
$str="AB1CDE2FG3HI4JK5LM6NO7PQ8RS9TU0VQXYZ".time();
$str= str_split($str,1);
$l = count($str);
$user_code='';
for($i=0;$i<6;$i++){
$tn = rand(0,$l);
$user_code.=$str[$tn];
}

return $user_code;

}


    //this is for register a new user
function register($data){
    $db=$GLOBALS['db'];
    $user=array();
    $user['errors']=array();
    $full_name=mysqli_real_escape_string($db,$data['name']);
    $email_id=mysqli_real_escape_string($db,$data['email']);
    $password=mysqli_real_escape_string($db,$data['password']);
    $ref_code=mysqli_real_escape_string($db,$data['ref_code']);
    
    if($full_name=='' || $email_id=='' || $password=='' || $ref_code==''){
        $user['errors'][]="all fields are required !";
    }
    if(checkEmail($data)){
        $user['errors'][]="User already exists";
    }
    if(!checkRefCode($data)){
        $user['errors'][]="Invalid ref code";
    
    }
    
    if(count($user['errors'])<1){
    $user_code = genUserCode(); 
    $query="INSERT INTO useraccounts(name,email,password,ref_code,user_code) ";
    $query.="VALUES('$name','$email','$password','$ref_code','$user_code')";
    $runQuery = mysqli_query($db,$query);
    if($runQuery){
        $user['success']="user is created successfully !";
    }else{
        $user['errors'][]="Something went wrong !";
    }
    }
   return $user;
   
    
    
    
    }
    

    function getRefList($data){
        $db=$GLOBALS['db'];
$ref_code=$data['ref_code'];
        $query="SELECT * FROM useraccounts WHERE ref_code='$ref_code'";
        $runQuery=mysqli_query($db,$query);
        $user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ;
        return $user;
        
    }