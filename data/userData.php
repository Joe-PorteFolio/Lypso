<?php

function userData_findOneWithCredentials($userLogin, $userPwd){
     //$request="SELECT * FROM user WHERE email='".$userMail."' AND mdp='".$userPwd."'";
     $request="SELECT id,login,firstname,lastname,department_id,active FROM user WHERE login=? AND password=?";
     $requestParams=array($userLogin,sha1($userPwd));
     $result=Connection::safeQuery($request,$requestParams);
     if(isset($result[0])) {
         return $result[0];
     }else{
         return false;
     }
}
function userData_allInformations($userId){
    $request="SELECT * FROM user";
    $results=Connection::safeQuery($request);
    return $results;
}

function userData_store($userDatas){
    $request="INSERT into vacation values(NULL,'".$userDatas['start']."','".$userDatas['end']."',user_id ='".$userDatas['user_id']."', status = 0)";
    $results=Connection::safeQuery($request);
    return $results;
}

function userData_findWithId($userid){
    $request="SELECT id,login,firstname,lastname,department_id,active FROM user WHERE id=$userid";
    $result=Connection::Query($request);
    return $result;
}
