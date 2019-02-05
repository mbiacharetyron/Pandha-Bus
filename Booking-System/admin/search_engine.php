<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM orders ";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM orders";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "pandha_bus");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
       
    </head>
    <body>
        
        <form action="" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Order Id</th>
                    <th>Bus Id</th>
                    <th>User Id</th>
                    <th>Username</th>
					<th>User Age</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Date</th>
					<th>Cost</th>
                </tr>

                <?php 

$query = "SELECT *  FROM  orders";
$select_users = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($select_users)) {
    $order_id = $row['order_id'];
    $bus_id = $row['bus_id'];
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_age = $row['user_age'];
    $source = $row['source'];
    $destination = $row['destination'];  
    $date = $row['date'];
    $cost = $row['cost'];                                      

?>
      <!-- populate table from mysql database -->
              
                <tr>
                    <td><?php echo $order_id ?></td>
                    <td><?php echo $row['bus_id'];?></td>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['user_name'];?></td>
					<td><?php echo $row['user_age'];?></td>
                    <td><?php echo $row['source'];?></td>
                    <td><?php echo $row['destination'];?></td>
                    <td><?php echo $row['date'];?></td>
					<td><?php echo $row['cost'];?></td>
                </tr>
                <?php ?>
            </table>
        </form>
        
    </body>
</html>