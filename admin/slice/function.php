<?php ob_start();?>
<?php session_start();?>
<?php

// ConfirmQUery Function
function confirmQuery($result){
    global $connection;
    if(!$result){
    die("QUERY FAILED" . mysqli_error($connection));
}
}




// Call houses

function category(){
    global $connection;
    $query = "SELECT name FROM category";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        echo"<option value='{$row['name']}'>{$row['name']}</option>";
    }
}

function medicine($category){
if(empty($category)){
    echo"<option value=''>Select category first</option>";
}else{
    global $connection;
    $query = "SELECT name,batchNo,buyPrice,sellPrice FROM medicine WHERE category = '{$category}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        echo"<option value='{$row['name']}'>{$row['name']}</option>";
    }
}
   
}

function medInfo(){
    global $connection;
    $query = "SELECT name,totalQuantity,batchNo,buyPrice,sellPrice FROM products";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        echo"<option value='{$row['name']}'('{$row['batchNo']}')>{$row['name']} ({$row['batchNo']})</option>";
}
   
}

// call Houses Avaliable
function shelf(){
    global $connection;
    $query = "SELECT numericno FROM shelf";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        $numericno = $row['numericno'];
        echo"<option value='$numericno'>$numericno</option>";
    }
}

// call supplier
function supplier(){
    global $connection;
    $query = "SELECT * FROM supplier";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['name'];
        echo"<option value='$name'>$name</option>";
    }
}

//find if batchNo Exit

function stock_batchNoExit($batchNo){
    global $connection;
    $query = "SELECT batchNo FROM products WHERE batchNo = '{$batchNo}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

function sales_batchNoExit($batchNo){
    global $connection;
    $query = "SELECT batchNo FROM salesproducts WHERE batchNo = '{$batchNo}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

function is_codeExit($code){
    global $connection;
    $query = "SELECT purchaseCode FROM stockList WHERE purchaseCode = {$code}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

function checkCheck($batchNo,$name){
global $connection;
$query = "SELECT * FROM products WHERE batchNo = {$batchNo} ";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($result)){
    $db_batchNo = $row['batchNo'];
    $db_name = $row['name'];
    
    if($batchNo == $db_batchNo && $name = $db_name){
        return true;
    }else{
        return false;
    }
}

}

function checkSales($batchNo,$name){
global $connection;
$query = "SELECT * FROM salesproducts WHERE batchNo = {$batchNo} ";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($result)){
    $db_batchNo = $row['batchNo'];
    $db_name = $row['name'];
    
    if($batchNo == $db_batchNo && $name = $db_name){
        return true;
    }else{
        return false;
    }
}

}
function is_codeSalesExit($code){
    global $connection;
    $query = "SELECT salesCode FROM salesList WHERE salesCode = {$code}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        return true;
    }else{

        return false;
    }
}

function purchaseSub($batchNo,$quant){
       global $connection;
        $querySearch = "SELECT totalQuantity FROM products WHERE batchNo = {$batchNo}";
        $resultSearch = mysqli_query($connection,$querySearch);
        $row = mysqli_fetch_assoc($resultSearch);
        $db_grandTT = $row['totalQuantity'];
        $newGrand = $db_grandTT - $quant;
        confirmQuery($resultSearch);
        $query4 = "UPDATE products SET totalQuantity = $newGrand WHERE batchNo = {$batchNo}";
        $result = mysqli_query($connection,$query4);
         confirmQuery($result);
    
    return $newGrand;


}
//adding up product total

function sumProduct($code){
global $connection;
$query = "SELECT SUM(amount) AS sumBalance FROM stockList WHERE purchaseCode = {$code}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$data = mysqli_fetch_array($result);
return $data['sumBalance']; 


}

function sumQuery($startFrm,$end){
global $connection;
$result = mysqli_query($connection,"SELECT SUM(amount) AS sumBalance  FROM saleslist WHERE date between '{$startFrm}' AND '{$end}' ORDER BY date");
confirmQuery($result);
$data = mysqli_fetch_array($result);
return $data['sumBalance']; 


}

