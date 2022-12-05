let form = document.querySelector("#book_form")
form.addEventListener("submit", function(event){
    let identity = document.getElementById("identity")
    let purchaseID = document.getElementById("purchaseID")

	if ((identity.value).length == 0){
		alert("Customer's ID missing. Please enter")
		event.preventDefault();
		return false
	}

    if ((purchaseID.value).length == 0){
		alert("Customer's Purchase ID missing. Please enter")
		event.preventDefault();
		return false
	}
    let text = "You are about to CANCEL this order. Are you sure you want to delete?";
    if (confirm(text) == true) {
        window.location.href = "cancel.php";
    } 
    else {
        event.preventDefault();
    }
});