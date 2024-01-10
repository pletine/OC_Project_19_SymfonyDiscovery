/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css'

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉')

// Add click event on each h3 Comment Add
var h3_addComment = document.getElementsByClassName('add comments');

Array.from(h3_addComment).forEach((element) => {
    element.addEventListener('click', (e) => {
        let nextSibling = e.target.nextElementSibling;
        console.log(nextSibling.style.visibility);

        if( nextSibling.style.visibility == 'visible' ) {
            nextSibling.style.visibility = 'hidden';
            nextSibling.style.height = '0';
        } else {
            nextSibling.style.visibility = 'visible';
            nextSibling.style.height = 'auto';
        }
    });
});