<?php include_once("page_top.php");?>

<div class="w3-display-container" style="height:100%;" id="cont" >

<!-- Top container -->
<div class="w3-third w3-teal w3-display-container w3-hide-small" style="height:100%;" id="left">
		<span class="w3-display-middle w3-center ">
			<img src="img/education.png"  style="width:128px">
			<h1>Askiseis.gr </h1>
</span>
</div>

<div class="w3-twothird w3-display-container w3-panel" style="height:100%;">

<!-- error msg -->
<?php if (!empty($errmsg)): ?>
<div class="w3-panel w3-pale-yellow w3-modal-content">
  <h3> Ουπς... προβληματάκι!</h3>
  <p><?= esc($errmsg)?></p>
</div>  
<?php endif ?>

<!-- info msg -->
<?php if (!empty($infomsg)): ?>
<div class="w3-panel w3-pale-green w3-modal-content">
  <h3> Super!</h3>
  <p><?= esc($infomsg)?></p>
</div>  
<?php endif ?>


<div class="w3-modal-content w3-display-top authgroup" style="margin-top:100px;max-width:90%" id="outerdiv">


<!-- top menu-->
 <div class="w3-bar w3-blue-gray">
  <button class="w3-bar-item w3-button w3-white tabcl" id = "btnloginForm" onclick="openTab('loginForm')">Σύνδεση</button>
  <button class="w3-bar-item w3-button tabcl" id = "btnregisterT" onclick="openTab('registerT')">Εγγραφή εκπαιδευτικού</button>
  <button class="w3-bar-item w3-button tabcl" id = "btnregisterS" onclick="openTab('registerS')">Εγγραφή μαθητή</button>
</div>

<!-- Φόρμα εισόδου-->
 <form class="w3-container" id="loginForm" action="login" method="post">
 	<div class="w3-center" ><br><i class="fa fa-user w3-text-blue-gray"  style="font-size: 100px;"></i> </div>
      <div class="w3-section">
      <label><b>όνομα χρήστη</b> </label>
      <input class="w3-input w3-border w3-margin-bottom" type="text" id="username" name = "username" required value ="<?= $username ?? ""?>">
      <label><b>κωδικός</b></label>
      <input class="w3-input w3-border" type="password" id="pwd" name= "pwd" required value="">
      <button class="w3-btn w3-block w3-green w3-section w3-padding" type="submit">Είσοδος</button>
    <span class="w3-right w3-padding"><a href="#" onclick="openAuth('forgotten')">(ξε)χάσατε τον κωδικό σας;</a></span>
      </div>

  </form>

<!-- Φόρμα Εγγραφής εκπαιδευτικού-->
<form class="w3-container"  id="registerT" style="display:none" action="registerT"  method="post">
   <div class="w3-center" ><br><i class="fa fa-user-plus w3-text-blue-gray"  style="font-size: 100px;"></i> </div>
    <div class="w3-section">
      <label><b>όνομα χρήστη</b> </label>
      <input class="w3-input w3-border w3-margin-bottom" type="text" id="username" name= "username" required value= "<?= $username ?? "" ?>" >
      <label><b>email</b> <span class="w3-text-red"> <?= $errmsg['email'] ?? ""?> </span> </label>
      <input class="w3-input w3-border w3-margin-bottom" type="email" id="email" name ="email" required value= "<?= $email ?? "" ?>" >
      <br><input type="checkbox" name="terms" required> Έχω διαβάσει & συμφωνώ με τους <a href="#" id="terms">όρους χρήσης</a><br>
      <div class="w3-text-red w3-right">  </div>
      <button class="w3-btn w3-block w3-blue w3-section w3-padding" type="submit">Εγγραφή</button>
      </div>
  </form>

<!-- Φόρμα Εγγραφής μαθητή-->
<form class="w3-container"  id="registerS" style="display:none" action="registerS"  method="post">
   <div class="w3-center"><br><i class="fa fa-child w3-text-blue-gray"  style="font-size: 100px;"></i> </div>
    <div class="w3-section">
      <label><b>όνομα χρήστη</b>  <span class="w3-text-red"> <?= $errmsg['student'] ?? "" ?> </span></label>
      <input class="w3-input w3-border w3-margin-bottom" type="text" id="username" name="username" required>
      <label><b>κωδικός</b> <span class="w3-text-red"> <?= $errmsg['password'] ?? "" ?> </span></label>
      <input class="w3-input w3-border w3-margin-bottom" type="password" id="pwd" name="pwd" required>
      <label><b>κωδικός ομάδας</b> <span class="w3-text-red"> <?= $errmsg['groupCode'] ?? "" ?> </span></label>
      <input class="w3-input w3-border w3-margin-bottom" type="text" id="groupCode" name="groupCode" required>
      <button class="w3-btn w3-block w3-blue w3-section w3-padding" type="submit">Εγγραφή νέου χρήστη</button>
      </div>
  </form>
