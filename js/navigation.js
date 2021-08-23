/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
  var container, button, menu, links, i, len;
  let dropdowns = document.querySelectorAll('.menu-item-has-children');

  dropdowns.forEach((dropdown) => {
    dropdown.tabIndex = 0;
    let dropDownAnchor = dropdown.querySelector('a');
    dropDownAnchor.outerHTML = '<span>' + dropDownAnchor.innerHTML + '</span>'
  })

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = document.getElementById( 'menu-toggle' );
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
      dropdowns.forEach((dropdown) => { dropdown.tabIndex = 0; })
      container.className = container.className.replace( ' toggled', '' );
      button.className = button.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
      dropdowns.forEach((dropdown) => { dropdown.tabIndex = -1; })
      container.className += ' toggled';
      button.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
  };
} )();