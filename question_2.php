<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/question_1.css">
  <script type="text/jquery" src="js/script.js"></script>  
  <link rel="shortcut icon" href="./img/small_maple.png">
  <title>Jurisdiction Finder</title>
</head>

<header>
  <div class="black_band">
    <img src="./img/small_logo.PNG" alt="small">
  </div>
  <div class="head">
    <h1>Jurisdiction Finder</h1>
    <img src="./img/maple leaf.png" alt="maple" class="img_1">
    <img src="./img/government_logo.png" alt="government_logo" class="img_2">
  </div>
</header>

<body>
  <div class="container">
    <section class="page_1 head">
      <p>Does your job require you to work across two or more provinces, or across the Canadian border?</p>
      <form action="#">
        <button id="YES" type="button">YES</button>
        <button id="NO" type="button">NO</button>
      </form>
    </section>
  </div>
  <?php echo '<input id="employer" type="hidden" val="'.$_GET["employer"].'" />'; ?>
</body>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script>
  var employerName = $("#employer").val();
  
  $(function(){
    $("#YES").click(function(){
      var employer = $("#employer").val();
      $.ajax({
        method:'POST',
        url:'addcompany.php',
        data:{"employer":employer},
        dataType: 'json',
        async:false,
        success: function(data){
          window.location.href = "federal_response_1.html";
        }
      })
    })
    
    console.log(employerName);

    $("#NO").click(function(){
      var employer = $("#employer").val();
      window.location.href= "question_3.php?employer=" + employer;  
    })
  })
</script>

<footer>
  <div>
    <p><b>Canada.ca</b></p>
  </div>
</footer>
</html>