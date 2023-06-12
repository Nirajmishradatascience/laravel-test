<html>
<body>

<h2>HTML Forms</h2>

<form action="{{url('saveMyTest') }}" method="post" enctype="multipart/form-data">

  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

  <label for="name">Enter Your Name:</label><br>
  <input type="text" id="name" name="name" value=""><br>

  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" value=""><br><br>

  <label for="mobile">Mobile Number:</label><br>
  <input type="text"  pattern="\d*" id="mobile" name="mobile" value="" maxlength="10"><br><br>

  <label for="pasword">Password:</label><br>
  <input type="password" id="password" name="password" value=""><br><br>

  <label for="image">Profile Pic:</label><br>
  <input type="file" id="image" name="image"  accept=".png, .jpg, .jpeg" ><br><br>


  <input type="submit" value="Submit" id="submit">
</form>



</body>
</html>