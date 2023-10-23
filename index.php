<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation Using JS, and Ajax</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

   <form action="" id="myForm" class="center-form">
        <h2>Fill the Form</h2>

       <input type="text" name="name" id="name" placeholder="Enter Your Name...">
       <span class="error" id="nameError">*</span>
        <br/><br/>
       <input type="email" name="email" id="email" placeholder="Enter Your Email...">
       <span class="error" id="emailError">*</span>
       <br/><br/>


      <button type="submit" id="submitButton" >Submit</button>
   </form>
   <div id="result"></div>

   <script src="script.js"></script>

</body>
</html>