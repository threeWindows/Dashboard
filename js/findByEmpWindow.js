const updateData = document.getElementById('updateData');
const confirm = document.getElementById('confirm');
const span = document.querySelectorAll('.dataContainer span');
const input = document.querySelectorAll(".dataContainer .inp");

const employeeData = [];
const inputEmployee = [];

updateData.addEventListener('click', () => {
    confirm.style.setProperty('display', 'block');
    employeeData.length = 0;
    inputEmployee.length = 0;

    span.forEach(spa => {
        if(spa.getAttribute('i') == updateData.getAttribute('i')) {
            spa.style.setProperty('display', 'none');
            employeeData.push(spa.textContent);
        }
    })

    input.forEach(el => {
        if(el.getAttribute('i') == updateData.getAttribute('i')) {
            el.style.setProperty('display', 'inline-block')
            inputEmployee.push(el);
        }
    })

    for(let x=0;x<employeeData.length;x++) {
        inputEmployee[x].value = employeeData[x];
    }


    updateData.style.setProperty('display', 'none');
})

confirm.addEventListener('click', () => {
    updateData.style.setProperty('display', 'block');
    confirm.style.setProperty('display', 'none');
})  

const updateDepData = document.getElementById('updateDepData');
const confirmDepartment = document.getElementById('confirmDepartment');
updateDepData.addEventListener('click', () => {

    const depName = document.getElementById('depName');
    const depStreet = document.getElementById('depStreet');
    const depHouse = document.getElementById('depHouse');
    const depLocal = document.getElementById('depLocal');
    const depZipCode = document.getElementById('depZipCode');
    const depTown = document.getElementById('depTown');
    const depTelephone = document.getElementById('depTelephone');
    const depEmail = document.getElementById('depEmail');

    span.forEach(span => {
        if(span.getAttribute('i') == updateDepData.getAttribute('i')) {
            span.style.setProperty('display', 'none');
        }
    })

    for(let i=0;i<input.length;i++) {
        if(input[i].getAttribute('i') == updateDepData.getAttribute('i')) {
            input[i].style.setProperty('display', 'inline-block');
        }
        input[4].value = depName.textContent;
        input[5].value = depStreet.textContent;
        input[6].value = depHouse.textContent;
        input[7].value = depLocal.textContent;
        input[8].value = depZipCode.textContent;
        input[9].value = depTown.textContent;
        input[10].value = depTelephone.textContent;
        input[11].value = depEmail.textContent;
    }

    updateDepData.style.setProperty('display', 'none');
    confirmDepartment.style.setProperty('display', 'block');
})


const updateDevData = document.querySelectorAll('.updateDevData');
const confirmDevice = document.querySelectorAll('.confirmDevice');

const inpTab = [];
const spanTab = [];

updateDevData.forEach(el => {
    el.addEventListener('click', () => {
        spanTab.length = 0;
        inpTab.length = 0;

        for(let i=0;i<span.length;i++) {
            if(el.getAttribute('i') == span[i].getAttribute('i')) {
                span[i].style.setProperty('display', 'none');
                spanTab.push(span[i].textContent);         
            }
        }

        for(let i=0;i<input.length;i++) {
            if(el.getAttribute('i') == input[i].getAttribute('i')) {
                input[i].style.setProperty('display', 'inline-block');
                inpTab.push(input[i]);         
            }
        }

        for(let y=0;y<inpTab.length;y++) {
            inpTab[y].value = spanTab[y];
        }

        confirmDevice.forEach(btn => {
            if(el.getAttribute('i') == btn.getAttribute('i')) {
                btn.style.setProperty('display', 'block');
            }
        })
        el.style.setProperty('display', 'none');
    })
})

const updateDescData = document.getElementById('updateDescData');
const changeSpan = document.querySelectorAll('.changeSpan');
const newDate = document.querySelectorAll('.newDate');
const confirmDesc = document.getElementById('confirmDesc');

const tab1 = [];
const tab2 = [];

updateDescData.addEventListener('click', () => {
    tab1.length = 0;
    tab2.length = 0; 

    changeSpan.forEach(span => {
        span.style.setProperty('display', 'none');
        tab1.push(span.textContent);
    })

    newDate.forEach(inp => {
        inp.style.setProperty('display', 'inline-block');
        tab2.push(inp);
    })

    for(let x=0;x<tab1.length;x++) {
        tab2[x].value = tab1[x];
    }

    updateDescData.style.setProperty('display', 'none');
    confirmDesc.style.setProperty('display', 'block');
})