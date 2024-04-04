
  <!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> NadraDB </title>
        
</head>
 <html1><body1>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="./boss/jquery.min.js.download"></script>
  <script src="./boss/bootstrap.min.js(1).download"></script>
<style>
body {
 background-image: url(".jpg");
 background-color: white;
}
#pageloader
{
  background: rgba( 255, 255, 255, 0.8 );
  height: 100%;
  display:none;
  position: relative;
  width: 100%;
  z-index: 9999;
}

#pageloader img
{
  position: absolute;
  margin-left: 35%;
  margin-top: 30%;
  width:auto;
  max-height:100px;
}

@media screen and (max-width: 576px) {
#pageloader img
{
  position: absolute;
  margin-left: 10%;
  margin-top: 70%;
  width:auto;
  max-height:100px;
}
    
}
    input {
  
 padding: 8px;
 border-radius: 10px;
 width: 300px;
 letter-spacing: 3px;
 
font-weight: bold;
 border: 1px solid #918383;
 background-color: #87b8b8;
 box-shadow: 1px 2px 1px 2px rgb(230, 229, 229);
 color: black;
 outline: none;
 font-size: 18px;
 
}
    }

     
col-md-12 {
  position: relative;
}
p {
  font: italic small-caps bold 12px/15px georgia, serif;
}
p2 {
  font: italic small-caps bold 12px/15px georgia, serif;
  
}
</style>
<center>
<div class="container">

<body>
    <div class="container">


        
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
    <base href="/" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link href="css/site.css" rel="stylesheet" />
    <script src="_content/MatBlazor/dist/matBlazor.js"></script>
    <link href="_content/MatBlazor/dist/matBlazor.css" rel="stylesheet" />

</head>
<body>
<div class="main">
<!-- Load icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<p></p>
<center><h4><strong>𝐒𝐢𝐦 𝐃𝐚𝐭𝐚𝐛𝐚𝐬𝐞 𝟐𝟎𝟐𝟑</strong><h4/></center>
<div class="row mt-4 justify-content-center">
    <div class="col-md-6">
        
    </div>
        <form method="" id="get">


    <div class="form-group col-md-12">
            <input id="search" placeholder="Enter Mobile" type="text" name="search" minlength="10" maxlength="11" required>
          </div>

  
   <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success" >Search 🔎</button> 
<p></p>
           <p></p>
       <p>Only search data with 0 like 03003008000, otherwise may data not show</p>


            <div class="d-flex justify-content-end">
            
          </div>
          

      <table class="table table-hover table-bordered text-center">
        <tbody id="data">



</form>


    </br></thead><!--!-->
    
</center>

<p2> Please don't use our services illegally only use for educational purpose Thanks for using NadraDB </p2>

            <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>		

<tbody><tr> 
<?php

function normalizeMobileNumber($number) {
   
    $number = preg_replace('/\D/', '', $number);
    
    
    $number = preg_replace('/^\+?92/', '', $number);
    
   
    $number = preg_replace('/\s/', '', $number);
    
    
    if (substr($number, 0, 1) === '0') {
        $number = '92' . substr($number, 1);
    }
    
   
    if (!preg_match('/^92/', $number)) {
        $number = '92' . $number;
    }
    
    return $number;
}

