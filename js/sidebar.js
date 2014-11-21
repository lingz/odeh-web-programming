(function (window, document) {

    var content   = document.getElementById('layout'),
        menu     = document.getElementById('menu'),
        menuLink = document.getElementById('menuLink'),
        groupHeader = document.getElementsByClassName("group-header"),
        groupNodes = document.getElementsByClassName("group-node");

    function toggleClass(element, className) {
        var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;

        for(; i < length; i++) {
          if (classes[i] === className) {
            classes.splice(i, 1);
            break;
          }
        }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }

    menuLink.onclick = function (e) {
      var active = 'active';

      e.preventDefault();
      toggleClass(content, active);
      toggleClass(menu, active);
      toggleClass(menuLink, active);
    };

    var expandCategory = function(e) {
      e.preventDefault();
      var groupHeader = e.target;
      var group = groupHeader.getAttribute("data-target");
      var groupNode = document.getElementById(group);
      toggleClass(groupNode, "visible");
      toggleClass(groupHeader, "expanded");
    };

    for (var i = 0; i < groupNodes.length; i++) {
      groupHeader[i].onclick = expandCategory;
    }



}(this, this.document));
