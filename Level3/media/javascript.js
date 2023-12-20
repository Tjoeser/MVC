function toggleAll(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

function Readthis(source) {
    var checkedBoxes = document.querySelectorAll('input[name="checkbox"]:checked');

    // Convert the NodeList to an array
    var checkedValues = Array.from(checkedBoxes).map(function(checkbox) {
      return checkbox.value;

    });
    
    console.log(checkedValues);
    var delimiter = ","; 
    var result = checkedValues.join(delimiter);
    console.log(result);

    window.location.href = "index.php?op=products&act=checkread&id="+result+"";

}


function Deletethis(source) {
    var checkedBoxes = document.querySelectorAll('input[name="checkbox"]:checked');

    // Convert the NodeList to an array
    var checkedValues = Array.from(checkedBoxes).map(function(checkbox) {
      return checkbox.value;

    });
    
    console.log(checkedValues);
    var delimiter = ","; 
    var result = checkedValues.join(delimiter);
    console.log(result);

    window.location.href = "index.php?op=products&act=checkdelete&id="+result+"";
}

function Downloadthis(source) {
    var checkedBoxes = document.querySelectorAll('input[name="checkbox"]:checked');

    // Convert the NodeList to an array
    var checkedValues = Array.from(checkedBoxes).map(function(checkbox) {
      return checkbox.value;

    });
    
    console.log(checkedValues);
    var delimiter = ","; 
    var result = checkedValues.join(delimiter);
    console.log(result);

    window.location.href = "index.php?op=products&act=download&id="+result+"";
}
