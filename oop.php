 <?php 

 // Check if the form is submitted
if (isset( $_POST['submit'] ) ) {

// retrieve the form data by using the element's name attributes value as key

echo '<h2>form data retrieved by using the $_REQUEST variable<h2/>';

}


  ?><form action="oop.php" method="post">

<input type="text" name="firstname" placeholder="First Name" />

<input type="text" name="lastname" placeholder="Last Name" />

<input type="submit" name="submit" />
</form>