// const leave = document.getElementById('leave');
// const departmentDataContainer = document.getElementById('departmentDataContainer');

// const span = document.querySelectorAll('#depContainer form ul li span')

// leave.addEventListener('click', () => {
//     departmentDataContainer.style.setProperty('display', 'none');
// })

// const element = document.querySelectorAll('.element');

// element.forEach(el => {
//     el.addEventListener('click', () => {
//         departmentDataContainer.style.setProperty('display', 'flex');

//         const depIndex = el.getAttribute('depIndex');
//         const depName = el.getAttribute('depName');
//         const depStreet = el.getAttribute('depStreet');
//         const depHouseNumb = el.getAttribute('depHouseNumb');
//         const depLocalNumb = el.getAttribute('depLocalNumb');
//         const depZipCode = el.getAttribute('depZipCode');
//         const depTown = el.getAttribute('depTown');
//         const depTelephone = el.getAttribute('depTelephone');
//         const depEmail = el.getAttribute('depEmail');

//         for(let i=0;i<span.length;i++) {
//             span[0].textContent = depName;
//             span[1].textContent = depStreet;
//             span[2].textContent = depHouseNumb; 
//             span[3].textContent = depLocalNumb;
//             span[4].textContent = depZipCode;
//             span[5].textContent = depTown;
//             span[6].textContent = depTelephone;
//             span[7].textContent = depEmail;
//         }
//     })
// })

// const index = document.getElementById('index');
// index.addEventListener('click', () => {
//     var xhr = new XMLHttpRequest();
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState == 4 && xhr.status == 200) {
//             }
//         };
        
//         var data = "index=" + index;

//         xhr.open("POST", "findByDepartment.php", true);
//         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//         xhr.send(data);
// })


const findBy = document.getElementById('findBy');
const devSerialNumber = document.querySelectorAll('.devSerialNumber');

let tab = [];

findBy.addEventListener('keyup', () => {
    console.log(findBy.value.toUpperCase());
    for(let i=0;i<devSerialNumber.length;i++) {
        console.log(devSerialNumber[0].textContent[i]);        
    }
})