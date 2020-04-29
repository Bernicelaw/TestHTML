<html>
     <head>
          <title>List of KL Restaurant</title>
     </head>
     <body>
          <center>
              <h1>List of KL Restaurant</h1>
              <!--create table structure using HTML first-->
              <table border="1">
                    <tr>
                        <th>Restaurant ID</th>
                        <th>Restaurant Name</th>
                        <th>Restaurant Address</th>
                        <th>Restaurant Phone</th>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Subway Restaurant</td>
                        <td>Menara Standard Chartered, TPM</td>
                        <td>03-22441234</td>
                    </tr>
                      <?php
                          $serverName = "samplewebtp046184.database.windows.net";
                          $connectionOptions = array(
                                               "Database" => "Restaurant",
                                               "Uid" => "sampleweb",
                                               "PWD" => "Sample@web");
                         //Establishes the connection
                         $conn = sqlsrv_connect($serverName, $connectionOptions);
                         if (!$conn)
                         {
                             die("Error connection: ".sqlsrv_errors());
                         }
                         //Run the SQL command: Select statement (view)
                         $tsql= "SELECT * FROM [dbo].[restaurant]";
                         $getResults= sqlsrv_query($conn, $tsql);
                         if ($getResults == FALSE)
                         {
                              die(sqlsrv_errors());
                         }
                         while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC))
                         {
                               echo "<tr>";
                               echo "<td>". $row['restaurant_id'] . "</td>";
                               echo "<td>". $row['restaurant_name'] ."</td>";
                               echo "<td>". $row['restaurant_address'] . "</td>";
                               echo "<td>". $row['restaurant_phone'] . "</td>";
                               echo "</tr>";
                          }
                          sqlsrv_free_stmt($getResults);
                      ?>        
                </table>
            </center>
       </body>
</html> 
