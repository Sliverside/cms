import {sfCollection} from './helpers/symfony-collection.js';
sfCollection.init({'collectionsSelector': 'form ul[data-prototype]'});
// import {DirectChildren} from './helpers/functions.js';

// var addFieldButton = document.createElement('button');
// addFieldButton.textContent = 'Add Field';
// addFieldButton.setAttribute('type', 'button');
// addFieldButton.setAttribute('class', 'js-add-field-link');

// var removeFieldButton = document.createElement('button');
// removeFieldButton.textContent = 'Remove Field';
// removeFieldButton.setAttribute('type', 'button');
// removeFieldButton.setAttribute('class', 'js-remove_field_link');

// var newLinkLi = document.createElement('li');
// newLinkLi.append(addFieldButton);

// var collectionHolder = document.getElementsByClassName('fields')[0];

// DirectChildren(collectionHolder).forEach(field => {
//   field.append(createRemoveButton());
// });

// collectionHolder.append(newLinkLi);

// collectionHolder.dataset.index = DirectChildren(collectionHolder).length;

// addFieldButton.addEventListener('click', (e) => {
//   addFieldForm(collectionHolder, newLinkLi);
// });

// function createRemoveButton() {
//   var newRemoveFieldButton = removeFieldButton.cloneNode(true);
//   newRemoveFieldButton.addEventListener('click', removeField);
//   return newRemoveFieldButton;
// }

// function addFieldForm(collectionHolder, newLinkLi) {
  
//   var prototype = collectionHolder.dataset.prototype;

//   var index = collectionHolder.dataset.index;

//   var newForm = prototype;
//   newForm = newForm.replace(/__name__/g, index);

//   collectionHolder.dataset.index = parseInt(index) + 1;

//   var newFormLi = document.createElement('li');
//   newFormLi.innerHTML = newForm;

//   newFormLi.append(createRemoveButton());

//   newLinkLi.parentNode.insertBefore(newFormLi, newLinkLi);
// }

// function removeField() {
//   console.log(this);
//   this.parentNode.parentNode.removeChild(this.parentNode);
// }