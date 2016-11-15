var head = document.getElementsByTagName('html')[0]; //get top level of document

var info = document.getElementById('info'); //get element to change

var tree = "" //initialize tree string

domTree(head); //call function with head node

info.innerHTML = tree; //replace element data with new data


//part 1
function domTree(node, depth) { //recursive dom element name tree

    if (!depth) { //if at top, set depth to 0
        depth = 0;
    }

    for (var i = 0; i < depth; i++) { //prints the '-' chars for level indication
        tree += '-';
    }

    var tag = node.tagName; //store tagname for reuse

    tree += tag + '\n'; //add tagname to tree

    for (var i = 0; i < node.children.length; ++i) { //call the function for each child node
        domTree(node.children[i], depth + 1);
    }

    //part 2
    node.addEventListener("click", function(){ //on click handler for alerting the dom placement of an element
        alert(node.tagName);
    });

}


//===================================
//===================================

//part 3

window.onload = function() { //when the page has loaded
    var newP = document.createElement("P"); //create a new element
    var text = document.createTextNode("\"Keep your face always toward the sunshine - and shadows will fall behind you.\" -Walt Whitman"); //add text 
    newP.appendChild(text); //add text to new element
    document.body.appendChild(newP); //add new element to the body
};



div = document.getElementsByTagName('div'); //get collection of all divs

for (var i = 0; i < div.length; ++i) { //loop through divs

    div[i].onmouseover = function() { //on mouse over
        this.style.backgroundColor = "red";
        this.style.position = "relative";
        this.style.left = "10px";
    };

    div[i].onmouseout = function() { //on mouse out
        this.style.backgroundColor = "white";
        this.style.left = "0px";
    };
}