if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    
  
    if (!preg_match('/^\+?92/', $search_query) && !preg_match('/^92/', $search_query) && !preg_match('/^0/', $search_query) && !preg_match('/^3/', $search_query)) {
        
        $normalized_query = $search_query;
    } elseif (strlen($search_query) === 13) {
        $normalized_query = $search_query;
    } elseif (strlen($search_query) === 10 && substr($search_query, 0, 1) === '0') { 
        $normalized_query = $search_query;
    } else {
       
        $normalized_query = normalizeMobileNumber($search_query);
    
    }

    $api_url = "https://azriladb.site/api/nadradb/msisdn.php?search_term={$normalized_query}";

    // Attempt to fetch data from the API
    $json_data = @file_get_contents($api_url);

    if ($json_data === false) {
        // Display error message for failed request
        echo "Error: Failed to fetch data from the API.";
    } else {
        // Decode JSON data
        $data = json_decode($json_data, true);

        // Check if the response contains an error message
        if (isset($data['error']) && $data['error'] === "Unauthorized access") {
            // Display custom error message for unauthorized access
            echo "Error: Unauthorized access. Please contact the administrator.";
        } elseif (isset($data['message']) && $data['message'] === "Domain is Not Allow to get data") {
            // Display custom error message for domain restriction
            echo "Error: Domain is not allowed to access the data.";
        } elseif ($data) {
            // Process and display results
            foreach ($data as $result) {
                echo '<div class="result-box">';
               
                echo '<tr><center><td style="background-color:skyblue"><strong>Network</strong></td> <td> ' . htmlspecialchars($result['Network']) . ' <i class="fa fa-signal" style="color:green"></i></td></tr></center>';
                if ($result['Network'] === 'PTCL') {
                    echo '<tr><td style="background-color:skyblue"><strong>Name</strong></td> <td> ' . htmlspecialchars($result['CUSTOMER_NAME']) . ' .</td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Father Name</strong></td> <td> ' . htmlspecialchars($result['FATHER_NAME']) . ' .</td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Address</strong></td> <td>- - - ' . htmlspecialchars($result['ADDRESS1']) . ', Region: - Country: Pakistan</td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>NIC</strong></td> <td> ' . htmlspecialchars($result['CNIC_NTN']) . '</td></tr>';
                } elseif ($result['Network'] === 'Jazz') {
                    echo '<tr><td style="background-color:skyblue"><strong>MSISDN</strong></td> <td>' . htmlspecialchars($result['Mobile']) . ' <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Name</strong></td> <td> ' . htmlspecialchars($result['Name']) . ' . <i class="fa fa-arrow-down" style="color:red"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>NIC</strong></td> <td> ' . htmlspecialchars($result['CNIC']) . ' <i class="fa fa-arrow-down" style="color:red"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Address</strong></td> <td>- - - ' . htmlspecialchars($result['Address']) . ', Region: - Country: Pakistan <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                } elseif ($result['Network'] === 'Telenor') {
                    echo '<tr><td style="background-color:skyblue"><strong>MSISDN</strong></td> <td> ' . htmlspecialchars($result['Mobile']) . ' <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Name</strong></td> <td> ' . htmlspecialchars($result['Name']) . ' . <i class="fa fa-arrow-down" style="color:red"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>NIC</strong></td> <td> ' . htmlspecialchars($result['CNIC']) . ' <i class="fa fa-arrow-down" style="color:red"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Address</strong></td> <td>- - - ' . htmlspecialchars($result['Address']) . ', Region: - Country: Pakistan <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                } elseif ($result['Network'] === 'Ufone') {
                    echo '<tr><td style="background-color:skyblue"><strong>MSISDN</strong></td> <td> ' . htmlspecialchars($result['SUB_NO']) . ' <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Name</strong></td> <td> ' . htmlspecialchars($result['NAME']) . ' . <i class="fa fa-arrow-down" style="color:red"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Address</strong></td> <td>- - - ' . htmlspecialchars($result['ADDRESS']) . ', Region: - Country: Pakistan <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>NIC</strong></td> <td> ' . htmlspecialchars($result['NIC']) . ' <i class="fa fa-arrow-down" style="color:red"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>City</strong></td> <td> ' . htmlspecialchars($result['CITY']) . ' <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                } elseif ($result['Network'] === 'Zong') {
                    echo '<tr><td style="background-color:skyblue"><strong>MSISDN</strong></td> <td> ' . htmlspecialchars($result['Mobile']) . ' <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Name</strong></td> <td> ' . htmlspecialchars($result['Name']) . ' . <i class="fa fa-arrow-down" style="color:red"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>NIC</strong></td> <td> ' . htmlspecialchars($result['CNIC']) . ' <i class="fa fa-arrow-down" style="color:red"></i></td></tr>';
                    echo '<tr><td style="background-color:skyblue"><strong>Status</strong></td> <td> ' . htmlspecialchars($result['Status']) . ' <i class="fa fa-arrow-up" style="color:green"></i></td></tr>';
                }
                echo '</div>'; 
            }
        } else {
            // No records found
            echo '<td style="background-color:red"><strong style="color: white;"> No Record Found; Contact NadraDB for Details. </strong></td>';
        }
    }
}
?>
</center>



    </div>
</body>

</html>



</head>





<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">





