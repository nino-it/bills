
var allProducts = [];
var itemid = 0;
var dateTime;
var store;

function collectProducts() {
    let product = document.getElementById("items").value;
    let price = document.getElementById("price").value;
    let quantity = document.getElementById("quantity").value;
    store = document.getElementById("stores");
    dateTime = document.getElementById("date").value + ' ' + document.getElementById("time").value;

    if (store !== '' || product !== '' || price !== '' || quantity !== '' || dateTime !== ''){
        allProducts.push({
            itemid: itemid,
            storeId: store.value,
            store: store.options[store.selectedIndex].text,
            productId: document.getElementById("items").getAttribute('value'),
            product: product,
            quantity: quantity,
            price: price,
            time: dateTime
        });
        addItem(product, price, quantity);
        itemid++;
        document.getElementById("items").value = "";
        document.getElementById("quantity").value = "";
        document.getElementById("price").value = "";
    }
}

//ADD 
var item = document.getElementById("new-item");
var list = document.getElementById("list");

function addItem(product, price, quantity) {

    toDoItem = `<li>
                  
        <span class="item">${product} ${quantity} x ${price} </span>
                  <i class="fa fa-trash" itemid='${itemid}' remove="yes"></i>
              </li>`;
 
    const position = "beforeend";
    list.insertAdjacentHTML(position, toDoItem);
}

//delete task
list.addEventListener("click", function(event) {
    let element = event.target;
    const itemval = element.attributes.itemid.value;
    const remove = element.attributes.remove.value; //delete completed task
    console.log(element);
    console.log(itemval);
    console.log(remove);
    

    if (remove == "yes") {
        removeToDo(element);
        // remove item from list
        for (var key in allProducts) {
            if (allProducts[key].itemid == itemval) {
                allProducts.splice(key, 1);
            }

        }
    }
});

// remove to do
function removeToDo(element) {
    element.parentNode.parentNode.removeChild(element.parentNode);
}

// bill preview
nextItem = document.getElementById("next-item");
preBill = document.getElementById("preview-bill");
modal = document.getElementById("myModal");

function previewBill(all) {
    let total = 0;
    let fullprice = 0;
    
    //header
    preview =`<div class='modal-store'>${all[0]['store']}</div>`
            +`<div class='modal-date'>${all[0]['time']}</div>`;

    //content
    for (i in all) {
        fullprice = all[i]['quantity'] * all[i]['price'];
        total += fullprice;
     
        preview += `<div class='modal-item'><div class='modal-name'>${all[i]['product']}</div>`
        + `<span class='modal-quantity'>${all[i]['quantity']} x </span>`
        + `<span class='modal-price'>${Number(all[i]['price']).toFixed(2)}</span>`
        + `<span class='modal-full-price'>${Number(fullprice).toFixed(2)}</span></div>`
        }
    //footer
    preview+= "<div class='modal-footer'"
            + "<span>TOTAL: </span>"
            + `<span class='modal-total'>${Number(total).toFixed(2)}</span>`
            + "</div>";

    modal.children[0].children[0].innerHTML = preview;
    modal.style.display = "block";
}

// on click call functions
window.onclick = function(event) {
    if (event.target == preBill) {
        console.log(allProducts);
        previewBill(allProducts);
    }

    if (event.target == nextItem) {
        collectProducts();
    }

    if (event.target == modal) {
        modal.style.display = "none";
    }

}






