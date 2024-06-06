<?php
try {
  $pdo =new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  exit();
}
$stmt = $pdo->prepare("SELECT * FROM voyage");
$stmt->execute();
$rowCount = $stmt->rowCount();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Dashboard</title>
    <link rel="stylesheet" href="./css/styledashboard.css">
    <link rel="stylesheet" href="./css/dashboarstyle2.css">
    <link rel="stylesheet" href="./css/fontawesome-free-6.5.2-web/css/all.css">
  </head>

  <body>

    <div class="dash">
      <header class="header">
        <div class="logo"><img src="images/logo.png" alt=""></div>
        <div class="header__search">
        </div>
        <div class="header__options">
          <button class="header__pro">ADD TRAVEL</button>
          <a href="index.html" class="header__link">Disconnect</a>
        </div>
      </header>
      <div class="body">
        <main class="main">
          <div class="main__col-1">
            <div>
              <h2 class="main__heading"><b>Dashboard</b></h2>
              <p class="main__desc">Mixtures of places that I've visited & traveled which are worth to check out again ^_^</p>
              <p class="main__sub"><span>Profile Collaborators:</span> <span>Cloud Strife & Jack Sparrow</span></p>
            </div>
            <div class="main__list-heading-wrap">
              <h2 class="main__list-heading ss-heading">Travels List </h2>
            
            </div>
<?php 
if($rowCount==0){
?>
 <p class="main__desc">Mixtures of places that I've visited & traveled which are worth to check out again ^_^</p>
 <?php
 } else{ ?>
            <ul class="main__list">
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
  $quer=$pdo->prepare("SELECT sum(nb_Tickets) as 'nb' FROM reservations WHERE id_voyage=:id");
  $quer->bindParam(':id', $row["id"]);
  $quer->execute();
  $rx=$quer->fetch(PDO::FETCH_ASSOC);

  if($rx["nb"])
  $x=$rx["nb"];
else
$x=0;
  ?>
              <li class="main__list-item trvls">
                <div>
                <div class="main__list-item-image">
                <img src="data:image/png;base64,<?php echo $row["poster"]; ?>" >
                </div>
                <div class="main__list-content-wrap">
                  <p class="main__list-content"><?php echo ucfirst($row["titre"]); ?></p>
                  <br>
                  <?php if($x<$row["max_visitor"] ){ ?>
                  <p class="porcent"><input type ="range" value="<?php echo $x ?>" max="<?php echo $row["max_visitor"]; ?>" disabled> <?php echo $x ?>/<?php echo $row["max_visitor"]; ?> Tickets Booked </p>
                  <div class="options" id="<?php echo $row["id"];?>"><div class="delete" id="<?php echo $row["id"];?>"  style="display:inline-block;"><i class="fa-solid fa-trash"></i></div><div class="bk" id="<?php echo $row["id"];?>"><i class="fa-solid fa-list"  ></i></div></div></div>
              
                  <?php }else{ ?>
                <p class="porcent"><input type ="range" class="completed" value="<?php echo $x ?>" max="<?php echo $row["max_visitor"]; ?>" disabled>&nbsp;<?php echo $x." / ".$row["max_visitor"] . "   Completed"; ?></p>
                <div class="options" ><div class="bk" id="<?php echo $row["id"];?>" ><i class="fa-solid fa-list"  ></i></div></div></div>
                <?php }
              ?>
                 
                </div>
                
              </li>

<?php }


}
?>
           
            </ul>

          </div>
          <div class="list_bking">
            <div class="quit1"><b>X</b></div>
                <h2 class="list_bking-heading ss-heading">Booking list</h2>
    <div class="listec">
     
    </div>
                  
              </div>  
            <div class="main__cards-container">

              <div class="main__cards-container-heading-wrap">
                <div class="quit"><b>X</b></div>
                <h2 class="main__cards-container-heading ss-heading">Add Travel</h2>
               <br>
                <form action="inserer_voyage.php" method="post" id="add" enctype="multipart/form-data">
                  <div class="item_admin">
                    <label for="">Title</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Travel Title" name="title" id="city" required>
                  </div>
                  <div class="item_admin">
                    <label for="">Poster</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="poster" id="poster" accept="image/*" required >

                  </div>
                  <div class="item_admin">
                    <label for="">Max visitors</label>
                  <input type="number" name="maxim" id="maximum" value="0" required>
                </div>
                <div class="item_admin">
                  <label for="">Discription</label>
                  <br>
                <textarea name="descrep" id="discrp" cols="40" rows="10" required>
                </textarea>
              </div>
              <div class="item_admin">
                <label for="">Deadline</label>
            <input type="date" name="dead" id="dl" required>    
            </div>
            <button id="ajouter">Add Travel</button>    
            </form>
                
              </div>

          

            </div>
     

       

        </main>

      </div>

    </div>
<script>
let pr=document.querySelector(".header__pro");
let ad=document.querySelector(".main__cards-container");
let quit=document.querySelector(".quit");
let lstbk=document.querySelector(".list_bking");
let quit1=document.querySelector(".quit1");
let lstes = document.querySelectorAll(".bk");

lstes.forEach((lste) => {
  lste.addEventListener("click", () => {
    var id = lste.id;

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "lister.php?id=" + id, true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var newDiv = document.createElement("div");
          newDiv.classList.add("reservations");
          newDiv.innerHTML = xhr.responseText;

          var listec = document.querySelector(".listec");

while (listec.firstChild) {
  listec.removeChild(listec.firstChild);
}

listec.appendChild(newDiv);

          lstbk.style.display = "block";
        } else {
          console.error("Erreur lors de la requête AJAX");
        }
      }
    };

    
    xhr.send();
  });
});

quit1.addEventListener("click",()=>{
  lstbk.style.display="none";
  
});
pr.addEventListener("click",()=>{
ad.style.opacity="1";
ad.style.zIndex="7";
});
quit.addEventListener("click",()=>{
  ad.style.opacity="0";
  ad.style.zIndex="-6";

});

let deletebt=document.querySelectorAll(".delete");
deletebt.forEach((del) => {
  del.addEventListener("click", () => {
    var id = del.id;
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "delete_tr.php?id=" + id, true);
xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("La suppression a été effectuée avec succès !");
          window.location.reload();
        } else {
          console.error("Erreur lors de la suppression !");
        }
      }
    };
    xhr.send();
  });
});

</script>
  </body>

</html>
