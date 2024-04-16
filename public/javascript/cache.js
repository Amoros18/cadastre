function(e, t) {
    if (((t = t || this).closest("nav").classList.contains("toggled") || c.classList.contains("slide-opened")) && !r.classList.contains("dropdown-click")) {
      e.preventDefault();
      var n = t.closest("li");
      if (a(n.querySelector(".dropdown-menu-toggle")), t = n.querySelector(".sub-menu") ? n.querySelector(".sub-menu") : n.querySelector(".children"), generatepressMenu.toggleOpenedSubMenus) {
        var s = o(n);
        for (p = 0; p < s.length; p++) s[p].classList.contains("sfHover") && (s[p].classList.remove("sfHover"), s[p].querySelector(".toggled-on").classList.remove("toggled-on"), a(s[p].querySelector(".dropdown-menu-toggle")))
      }
      n.classList.toggle("sfHover"), t.classList.toggle("toggled-on")
    }
    e.stopPropagation()
  }

  function(e) {
    "Enter" === e.key && i(e, this)
  }