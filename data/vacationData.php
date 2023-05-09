<?php
function vacationData_find($userId){
    $request="SELECT * FROM vacation WHERE user_id=? order by start";
    $requestParams=array($userId);
    return Connection::safeQuery($request,$requestParams);
}
function vacationData_findAccepted($userId){
    $request="SELECT * FROM vacation WHERE user_id=? and status = 1 ORDER BY end";
    $requestParams=array($userId);
    return Connection::safeQuery($request,$requestParams);
}

    //$request="SELECT * FROM vacation WHERE user_id=? and status = 0 or user_id=? and status = 2 or user_id=? and status = 3";
function vacationData_getAll(){
    $request="SELECT * FROM user join vacation on user.id=vacation.user_id order by status";
    return Connection::Query($request);
}


function vacationData_getNoWait(){
    $request="SELECT * FROM user join vacation on user.id=vacation.user_id where status=1 or status=2 or status=4 ORDER BY end";
    return Connection::Query($request);
}
function vacationData_getWait(){
    $request="SELECT * FROM user join vacation on user.id=vacation.user_id where status=0 ORDER BY end";
    return Connection::Query($request);
}

function vacationData_getCancel(){
    $request="SELECT * FROM user join vacation on user.id=vacation.user_id where status=3 ORDER BY end";
    return Connection::Query($request);
}

function vacationData_getRefUpdate($id){
    $request="UPDATE vacation SET status = 2 WHERE id = '".$id."' AND status = 0";
    return Connection::Query($request);
}
function vacationData_getAccUpdate($id){
    $request="UPDATE vacation SET status = 4 WHERE id = '".$id."' AND status = 0";
    return Connection::Query($request);
}

function vacationData_getAccCancel($id){
    $request="UPDATE vacation SET status = 4 WHERE id = '".$id."'";
    return Connection::Query($request);
}

function vacationData_getRefCancel($id){
    $request="UPDATE vacation SET status = 1 WHERE id = '".$id."'";
    return Connection::Query($request);
}

function addVacationData(){
    try{
        if (realVacation()){
            $request="INSERT INTO `vacation` (`id`, `start`, `end`, `raison`, `user_id`, `status`) VALUES (NULL,'".$_POST["start-date"]."' ,'".$_POST["end-date"]."','".$_POST["raison"]."','".$_SESSION['user']['id']."', '0')";
            $results=Connection::query($request);
            return $results;}
    } catch(PDOException $e) {
        //Si échec
    }
}

function cancelVacationData($id){
        $request = "UPDATE vacation SET status='3' where id=".$id;
        $results = Connection::query($request);
        return $results;
}
function realVacation(){
    list($endYear,$endMonth,$endDay) = explode('-',$_POST['end-date']);
    list($startYear,$startMonth,$startDay)=explode('-',$_POST['start-date']);

    if ($startYear < $endYear){
        return true;
    }
    elseif($startYear==$endYear && $startMonth < $endMonth){
        return true;
    }
    elseif($startYear==$endYear && $startMonth == $endMonth && $startDay <= $endDay){
        return true;
    }
    else{
        return false;
    }
}

