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



const updateDevData = document.querySelectorAll('.updateDevData');
const confirmDevice = document.querySelectorAll('.confirmDevice');

const inpTab = [];
const spanTab = [];

updateDevData.forEach(el => {
    el.addEventListener('click', () => {
        spanTab.length = 0;
        inpTab.length = 0;

        span.forEach(spa => {
          if(spa.getAttribute('i') == el.getAttribute('i')) {
            spa.style.setProperty('display', 'none');
            spanTab.push(spa.textContent);
          }
        })
  
        input.forEach(inp => {
            if(inp.getAttribute('i') == el.getAttribute('i')) {
                inp.style.setProperty('display', 'inline-block')
                inpTab.push(inp);
            }
        })

        confirmDevice.forEach(confDev => {
          if(confDev.getAttribute('i') == el.getAttribute('i')) {
            confDev.style.setProperty('display', 'block');
          }
        })

        for(let x=0;x<spanTab.length;x++) {
          inpTab[x].value = spanTab[x];
        }
        
        el.style.setProperty('display', 'none');
  })
})