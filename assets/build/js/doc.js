/**
 * Reza-Admin v1.0.1
 * Copyright (c) 2020 Reza Admin
 * Released under the MIT License
*/

const mainBox = document.querySelector(".main__box");
if(mainBox !== null) {
	mainBox.addEventListener('click', e => {
		// sidebar dropdown
		let targetSidebarDropdown = e.target;
        if(!targetSidebarDropdown.classList.contains("sidebar__btn-dropdown")) targetSidebarDropdown = e.target.parentElement;
        if(targetSidebarDropdown.classList.contains("sidebar__btn-dropdown")) {
            e.preventDefault();

            targetSidebarDropdown.parentElement.classList.toggle("sidebar__item--dropdown-active");
            targetSidebarDropdown.nextElementSibling.classList.toggle("sidebar__dropdown--show");
        }

        // sidebar toggler
        let targetSidebarToggler = e.target;
        if(!targetSidebarToggler.classList.contains("navbar__sidebar-toggler")) targetSidebarToggler = e.target.parentElement;
        if(targetSidebarToggler.classList.contains("navbar__sidebar-toggler")) {
        	e.preventDefault();

        	targetSidebarToggler.parentElement.nextElementSibling.classList.toggle("sidebar--show-sm");
        }

        // copy to clipboard
        let targetClipboard = e.target;
        if(targetClipboard.classList.contains("clipboard")) {
            const textCode = targetClipboard.parentElement.nextElementSibling.textContent;

            // make textarea element then append and remove when copied to clipboard
            const input = document.createElement('textarea');
            input.value = textCode;
            input.style.position = "absolute";
            input.style.left = "-999px";
            input.style.opacity = "0";
            document.body.appendChild(input);
            input.select();
            document.execCommand("copy");
            input.remove();

            // change text btn copy in 1 second
            targetClipboard.innerText = "Copied";
            targetClipboard.style.pointerEvents = "none";
            setTimeout(()=> {
                targetClipboard.innerText="Copy";
                targetClipboard.style.pointerEvents = "auto";
            }, 500);
        }
	});
}