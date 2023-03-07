<html>
<body>
<?php 
    $bg_color = '#E2DFD2'; 
    echo "<body style='background-color: $bg_color;'>"; 
    include("connect.php");
?>
<form action="register.php" method="post" style="text-align: center; ">
    <div class="container">
      <h1>Register</h1>
      <p>Please register to make blood donation!</p>
  
     <table style="border-collapse:separate; border-spacing:0 15px; margin: auto;"> 
      <tr>
      <td> <label for="first_name"><b>First Name</b></label> </td>
      <td> <input type="text" placeholder="Enter First Name" name="first_name" id="first_name" required><br><br> </td>
      <td></td>
      <td></td>
      </tr>

      <tr>
      <td> <label for="last_name"><b>Last Name</b></label></td>
      <td> <input type="text" placeholder="Enter Last Name" name="last_name" id="last_name" required><br><br></td>
      </tr>

      <tr>
      <td>  <label for="email"><b>Email</b></label></td>
      <td> <input type="text" placeholder="Enter Email" name="email" id="email" required><br><br></td>
      </tr>

      <tr>
      <td> <label for="phone"><b>Phone Number</b></label></td>
      <td>  <input type="phone" placeholder="Enter Phone Number" name="phone" id="phone" required><br><br></td>
      </tr>

      <tr>
      <?php
        echo "<td>";
        echo "<b>State</b>";
        echo "</td>";
      ?>
      <?php echo "<td>";?>
      <select name="states_name">
      <option value="">Select state</option>
      <?php 
        $query ="SELECT * FROM states";
        $result = $con->query($query);
        while ($row = mysqli_fetch_array($result)) {
          echo '<option>'.$row['states_name'].'</option>';
          }
        ?>
      </select>
      <?php echo "</td>";?>
      </tr>

      <tr>
      <?php
        echo "<td>";
        echo "<b>Blood Group</b>";
        echo "</td>";
      ?>
      <?php echo "<td>";?>
      <select name="blood_group">
      <option value="">Select blood group</option>
      <?php 
        $query ="SELECT * FROM bloodgroup";
        $result = $con->query($query);
        while ($row = mysqli_fetch_array($result)) {
          echo '<option>'.$row['bloodgroup_name'].'</option>';
          }
        ?>
      </select>
      <?php echo "</td>";?>
      </tr>

      <tr>
        <td><td>
      <button type="submit" class="registerbtn" name="submit" ><strong>Submit<strong></button>
       </td></td>
      </tr>
    </table>
    </div>
  </form>

  <?php
if(isset($_POST['submit']))
{    
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $states_name = $_POST['states_name'];
     $blood_group = $_POST['blood_group'];
     $sql = "INSERT INTO collectdata (first_name,last_name,email,phone,states_name,blood_group)
     VALUES ('$first_name','$last_name','$email', '$phone', '$states_name', '$blood_group')";
     if (mysqli_query($con, $sql)) {
        echo "You have been registered successfully!";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
     }
     mysqli_close($con);
}
?>

</body>
</html>