let count = 0;

let button = document.getElementById("clickBtn");
let counter = document.getElementById("count");

button.addEventListener("click", function () {
    count++;
    counter.innerHTML = count;
});
