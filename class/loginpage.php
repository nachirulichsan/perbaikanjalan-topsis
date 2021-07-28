<?php
class Login{
    private $_username;
    private $_password;
    
    public function __construct($usrname,$usrpwd){
        $this->_username = $usrname;
        $this->_password = $usrpwd;
    }

    function saveToDB(){
        require_once 'class/connection.php';
        $_usrname = $this->_username;
        $_usrpwd = $this->_password;

        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = "INSERT INTO login (user_name, user_pwd)
                VALUES('$_usrname','$_usrpwd')";
                
                $pdo->exec($stmt);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function checkUserPwd(){
        require_once 'class/connection.php';;
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM login WHERE user_name='$this->_username' AND user_pwd='$this->_password'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $total = $stmt->rowCount();
            $rowcheck=$stmt->fetchObject();
            if (($total==1) && ($rowcheck->user_name == $this->_username) && ($rowcheck->user_pwd==$this->_password)){
                
                sleep(5);
                echo 'login succesfull...redirecting to mainpage...';
                header('Location:rekomendasi.php');
            }else{
                echo 'Account does not exist';
                exit();
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }    
    }

}
function showDataFromDB(){
    include 'class/connection.php';
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM login";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    echo '
            <link href="css/customer.css" rel="stylesheet" type="text/css" media="all" />
            <table>
                <thead>
                    <th>UserName</th><th>Password</th><th>Action</th>
                </thead>
                <tbody>';
    while ($row3 = $stmt->fetchObject()) {                
                    echo '<tr>
                        <td>'.$row3->user_name.'</td>
                        <td>'.$row3->user_pwd.'</td>
                        <td><a href="./reguser.php?action=edit&&id='.$row3->user_name.'" class="myaction">Edit Data</a>
                        <a href="./reguser.php?action=delete&&id='.$row3->user_name.'" class="myaction" style="background-color:#e76f51;">Delete Data</a></tr>';
    
    }
    echo '</tbody>
            </table>';
}
?>