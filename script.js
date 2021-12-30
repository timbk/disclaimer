/**
 * Support scripts that hide the disclaimer box if:
 * - namespace is not on the target list
 * - the document was not rendered in the main body box (e.g. navigation box)
 */

// go through all disclaimer boxes in the document
var boxes = document.getElementsByClassName("disclaimer_box");
for(var idx=0; idx<boxes.length; idx++) {
    boxes[idx].innerHTML = NS;

    // remove if not in main body
    if (boxes[idx].parentNode.id != "bodyContent") {
        boxes[idx].remove();
    }
}

console.debug(boxes, NS);
