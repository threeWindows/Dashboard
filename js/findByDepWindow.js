const span = document.querySelectorAll('.dataContainer span');
const input = document.querySelectorAll(".dataContainer .inp");

const updateDepData = document.getElementById('updateDepData');
const confirmDepartment = document.getElementById('confirmDepartment');

const changeSpanToInput = (mainBtnData) => {
    const spanData = [];
    const inputData = [];

    spanData.length = 0;
    inputData.length = 0;

    span.forEach(spa => {
        if(spa.getAttribute('i') == mainBtnData.getAttribute('i')) {
            spa.style.setProperty('display', 'none');
            spanData.push(spa.textContent);
        }
    })

    input.forEach(el => {
        if(el.getAttribute('i') == mainBtnData.getAttribute('i')) {
            el.style.setProperty('display', 'inline-block')
            inputData.push(el);
        }
    })

    for(let x=0;x<spanData.length;x++) {
        inputData[x].value = spanData[x];
    }
}

updateDepData.addEventListener('click', () => {
    changeSpanToInput(updateDepData);

    confirmDepartment.style.setProperty('display', 'block');
    updateDepData.style.setProperty('display', 'none');
})

const updateData = document.querySelectorAll('.updateData');
const confirm = document.querySelectorAll('.confirm');

updateData.forEach(el => {
    el.addEventListener('click', () => {
        confirm.forEach(conf => {
            conf.style.setProperty('display', 'block');
        })

        changeSpanToInput(el);
    
        el.style.setProperty('display', 'none');
    })
})

const updateDevData = document.querySelectorAll('.updateDevData');
const confirmDevice = document.querySelectorAll('.confirmDevice');

updateDevData.forEach(el => {
    el.addEventListener('click', () => {

        changeSpanToInput(el);

        confirmDevice.forEach(btn => {
            if(el.getAttribute('i') == btn.getAttribute('i')) {
                btn.style.setProperty('display', 'block');
            }
        })
        el.style.setProperty('display', 'none');
    })
})