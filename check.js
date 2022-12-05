function validate(event) {
	let orderType = document.getElementById("orderType")
	let payType = document.getElementById("payType")
	let first = document.getElementById("first")
	let last = document.getElementById("last")
	let identity = document.getElementById("identity")
	let inStore = document.getElementById("inStore")
	let online = document.getElementById("online")
	let dateTime = document.getElementById("dateTime")
	let shipAddress = document.getElementById("shipAddress")

	if (((orderType.value).toLowerCase() == "online") && ((payType.value).toLowerCase() == "cash")){
		alert("Payment Type must be Credit for an Online Order. Please re-enter")
		event.preventDefault();
		return false
	}
	if ((first.value).length == 0){
		alert("Customer's First Name missing. Please enter")
		event.preventDefault();
		return false
	}
	if ((last.value).length == 0){
		alert("Customer's Last Name missing. Please enter")
		event.preventDefault();
		return false
	}
	if ((orderType.value).length == 0){
		alert("Order type missing. Please enter")
		event.preventDefault();
		return false
	}
	if ((payType.value).length == 0){
		alert("Pay type missing. Please enter")
		event.preventDefault();
		return false
	}
	if ((identity.value).length == 0){
		alert("Customer's ID missing. Please enter")
		event.preventDefault();
		return false
	}
	if ((inStore.value).length == 0){
		alert("In store book purchase missing. Please enter")
		event.preventDefault();
		return false
	}
	if ((online.value).length == 0){
		alert("Online purchase missing. Please enter")
		event.preventDefault();
		return false
	}
	if ((dateTime.value).length == 0){
		alert("Date and Time of purchase missing. Please enter")
		event.preventDefault();
		return false
	}
	if ((shipAddress.value).length == 0){
		alert("Shipping address missing. Please enter")
		event.preventDefault();
		return false
	}
}

let form = document.querySelector("#book_form")
form.addEventListener("submit", validate)


