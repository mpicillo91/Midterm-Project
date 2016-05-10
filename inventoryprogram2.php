#!/usr/bin/php

<?php

// Welcome Screen:
echo "+-----------------------------------------+\n";
echo "| Welcome! Please choose an option below: |\n";
echo "|         1. Login as existing user       |\n";
echo "|         2. Create New User              |\n";
echo "+-----------------------------------------+\n";

$input = fgets(STDIN);

// Creating Connection:
switch ($input) {
	// Option 1: Login as existing user:
	case 1:
		echo "-------------------------------------------\n";
		echo "Please enter Username:	";
		$username = readline ();
		echo "-------------------------------------------\n";
		echo "Please enter Password:	";
		$password = readline ();
		echo "-------------------------------------------\n";
		echo "Okay... Working...\n";
		$servername = "p:localhost";
                $dbname = "storeinventory";
		// Create connection - Old Code:
		//$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			//if ($conn->connect_error)
			//{
			//	die("Connection failed: " . $conn->connect_error);
			//}
			
			//echo "Connected successfully";
		// Create Connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

                        // Check connection
                        
			if (!$conn) {
				 echo "Could not connect. Please run program again and try correct username and password.";
				exit;
			}

			//if ($conn->connect_error)
                        //{
                        //	die("Connection failed: " . $conn->connect_error);
			//	exit;
                        //}

			// Select current database
			//$db_selected = mysql_select_db('storeinventory', $conn);
			//if (!$db_selected)
			//{
			//	die ('Unable to connect to InventoryTable: ' . mysql_error());
			//}
			echo "-------------------------------------------\n";
                        echo "Connected successfully.\n";
		//$session = 1;
		break;
	// Option 2: Create new user:
	case 2:
		echo "-------------------------------------------\n";
		echo "Okay. Enter new user 'username':     ";
		$newusername = readline ();
		echo "-------------------------------------------\n";
		echo "Enter new user 'password':     ";
		$newpassword = readline ();
		echo "-------------------------------------------\n";
		echo "Working.....\n";
		$servername2 = "localhost";
		$username2 = "root";
		$password2 = "";
		$dbname2 = "storeinventory";
		$conn2 = mysqli_connect($servername2, $username2, $password2, $dbname2);
		if ($conn2->connect_error)
                        {
                              die("Connection failed: " . $conn->connect_error);
                        }
		$usercheck = mysqli_query($conn2, "SELECT User FROM mysql.user WHERE User='$newusername'");
		if(mysqli_num_rows($usercheck) >= 1)
			{
			echo "-------------------------------------------\n";
			echo"Error: Username already exists. Please run program again to try another username.\n";
			exit;
			}
		$result = "CREATE USER '$newusername'@'localhost' IDENTIFIED BY '$newpassword'";
                                                //mysqli_query($conn, $result);
                                                if (mysqli_query($conn2, $result)) {
                                                        echo "-------------------------------------------\n";
							echo "New user created successfully.\n";
                                                } else {
                                                        echo "-------------------------------------------\n";
							echo "Error: " . $result . "<br>" . mysqli_error($conn2);
							exit;
                                                }
		$result = "GRANT SELECT ON storeinventory.Inventory TO '$newusername'@'localhost'";
                                                //mysqli_query($conn, $result);
                                                if (mysqli_query($conn2, $result)) {
							echo "-------------------------------------------\n";
                                                        echo "New user privleges created successfully.\n";
							exit;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn2);
							exit;
                                                }
                                                break;
		echo "-------------------------------------------\n";
		echo "Success! New user '$newusername' has been successfully created (with guest-level privleges), and is now ready for use.\n";
		exit;
		break;
// Test Code - Should be able to delete this later.
	case 3:
		a:
		echo "Type something:";
		$test = readline ();
		if (is_numeric($test)) {
			echo "'{$test}' is numeric", PHP_EOL;
		} else {
			echo "'{$test}' is NOT numeric", PHP_EOL;
		}
		echo "Going back in time.....";
		goto b;

		b:
		if ($test == "a" OR $test == "b") {
			echo "You entered A or B";
		} else {
			echo "Not A or B";
		}
		//if ($test != "string") {
		//	echo "Oops! Don't type numbers!.";
		//} else {
		//	echo "Good Job! There should be no numbers here.";
		//}
		exit;
		break;
	default:
		echo "-------------------------------------------\n";
		echo "Invalid Answer. Please run program again, and type 1 or 2. Goodbye.\n";
		exit;
		}
