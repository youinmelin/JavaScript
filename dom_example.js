// console.dir(document);
console.log(document.domain);
console.log(document.URL);
console.log(document.title);
//document.title = 123;
console.log(document.doctype);
console.log(document.all);
//document.all[10].innerText = 'hello'

// GETELEMENTBYID
var email = document.getElementById('email');
console.log(email)
var headerTitle= document.getElementById('header-title');
console.log(headerTitle)
//headerTitle.textContent = "hello"
//headerTitle.innerText = 'HAHA'
headerTitle.innerHTML = '<h5>Hello!</h5>';
headerTitle.style.borderBottom = "solid 3px #000";

// GETELEMENTSBYCLASSNAME
var items = document.getElementsByClassName('list-group-item');
console.log(items);
console.log(items[2]);
items[1].textContent = 'hello 2';
items[0].style.fontWeight = 'bold';
items[0].style.backgroundColor = 'green';
//items.style.backgroundColor = '#f4f4f4'; // that's not gonna work
for (var i = 0; i<items.length; i++){
	items[i].style.backgroundColor = '#f4f4';
}

//GETELEMENTSBYTAGNAME

//QUERYSELECTOR
var header = document.querySelector('#header-title')
console.log(header);
header.style.borderBottom = 'solid 4px #ccc';

var input = document.querySelector('input');
input.value = 'Hello World';
var submit = document.querySelector('input[type="submit"]');
console.log(submit)
submit.value="SEND";

lastItem = document.querySelector('.list-group-item:last-child');
lastItem.style.color = 'blue';

var list2 = document.querySelector('.list-group-item:nth-child(2)');
list2.style.color = 'red';
console.log(list2);
 
var ol_item = document.querySelector('.ol-item');
console.log(ol_item);
ol_item.innerHTML ='ol_item';

var firstcell = document.querySelector('.cell');
console.log(firstcell);
firstcell.bgColor = 'yellow';

//QUERY SELECTORALL//
var titles = document.querySelectorAll('.title');
console.log(titles);
titles[0].textContent = 'H3 Items';

var odd =document.querySelectorAll('li:nth-child(odd)');
var even =document.querySelectorAll('li:nth-child(even)');
for (var i = 0;i < odd.length;i++){
	odd[i].style.backgroundColor='gray';
}
for (var i = 0;i < even.length;i++){
	even[i].style.backgroundColor='#ccc';
}


