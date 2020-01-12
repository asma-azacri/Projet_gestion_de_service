<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  

  background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url('image/accuil.png');
          height: 100%;
        background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;
          margin:0;
}



.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: black;
  text-align: center;
  cursor: pointer;
  font-size:40px;
}
a{
  color:white ;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
</style>
</head>
<body>

<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px">Gestion des services</h1>
    <button ><a href="trame_auth/login.php">login</button>
  </div>
</div>


</body>
</html>
