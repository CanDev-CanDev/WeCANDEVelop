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
      <p>What is the nature of habitual workday activities?
      </p>
      <p>If it is one of the following activities or quite similar to any of them, choose <b>yes</b>
      <br> Othersise, choose <b>no</b>.</p>
      <ul>
        <li>Uranium mining and processing</li>
        <li>Grain elevation</li>
        <li>Flour seed mills, feed warehouses and grain-seed cleaning plants</li>
        <li>Railways already declared under federal jurisdiction, even though they operate within a single province</li>
        <li>Certain individual undertakings like Hudson Bay Mining and Smelting Company</li>
      </ul>
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

    $("#NO").click(function(){
      var employer = $("#employer").val()
      window.location.href= "question_4.php?employer=" + employer;  
    })
  })
</script>

<footer>
  <div>
    <p><b>Canada.ca</b></p>
  </div>
</footer>
</html>