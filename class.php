<?php
   // Connect to database, and print error message if it fails
   try {
      $dbhandle = new PDO('mysql:host=dragon.kent.ac.uk; dbname=comp3230','comp3230', 'pa33word');
   } 
   catch (PDOException $e) {
      // The PDO constructor throws an exception if it fails
      die('Error Connecting to Database: ' . $e->getMessage());
   }
   
   // Run the SQL query, and print error message if it fails.
   $sql = "SELECT * FROM Class";
	
   $query = $dbhandle->prepare($sql);

   if ( $query->execute() === FALSE ) {
      die('Error Running Query: ' . implode($query->errorInfo(),' ')); 
   }
		
   // Put the results into a nice big associative array
   $results = $query->fetchAll();
	
   // Printing out the course details in the array results
?>
   <h2>Details of all courses</h2>

<?php		
   foreach ($results as $row) {
      echo "<p>".$row['cid'].": ".$row['course']."</p>";
   }   
?>		

