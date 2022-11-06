function validate() {
    var ccNum = document.getElementById("cardNum").value;
    var visaRegEx = /^4(\d{12}|\d{15})$/;
    var mastercardRegEx = /^5[1-5]\d{14}$/;
    var amexpRegEx = /^3[47]\d{13}$/;
    var discovRegEx = /^6011\d{12}$/;
    var dinersRegEx = /^30[0-5]\d{11}$|^3[68] \d{12}$/;
    var isValid = false;
    if (visaRegEx.test(ccNum)) {
        isValid = true;
    } else if (mastercardRegEx.test(ccNum)) {
        isValid = true;
    } else if (amexpRegEx.test(ccNum)) {
        isValid = true;
    } else if (discovRegEx.test(ccNum)) {
        isValid = true;
    } else if (dinersRegEx.test(ccNum)) {
        isValid = true;
    }
    if (isValid) {
        location.href = "http://localhost/iwp-project/pay_amount.php";
    } else {

    }
}
