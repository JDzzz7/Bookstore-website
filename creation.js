function validate(event) {
	let first = document.getElementById("first")
	let last = document.getElementById("last")
	let identity = document.getElementById("identity")

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
	if ((identity.value).length == 0){
		alert("Customer's ID missing. Please enter")
		event.preventDefault();
		return false
	}

}

let form = document.querySelector("#book_form")
form.addEventListener("submit", validate)
