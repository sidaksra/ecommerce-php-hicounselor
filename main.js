document.addEventListener("DOMContentLoaded", ()=>{
    const alreadyBtn = document.querySelectorAll("#alreadyBtn");
    for(let i=0; i<alreadyBtn.length; i++){
        alreadyBtn[i].addEventListener("click", ()=>{
            alert("Already in the Cart");
        })
    }
    

})