</div>

<!-- Φόρμα ξέχασα τον κωδικό μου-->
<div class="w3-modal-content w3-display-top authgroup" style="margin-top:100px;max-width:90%;display:none" id="forgotten"  >
 <div class="w3-center"><br><i class="fa fa-unlock w3-text-blue-gray"  style="font-size: 100px;"></i> </div>
 <form class="w3-container" action="resetpwd" method="post">
    <div class="w3-section">
      <label><b>email</b></label>
      <input class="w3-input w3-border w3-margin-bottom" type="email" id="email" name="email" required>
      <button class="w3-btn w3-block w3-deep-orange w3-section w3-padding" type="submit">Αποστολή νέου κωδικού</button>
      </div>
  </form>
  <div class="w3-container w3-padding-16 w3-light-grey">
    <button  type="button" class="w3-btn w3-blue-gray" onclick="openAuth('outerdiv')"><i class="fa fa-chevron-left"></i> πίσω</button>
  </div>
</div>

<!-- όροι χρήσης-->
<div class="w3-modal-content w3-display-top authgroup" style="margin-top:100px;max-width:90%;display:none" id="termsdiv">
 <div class="w3-center"><br><i class="fa fa-file w3-text-blue-gray"  style="font-size: 100px;"></i>
 <h2>Όροι χρήσης</h2></div>

 		<ul class="w3-small">
 		 <li>Η εγγραφή "για μεγάλους" στην εφαρμογή επιτρέπεται μόνο για χρήστες άνω των 18 ετών.</li>
 		 <li>Για τους "μεγάλους" δεν αποθηκεύονται προσωπικά δεδομένα εκτός από το email, κρυπτογραφημένο, ώστε να σταλεί εκεί νέος κωδικός εισόδου σε περίπτωση απώλειας.</li>
 		 <li>Η εγγραφή "για μικρούς", δηλαδή κάτω των 18 ετών, επιτρέπεται μονο μετά από έγκριση του γονέα ή κηδεμόνα.</li>
 		 <li> Ένας "μικρός" πρέπει να ανήκει υποχρεωτικά σε μία τουλάχιστον ομάδα που έχει δημιουργήσει ένας "μεγάλος".</li>
 		 <li> Για τους "μικρούς" δεν αποθηκεύονται προσωπικά δεδομένα.</li>
 		 <li> Κάθε "μεγάλος" είναι υπευθυνος να έχει έγκριση για την εγγραφή στην εφαρμογή από τους γονέις ή κηδεμόνες όλων των "μικρών" που υπάρχουν στις ομάδες του.  </li>
 		 <li> Κάθε χρήστης "μεγάλος" ή "μικρός" πρέπει να επιλέξει όνομα χρήστη τέτοιο ώστε, μέσω αυτού, να μην αποκαλύπτονται προσωπικά του δεδομένα όπως το πραγματικό όνομα, επώνυμο, ημερομηνία γέννησης, τόπος κατοικίας, σχολείο, κτλ.</li>
 		 <li> Δεν προσφέρετε ΚΑΜΙΑ εγγύηση καλής λειτουργίας της εφαρμογής.Την χρησιμοποιείτε με δική σας ευθυνη.</li>
		</ul>
  <div class="w3-container w3-padding-16 w3-light-grey">
    <button  type="button" class="w3-btn w3-blue-gray" onclick="openAuth('outerdiv')"><i class="fa fa-chevron-left"></i> πίσω</button>
  </div>
</div>

</div>
<script>
	function openTab(c) {
        if (!!c){
    		$("#outerdiv form").hide();
	    	$("#"+ c).show();
		    $(".tabcl").removeClass("w3-white");
            $("#btn"+ c).addClass("w3-white");
        }
	}
	function openAuth(c) {
        if (!!c) {
    		$(".authgroup").hide();
	    	$("#"+ c).show();
        }
    }
	$("#terms").click(function() {
		openAuth("termsdiv");
    });
    
    openTab('<?= esc($active_tab) ?>');
    openAuth('<?= esc($active_forgotten) ?>');
 </script>


</div>

<?php include_once("page_bottom.php");?>