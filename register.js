function formValidation() {
	var uid = document.registration.userid;
	var passid = document.registration.passid;
	var passid2 = document.registration.passid2;
	var ucountry = document.registration.country;
	var umsex = document.registration.msex;
	var ufsex = document.registration.fsex;
	var en = document.registration.en
	var fr = document.registration.fr
	var de = document.registration.de
	if (userid_validation(uid, 6)) {
			if (passid_regex(passid)) {
				if (passid_repeat(passid2, passid)) {
						return true;
				}
			}
	}
	return true;

}
function userid_validation(uid, mx) {
	var uid_len = uid.value.length;
	if (uid_len != mx) {
		alert("Benutzername muss genau " + mx + " Zeichen lang sein");
		uid.focus();
		return false;
	}
	return true;
}


function passid_regex(passid) {
    var re = /^((?=.*[a-z])(?=.*[A-Z])(?=.*[ -~]).{9,})$/;
    if(!re.test(passid.value)) {
    	alert("Das Passwort muss Grossbuchstaben, Kleinbuchstaben und Sonderzeichen (d.h. >Ascii 128) enthalten und mindesten  9 Zeichen lang sein)");
    	passid.focus();
    	return false;
    }
    return true;
}

function passid_repeat(passid, passid2) {
	console.log(passid.value +"passid2:" + passid2.value);
	if (passid.value != passid2.value) {
		alert ("Passwörter stimmen nicht überein");
		passid2.focus();
		return false;
	}
	return true;
}