/*
|============================================================
| Check if element is in the DOM tree or not: version 1.0
|============================================================
*/ 
let hasElement = (element) => {
    return document.contains(element) ?? false;
};

/*
|==================================================================
| Checking if the DOM containing the above item list: version 1.0
|==================================================================
*/
let hasElementsAll = (els) => {
    for (let i = 0; i < els.length; i++) {
        return document.contains(els[i]) ?? false;
    }
}


/*
|===============================================================================
| When clicking eye icon show target model with the correct data: version 1.0
|===============================================================================
*/ 
// let clickableIcon = (trigerIcon, tragetArea, value, message) => {
//     trigerIcon.addEventListener('click', _ => {
//         tragetArea = value;
//     });
// };

// =======================================================================================================================

/*
|================================================================
| Putting the description that comes from the server inside any
|   textarea with custom attribute [data-value]: version 1.0
|================================================================
*/ 
let textArea = document.querySelector('textarea');
if(hasElement(textArea)) {
    textArea.innerText = textArea.dataset.value ? textArea.dataset.value : '';
} else {
    console.log(`Unable to load textarea value because this page doesn't have textarea`);
}

// ========================================================================================================================

/*
|================================================
| View expanded image inside modal: version 1.0
|================================================
*/
let trigerBtn = document.querySelectorAll('[id^="open"]'),
    previewArea = document.querySelector('#showLgImg');

if (hasElementsAll(trigerBtn)) {
    trigerBtn.forEach(el => {
        el.addEventListener('click', _ => {
            previewArea.src = el.dataset.src;
        });
    });
} else {
    console.log(`Unable to load image src into showImg modal because this page doesn't have a with id #openImgDemo`);
}
// if (hasElement(trigerBtn)) {
//     clickableIcon(trigerBtn, previewArea.src, trigerBtn.dataset.src);
// } else {
//     console.log('Unable to load image src into showImg modal');
// }

// ========================================================================================================================

/*
|===============================================================
| View expanded description inside showDesc modal: version 1.0
|===============================================================
*/
let trigerDesc = document.querySelectorAll('[id^="desc"]'),
    paragArea = document.querySelector('#showDescText');

if (hasElementsAll(trigerDesc)) {
    trigerDesc.forEach(el => {
        el.addEventListener('click', _ => {
            paragArea.innerText = el.dataset.desc;
        });
    });
} else {
    console.log(`Unable to load description text into showDesc modal because this page doesn't have a with id #trigerDsec`);
}