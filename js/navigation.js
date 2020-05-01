/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
  var container, button, menu, links, i, len;
  let dropdowns = document.querySelectorAll('.menu-item-has-children');
  let navigation = document.getElementById('site-navigation');

  dropdowns.forEach((dropdown) => { dropdown.tabIndex = 0; })

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

  // Enable keyboard navigation of dropdown hovers

  for (i = 0; i < dropdowns.length; i++) {
    dropdowns[i].firstElementChild.tabIndex = -1;
    addListeners(i);
  }

  function addListeners(i) {
    dropdowns[i].addEventListener('focusin', onFocusIn);
    dropdowns[i].addEventListener('focusout', onFocusOut);
  }

  function onFocusIn (event) {
    if (!(event.target.classList.contains('menu-item-has-children')) && !(navigation.classList.contains('toggled'))) {
      event.target.parentElement.parentElement.classList.add('focus');
    }
  }

  function onFocusOut (event) {
    if (!(event.target.classList.contains('menu-item-has-children')) && !(navigation.classList.contains('toggled'))) {
      event.target.parentElement.parentElement.classList.remove('focus');
    }
  }

} )();