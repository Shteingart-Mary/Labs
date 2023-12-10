const result = document.getElementById('result');
    var num1, num2, res, operation = '';
const process = document.getElementById('process');
const numbers = document.getElementById('numbers');
for (let i = 0; i <= 9; i++) {
    numbers.innerHTML += `<button class="number" onclick="number(${i})">${i}</button>`;
}
function number(num) {
    if ( res == '') {
    }
    else {
        CE();
        res = '';
    }
    result.innerHTML += num;
    process.innerHTML += num;
}
function CE(){
    result.innerHTML = '';
    process.innerHTML = '';
}
function C(){
    result.innerHTML = ''; 
    num1 = ''; 
    num2 = ''; 
    operation = ''; 
    process.innerHTML = '';
}
function perc() {
    result.innerHTML = parseFloat(result.innerHTML)/100;
}
function del() {
    result.innerHTML = result.innerHTML.slice(0, -1);
    process.innerHTML = process.innerHTML.slice(0, -1);
}
function operator(resultat) {
    num1 = result.innerHTML;
    result.innerHTML = '';
    operation = resultat;
    switch(resultat){
        case "Y": process.innerHTML += '*'; break;
        case "D": process.innerHTML += '/'; break;
        case "S": process.innerHTML += '+'; break;
        case "V": process.innerHTML += '-'; break;
        case "P": result.innerHTML += '%'; break;
    }
}
function equal(resultat) {
    num1 = parseFloat(num1);
    num2 = parseFloat(result.innerHTML);
    switch (resultat) {
        case "Y": result.innerHTML = num1 * num2; break;
        case "D": result.innerHTML = num1 / num2; break;
        case "S": result.innerHTML = num1 + num2; break;
        case "V": result.innerHTML = num1 - num2; break;
        case "P": result.innerHTML = num1/100, num2/100; break;
    }
}
console.log(result.innerHTML)