let closeBtn = document.querySelector("#message");
let messageTag = closeBtn.parentElement;
let parentElement = messageTag.parentElement;
closeBtn.addEventListener("click", ()=>{
    parentElement.removeChild(messageTag);
})