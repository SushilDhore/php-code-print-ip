<!DOCTYPE html>
<html>
<head>
    <title>Attractive PHP Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .output {
            background-color: #ecf0f1;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .inet-line {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .inet-address {
            font-size: 18px;
            font-weight: bold;
#	    color: #2c3e50;
            color: red;
            font-size: 44px;
        }

        .inet-details {
            font-size: 14px;
            color: #777;
	}
	.col {
	color:green;
	}
    </style>
</head>
<body>
    <header>
        <h1> "Monk Who Travel" </h1>
    </header>

    <div class="container">
        <h2> Docker Container IP 1 </h2>
        <div class="output">
            <?php
                // Get server information using PHP function
                $serverInfo = shell_exec('ifconfig eth0');
		$result = explode(" ",`ifconfig`);

		$result1 = explode(" ",$result[16]);
                // Filter the "inet" line using string functions
                $lines = explode("\n", $serverInfo);
                $filteredLine = '';
                foreach ($lines as $line) {
                    if (strpos($line, 'inet ') !== false) {
                        $filteredLine = $line;
                        break;
                    }
                }
                // Display the filtered line with a nice layout
                if ($filteredLine) {
                    $ipDetails = explode(" ", $filteredLine);
                    $ipAddress = $ipDetails[1];
                    $netmask = $ipDetails[3];
                    $broadcast = $ipDetails[5];
                    echo "<div class='inet-line'>";
		    echo "<div class='inet-address'>Server Private IP : <span class='col'> $result[13]</span> </div>";
#                    echo "<div class='inet-details'>Netmask: $netmask | Broadcast: $broadcast</div>";
                    echo "</div>";
                } else {
                    echo "No 'inet' address found.";
                }
            ?>
        </div>
    </div>
</body>
</html>

