var element = document.querySelectorAll(".element");
var windowWithDatas = document.getElementById('windowWithDatas');

const nameAndLastName = document.getElementById('nameAndLastName');
const phoneNumber = document.getElementById('phoneNumber');
const emailAdress = document.getElementById('emailAdress');
const businnesName = document.getElementById('businnesName');
const dwellingPlace = document.getElementById('dwellingPlace');
const clientZipCode = document.getElementById('clientZipCode');
const clientCity = document.getElementById('clientCity');

const notSerialNumber = document.getElementById('notSerialNumber');
const notProducent = document.getElementById('notProducent');
const notModel = document.getElementById('notModel');
const notCategory = document.getElementById('notCategory');

const changeValueInputs = document.querySelectorAll(".panel ul li input");
const span = document.querySelectorAll(".panel ul li span");


var index;

element.forEach(function (el) {
  el.addEventListener('click', () => {
    windowWithDatas.style.setProperty('display', 'block');

    index = el.getAttribute('index');

    var name = el.getAttribute('name');
    var lastName = el.getAttribute('lastName');
    var phone = el.getAttribute('phone');
    var email = el.getAttribute('email');
    var businnes = el.getAttribute('businnes');
    var street = el.getAttribute('street');
    var houseNumbK = el.getAttribute('houseNumbK');
    var localNumbK = el.getAttribute('localNumbK');
    var zipCodeK = el.getAttribute('zipCodeK');
    var townK = el.getAttribute('townK');
    var serialNumbS = el.getAttribute('serialNumbS');
    var producentS = el.getAttribute('producentS');
    var modelS = el.getAttribute('modelS');
    var categoryS = el.getAttribute('categoryS');

    nameAndLastName.textContent = name + ' ' + lastName;
    phoneNumber.textContent = phone;
    emailAdress.textContent = email;
    businnesName.textContent = businnes;
    dwellingPlace.textContent = `${street} ${houseNumbK} ${localNumbK}`;
    clientZipCode.textContent = zipCodeK;
    clientCity.textContent = townK;

    notSerialNumber.textContent = serialNumbS;
    notProducent.textContent = producentS;
    notModel.textContent = modelS;
    notCategory.textContent = categoryS;
  })
});


const leave = document.getElementById('leave');
const changeUpdatedData = document.getElementById('changeUpdatedData');
const changeData = document.getElementById('changeData');

leave.addEventListener('click', () => {
  windowWithDatas.style.setProperty('display', 'none');

  span.forEach((el) => {
    el.style.setProperty('display', 'inline-block');
  })

  changeValueInputs.forEach(el => {
    el.style.setProperty('display', 'none');
  })

  changeUpdatedData.style.setProperty('display', 'none');
  changeData.style.setProperty('display', 'inline-block');
})

changeData.addEventListener('click', () => {

  for(let i=0;i<changeValueInputs.length;i++) {
    changeValueInputs[i].style.setProperty('display', 'inline-block');
    element.forEach(function (el) {
        var phone = el.getAttribute('phone');
        var email = el.getAttribute('email');
        var businnes = el.getAttribute('businnes');
        var street = el.getAttribute('street');
        var houseNumbK = el.getAttribute('houseNumbK');
        var localNumbK = el.getAttribute('localNumbK');
        var zipCodeK = el.getAttribute('zipCodeK');
        var townK = el.getAttribute('townK');
        var serialNumbS = el.getAttribute('serialNumbS');
        var producentS = el.getAttribute('producentS');
        var modelS = el.getAttribute('modelS');
        var categoryS = el.getAttribute('categoryS');

        changeValueInputs[0].value = phone;
        changeValueInputs[1].value = email;
        changeValueInputs[2].value = businnes;
        changeValueInputs[3].value = `${street} ${houseNumbK} ${localNumbK}`;
        changeValueInputs[4].value = zipCodeK;
        changeValueInputs[5].value = townK;

        changeValueInputs[6].value = serialNumbS;
        changeValueInputs[7].value = producentS;
        changeValueInputs[8].value = modelS;
        changeValueInputs[9].value = categoryS;
    });
  }

  changeUpdatedData.style.setProperty('display', 'inline-block');
  changeData.style.setProperty('display', 'none');

  span.forEach((el) => {
    el.style.setProperty('display', 'none');
  })
})

changeUpdatedData.addEventListener('click', () => {
  changeUpdatedData.setAttribute('value', index);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "findByClient.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
    }
  };

  xhr.send("index=" + index);
})


const delateUser = document.getElementById('delateUser');

delateUser.addEventListener('click', () => {
  delateUser.setAttribute('value', index);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "findByClient.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
    }
  };

  xhr.send("index=" + index);
})