if (!$conn) {
	echo "Could not connect. Please run program again and try correct username and password.";
	exit;
} elseif ($username == "inventoryclerk") {
	$session = 1;
} elseif ($username == "manager") {
	$session = 2;
} elseif ($username == "guest") {
	$session = 3;
} else {
	echo "-------------------------------------------\n";
	echo "Unknown Priveleges! Please make sure you are logged in as either 'inventoryclerk', 'manager', or 'guest'. If you are logged in as newly-created user, this message will be normal. You should proceed to use MySQL directly. Thank you.\n";
}


// Selection option begins here. This depends on which user has logged in. 
switch($session) {
	// Inventory Clerk:
	case 1:
		echo "+---------------------------------------------------------------------------------+\n";
		echo "|Successful Login as Inventory Clerk! Please select from the following options:   |\n";
		echo "| 1.      Update Spot check data for individual items in the stock room           |\n";
		echo "+---------------------------------------------------------------------------------+\n";
		break;
	// Manager:
	case 2:
		echo "+--------------------------------------------------------------------------+\n";
		echo "|Successful Login as Manager! Please select from the following options:    |\n";
		echo "| 1.      Set low water marks for ordering new stock                       |\n";
		echo "| 2.      Add / remove items to the inventory                              |\n";
		echo "| 3.      Get a report of items at or below the low water mark             |\n";
		echo "| 4.      Schedule a resupply                                              |\n";
		echo "+--------------------------------------------------------------------------+\n";
		break;
	// Guest:
	case 3:
		echo "+----------------------------------------------------------------------------------------+\n";
		echo "|Successful Login as Guest! Please select from the following options:                    |\n";
		echo "| 1.      Search for items based on name, description / category                         |\n";
		echo "| 2.      View an item (its information, stock count and if there has been any ordered,  |\n";
		echo "|         what the expected delivery date would be.                                      |\n";
		echo "+----------------------------------------------------------------------------------------+\n";
		break;
	default:
		echo "-------------------------------------------\n";
		echo "Unknown user. Program can only be used as Inventory Clerk, Manager, or Guest. Goodbye.\n";
		exit;
		}

$chosenoption = readline ();
if ($chosenoption == 'quit') {
	echo "-------------------------------------------\n";
	echo "Goodbye!\n";
	exit;
}

