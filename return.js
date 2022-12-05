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
    let text = "Before you return an item please make sure the item was purchased from the store. Was it purchased from The Story Keeper Book Store? If not we cannot accept the return";
    if (confirm(text) == true) {
        let text2 = "You are about to RETURN this purchase. Are you sure you want to delete?";
        if (confirm(text2) == true)
            window.location.href = "return.php";
        else {
            event.preventDefault();
        }
    } 
    else {
        event.preventDefault();
    }
});