function checkNewUser() {
    newUserForm = document.getElementById("newUser");
    if(!newUserForm.value) {
        alert("Must enter a new username");
        return(false);
    }
    return true;
}

function checkNewPost() {
    postForm = document.getElementsById("createPost");
    username = postForm.children[1].value;
    post = postForm.children[4].value;

    if(!username) {
        alert("Please provide a username!");
        return false;
    }

    else if(!post) {
        alert("Post cannot be empty!");
        return false;
    }

    else if(post == "Type out your post...") {
        alert("Please enter a new post!");
        return false;
    }
    return true;
}

function alertDeletePosts() {
    inputs = document.getElementsByTagName("input");
    for(let i=0; i<inputs.length-2; i++)
    {
        if(inputs[i].checked) {
            if(confirm("Delete posts?")) {
                return true;
            }
            else {
                return false;
            }
        }
        else if(i==inputs.length-2) {
            alert("No post(s) selected");
            return false;
        }
        else {
            continue;
        }
    }
}