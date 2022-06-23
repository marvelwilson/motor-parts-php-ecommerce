<?php 

 function add_quantity()
{
	include 'admin/connect.php';
  if (isset($_POST)) {
  	 $user_id = $_POST['user_id'];
  	 $product_id = $_POST['id'];
  	 $added_quantity = $_POST['added_quantities'];
  	 $total_quantity = $_POST['total_quantity'];
  	 $total = $_POST['total'];
  	 $sub_total = $_POST['sub_total'];
  	 $select = mysqli_query(connection(),"SELECT * FROM product_details WHERE id='$product_id'");
     $result = mysqli_fetch_assoc($select);
          $main_total = $result['amount']+$total;
  	 $update = mysqli_query(connection(),"UPDATE added_items SET quantity='$added_quantity',total='$main_total' WHERE product_id='$product_id' AND user_id='$user_id'");
     if ($update) {
          $subber_total = $result['amount']+$sub_total;
       mysqli_query(connection(),"UPDATE added_items SET total_quantity='$total_quantity',sub_total='$subber_total' WHERE user_id='$user_id'");
     }

  }
}
function dedute_quantity()
{
	include 'admin/connect.php';
	 if (isset($_POST)) {
  	 $user_id = $_POST['user_id'];
  	 $product_id = $_POST['id'];
  	 $dedute_quantity = $_POST['deduted_quantities'];
  	 $total_quantity = $_POST['total_quantity'];
  	 $total = $_POST['total'];
  	 $sub_total = $_POST['sub_total'];
  	 $select = mysqli_query(connection(),"SELECT * FROM product_details WHERE id='$product_id'");
     $result = mysqli_fetch_assoc($select);
  	 if ($dedute_quantity>0) {
          $main_total = $total-$result['amount'];
  	   $update = mysqli_query(connection(),"UPDATE added_items SET quantity='$dedute_quantity',total='$main_total' WHERE product_id='$product_id' AND user_id='$user_id'");
     if ($update) {
          $subber_total = $sub_total-$result['amount'];
       mysqli_query(connection(),"UPDATE added_items SET total_quantity='$total_quantity',sub_total='$subber_total' WHERE user_id='$user_id'");
     }
  	 }
  }
}

 function add_address()
 {
 	if (isset($_POST['add'])) {
 		$id = $_SESSION['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$company = $_POST['company'];
		$country = $_POST['country'];
		$str_address = $_POST['str_address'];
    $apartment = $_POST['apartment'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$postcode = $_POST['postcode'];
		$email_address = $_POST['email'];
		$phone = $_POST['phone'];
		$default = @$_POST['default'];

		if ($firstname==null || $lastname==null || $country==null || $str_address==null || $city==null || $state==null || $postcode==null && $email_address==null) {
			echo "<div class='alert alert-danger'>please fill out the required fields</div>";
		}elseif (!filter_var($email_address,FILTER_VALIDATE_EMAIL)) {
             echo "<h2 class='alert alert-danger text-center'>invalid email</h2>";
         }else{
			$insert = mysqli_query(connection(),"INSERT INTO user_address (user_id,firstname,lastname,company_name,country,str_address,apartment,city_town,state_country,postcode_zip,email_address,phone,stats) VALUES('$id','$firstname','$lastname','$company','$country','$str_address','$apartment','$city','$state','$postcode','$email_address','$phone','$default')");
			if ($insert) {
				echo "<div class='alert alert-success'>Successfully Created Address</div>";
			}
		}

	}
 }
 function update_address()
 {
 	if (isset($_POST['update'])) {
 		$id = $_GET['Edit_address'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$company = $_POST['company'];
		$country = $_POST['country'];
		$str_address = $_POST['str_address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$postcode = $_POST['postcode'];
		$email_address = $_POST['email'];
		$phone = $_POST['phone'];
		$default = @$_POST['default'];

		if ($firstname==null || $lastname==null || $country==null || $str_address==null || $city==null || $state==null || $postcode==null && $email_address==null) {
			echo "<div class='alert alert-danger'>please fill out the required fields</div>";
		}elseif (!filter_var($email_address,FILTER_VALIDATE_EMAIL)) {
             echo "<h2 class='alert alert-danger text-center'>invalid email</h2>";
         }else{
			$insert = mysqli_query(connection(),"UPDATE  user_address SET firstname='$firstname',lastname='$lastname',company_name='$company',country='$country',str_address='$str_address',city_town='$city',state_country='$state',postcode_zip='$postcode',email_address='$email_address',phone='$phone',stats='$default' WHERE id='$id'");
			if ($insert) {
				echo "<div class='alert alert-success'>Successfully Updated Address</div>";
			}
		}

	}
 }
 function change_password()
 {
 	      if (isset($_POST['change'])) {
                     $old_pass = $_POST['old_pass'];
                     $password= $_POST['password'];
                     $re_pass= $_POST['re_pass'];
                      $id = $_SESSION['id'];
                  if ($old_pass==null && $password==null && $re_pass==null) {
                     echo "<h2 class='alert alert-danger text-center col-lg-4'>this fields is required</h2>";
                  }else if ($old_pass!==null && $password!==null && $re_pass!==null) {
                      $check = mysqli_query(connection(),"SELECT * FROM user_info WHERE password='$old_pass'");
                      if (mysqli_num_rows($check)>0) {
                      	if ($password!==$re_pass) {
                      	echo "<h2 class='alert alert-danger col-lg-4'>New Password Miss Match</h2>";
                      	}else{
                      		$update =  mysqli_query(connection(),"UPDATE  user_info SET  password='$password' WHERE id='$id'");
                      		if ($update) {
                      	  echo "<h2 class='alert alert-success col-lg-4'>Successfully Changed Password</h2>";
                      		}
                      	}
                      }else{
                        echo "<h2 class='alert alert-danger col-lg-4'>Old Password Does not Exist</h2>";
                      }
                  }
                 }
 }

 function countries()
 {
 	$countries = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];
 	foreach ($countries as $value) {
 		echo "<option value=".$value.">".$value."</option>";
 	}

 }
 if (@$_GET['request_type']=='add_quantity') {
 	add_quantity();
 }else if (@$_GET['request_type']=='dedute_quantity') {
 	dedute_quantity();
 }
 ?>