// using async await

//   async function getData() {
//     try{
//       let response = await fetch("https://api.github.com/users/Nikita-Appfoster")
//       let data = await response.json();
//       console.log(data);
//     } 
//     catch(error) 
//     {
//       console.log("sOMETHING WENT WRONG", error);
//     }
//   }
//   getData()

//   using .then and .catch

//   let p=fetch("https://api.github.com/users/Nikita-Appfoster")
//   p.then((response)=>{
//       return response.json()
//   })
//   .then((data)=>{
//       console.log(data)
//   })
//   .catch((error)=>{
//       return console.log("something went wrong", error)
//     //   })



let nameIcon = document.querySelector(".myclass")
let modalInfo=document.querySelector(".modal")

let para=document.querySelector(".modal-body")


window.onload = function () {
    toDisplayNames()

}

function toDisplayNames() {
    let p = fetch("https://jsonplaceholder.typicode.com/users");

    p.then((response) => {
        return response.json();
    })
    .then((data) => {
        nameIcon.innerHTML = "";  

       
        let table = document.createElement('table');
        table.className = "user-table"; 

        
        let thead = document.createElement('thead');
        let headerRow = document.createElement('tr');

     
        let thName = document.createElement('th');
        thName.innerText = "Username";
        headerRow.appendChild(thName);

        
        let thAction = document.createElement('th');
        thAction.innerText = "Action";
        headerRow.appendChild(thAction);

        thead.appendChild(headerRow);
        table.appendChild(thead);

      
        let tbody = document.createElement('tbody');

        data.forEach(element => {
            let row = document.createElement('tr'); 

          
            let nameCell = document.createElement('td');
            nameCell.innerText = element.name;
            row.appendChild(nameCell);

          
            let actionCell = document.createElement('td');
            let iconElement = document.createElement('i');
            iconElement.className = "fa-solid fa-eye-slash";
            actionCell.appendChild(iconElement);
            row.appendChild(actionCell);

            
            tbody.appendChild(row);

            
            iconElement.addEventListener("click", function(event) {
                event.stopPropagation();
                toDisplayModal(element);
                toFetchSecondApi(element.id);
            }, false);

           
        });

        table.appendChild(tbody); 
        nameIcon.appendChild(table); 

    }).catch((error) => {
        console.log("Something went wrong", error);
    });
}




function toDisplayModal(element){
    // console.log("it is not working")

    let heading =document.querySelector(".first")
    heading.innerText=`Name: ${element.name}`
    let next1=document.querySelector(".second")
    next1.innerText=`Id: ${element.id}`
    let next2=document.querySelector(".third")
    next2.innerText=`Email: ${element.email}`
 
   

    modalInfo.style.display = "block";
    
    document.querySelector(".btn").addEventListener("click", displayNone)

    function displayNone(){
        modalInfo.style.display = "none"; 
    }

    document.querySelector(".btn2").addEventListener("click", displayNone)

    function displayNone(){
        modalInfo.style.display = "none"; 
    }

   
}

function toFetchSecondApi(id) {
    let pm = fetch(`https://jsonplaceholder.typicode.com/posts?id=${id}`);
    
    pm.then((response) => {
        return response.json();
    })
    .then((values) => {
        para.innerHTML = ""; 
        
        if (values.length > 0) {
            let projectValues = values[0]; 
            let projectElement = document.createElement('p');
            projectElement.innerText = `Project: ${projectValues.body}`;
            para.appendChild(projectElement);
        } else {
            para.innerText = "No project found for this user.";
        }

      
    })
    .catch((error) => {
        console.log("Something went wrong", error);
    });
}





































