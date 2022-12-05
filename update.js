let form = document.querySelector("#book_form")
form.addEventListener("submit", function(event){
    let identity = document.getElementById("identity")
    let purchaseID = document.getElementById("purchaseID")
    let updateOrder = document.getElementById("updateO")

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

    if ((updateOrder.value).length == 0){
		alert("Customer's update order is missing. Please enter")
		event.preventDefault();
		return false
	}
    let text = "You are about to UPDATE this order. Are you sure you want to update?";
    if (confirm(text) == true) {
        window.location.href = "update.php";
    }
    else {
        event.preventDefault();
    }

});
   