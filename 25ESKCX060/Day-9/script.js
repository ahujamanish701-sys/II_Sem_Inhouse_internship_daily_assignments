document.getElementById("photo").addEventListener("change",function(){

if(this.files.length>0){

document.getElementById("photoName").innerHTML=this.files[0].name;

}

});

document.querySelector("form").addEventListener("submit",function(e){

let errors=[];

let name=document.getElementById("name").value;

let address=document.getElementById("address").value;

let gender=document.querySelector('input[name="gender"]:checked');

if(/\d/.test(name))

errors.push("Name should not contain numbers.");

if(address.length<10)

errors.push("Address should contain at least 10 characters.");

if(!gender)

errors.push("Please select your gender.");

if(errors.length>0){

e.preventDefault();

let box=document.getElementById("errorBox");

box.style.display="block";

box.innerHTML=errors.join("<br>");

}

});
