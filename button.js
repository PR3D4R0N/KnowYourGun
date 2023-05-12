

const guessBtn1 = document.createElement('button');
tr.appendChild(guessBtn1);
guessBtn1.className = 'btn btn-danger';
guessBtn1.textContent = $firearm['fa_name'];
guessBtn1.style.backgroundColor = 'red';
guessBtn1.id = user.id;

const guessBtn2 = document.createElement('button');
tr.appendChild(guessBtn2);
guessBtn2.className = 'btn btn-danger';
guessBtn2.textContent = 'delete';
guessBtn2.style.backgroundColor = 'red';
guessBtn2.id = user.id;

const guessBtn3 = document.createElement('button');
tr.appendChild(guessBtn3);
guessBtn3.className = 'btn btn-danger';
guessBtn3.textContent = 'delete';
guessBtn3.style.backgroundColor = 'red';
guessBtn3.id = user.id;

const guessBtn4 = document.createElement('button');
tr.appendChild(guessBtn4);
guessBtn4.className = 'btn btn-danger';
guessBtn4.textContent = 'delete';
guessBtn4.style.backgroundColor = 'red';
guessBtn4.id = user.id;

const userData = {
    name: nameInput.value,
    email: emailInput.value,
    category: categoryInput.value,
};




