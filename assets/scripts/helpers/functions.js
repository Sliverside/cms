/**
 * Find all direct childrens of an {HTMLCollection}
 * @param {HTMLCollection} parent Any {HTMLCollection}
 * @return {array} Direct children of 'parent'
 */
export const DirectChildren = (parent) => {
  const children = parent.childNodes;
  var directChildrenArray = [];
  children.forEach((child) => {
    if (child.nodeType === 1) {
      directChildrenArray.push(child);
    }
  })
  return directChildrenArray;
};
