const inputElement1 = document.getElementById('surname');
const inputElement2 = document.getElementById('name');
const inputElement3 = document.getElementById('secondname');
const inputElement4 = document.getElementById('age');
const inputElement5 = document.getElementById('gender');
const buttonElement = document.getElementById('send');
const resultElement = document.getElementById('result');
const soglasieElement = document.getElementById('check1')
const robotElement = document.getElementById('check2')


buttonElement.addEventListener('click', function() {
    if (soglasieElement.checked && robotElement.checked){
        resultElement.innerHTML = ' '
        var inputValue1 = inputElement1.value;
        console.log(inputValue1)
        var inputValue2 = inputElement2.value;
        var inputValue3 = inputElement3.value;
        var inputValue4 = inputElement4.value;
        var gend = document.querySelector('input[id="gender"]:checked').value
        console.log(gend)

        resultElement.innerHTML += "<h2> Проверьте ваши данные: </h2>"; 
        resultElement.innerHTML += "<a> Вы: " + inputValue1 + "&nbsp" + inputValue2 + "&nbsp" + inputValue3 + "</a>"; 
        resultElement.innerHTML += "<a> Возраст: " + inputValue4 + "</a>"; 
        resultElement.innerHTML += "<a> Пол: " + gend + "</a>"; 

        inputElement1.value = ''; 
        inputElement2.value = ''; 
        inputElement3.value = ''; 
        inputElement4.value = ''; 
    }

});