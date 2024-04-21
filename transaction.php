<?php
    $transfer_from=$_GET["transfer_from"];
    $transfer_to=$_GET["transfer_to"];
    $amount=$_GET["amount"];

    include("dbconnection.php");
    $sql = "SELECT balance from customer where account_no=$transfer_from;";
   
    $result = $conn->query($sql);
    $sender_balance=0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $sender_balance=$row["balance"];
        }
    } else {
        echo "0 results";
    }
    $to = "SELECT balance from customer where account_no=$transfer_to;";
    $result = $conn->query($to);
    $receiver_balance=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        
        $receiver_balance=$row["balance"];
        
        }
    } else {
        echo "0 results";
    }

    $sender_balance-=$amount;
    $receiver_balance+=$amount;
    $status="failed";
    if($sender_balance >=0){
        $status= "success";
        $sql = "UPDATE customer SET balance=$sender_balance WHERE account_no=$transfer_from";

        if ($conn->query($sql) === TRUE) {
       
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $sql = "UPDATE customer SET balance=$receiver_balance WHERE account_no=$transfer_to";

        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error updating record: " . $conn->error;
        }
    }

    

    $transaction_date=date('Y-m-d');
    $sql = "insert into transaction(transfer_from,transfer_to,date,amount,status)
    VALUES($transfer_from, $transfer_to, '$transaction_date',$amount,'$status')";
   
    if ($conn->query($sql) === TRUE) {
    
    } else {
    echo "Error updating record: " . $conn->error;
    }





     header("Location: show-transaction.php");

?>