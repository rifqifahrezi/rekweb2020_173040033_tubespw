var keyword = document.getElementById('keyword');
var cari = document.getElementById('cari');
var container = document.getElementById('container');

	keyword.addEventListener('keyup', function(){
		



		var xhr = new XMLHttpRequest();
		

		xhr.onreadystatechange = function(){
			if ( xhr.readyState == 4 && xhr.status == 200) {
				container.innerHTML = xhr.responseText;
			}
		}

		xhr.open('GET','../assets/ajax/ajax.php?keyword=' + keyword.value, true);
		xhr.send();
	});

// keyword.addEventListener('keyup', function(){

// 	var xhr = new XMLHttpRequest();

// 	xhr.onreadystatechange = function(){
// 		if ( xhr.readystate == 4 && xhr.status == 200) {
// 			container.innerHTML = xhr.responseText;
// 		}
// 	}

// 	xhr.open('GET','assets/ajax/ajax.php?keyword=' + keyword.value, true);
// 	xhr.send();

// })../ajax/ajax.php