/*
		Designed by: SELECTO
		Original image: https://dribbble.com/shots/5311359-Diprella-Login
*/

let switchCtn = document.querySelector("#switch-cnt");
let switchC1 = document.querySelector("#switch-c1");
let switchC2 = document.querySelector("#switch-c2");
let switchCircle = document.querySelectorAll(".switch__circle");
let switchBtn = document.querySelectorAll(".switch-btn");
let aContainer = document.querySelector("#a-container");
let bContainer = document.querySelector("#b-container");
let allButtons = document.querySelectorAll(".submit");

let getButtons = (e) => e.preventDefault();

let changeForm = (e) => {
	switchCtn.classList.add("is-gx"); 
	setTimeout(function () {
		switchCtn.classList.remove("is-gx");
	}, 1500);

	switchCtn.classList.toggle("is-txr");
	switchCircle[0].classList.toggle("is-txr");
	switchCircle[1].classList.toggle("is-txr");

	switchC1.classList.toggle("is-hidden");
	switchC2.classList.toggle("is-hidden");
	aContainer.classList.toggle("is-txl");
	bContainer.classList.toggle("is-txl");
	bContainer.classList.toggle("is-z200");
};

let mainF = (e) => {
	// for (var i = 0; i < allButtons.length; i++)
	// 	allButtons[i].addEventListener("click", getButtons);
	for (var i = 0; i < switchBtn.length; i++)
		switchBtn[i].addEventListener("click", changeForm);
};

window.addEventListener("load", mainF);






function toggleMenu(){
	document.querySelector('.container').classList.toggle('active')
	document.querySelector('.side').classList.toggle('active')
}



document.querySelector('.fournisseur input').addEventListener('focus',function(){
	document.querySelector('.listFournisseur').classList.add('active')
})


document.querySelector('.repo input').addEventListener('focus',function(){
	document.querySelector('.listRepo').classList.add('active')
})





document.querySelector('.listFournisseur').addEventListener('click',function(){
	this.classList.remove('active');
})

document.querySelector('.listRepo').addEventListener('click',function(){
	this.classList.remove('active');
})


document.querySelectorAll('.listFournisseur option').forEach(item => {
	item.addEventListener('click',function(){
		document.querySelector('.fournisseur input').value = item.value
	})
})

document.querySelectorAll('.listRepo option').forEach(item => {
	item.addEventListener('click',function(){
		document.querySelector('.repo input').value = item.value
	})
})








