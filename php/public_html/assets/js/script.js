$(document).ready(function() {
	$(".date").mask("11/11/1111");
	$(".time").mask("00:00:00");
	$(".date_time").mask("00/00/0000 00:00:00");
	$(".cep").mask("00000-000");
	$(".phone").mask("0000-0000");
	$(".phone_with_ddd").mask("(00) 0000-0000");
	$(".cpf").mask("000.000.000-00", { reverse: true });
	$(".money").mask("000.000.000.000.000,00", { reverse: true });
	$(".mac_address").mask("AA:AA:AA:AA:AA:AA");
});

$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#sidebar-wrapper").toggleClass("toggled");
});

function updateClock() {
	var currentTime = new Date();
	var currentHours = currentTime.getHours();
	var currentMinutes = currentTime.getMinutes();
	var currentSeconds = currentTime.getSeconds();

	currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
	currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

	var currentTimeString =
		currentHours + ":" + currentMinutes + ":" + currentSeconds;

	document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

function loginError(){
	var errorDiv = document.querySelector("#login-error");
	errorDiv.classList.add("alert alert-warning");
	errorDiv.textContent("Credenciais Inválidas!");
}
