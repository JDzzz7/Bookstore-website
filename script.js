function checkBox(event) {
	let req = document.getElementsByClassName("ro")[5]
	if (confirm.checked){
		req.innerHTML += "<label for='email' class='require'><strong>Required</strong></label>"
		event.preventDefault();
		return false
	}
	else if (!(confirm.checked)){
		let reqo = document.getElementsByClassName("require")[5]
		if (reqo){
			reqo.remove()
		}
		event.preventDefault();
		return false
	}
}

function getSel(eleIdent){
	let ele = document.getElementById(eleIdent)
	if (ele.selectedIndex == -1){
		return null
	}
	return ele.options[ele.selectedIndex].text
}

function resetAll() {
	let reqo = document.getElementsByClassName("require")[5]
	if (reqo){
		reqo.remove()
	}
	document.getElementById("book_form").reset();
	let first = document.getElementById("first")
	let last = document.getElementById("last")
	let password = document.getElementById("passw")
	let ident = document.getElementById("identity")
	let phone = document.getElementById("phone")
	let email = document.getElementById("email")
	first.style.border = null
	last.style.border = null
	password.style.border = null
	ident.style.border = null
	phone.style.border = null
	email.style.border = null
}

function validate(event) {
	let first = document.getElementById("first")
	let last = document.getElementById("last")
	let password = document.getElementById("passw")
	let ident = document.getElementById("identity")
	let phone = document.getElementById("phone")
	let email = document.getElementById("email")
	let opt = document.getElementById("Transaction")

	first.style.border = null
	last.style.border = null
	password.style.border = null
	ident.style.border = null
	phone.style.border = null
	email.style.border = null

	if ((first.value).length == 0){
		alert("Book Merchant's First Name missing. Please enter")
		event.preventDefault();
		first.style.border = "solid red"
		return false
	}
	if ((last.value).length == 0){
		alert("Book Merchant's Last Name missing. Please enter")
		event.preventDefault();
		last.style.border = "solid red"
		return false
	}
	let repass = /^(?=.*?[A-Z])(?=.*?[^A-Za-z0-9\s])(?=.*?[0-9]).{1,10}$/
	if (!repass.test(password.value)){
		alert("Book Merchant's Password should contain a max of 10 characters and have at least 1 uppercase letter, one special character and one numeric character")
		event.preventDefault();
		password.style.border = "solid red"
		return false
	}
	let reident = /^[\d]{8}$/	
	if (!reident.test(ident.value)){
		alert("Book Merchant's ID should contain an 8-digit number")
		event.preventDefault();
		ident.style.border = "solid red"
		return false
	}
	let rephone = /^\d{3}[\s-]?\d{3}[\s-]?\d{4}$/
	if (!rephone.test(phone.value)){
		alert("Book Merchant's Phone Number should consist of 10 digits which can be delineated either by spaces or dashes")
		event.preventDefault();
		phone.style.border = "solid red"
		return false
	}
	let reemail = /^.*\@.*\..{2,5}$/
	if (!reemail.test(email.value) && (confirm.checked)){
		alert("Book Merchant's Email Address must contain an @ followed by a period and an email domain that consists of 2 to 5 characters")
		event.preventDefault();
		email.style.border = "solid red"
		return false
	}
}

let form = document.querySelector("#book_form")
let confirm = document.getElementById("confirm")

confirm.addEventListener("change", checkBox)
form.addEventListener("submit", validate)