function sumSalesProduce($code){
global $connection;
$query = "SELECT SUM(amount) AS sumBalance FROM salesList WHERE salesCode = {$code}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$data = mysqli_fetch_array($result);
return $data['sumBalance']; 


}

function sumStockList($code){
global $connection;
$query = "SELECT SUM(amount) AS sumBalance FROM stockList WHERE purchaseCode = {$code}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$data = mysqli_fetch_array($result);
echo $data['sumBalance']; 


}
//call invoice
function onlyInvoice(){
    global $connection;
    $query = "SELECT * FROM invoice";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        $tenant = $row['tenant'];
        echo"<option value='$tenant'>$tenant</option>";
    }
}

// call Employee
function showAllEmplyee(){
}

// calculate Month
function year(){
    global $connection;
    
    $nowDate = 2020;
    while($nowDate >= 2000){
        $nowDate = $nowDate - 1;
    echo"<option value='$nowDate'>$nowDate</option>";
    }
}

// call month 

function month(){
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$mlength = count($months);
for($x = 0; $x < $mlength; $x++) {
    $mm = $months[$x];
    echo"<option value='$mm'>$mm</option>";
}
}
function redirect($location){
        header("Location: " . $location);
}


function is_batchNoExit($batchNo){
    global $connection;
    $query = "SELECT batchNo FROM medicine WHERE batchNo = '{$batchNo}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}



function passwordMatch($re_password,$password){
    if($re_password == $password){
        return true;
    }else{
        return false;
    }
}








/*-- LOgin Functions */
function is_emailFound($email){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

function is_passwordFound($password){
    global $connection;
    $query = "SELECT password FROM users WHERE password = '{$password}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

function is_userRole($email){
    global $connection;
    $query = "SELECT * FROM users WHERE username = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $user_role = $row['user_role'];
        $password = $row['password'];
    }
    return $user_role;
}

function login($email,$password){
    global $connection;
    if(is_userRole($email) == 'admin'){
        $query = "SELECT * FROM users WHERE username = '{$email}'";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        while($row = mysqli_fetch_array($result)){
        $db_username = $row['username'];
        $db_user_role = $row['user_role'];
        $db_password = $row['password'];
        $db_id = $row['id'];
        }
    if($email == $db_username && $password == $db_password){
        
        $_SESSION['username'] = $db_username;
        $_SESSION['password'] = $db_password;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['admin_id'] = $db_id;
        header("Location: admin/redirect.php");
    }
    else{echo "<div class='alert'><strong>Input the right</strong> Username and password.</div>";}
        
    }//if admin
    
    if(is_userRole($email) == 'user'){
        $query = "SELECT * FROM users WHERE username = '{$email}'";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        while($row = mysqli_fetch_array($result)){
        $db_username = $row['username'];
        $db_user_role = $row['user_role'];
        $db_password = $row['password'];
        $db_id = $row['id'];
        }
    if($email == $db_username && $password == $db_password){
        $_SESSION['username'] = $db_username;
        $_SESSION['password'] = $db_password;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['admin_id'] = $db_id;
        $_SESSION['Uemployee'] = $db_employee;
        header("Location: admin/redirect.php");
    }
    else{
        echo "<div class='alert'><strong>Input the right</strong> Username and password.</div>";
    }
        
    }
    
}

function adminAdd($email,$password){
    $role = "admin";
 global $connection;
$query = "INSERT INTO users(username,password,user_role) VALUES ('{$email}','{$password}','{$role}') ";
$result = mysqli_query($connection,$query);
confirmQuery($result);
echo "<script>alert('Successfully Added')</script>";
  
}

//Profile
function validOldPass($oldpassword,$admin_id){
    global $connection;
    $query = "SELECT * FROM users WHERE id = $admin_id";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $db_password = $row['password'];
        if($db_password == $oldpassword){
            return true;
        }else{
            return false;
        }
    }
}

function ValidPassword($email,$password2,$admin_id){
    global $connection;
   $password2 = mysqli_real_escape_string($connection,$password2);
   $query = "UPDATE users SET username = '{$email}' ,password = '{$password2}' WHERE id = {$admin_id}";
   $result = mysqli_query($connection,$query);
   confirmQuery($result);
}

?>
