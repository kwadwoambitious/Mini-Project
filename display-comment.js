const commentBtn = document.getElementById('comment-btn');
const commentContent = document.getElementById('content');

commentBtn.addEventListener('click', () => {
    commentContent.classList.toggle('show-comment');
    if(commentBtn.innerText == "Click to comment"){
      commentBtn.innerText = "Close comment";
    }
    else{
      commentBtn.innerText = "Click to comment";
    }
});