// This is where personalized user selection begins.
switch($session) {
	// Logged in as: Inventory Clerk
	case 1:
		switch($chosenoption) {
			// This is the only option:
			case 1:
				echo "-------------------------------------------\n";
				echo "Okay. Please type item number below:\n";
				$givenitemnumber = readline ();
				$sql = "SELECT StockNumber FROM Inventory WHERE ItemNumber = '$givenitemnumber'";
				//$currentstocknumber = mysqli_query($conn, $sql);
				$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
				$currentstocknumber = $getvalue['StockNumber'];
				echo "-------------------------------------------\n";
				echo "Okay. Please type in new stock number for item #$givenitemnumber:\n";
				$givenstocknumber = readline ();
				if ($currentstocknumber == $givenstocknumber) {
					echo "-------------------------------------------\n";
					echo "Error. Given stock number is already $givenstocknumber. Please run program and try again.\n";
					exit;
				} else {
					$result = "UPDATE Inventory SET
                                                StockNumber='$givenstocknumber' WHERE
                                                ItemNumber=$givenitemnumber";
                                                if (mysqli_query($conn, $result)) {
							echo "-------------------------------------------\n";
                                                        echo "Item #$givenitemnumber stock number successfully updated.\n";
							exit;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn);
							exit;
                                                }
				}
				break;
			default:
				echo "-------------------------------------------\n";
				echo "You must chose 1 (this is the only option). Please run program, and try again.\n";
				exit;
				}
		break;
	// Logged in as: Manager
	case 2:
		switch($chosenoption) {
			// First Option:
			case 1:
				echo "-------------------------------------------\n";
				echo "What would you like the new low-water mark to be?\n";
				$newlowwatermark = readline ();
				$sql = "SELECT LowWaterMark
                                                 FROM Inventory
                                                 WHERE ItemNumber LIKE 1";
                                //$query = mysqli_query($conn, $query);
				//echo "$query";
				//exit;
				//$lowwatermark = mysqli_query($conn, $query);
				$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                $currentlowwatermark = $getvalue['LowWaterMark'];
                                if ($currentlowwatermark == $newlowwatermark) {
					echo "-------------------------------------------\n";
                                        echo "Error: low-water mark is already '$newlowwatermark'.";
					exit;
                                } else {
					$query = "SELECT * FROM Inventory";
					$result = mysqli_query($conn, $query);
					$numberofrows = mysqli_num_rows($result);

				}
					$row = 1;
					while ($row <= $numberofrows) {
						$result = "UPDATE Inventory 
								SET LowWaterMark=$newlowwatermark 
								WHERE ItemNumber=$row";
						mysqli_query($conn, $result);
						$row = $row + 1;
					}
					echo "-------------------------------------------\n";
					echo "Low-water mark successfully changed to '$newlowwatermark' for $numberofrows items!\n";
					exit;

				
//				if (mysqli_query($conn, $result)) {
//                                                      echo "Low-water mark of '$userinput' successfully set";
//                                              } else {
//                                                      echo "Error: " . $result . "<br>" . mysqli_error($conn);
//                                              }
				break;
			// Second Option:
			case 2:
				echo "+--------------------+\n";
				echo "|Would you like to:  |\n";
				echo "| 1. Add an item?    |\n";
				echo "| 2. Remove an item? |\n";
				echo "+--------------------+\n";
				$userinput = readline ();
				switch($userinput) {
					// Second Menu: First Option - Add New Entry:
					case 1:
						echo "-------------------------------------------\n";
						echo "Okay. Please enter Item Name:\n";
						$argument1 = readline ();
						echo "-------------------------------------------\n";
						echo "Please enter Category:\n";
						$argument2 = readline ();
						echo "-------------------------------------------\n";
						echo "Please enter Supplier:\n";
                                                $argument3 = readline ();
						//echo "Okay. Please enter Item Number:";
                                                //$argument4 = readline ();
						$result = mysqli_query($conn, "Select * FROM Inventory");
						$numberofrows = mysqli_num_rows($result);
						$newitemnum = $numberofrows + 1;
						step4:
						echo "-------------------------------------------\n";
						echo "Please enter if item is in stock (Y,N):\n";
                                                $argument5 = readline ();
						if ($argument5 == "Y" OR $argument5 == "y" OR $argument5 == "N" OR $argument5 == "n") {
                        				goto step5;
                				} else {
							echo "-------------------------------------------\n";
                        				echo "Invalid. Please enter Y or N.\n", PHP_EOL;
							goto step4;
                				}
						step5:
						echo "-------------------------------------------\n";
						echo "Please enter if item has been ordered (Y,N):\n";
                                                $argument6 = readline ();
						if ($argument6 == "Y" OR $argument6 == "y" OR $argument6 == "N" OR $argument6 == "n") {
                                                        goto step6;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Invalid. Please enter Y or N.\n", PHP_EOL;
                                                        goto step5;
						}
						step6:
						echo "-------------------------------------------\n";
						echo "Please enter if item is still offered (Y,N):\n";
                                                $argument7 = readline ();
						if ($argument7 == "Y" OR $argument7 == "y" OR $argument7 == "N" OR $argument7 == "n") {
                                                        goto step7;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Invalid. Please enter Y or N.\n", PHP_EOL;
                                                        goto step6;
						}
						step7:
						echo "-------------------------------------------\n";
						echo "Please enter stock number:\n";
						$argument8 = readline ();
						echo "-------------------------------------------\n";
						echo "Please enter low-water mark:\n";
						$argument9 = readline ();
						stepend:
						$result = "INSERT INTO Inventory (ItemName, Category, Supplier, ItemNumber, InStock, Ordered, StillOffered, StockNumber, LowWaterMark) VALUES ('$argument1', '$argument2', '$argument3', '$newitemnum', '$argument5', '$argument6', '$argument7', '$argument8', '$argument9')";
						//mysqli_query($conn, $result);
						if (mysqli_query($conn, $result)) {
							echo "-------------------------------------------\n";
							echo "New record created successfully.\n";
							exit;
						} else {
							echo "-------------------------------------------\n";
							echo "Error: " . $result . "<br>" . mysqli_error($conn);
							exit;
						}
						break;
					// Second Menu: Second Option - Delete Entry:
					case 2:
						echo "-------------------------------------------\n";
						echo "Okay. Please enter the Item Number of the item you would like to remove:\n";
						$userinput = readline ();
						$result = "DELETE FROM Inventory WHERE ItemNumber='$userinput'";
						if (mysqli_query($conn, $result)) {
							echo "-------------------------------------------\n";
                                                        echo "Record #$userinput deleted successfully.\n";
							exit;
                                                } else {
							echo "-------------------------------------------\n";
                                                        echo "Error: " . $result . "<br>" . mysqli_error($conn);
							exit;
                                                }
						break;
				break;
				}
			// Third Option:
			case 3:
				echo "-------------------------------------------\n";
				echo "Okay... Working...\n";
				$sql1 = "SELECT LowWaterMark FROM Inventory WHERE ItemNumber = 1";
				$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
                                $currentlowwatermark = $getvalue['LowWaterMark'];
				$sql2="SELECT ItemName,Category,Supplier,ItemNumber,InStock,Ordered,StillOffered,StockNumber,LowWaterMark FROM Inventory WHERE StockNumber <= $currentlowwatermark";
				$result=mysqli_query($conn, $sql2);
				echo "-------------------------------------------\n";
				echo "Column names, from left-to-right:\n";
				echo "-------------------------------------------\n";
				$number = 0;
				while ($finfo = mysqli_fetch_field($result)) {
					$number = $number + 1;
					printf("Column $number: %s", $finfo->name);
					echo "\n";
				}
				echo "-------------------------------------------\n";
				echo "Results:\n";
				echo "-------------------------------------------";
				//$property = mysqli_fetch_field($result);
				//$i = 0;
				//echo '<html><body><table><tr>';
				//while ($i < mysqli_num_fields($result))
				//{
					//$meta = mysqli_fetch_field($result);
					//echo '<td>' . $meta->name . '</td>';
					//$i = $i + 1;
				//}
				//echo '</tr>';
				//echo $property->name;
				//while($row = $result->fetch_array()) {
				while($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
        				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
					// Numeric array
					//$row=mysqli_fetch_array($result,MYSQLI_NUM);
					//$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
					//echo json_encode($row, JSON_PRETTY_PRINT);
					printf ("\n%-20.20s %-20.20s %-20.20s %-11.11d %-5.5s %-5.5s %-5.5s %-11.11d %-11.11d",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
					}
				// Associative array
				//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				//printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);
				echo "\n";
				echo "-------------------------------------------\n";
				exit;
				break;
			// Fourth Option:
			case 4:
				echo "-------------------------------------------\n";
				echo "Okay. Please type the Item Number of the item you want to place an order for:\n";
				$requesteditemnumber = readline ();
				$sql = "SELECT Ordered
        					FROM Inventory
        					WHERE ItemNumber = '$requesteditemnumber'";
				//$orderedresult = mysqli_query($conn, $sql);
				$getordered = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                $currentordered = $getordered['Ordered'];
				if ($currentordered == "Y") {
					echo "-------------------------------------------\n";
					echo "Error: Item #$requesteditemnumber has already been ordered. Goodbye.\n";
					exit;
				} else {
					$result = "UPDATE Inventory SET
						Ordered = 'Y' WHERE
						ItemNumber = $requesteditemnumber";
						if (mysqli_query($conn, $result)) {
							echo "-------------------------------------------\n";
							echo "Record #$requesteditemnumber successfully ordered.\n";
							exit;
                                		} else {
							echo "-------------------------------------------\n";
							echo "Error: " . $result . "<br>" . mysqli_error($conn);
							exit;
                                		}
				}
				break;
			default:
				echo "-------------------------------------------\n";
				echo "Error: You did not enter 1, 2, 3, or 4. Please run the program again, and try one of these options.\n";
				exit;
			}

//		break;
//		default:
//			echo "Error. You did not enter 1, 2, 3, or 4.";
//			}
	// Guest:
	case 3:
		switch($chosenoption) {
			// First Option:
			case 1:
				echo "-------------------------------------------\n";
				echo "Please type your search selection:\n";
				$searchselection = readline ();
				echo "-------------------------------------------\n";
				echo "Okay... Working...\n";
//				$searchselection = mysqli_real_escape_string($conn, $searchselection);

				//$query = "SELECT * FROM Inventory WHERE ItemName LIKE '%$searchselection%' OR Category LIKE '%$searchselection%'";
				//$result = mysql_query($query, $conn);
				//if($result) {
				//	$output = mysql_fetch_assoc($result);
				//	echo $output;
				//}
				//$result = mysql_fetch_array(mysql_query("SELECT * FROM Inventory WHERE ItemName LIKE '%$searchselection%' OR Category LIKE '%$searchselection%'"));
				//while ($row = mysql_fetch_array($result)) {
				//	foreach ($row as $columnName => $columnData) {
				//	echo 'Column name: ' . $columnName . ' Column data: ' . $columnData . '<br />';
				//	}
				//}

				$sql = "SELECT ItemName, Category, Supplier, ItemNumber, InStock, Ordered, StillOffered, StockNumber, LowWaterMark FROM Inventory WHERE ItemName LIKE '%$searchselection%' OR Category LIKE '%$searchselection%'";
				//$results = mysqli_query($conn, $result);
				//var_dump($results);
                                $result=mysqli_query($conn, $sql);
                                $property = mysqli_fetch_field($result);
                                //echo $property->name;
				echo "-------------------------------------------\n";
                                //while($row = $result->fetch_array()) {
                                while($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
                                        printf ("\n%-20.20s %-20.20s %-20.20s %-11.11d %-5.5s %-5.5s %-5.5s %-11.11d %-11.11d",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
				}
//				$output= mysqli_query($conn, $result) or die(mysql_error());	
//				while($row = mysqli_fetch_assoc($output)){
//    					foreach($row as $cname => $cvalue){
//   	    				//<table>
//					echo "$cname: $cvalue\t";

					//echo "<td>$row</td>";

    					//print "<t\n";
					//<\table>;
//    					}
//    				print "\t\r\n";
//				}
				//print_r($result);
				//$result = $conn->query($query);
				//echo "$result";
				//echo "This should be what you typed in: $searchselection";
				exit;
				break;
			// Second Option:
			case 2:
				echo "-------------------------------------------\n";
				echo "Please type Item Number of requested item:\n";
                                $searchselection = readline ();
				echo "-------------------------------------------\n";
                                echo "Okay... Working...\n";
                                $searchselection = mysqli_real_escape_string($conn, $searchselection);
                                $result = "SELECT ItemName, InStock, Ordered FROM Inventory WHERE ItemNumber LIKE '$searchselection'";
                                $output= mysqli_query($conn, $result) or die(mysql_error());
                                while($row = mysqli_fetch_assoc($output)){
                                        foreach($row as $cname => $cvalue){
                                        echo "$cname: $cvalue\t";
                                        }
                                print "\t\r\n";
                                }
				$getvalue = mysqli_fetch_assoc(mysqli_query($conn, $result));
                                $orderedstatus = $getvalue['Ordered'];
				if ($orderedstatus == 'Y') {
					echo "-------------------------------------------\n";
					echo "Expected Delivery: Within 5 business days days.\n";
				} else {
					echo "-------------------------------------------\n";
					echo "Expected Delivery: No delivery estimation. Item has not been ordered.\n";
				}
				exit;
                                break;
			default:
				echo "-------------------------------------------\n";
				echo "Unable to process request. Please run program and try again.\n";  
				exit;
				}
				}


// things to do:
// - Found out how to display column names. Next see if there is a way to have them formated more nicely, if time permits.
// More notes:
// SELECT * FROM Inventory WHERE Category LIKE '%Food%';
// SELECT * FROM Inventory WHERE Supplier LIKE '%es%' OR ItemName LIKE '%es%';

?>
